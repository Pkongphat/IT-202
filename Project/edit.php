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
			#results{color:blue; font-size:32px;}
		</style>
		<h1>
			<font color="blue" style="font-weight:bold">Edit Charater</font>
		</h1>
		<script>
			function queryParam(){
				var params = new URLSearchParams(location.search);
				if(params.has('page')){
					var page = params.get('page');
					var ele = document.getElementById(page);

					if(ele){
						let home = document.getElementById('home');
						home.style.display="none";

						let edit = document.getElementById('edit');
						edit.style.display="none";

						let leaders = document.getElementById('leaders');
						leaders.style.display="none";

						let logout = document.getElementById('logout');
						logout.style.display="none";
						ele.style.display = "block";
					}
				}else{
					let home = document.getElementById('home');
					home.style.display="none";

					let edit = document.getElementById('edit');
					edit.style.display="none";

					let leaders = document.getElementById('leaders');
					leaders.style.display="none";

					let fight = document.getElementById('fight');
					fight.style.display="none";

					let logout = document.getElementById('logout');
					logout.style.display = "block";
				}
			}
		</script>
	</head>
	<body background = "https://cdn11.bigcommerce.com/s-h28kc1m5v1/images/stencil/1280x1280/products/168/642/Power_Up__07990.1511429694.jpg?c=2&imbypass=on">		
		<nav> 
			<a href="https://web.njit.edu/~pk398/IT-202/Project/home.php">Home</a> |

			<a href="https://web.njit.edu/~pk398/IT-202/Project/edit.php">Edit Charater</a> |

			<a href="https://web.njit.edu/~pk398/IT-202/Project/leaders.php">Leaderboards</a> |

			<a href="https://web.njit.edu/~pk398/IT-202/Project/fight.php">Battle</a> |

			<a href="https://web.njit.edu/~pk398/IT-202/Project/login.php">Logout</a> |
			<!--Create route for registration-->
		</nav>
		</header>

		<form method="POST" action="#">
			<input name ="strup" type="text" placeholder="Increase Power by">
			<input name ="hpup" type="text" placeholder="Increase Health by">
			<input type="submit" value="Power up"/>
			<!-- this is a comment -->
			</select>
			<!--end new content-->
		</form>
	</body>
</html>



<?php
	echo "<div id='results'>";
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
	$points = $results['points'];
	$str= $results['str'];
	$hp= $results['hp'];

	//test
	$strup = 0;
	$hpup = 0;
	if(isset($_POST['strup']) && is_numeric($_POST['strup'])){
		$strup = $_POST['strup'];
		//echo "<br>working1<br>";
	}

	if(isset($_POST['hpup']) && is_numeric($_POST['hpup'])){
		$hpup = $_POST['hpup'];
		//echo "<br>working2<br>";
	}

	if(isset($_POST['hpup']) || isset($_POST['strup'])){

	if(($hpup + $strup) <= $points){
		$stmt = $db->prepare("UPDATE `Users` SET hp = :idset WHERE username = :id");
		$stmt->execute(array(":idset"=>(($hpup * 10) + $hp), ":id"=>$name));

		$stmt = $db->prepare("UPDATE `Users` SET str = :idset WHERE username = :id");
		$stmt->execute(array(":idset"=>($strup + $str), ":id"=>$name));

		$holder = ($points - ($hpup + $strup));

		$stmt = $db->prepare("UPDATE `Users` SET points = :idset WHERE username = :id");
		$stmt->execute(array(":idset"=>$holder, ":id"=>$name));
		//echo "<br>working3<br>";
	}else{

	echo "<br>You don't have enough points!<br>";
	}
	}
	//echo $stmt->errorInfo();
	
	//echo var_export($results,true);


	$stmt = $db->prepare("select * from `Users` where username = :username LIMIT 1");
	$stmt->execute(array(":username"=>$name));
	$results = $stmt->fetch(PDO::FETCH_ASSOC);

	echo "<strong>$name <strong><br>";
	$win = $results['win'];
	$lost = $results['lost'];
	$exp= $results['exp'];
	$str= $results['str'];
	$hp= $results['hp'];	
	$points= $results['points'];
	
	echo "<strong>			Win : $win<strong><br>";
	echo "<strong>			Lost : $lost<strong><br>";
	echo "<strong>			Experience : $exp<strong><br>";
	echo "<strong>			Strength : $str<strong><br>";
	echo "<strong>			Max Health : $hp<strong><br>";
	echo "<strong>			Unused Stat Points : $points<strong><br>";
	echo "</div>";
?>
