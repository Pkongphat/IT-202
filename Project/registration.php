<?php
function getName(){
	if(isset($_GET['name'])){
		echo "<p>Hello, " . $_GET['name'] . "</p>";
	}
}
if(isset($_POST['password1'])){
                $password1 = $_POST['password1'];
        }
if(isset($_POST['password2'])){
                $password2 = $_POST['password2'];
        }
if(isset($password1) && isset($password2)){
if($password1 == $password2){
                echo "<br><pre>" . "wellcome" . "</pre><br>";
}else{
                echo "<br><pre>" . "Error" . "</pre><br>";
}
}else{
		echo "<br><pre>" . "missing element" . "</pre><br>";		
}
?>
<html>
<head>
<h1>
<font color="red" style="font-weight:bold">Registration Page</font>
</h1>
</head>
<body background = "http://www.glittergraphics.org/img/60/606408/fist-wallpaper.jpg"><?php getName();?>
<form method="POST" action="#">
<input name="name" type="text" placeholder="Enter your username"/>
<!--new content-->
<input name="password1" type="password" placeholder="Enter a password"required/>
<input name="password2" type="password" placeholder="Comfrim password"required/>
<!-- this is a comment -->
</select>
<!--end new content-->
<input type="submit" value="Start"/>
<input type="reset" value="Clear Form"/>
</form>
</body>
</html>

