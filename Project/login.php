<?php
unset($_SESSION["username"]);
session_destroy();

function getName(){
	if(isset($_POST['name'])){
		$name = $_POST['name'];
	}
}
if(isset($_POST['password1'])){
        $password1 = $_POST['password1'];
		
	$name = $_POST['name'];	
	callSql($name, $password1);

}else{
	echo "<br><pre>" . "missing element" . "</pre><br>";		
}

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

				let leaders = document.getElementById('leaders');
				leaders.style.display="none";

				ele.style.display = "block";
			}
		}
		else{
			let registration = document.getElementById('registration');
			registration.style.display = "block";

			let leaders = document.getElementById('leaders');
			leaders.style.display="block";
		}
	}
</script>
</head>
<body background = "https://i.pinimg.com/originals/36/cb/f3/36cbf3e3ac4c65224d4cb94133ea4f0a.gif"><?php getName();?>
	<header>
		<nav> 
			<a href="https://web.njit.edu/~pk398/IT-202/Project/registration.php">Registration Here</a> |
			<a href="https://web.njit.edu/~pk398/IT-202/Project/leaders.php">Leaderboards</a> |
			<!--Create route for registration-->
		</nav>
	</header>
<?php
//unset($_SESSION["username"]);
//session_destroy();

?>
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





<?php
//unset($_SESSION["username"]);
//session_destroy();


function callSql($name, $password1){
#turn error reporting on
ini_set('display_errors',1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
//pull in config.php so we can access the variables from it
try{
		//do hash of password
		$hash = password_hash($password1, PASSWORD_BCRYPT);
		require('config.php');
		//$username, $password, $host, $database
		$conn_string = "mysql:host=$host;dbname=$database;charset=utf8mb4";
        $db = new PDO($conn_string, $username, $password);
//Note backticks ` for table/column names and single-quotes ' for string value
//hint: we don't need to specify `id` since it's auto increment (note this in the next steps)
	$username = $name;
        $password = $password1;
//DB pull query
//Bind values

	$stmt = $db->prepare("select username, password from `Users` where username = :username LIMIT 1");
	$stmt->execute(array(":username"=>$name));
	//print_r($stmt->errorInfo());
	$results = $stmt->fetch(PDO::FETCH_ASSOC);
	//echo var_export($results, true);
	if($results['password'] == $password){
	echo "<br>Welcome<br>";
	session_start();
	$_SESSION["username"] = $name;
	//echo "<br>".$_SESSION["username"]."<br>";
	header("Location: home.php");// add a user=$name
	//ex) https://web.njit.edu/~pk398/IT-202/Project/home.php
	}else{

        print_r($stmt->errorInfo());
        //echo "<br>" . ($r>0?"Insert Successful":"Insert Failed") . "<br>";
}
}catch(Exception $e){
        echo $e->getMessage();
        exit("<br>Something went wrong");
}


}
?>
