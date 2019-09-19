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
	$query = "create table if not exists `TestUsers`(
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
        $insert_query = "INSERT INTO `TestUsers`(`username`, `pin`) VALUES ('JohnDoe', 1234)$
        $stmt = $db->prepare($insert_query);
        $newUser = "JohnDoe";
        $newPin = 1234;
//DB Insert query
//Bind values
        $r = $stmt->execute(array("username"=> $newUser, ":pin"=>$newPin));//hint: something is required here

	print_r($stmt->errorInfo());

	echo "<br>" . ($r>0?"Insert Successful":"Insert Failed") . "<br>";

}
catch(Exception $e){
	echo $e->getMessage();
	exit("Something went wrong");
}
?>
