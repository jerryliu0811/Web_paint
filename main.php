<?php include("setting.php"); ?>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="mystyle.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="myjs.js"></script>
	<TITLE>Dee Nong Card</TITLE>
</head>
<body>
	<!--Little Window Model-->
	<div class="modal fade" id="WindowModel" role="dialog">
		<div class="modal-dialog">
			<!-- Modal content-->
			<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title" style="color: black" id="header"></h4>
			</div>
			<div class="modal-body" id="body">
			</div>
			<div class="modal-footer" id="footer">
			</div>
			</div>
		</div>
	</div>
	
	<!--About us Window-->
	<div class="modal fade" id="AboutUsWindow" role="dialog">
		<div class="modal-dialog">
			<!-- Modal content-->
			<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title" style="color: black">About Dee Nong Card</h4>
			</div>
			<div class="modal-body">
				<table>
					<tr>
						<td style="color: black"><h4>Q: What is Dee Nong Card ?</h4></td>
					</tr>
					<tr>
						<td style="color: black"><p style="padding-left: 15px">A: This is a paradise for Dee Nong people</p></td>
					</tr>
					<tr>
						<td style="color: black"><h4>Q: What is Dee Nong People?</h4></td>
					</tr>
					<tr>
						<td style="color: black"><p style="padding-left: 15px">A: People whose IQ is under the average</p></td>
					</tr>
				</table>
			</div>
			<div class="modal-footer">
				<button class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
			</div>
		</div>
	</div>
	
	<!--Write Window-->
	<div class="modal fade" id="WriteWindow" role="dialog">
		<div class="modal-dialog">
			<!-- Modal content-->
			<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title" style="color: black">Write some Dee Nong</h4>
			</div>
			<div class="modal-body">
				<table>
					<tr>
						<td style="color: black"><p style="padding-top: 8px">Dee Nong Title</p></td>
						<td style="color: black"><input type="text" id="write_title"></td>
					</tr>
					<tr>
						<td style="color: black"><p style="padding-top: 8px">Dee Nong Content</p></td>
						<td style="color: black"><textarea rows="10" cols="50" id="write_content"></textarea></td>
					</tr>
				</table>
			</div>
			<div class="modal-footer">
				<button class="btn btn-default" data-dismiss="modal" id="write-btn">Submit</button>
				<button class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
			</div>
		</div>
	</div>
	
	<!--Regist Window-->
	<div class="modal fade" id="RegistWindow" role="dialog">
		<div class="modal-dialog">
			<!-- Modal content-->
			<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title" style="color: black">Regist to Dee Nong Card</h4>
			</div>
			<div class="modal-body">
				<table>
					<tr>
						<td style="color: black"><p style="padding-top: 8px">Your Dee Nong Account</p></td>
						<td style="color: black"><input type="text" name="account" id="regist_username"></td>
					</tr>
					<tr>
						<td style="color: black"><p style="padding-top: 8px">Your Dee Nong Password</p></td>
						<td style="color: black"><input type="password" name="password" id="regist_password"></td>
					</tr>
				</table>
			</div>
			<div class="modal-footer">
				<button class="btn btn-default" data-dismiss="modal" id="regist_btn">Submit</button>
				<button class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
			</div>
		</div>
	</div>
	
	<!--Log in Window-->
	<div class="modal fade" id="LogInWindow" role="dialog">
		<div class="modal-dialog">
			<!-- Modal content-->
			<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title" style="color: black">Log in to Dee Nong Card</h4>
			</div>
			<div class="modal-body">
				<table>
					<tr>
						<td style="color: black"><p style="padding-top: 8px">Your Dee Nong Account</p></td>
						<td style="color: black"><input type="text" name="account" id="login_username"></td>
					</tr>
					<tr>
						<td style="color: black"><p style="padding-top: 8px">Your Dee Nong Password</p></td>
						<td style="color: black"><input type="password" name="password" id="login_password"></td>
					</tr>
				</table>
			</div>
			<div class="modal-footer">
				<button class="btn btn-default" data-dismiss="modal" id="login-btn">Submit</button>
				<button class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
			</div>
		</div>
	</div>
	
	<!--Log out Window-->
	<div class="modal fade" id="LogOutWindow" role="dialog">
		<div class="modal-dialog">
			<!-- Modal content-->
			<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title" style="color: black">Warning</h4>
			</div>
			<div class="modal-body">
				<table>
					<tr>
						<td style="color: black"><p style="padding-top: 8px">Hey</p></td>	
					</tr>
					<tr>
						<td style="color: black"><p style="padding-top: 8px" id="logout_body">Are you sure to leave?</p></td>
					</tr>
				</table>
			</div>
			<div class="modal-footer">
				<button class="btn btn-default" data-dismiss="modal" id="logoutYES-btn">Yes</button>
				<button class="btn btn-default" data-dismiss="modal">No</button>
			</div>
			</div>
		</div>
	</div>
	
	<!--Error Window (for Regist)-->
	<div class="modal fade" id="ErrorWindow" role="dialog">
		<div class="modal-dialog">
			<!-- Modal content-->
			<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title" style="color: black">Error</h4>
			</div>
			<div class="modal-body">
				<table>
					<tr>
						<td style="color: black"><p style="padding-top: 8px">Hey</p></td>	
					</tr>
					<tr>
						<td style="color: black"><p style="padding-top: 8px" id="error_body"></p></td>
					</tr>
				</table>
			</div>
			<div class="modal-footer">
				<button class="btn btn-default" data-dismiss="modal" id="error-btn">Try Again</button>
			</div>
			</div>
		</div>
	</div>
	
	<!--Error Window (for Login)-->
	<div class="modal fade" id="Error2Window" role="dialog">
		<div class="modal-dialog">
			<!-- Modal content-->
			<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title" style="color: black">Error</h4>
			</div>
			<div class="modal-body">
				<table>
					<tr>
						<td style="color: black"><p style="padding-top: 8px">Hey</p></td>	
					</tr>
					<tr>
						<td style="color: black"><p style="padding-top: 8px" id="error2_body"></p></td>
					</tr>
				</table>
			</div>
			<div class="modal-footer">
				<button class="btn btn-default" data-dismiss="modal" id="error2-btn">Try Again</button>
			</div>
			</div>
		</div>
	</div>
	
	<!--Error Window (for Write)-->
	<div class="modal fade" id="Error3Window" role="dialog">
		<div class="modal-dialog">
			<!-- Modal content-->
			<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title" style="color: black">Error</h4>
			</div>
			<div class="modal-body">
				<table>
					<tr>
						<td style="color: black"><p style="padding-top: 8px">Hey</p></td>	
					</tr>
					<tr>
						<td style="color: black"><p style="padding-top: 8px" id="error3_body"></p></td>
					</tr>
				</table>
			</div>
			<div class="modal-footer">
				<button class="btn btn-default" data-dismiss="modal" id="error3-btn">Try Again</button>
			</div>
			</div>
		</div>
	</div>
	
	<!--RegistSuccessWindow Window-->
	<div class="modal fade" id="RegistSuccessWindow" role="dialog">
		<div class="modal-dialog">
			<!-- Modal content-->
			<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title" style="color: black">Success</h4>
			</div>
			<div class="modal-body">
				<table>
					<tr>
						<td style="color: black"><p style="padding-top: 8px">Hey</p></td>	
					</tr>
					<tr>
						<td style="color: black"><p style="padding-top: 8px">Regist Success</p></td>
					</tr>
				</table>
			</div>
			<div class="modal-footer">
				<button class="btn btn-default" data-dismiss="modal" id="registSuccess-btn">Done</button>
			</div>
			</div>
		</div>
	</div>
	
	<!--navigation bar-->
	<table class="navigation">
		<tr>
			<ul>
				<li><a class="no-hover">Dee Nong Card</a></li>
				<li style="float:right"><button data-toggle="modal" data-target="#AboutUsWindow">About US</button></li>
			</ul>
		</tr>
		<tr>
			<ul>
				<li><button id="nav-home-btn" class="active">Home</button></li>
				<li><button id="nav-previous-btn">Previous Page</button></li>
				<li><button id="nav-next-btn">Next Page</button></li>
				<li style="float:right"><button data-toggle="modal" data-target="#LogOutWindow" id="nav-logout-btn" hidden>Log out</button></li>
				<li style="float:right"><button data-toggle="modal" data-target="#LogInWindow" id="nav-login-btn">Log in</button></li>
				<li style="float:right"><button data-toggle="modal" data-target="#RegistWindow" id="nav-regist-btn">Regist</button></li>
				<li style="float:right"><button id="profile" hidden>Profile</button></li>
				<li style="float:right"><button data-toggle="modal" data-target="#WriteWindow" id="nav-write-btn" hidden>Write</button></li>
			</ul>
		</tr>
	</table>

	<!--main article-->
	<div class="col-sm-3"></div>
	<div class="col-sm-6">
		<table class="table">
			<thead>
			<tr class="main">
				<th style="width : 20%">Title</th>
				<th style="width : 60%">Content</th>
				<th style="width : 20%">Time</th>
			</tr>
			</thead>
			<tbody id="article"></tbody>
		</table>
	</div>
	<div class="col-sm-3"></div>
</body>
</html>