<?php
session_start();
?>

<html>
	<head>
		<style>
			#results{color:white; font-size:32px;}
		</style>	
		<h1>
			<font color="blue" style="font-weight:bold">Leaderboards</font>
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

						let fight = document.getElementById('fight');
						fight.style.display="none";

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
	<body background = "https://wallpapercave.com/wp/vuDomr7.jpg">
		<nav> 
			<a href="https://web.njit.edu/~pk398/IT-202/Project/home.php">Home</a> |

			<a href="https://web.njit.edu/~pk398/IT-202/Project/edit.php">Edit Charater</a> |

			<a href="https://web.njit.edu/~pk398/IT-202/Project/leaders.php">Leaderboards</a> |

			<a href="https://web.njit.edu/~pk398/IT-202/Project/fight.php">Battle</a> |

			<a href="https://web.njit.edu/~pk398/IT-202/Project/login.php">Logout</a> |
			<!--Create route to another page-->
		</nav>
		<form method="POST" action="#">
			<!-- this is a comment -->
			<!--end new content-->	
		</form>
	</body>
</html>

<?php
	//error reporting *******************************************
	ini_set('display_errors',1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);
	//error reporting *******************************************

	//login to SQL *******************************************
	require('config.php');  // my login username and password
	$conn_string = "mysql:host=$host;dbname=$database;charset=utf8mb4";
	$db = new PDO($conn_string, $username, $password);
	//login to SQL *******************************************

	

	$stmt = $db->prepare("select *  from `Users` ORDER BY win DESC, username ASC LIMIT 5");
	$stmt->execute();
	//FETCH DATA
	$results = $stmt->fetchAll(); // get all not just 1
	
	
	//echo var_export($results,true);
	echo "<div id='results'>"; //begining of styled text
	//echo $stmt->errorInfo();

	//echo $results . "<br>";
	//echo var_export($stmt->errorInfo()) . "<br>";
	foreach($results as $index => $row){
		echo $row['username'] . "  :  " . $row['win'] . "  :  " . $row['lost'] . "<br>";
		//echo "$row";
		//echo var_export($row);
	}

	if(isset($_SESSION["username"])){
		$name = $_SESSION["username"];
		echo "<br><br>Personal leaderboards <br>";

		$stmt = $db->prepare("select * from `Users` where username = :username LIMIT 1"); // SELECT '' FROM '' WHERE (condition) ORDER BY LIMIT
		$stmt->execute(array(":username"=>$name));
		//FETCH DATA
		$results = $stmt->fetch(PDO::FETCH_ASSOC);

		$pwin = $results['win'];

		$stmt = $db->prepare("select *  from `Users` ORDER BY win ASC, username ASC WHERE win >= :win LIMIT 1"); // SELECT '' FROM '' WHERE (condition) ORDER BY LIMIT
		$stmt->execute(array(":win"=>$pwin));
		//FETCH DATA
		$resultsupper = $stmt->fetchAll(); // get all not just 1

		foreach($resultsupper as $index => $row){
			echo $row['username'] . "  :  " . $row['win'] . "  :  " . $row['lost'] . "<br>";
		}
		
		echo $results['username'] . "  :  " . $results['win'] . "  :  " . $results['lost'] . "<br>";
		
		$stmt = $db->prepare("select *  from `Users` ORDER BY win DESC, username ASC WHERE win <= :win LIMIT 2"); // SELECT '' FROM '' WHERE (condition) ORDER BY LIMIT
		$stmt->execute(array(":win"=>$pwin));
		//FETCH DATA
		$resultslower = $stmt->fetchAll(); // get all not just 1

		foreach($resultslower as $index => $row){
			echo $row['username'] . "  :  " . $row['win'] . "  :  " . $row['lost'] . "<br>";
		}

	}

	echo "</div>";//ending of styled text
?>