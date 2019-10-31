<?php
function getName(){
	if(isset($_POST['name'])){
		$user = $_POST['name'];
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
		insertSql($user, $password1);

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
<input name="name" type="text" placeholder="Enter your username" required/>
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


function insertSql($name, $password1){
#turn error reporting on
ini_set('display_errors',1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
//pull in config.php so we can access the variables from it
require('config.php');
$conn_string = "mysql:host=$host;dbname=$database;charset=utf8mb4";
try{
	$username = $name;
        $db = new PDO($conn_string, $username, $password);
        $query = "create table if not exists `Users`(
                `id` int auto_increment not null,
                `username` varchar(30) not null unique,
                `pin` int default 0,
                PRIMARY KEY (`id`)
                ) CHARACTER SET utf8 COLLATE utf8_general_ci";
        $stmt = $db->prepare($query);
        $r = $stmt->execute();
        echo "<br>" . $r . "<br>";
//Note backticks ` for table/column names and single-quotes ' for string value
//hint: we don't need to specify `id` since it's auto increment (note this in the next steps)
        $insert_query = "INSERT INTO `Users`(`username`, `pin`) VALUES (:username, :pin)";
        $stmt = $db->prepare($insert_query);
        $newUser = $name;
        $newPin = $password1;
//DB Insert query
//Bind values

        $r = $stmt->execute(array("username"=> $newUser, ":pin"=>$newPin));//hint: something$
        print_r($stmt->errorInfo());
        echo "<br>" . ($r>0?"Insert Successful":"Insert Failed") . "<br>";
}
catch(Exception $e){
        echo $e->getMessage();
        exit("<br>Something went wrong");
}


}
?>
