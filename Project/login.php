<?php
function getUser(){
	if(isset($_POST['username'])){
		$currentuser = $_POST['username'];
	}
	if(isset($_POST['password'])){
                $currentuserP = $_POST['password'];
        }
}
?>


<html>
<head>
<h1>
<font color="blue" style="font-weight:bold">Login Page</font>
</h1>
</head>
<body background = "https://i.pinimg.com/originals/36/cb/f3/36cbf3e3ac4c65224d4cb94133ea4f0a.gif"><?php getName();?>
<form method="POST" action="#">
<input name="username" type="text" placeholder="Enter your username" required/>
<br>
<!--new content-->
<input name="password" type="password" placeholder="Enter a password"required/>
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
require('config.php');
$conn_string = "mysql:host=$host;dbname=$database;charset=utf8mb4";
try{
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
//DB Insert query
//Bind values

        print_r($stmt->errorInfo());
}
catch(Exception $e){
        echo $e->getMessage();
        exit("<br>Something went wrong");
}

$result = mysql_query('SELECT COUNT(*) FROM `table` WHERE `field` = ...');
if (!$result) {
    die(mysql_error());
}
if (mysql_result($result, 0, 0) > 0) {
    // some data matched
	echo "welcome";
} else {
    // no data matched
	echo "Error";
}


?>