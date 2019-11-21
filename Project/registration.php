<?php
function getName(){
	if(isset($_POST['name'])){
		$user = $_POST['name'];
	}
}


if(isset($_POST['email'])){
                $email= $_POST['email'];
        }


if(isset($_POST['password1'])){
                $password1 = $_POST['password1'];
        }




if(isset($_POST['password2'])){
                $password2 = $_POST['password2'];
        }
if(isset($password1) && isset($password2)){
if($password1 == $password2){
                
				$name = $_POST['name'];
				echo "<br><pre>" . "Name : "  . $name . "<br>" . "Password : " . $password1 . "</pre><br>";
				
				insertSql($name, $password1, $email);

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
<nav> 
		<a href="https://web.njit.edu/~pk398/IT-202/Project/login.php">Login</a> |
		<!--Create route for registration-->
</nav>
</head>
<body background = "http://www.glittergraphics.org/img/60/606408/fist-wallpaper.jpg"><?php getName();?>
<form method="POST" action="#">
<input name="name" type="text" placeholder="Enter your username" required/>
<br>
<input name="email" type="email" placeholder="Enter your email" required/>
<br>
<!--new content-->
<input name="password1" type="password" placeholder="Enter a password"required/>
<br>
<input name="password2" type="password" placeholder="Comfrim password"required/>
<br>
<!-- this is a comment -->
</select>
<!--end new content-->
<input type="submit" value="Start"/>

<input type="reset" value="Clear Form"/>
</form>
</body>
</html>





<?php


function insertSql($name, $password1, $email){
#turn error reporting on
ini_set('display_errors',1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
//pull in config.php so we can access the variables from it


try{
		//echo "<br><pre>" . "Name : "  . $name . "<br>" . "Password" . $password1 . "</pre><br>";
		//do hash of password
		$hash = password_hash($password1, PASSWORD_BCRYPT);
		require('config.php');
		//$username, $password, $host, $database
		$conn_string = "mysql:host=$host;dbname=$database;charset=utf8mb4";
        $db = new PDO($conn_string, $username, $password);
//Note backticks ` for table/column names and single-quotes ' for string value
//hint: we don't need to specify `id` since it's auto increment (note this in the next steps)
        
		
		$insert_query = "INSERT INTO `Users`(`username`, `email`, `password`, `win`, `lost`, `exp`, `str`, `hp`, `points`) VALUES (:username, :email, :password, :win, :lost, :exp, :str, :hp, :points)";
        $stmt = $db->prepare($insert_query);
		$username = $name;
        $password = $password1;
//DB Insert query
//Bind values
	$win = 0;
	$lost = 0;
	$exp = 0;
	$str = 1;
	$hp = 100;
	$points = 0;

        $r = $stmt->execute(array("username"=> $username, ":email"=>$email, ":password"=>$password, "win"=> $win, "lost"=> $lost, "exp"=> $exp, "str"=> $str, "hp"=> $hp, "points"=> $points));//hint: something$
        print_r($stmt->errorInfo());
        echo "<br>" . ($r>0?"Insert Successful":"Insert Failed") . "<br>";
}
catch(Exception $e){
        echo $e->getMessage();
        exit("<br>Something went wrong");
}


}
?>
