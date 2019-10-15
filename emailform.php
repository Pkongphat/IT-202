<?php
function getName(){
	if(isset($_GET['name'])){
		echo "<p>Hello, " . $_GET['name'] . "</p>";
	}
}




function validate(){
if(isset($_POST['password1'])){
                $password1 = $_POST['password1'];
        }
if(isset($_POST['password2'])){
                $password2 = $_POST['password2'];
        }
if(isset($password1) && isset($password2)){
if($password1 == $password2){
                echo "<br><pre>" . "Hello, " . "</pre>";
}else{
                echo "<br><pre>" . "Error, " . "</pre>";
}
}else{
		echo "<br><pre>" . "missing element, " . "</pre>";		
}

if(isset($_POST['email'])){
                $email = $_POST['email'];
        }

if(isset($_POST['emailconfirm'])){
                $emailconfirm = $_POST['emailconfirm'];
        }


if ((strpos($email, '@') !== false) && (strpos($emailconfirm, '@') !== false)){
if(isset($email) && isset($emailconfirm)){
if($email == $emailconfirm){
                echo "<pre>" . $email . "</pre><br>";
}else{
                echo "<pre>" . "emails does not match" . "</pre><br>";
}
}else{
                echo "<pre>" . "missing email" . "</pre><br>";
}
}else{
		echo "<pre>" . "invalid email" . "</pre><br>";
}
}
?>





<html>
<head></head>
<body>

<?php 
getName();
validate();
?>

<form method="POST" action="#">
<input name="name" type="text" placeholder="Enter your username"/>
<!--new content-->
<br>
<input name="password1" type="password" placeholder="Enter a FAKE password"/>
<input name="password2" type="password" placeholder="Comfrim FAKE password"/>
<br>
<input name="email" type="email" placeholder="Enter a email"/>
<input name="emailconfirm" type="email" placeholder="Comfrim email"/>
<br>

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
