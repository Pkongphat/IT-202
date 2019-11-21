<?php
	session_start();
	//echo var_export($_SESSION, true);
	$name = $_SESSION["username"];
	//echo '<i style="color:white;font-size:64px;font-family:calibri ;"> Hello $name </i> ';
	//echo "<strong><font color ="white">Hello $name</font><strong><br>";

?>
<html>
<head>
<style>
#results{color:white; font-size:32px;}
</style>
<h1>
<font color="white" style="font-weight:bold">Home Page</font>
</h1>
<script>
	function queryParam(){
		var params = new URLSearchParams(location.search);
		if(params.has('page')){
			var page = params.get('page');
			var ele = document.getElementById(page);
			if(ele){
				let logout = document.getElementById('logout');
				logout.style.display="none";
				ele.style.display = "block";
			}
		}
		else{
			let logout = document.getElementById('logout');
			logout.style.display = "block";
		}
	}
</script>
</head>
<body background = "https://images.greenmangaming.com/d85c0236c90f47c6a801b0d83597d520/f0a643ef6ea34f7fbae35a5ce7fdfe25.jpg">		
		<nav> 
			<a href="https://web.njit.edu/~pk398/IT-202/Project/login.php">Logout</a> |
			<!--Create route for registration-->
		</nav>
	</header>

<form method="POST" action="#">

<!-- this is a comment -->
</select>
<!--end new content-->
</form>
</body>
</html>



<?php
	ini_set('display_errors',1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);

	require('config.php');
	$conn_string = "mysql:host=$host;dbname=$database;charset=utf8mb4";
	$db = new PDO($conn_string, $username, $password);

	$name = $_SESSION["username"];
	$stmt = $db->prepare("select * from `Users` where username = :username LIMIT 1");
	$stmt->execute(array(":username"=>$name));
	$results = $stmt->fetch(PDO::FETCH_ASSOC);
	//echo $stmt->errorInfo();
	
	//echo var_export($results,true);
	echo "<div id='results'>";
	echo "<strong>$name <strong><br>";
	$win = $results['win'];
	$lost = $results['lost'];

	if(($results['win'] + $results['lost']) != 0){
		$ratio = $results['win'] / ($results['win'] + $results['lost']);
	}else{
		$ratio = 0;
	}

	$exp= $results['exp'];
	$str= $results['str'];
	$hp= $results['hp'];	
	$points= $results['points'];
	
	echo "<strong>			Win : $win<strong><br>";
	echo "<strong>			Lost : $lost<strong><br>";
	echo "<strong>			Ratio : $ratio<strong><br>";
	echo "<strong>			Experience : $exp<strong><br>";
	echo "<strong>			Strength : $str<strong><br>";
	echo "<strong>			Max Health : $hp<strong><br>";
	echo "<strong>			Unused Stat Points : $points<strong><br>";
	echo "</div>";
?>
