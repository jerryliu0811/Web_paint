<?php
	include("setting.php");
	
	//received json_data  "{requestType : regist/login/logout/write/delete , username : username , password : password , ...}"
	//snding   json_data  "{status : success/fail}"
	
	$json = file_get_contents('php://input');
	$data = json_decode($json);

	$requestType = $data->requestType;
	
	if($requestType == "session_check"){
		if(strlen($_SESSION['username']) > 0){
			$response = array();
			$response = json_encode(array('nav_login_btn'  => "hide" , 'nav_regist_btn' => "hide" , 'nav_write_btn' => "show" ,
										  'nav_logout_btn' => "show" , 'profile'        => "show" , 'profile_text' => $_SESSION['username']));
			echo $response;
		}
		else{
			$response = array();
			$response = json_encode(array('nav_login_btn'  => "show" , 'nav_regist_btn' => "show" , 'nav_write_btn' => "hide" , 
										  'nav_logout_btn' => "hide" , 'profile'        => "hide" ));
			echo $response;
		}
	}
	else if($requestType == "showarticle"){
		$sql = "SELECT * FROM article ORDER BY time DESC LIMIT 10";
		$sth = $db->prepare($sql);
		$sth->execute();
		
		$response = array();
		$showarticle = "";
		//$result = $sth->fetchObject();
		while($result = $sth->fetchObject()){
			$showarticle = $showarticle.'<tr class="main">
											<td>'.$result->title.'</td>
											<td>'.$result->content.'</td>
											<td>'.$result->time.'</td>
										</tr>';
		}
		
		$sql = "SELECT count(*) AS totalnumber FROM article";
		$sth = $db->prepare($sql);
		$sth->execute();
		$result = $sth->fetchObject();
		
		$totalnumber = $result->totalnumber;
		$maxPage = ceil($totalnumber/10);
		
		$response = json_encode(array('showarticle' => $showarticle , 'maxPage' => $maxPage));
		echo $response;
	}
	else if($requestType == "pagearticle"){
		$page = $data->page;
		$offsetnumber = ($page-1) * 10;
		
		$sql = "SELECT * FROM article ORDER BY time DESC LIMIT 10 OFFSET " . $offsetnumber;
		$sth = $db->prepare($sql);
		$sth->execute();
		
		$response = array();
		$showarticle = "";
		while($result = $sth->fetchObject()){
			$showarticle = $showarticle.'<tr class="main">
											<td>'.$result->title.'</td>
											<td>'.$result->content.'</td>
											<td>'.$result->time.'</td>
										</tr>';
		}
		$response = json_encode(array('showarticle' => $showarticle));
		echo $response;
	}
	else if($requestType == "regist"){
		$username = $data->username;
		$password = $data->password;
		
		//check if username already exist
		$sql = "SELECT count(*) AS user_count FROM user WHERE `username` = ?";
		$sth = $db->prepare($sql);
		$sth->execute(array($username));
		
		$response = array();
		$result = $sth->fetchObject();
		//username exist
		if($result->user_count > 0){
			$response = json_encode(array('status' => "fail"));
		}
		//username not exist
		//add username
		else{
			$sql= "INSERT INTO user (username , password)" . " VALUES (? , ?)";
			$sth= $db->prepare($sql);
			$sth->execute(array($username , $password));
			
			$response = json_encode(array('status' => "success"));
		}
		echo $response;
	}
	else if($requestType == "login"){
		$username = $data->username;
		$password = $data->password;
		
		//check if username already exist
		$sql = "SELECT count(*) AS user_count FROM user WHERE `username` = ?";
		$sth = $db->prepare($sql);
		$sth->execute(array($username));
		
		$response = array();
		$result = $sth->fetchObject();
		//username exist
		if($result->user_count > 0){
			$sql = "SELECT * FROM user WHERE (username , password) = (?,?)";
			$sth = $db->prepare($sql);
			$sth->execute(array($username,$password));
			
			$result = $sth->fetchObject();
			if(!$result){
				$response = json_encode(array('status' => "WrongPassword"));
			}
			else{
				$response = json_encode(array('status' => "success"));
				/*session*/
				$_SESSION['username']=$username;
			}
		}
		//username not exist
		else{
			$response = json_encode(array('status' => "fail"));
		}
		echo $response;
	}
	else if($requestType == "logout"){
		$_SESSION['username'] = "";
	}
	else if($requestType == "write"){
		$username = $_SESSION['username'];
		$title = $data->write_title;
		$content = $data->write_content;
		
		$sql= "INSERT INTO article (username , title , content)" . " VALUES (? , ? , ?)";
		$sth= $db->prepare($sql);
		$sth->execute(array($username , $title , $content));
		
		$response = array();
		$response = json_encode(array('status' => "success"));
		echo $response;
	}
	else if($requestType == "profile"){
		$username = $_SESSION['username'];
		$sql = "SELECT article.article_id , article.title , article.content , article.time FROM article 
				INNER JOIN user
				ON article.username = user.username
				WHERE article.username = ?";
		$sth = $db->prepare($sql);
		$sth->execute(array($username));
		
		$showarticle = "";
		$response = array();
		//$result = $sth->fetchObject();
		while($result = $sth->fetchObject()){
			$showarticle = $showarticle.'<tr class="main">
											<td>'.$result->title.'</td>
											<td>'.$result->content.'</td>
											<td>'.$result->time.'</td>
										</tr>';
		}
		
		$response = json_encode(array('showarticle' => $showarticle));
		echo $response;
	}
?>