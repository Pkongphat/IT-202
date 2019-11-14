<?php
	session_start();
	//echo var_export($_SESSION, true);
	$name = $_SESSION["username"];
	echo "<strong>Hello $name<strong><br>";

?>
<html>
<head>
<h1>
<font color="blue" style="font-weight:bold">Login Page</font>
</h1>
<script>
	function queryParam(){
		var params = new URLSearchParams(location.search);
		if(params.has('page')){
			var page = params.get('page');
			var ele = document.getElementById(page);
			if(ele){
				let registration= document.getElementById('registration');
				registration.style.display="none";
				ele.style.display = "block";
			}
		}
		else{
			let registration = document.getElementById('registration');
			registration.style.display = "block";
		}
	}
</script>
</head>
<body background = "https://i.pinimg.com/originals/36/cb/f3/36cbf3e3ac4c65224d4cb94133ea4f0a.gif"><?php getName();?>
	<header>
		<nav> 
			<a href="https://web.njit.edu/~pk398/IT-202/Project/registration.php">Registration Here</a> |
			<!--Create route for registration-->
		</nav>
	</header>

<form method="POST" action="#">
<input name="name" type="text" placeholder="Enter your username" required/>
<br>
<!--new content-->
<input name="password1" type="password" placeholder="Enter a password"required/>
<br>

<!-- this is a comment -->
</select>
<!--end new content-->
<input type="submit" value="Start"/>

<input type="reset" value="Clear Form"/>
</form>
</body>
</html>
