<?php
function getUser(){
	if(isset($_POST['username'])){
		$currentuser = $_POST['username'];
	}
	if(isset($_POST['password'])){
                $currentuserP = $_POST['password'];
        }
}



$users = array(
	0 => "null",
	1 => "t"
	);
$passwords = array(
	0 => "null",
	1 => "hi",
	);

?>




<html>
<head>

<h1>
<font color="blue" style="font-weight:bold"> Login Page</font>
</h1>

</head>

<body background= "https://i.pinimg.com/originals/36/cb/f3/36cbf3e3ac4c65224d4cb94133ea4f0a.gif"><?php getName();?>
<p1>Works</p1>
<form method="POST" action="#">

<input name="username" type="text" placeholder="Enter your username"required/>

<!--new content-->

<input name="password" type="password" placeholder="Enter your password"required/>

<!-- this is a comment -->

</select>

<!--end new content-->

<input type="submit" value="submit"/>

<input type="reset" value="Clear Form"/>

</form>

</body>

</html>


<?php
if(isset($_POST)){
        echo "<br><pre>" . var_export($_POST, true) . "</pre><br>";
}
?>

