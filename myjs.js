$( document ).ready(function() {
		var nowpage = 1;
		var maxPage = 1;
		
		//check session
		var session_data = {"requestType" : "session_check"};
		$.ajax({
				type: "POST",
				url: "function.php",
				data: JSON.stringify(session_data),
				dataType: 'html',
				success: function(response){
					
					//console.log(response);
					
					var fuck = jQuery.parseJSON(response);
					var login_btn_field = fuck.nav_login_btn;
					var regist_btn_field = fuck.nav_regist_btn;
					var logout_btn_field = fuck.nav_logout_btn;
					var profile_btn_field = fuck.profile;
					var write_btn_field=fuck.nav_write_btn;
					
					if(login_btn_field == "show"){$("#nav-login-btn").show();}
					else{$("#nav-login-btn").hide();}
					if(regist_btn_field == "show"){$("#nav-regist-btn").show();}
					else{$("#nav-regist-btn").hide();}
					if(logout_btn_field == "show"){$("#nav-logout-btn").show();}
					else{$("#nav-logout-btn").hide();}
					if(profile_btn_field == "show"){$("#profile").text(fuck.profile_text);$("#profile").show();}
					else{$("#profile").hide();}
					if(write_btn_field == "show"){$("#nav-write-btn").show();}
					else{$("#nav-write-btn").hide();}
				}
		});
		
		//show article
		var article_data = {"requestType" : "showarticle"};
		$.ajax({
				type: "POST",
				url: "function.php",
				data: JSON.stringify(article_data),
				dataType: 'html',
				success: function(response){
					var fuck = jQuery.parseJSON(response);
					maxPage = fuck.maxPage;
					$("#article").html(fuck.showarticle);
				}
		});
		
		//error-btn for regist
		$("#error-btn").on("click", function() {
			$("#ErrorWindow").modal("hide");
			$("#RegistWindow").modal("show");
		});
		
		//error-btn for login
		$("#error2-btn").on("click", function() {
			$("#Error2Window").modal("hide");
			$("#LogInWindow").modal("show");
		});
		
		//error-btn for write
		$("#error3-btn").on("click", function() {
			$("#Error3Window").modal("hide");
			$("#WriteWindow").modal("show");
		});
		
		//regist-btn
		$("#regist_btn").on("click", function() {
		//function registfunction(){
			var username = $('#regist_username').val();
			var password = $('#regist_password').val();

			var regEx = /^[a-z0-9]+$/i;
			var username_check = regEx.test(username);
			var password_check = regEx.test(password);
			//illegal username：empty
			if(isEmpty(username)){
				
				$("#ErrorWindow").modal("show");
				$("#RegistWindow").modal("hide");
				document.getElementById("error_body").textContent="Type username!!";
				//return;
			}
			//illegal password：empty
			else if(isEmpty(password)){
				$("#ErrorWindow").modal("show");
				$("#RegistWindow").modal("hide");
				document.getElementById("error_body").textContent="Type password!!";
				//return;
			}
			//illegal username/password：contain with other symbols
			else if(!username_check || !password_check){
				$("#ErrorWindow").modal("show");
				$("#RegistWindow").modal("hide");
				document.getElementById("error_body").textContent="Alphabets and Munbers Only!!";
				//return;
			}
			else {
			//call file to add user
			//received json_data  "{username : username , password : password}"
			//snding   json_data  "{status : success/fail}"
				var data = 
				{
					"requestType" : "regist",
					"username" : username,
					"password" : password
				};
				$.ajax({
					type: "POST",
					url: "function.php",
					data: JSON.stringify(data),
					dataType: 'html',
					success: function(response){
						//var fuck = JSON.parse(response);
						var fuck = jQuery.parseJSON(response);
						var tmp = fuck.status;
						if(tmp == "success"){
							$("#RegistSuccessWindow").modal("show");
						}
						else{
							$("#ErrorWindow").modal("show");
							$("#RegistWindow").modal("hide");
							document.getElementById("error_body").textContent="This username already existed";
						}
						console.log( response );
					}
				});
			}
		});
		
		//registSuccess-btn 
		$("#registSuccess-btn").on("click" , function(){
			location.reload();
		});
		
		//login-btn
		$("#login-btn").on("click", function() {
			var username = $('#login_username').val();
			var password = $('#login_password').val();

			var regEx = /^[a-z0-9]+$/i;
			var username_check = regEx.test(username);
			var password_check = regEx.test(password);
			//illegal username：empty
			if(isEmpty(username)){
				$("#Error2Window").modal("show");
				$("#LogInWindow").modal("hide");
				document.getElementById("error2_body").textContent="Type username!!";
				//return;
			}
			//illegal password：empty
			else if(isEmpty(password)){
				$("#Error2Window").modal("show");
				$("#LogInWindow").modal("hide");
				document.getElementById("error2_body").textContent="Type password!!";
				//return;
			}
			//illegal username/password：contain with other symbols
			else if(!username_check || !password_check){
				$("#Error2Window").modal("show");
				$("#LogInWindow").modal("hide");
				document.getElementById("error2_body").textContent="Alphabets and Munbers Only!!";
				//return;
			}
			else {
			//call file to add user
			//received json_data  "{username : username , password : password}"
			//snding   json_data  "{status : success/fail}"
				var data = 
				{
					"requestType" : "login",
					"username" : username,
					"password" : password
				};
				$.ajax({
					type: "POST",
					url: "function.php",
					data: JSON.stringify(data),
					dataType: 'html',
					success: function(response){
						//var fuck = JSON.parse(response);
						var fuck = jQuery.parseJSON(response);
						var tmp = fuck.status;
						if(tmp == "success"){
							location.reload();
						}
						else{
							$("#Error2Window").modal("show");
							$("#LogInWindow").modal("hide");
							if(tmp == "WrongPassword"){
								document.getElementById("error2_body").textContent="Wrong Password";
							}
							else{
								document.getElementById("error2_body").textContent="This username NOT exist";
							}
						}
					}
				});
			}
		});

		//logout-btn 
		$("#logoutYES-btn").on("click" , function(){
			var data = 
				{
					"requestType" : "logout",
				};
				$.ajax({
					type: "POST",
					url: "function.php",
					data: JSON.stringify(data),
					dataType: 'html',
					success: function(response){
							location.reload();
						}
				});
		});
		
		//write-btn
		$("#write-btn").on("click" , function(){
			var write_title = $('#write_title').val();
			var write_content = $('#write_content').val();
			
			if(isEmpty(write_title)){
				$("#Error3Window").modal("show");
				$("#WriteWindow").modal("hide");
				document.getElementById("error3_body").textContent="Must write down your Title!!";
			}
			else if(isEmpty(write_content)){
				$("#Error3Window").modal("show");
				$("#WriteWindow").modal("hide");
				document.getElementById("error3_body").textContent="Must write down your Content!!";
			}
			else{
				var data = 
				{
					"requestType" : "write",
					"write_title" : write_title,
					"write_content" : write_content
				};
					$.ajax({
						type: "POST",
						url: "function.php",
						data: JSON.stringify(data),
						dataType: 'html',
						success: function(response){
							console.log(response);
							location.reload();
						}
					});
				}
		});
		
		//nav-home-btn
		$("#nav-home-btn").on("click" , function(){
			location.reload();
		});
		
		//nav-previous-btn
		$("#nav-previous-btn").on("click" , function(){
			if(nowpage > 1){
				nowpage--;
				var data = 
				{
					"requestType" : "pagearticle",
					"page" : nowpage
				};
					$.ajax({
						type: "POST",
						url: "function.php",
						data: JSON.stringify(data),
						dataType: 'html',
						success: function(response){
							var fuck = jQuery.parseJSON(response);
							$("#article").html(fuck.showarticle);
						}
					});
			}
		});
		
		//nav-next-btn
		$("#nav-next-btn").on("click" , function(){
			if(nowpage < maxPage){
				nowpage++;
				var data = 
				{
					"requestType" : "pagearticle",
					"page" : nowpage
				};
					$.ajax({
						type: "POST",
						url: "function.php",
						data: JSON.stringify(data),
						dataType: 'html',
						success: function(response){
							var fuck = jQuery.parseJSON(response);
							$("#article").html(fuck.showarticle);
						}
					});
			}
		});
		
		//profile
		$("#profile").on("click" , function(){
			var data = 
			{
				"requestType" : "profile",
			};
				$.ajax({
					type: "POST",
					url: "function.php",
					data: JSON.stringify(data),
					dataType: 'html',
					success: function(response){
						var fuck = jQuery.parseJSON(response);
						//console.log(response);
						//console.log(fuck);
						$("#article").html(fuck.showarticle);
					}
				});
		});
		
		$("#nav-home-btn").on("click",function(){
			//$("#nav-home-btn").removeClass("active");
			$("#nav-previous-btn").removeClass("active");
			$("#nav-next-btn").removeClass("active");
			$("#nav-regist-btn").removeClass("active");
			$("#nav-login-btn").removeClass("active");
			$("#nav-logout-btn").removeClass("active");
			$("#profile").removeClass("active");
			$("#nav-write-btn").removeClass("active");
			$(this).addClass("active");
		});
		
		$("#nav-previous-btn").on("click",function(){
			$("#nav-home-btn").removeClass("active");
			//$("#nav-previous-btn").removeClass("active");
			$("#nav-next-btn").removeClass("active");
			$("#nav-regist-btn").removeClass("active");
			$("#nav-login-btn").removeClass("active");
			$("#nav-logout-btn").removeClass("active");
			$("#profile").removeClass("active");
			$("#nav-write-btn").removeClass("active");
			$(this).addClass("active");
		});
		
		$("#nav-next-btn").on("click",function(){
			$("#nav-home-btn").removeClass("active");
			$("#nav-previous-btn").removeClass("active");
			//$("#nav-next-btn").removeClass("active");
			$("#nav-regist-btn").removeClass("active");
			$("#nav-login-btn").removeClass("active");
			$("#nav-logout-btn").removeClass("active");
			$("#profile").removeClass("active");
			$("#nav-write-btn").removeClass("active");
			$(this).addClass("active");
		});
		
		$("#nav-regist-btn").on("click",function(){
			$("#nav-home-btn").removeClass("active");
			$("#nav-previous-btn").removeClass("active");
			$("#nav-next-btn").removeClass("active");
			//$("#nav-regist-btn").removeClass("active");
			$("#nav-login-btn").removeClass("active");
			$("#nav-logout-btn").removeClass("active");
			$("#profile").removeClass("active");
			$("#nav-write-btn").removeClass("active");
			$(this).addClass("active");
		});
		
		$("#nav-login-btn").on("click",function(){
			$("#nav-home-btn").removeClass("active");
			$("#nav-previous-btn").removeClass("active");
			$("#nav-next-btn").removeClass("active");
			$("#nav-regist-btn").removeClass("active");
			//$("#nav-login-btn").removeClass("active");
			$("#nav-logout-btn").removeClass("active");
			$("#profile").removeClass("active");
			$("#nav-write-btn").removeClass("active");
			$(this).addClass("active");
		});
		
		$("#nav-logout-btn").on("click",function(){
			$("#nav-home-btn").removeClass("active");
			$("#nav-previous-btn").removeClass("active");
			$("#nav-next-btn").removeClass("active");
			$("#nav-regist-btn").removeClass("active");
			$("#nav-login-btn").removeClass("active");
			//$("#nav-logout-btn").removeClass("active");
			$("#profile").removeClass("active");
			$("#nav-write-btn").removeClass("active");
			$(this).addClass("active");
		});
		
		$("#profile").on("click",function(){
			$("#nav-home-btn").removeClass("active");
			$("#nav-previous-btn").removeClass("active");
			$("#nav-next-btn").removeClass("active");
			$("#nav-regist-btn").removeClass("active");
			$("#nav-login-btn").removeClass("active");
			$("#nav-logout-btn").removeClass("active");
			//$("#profile").removeClass("active");
			$("#nav-write-btn").removeClass("active");
			$(this).addClass("active");
		});
		
		$("#nav-write-btn").on("click",function(){
			$("#nav-home-btn").removeClass("active");
			$("#nav-previous-btn").removeClass("active");
			$("#nav-next-btn").removeClass("active");
			$("#nav-regist-btn").removeClass("active");
			$("#nav-login-btn").removeClass("active");
			$("#nav-logout-btn").removeClass("active");
			$("#profile").removeClass("active");
			//$("#nav-write-btn").removeClass("active");
			$(this).addClass("active");
		});
		
		function isEmpty(val){
			return (val === undefined || val == null || val.length <= 0) ? true : false;
		}
		
	});