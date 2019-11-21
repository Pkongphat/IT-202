<?php
#turn error reporting on
ini_set('display_errors',1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
//pull in config.php so we can access the variables from it
require('config.php');
echo "Loaded Host: " . $host;
$conn_string = "mysql:host=$host;dbname=$database;charset=utf8mb4";
try{
	$db = new PDO($conn_string, $username, $password);
	echo nl2br ("\nConnected\n");
	$query = "create table if not exists `Users`(
		`id` int auto_increment not null,
		`username` varchar(30) not null unique,
		`password` varchar(30) not null unique,
		`email` varchar(60) not null unique,
		`win` int default 0, 
		`lost` int default 0, 
		`exp` int default 0, 
		`str` int default 1, 
		`hp` int default 100, 
		`points` int default 0,

		PRIMARY KEY (`id`)
		) CHARACTER SET utf8 COLLATE utf8_general_ci";
	$stmt = $db->prepare($query);
	$r = $stmt->execute();
	echo "<br>" . $r . "<br>";
//Note backticks ` for table/column names and single-quotes ' for string value
//hint: we don't need to specify `id` since it's auto increment (note this in the next steps)
        $insert_query = "INSERT INTO `Users`(`username`, `password`, `email`, `win`, `lost`, `exp`, `str`, `hp`, `points`) VALUES (:username, :password, :email, :win, :lost, :exp, :str, :hp, :points)";
        $stmt = $db->prepare($insert_query);
        $newUser = "b";
        $newPin = "1";
	$newEmail = "1@gmail.com";
	$win = 0;
	$lost = 0;
	$exp = 0;
	$str = 1;
	$hp = 100;
	$points = 0;
//DB Insert query
//Bind values
        $r = $stmt->execute(array("username"=> $newUser, ":password"=>$newPin, ":email"=> $newEmail, "win"=> $win, "lost"=> $lost, "exp"=> $exp, "str"=> $str, "hp"=> $hp, "points"=> $points));//hint: something is required here
	print_r($stmt->errorInfo());
	echo "<br>" . ($r>0?"Insert Successful":"Insert Failed") . "<br>";
}
catch(Exception $e){
	echo $e->getMessage();
	exit("Something went wrong");
}
?>



<!DOCTYPE html>
<html>
<body background="https://twistedsifter.files.wordpress.com/2016/03/scientist-street-fighter-game-pixel-art-animation-by-diego-sanches-11.gif?w=392&h=206">
<head>
<title>Page Title</title>
</head>
<body>

<h1></h1>

</body>
</html>
