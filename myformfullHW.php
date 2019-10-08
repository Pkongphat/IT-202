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
<head></head>
<body><?php getName();?>
<form method="POST" action="#">
<input name="name" type="text" placeholder="Enter your name"/>
<!--new content-->
<input name="password1" type="password" placeholder="Enter a FAKE password"/>
<input name="password2" type="password" placeholder="Comfrim FAKE password"/>
<!-- this is a comment -->
</select>
<!--end new content-->
<input type="submit" value="Try it"/>
<input type="reset" value="Clear Form"/>
</form>
</body>
</html>

<?php
if(isset($_POST)){
        echo "<br><pre>" . var_export($_POST, true) . "</pre><br>";
}
?>
