<?php
session_start();
?>

<html>
	<head>
		<style>
			#results{color:white; font-size:32px;}
		</style>	
		<h1>
			<font color="white" style="font-weight:bold">Admin</font>
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
	<body background = "https://community-home-assistant-assets.s3.dualstack.us-west-2.amazonaws.com/original/3X/d/e/dea8c60d19e758c8744437e7b91b73c10ad0e030.jpeg">
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
			<input name ="name" type="text" placeholder="search by">

			<select name="dropdown1">
				<option value="id">ID</option>
				<option value="username">name</option>
				<option value="password">password</option>
				<option value="email">email</option>
				<option value="win">win</option>
				<option value="lost">lost</option>
				<option value="exp">exp</option>
				<option value="str">str</option>
				<option value="hp">hp</option>
				<option value="points">points</option>

			</select>

			<select name="dropdown2">
				<option value2="search">search</option>
				<option value2="update">update</option>
				<option value2="delete">delete</option>
			</select>

			<input name ="value3" type="text" placeholder="value : for update only">
			<input type="submit" value="Start"/>

			<!--end new content-->	
		</form>
	</body>
</html>

<?php
	echo "<div id='results'>"; //begining of styled text

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

	if(isset($_POST['name']) && !(null)){
		$sitem = $_POST['name'];
		$value = $_POST['dropdown1'];
		$value2 = $_POST['dropdown2'];
		
		echo "search by: " . $sitem . "  Stat:  " . $value . "  Opt:  " . $value2 . "<br>";
		
		if($value2 == "search"){
			$stmt = $db->prepare("select *  from `Users` ORDER BY email ASC, username ASC WHERE :idset = :id LIMIT 50");
			$stmt->execute(array(":idset"=>$value, ":id"=>$sitem));
			$results = $stmt->fetchAll();
			foreach($results as $index => $row){
				echo "Email : " . $row['email'] . "  \t\tID:  " . $row['id'] . "  \tName:  " . $row['username'] . "  \t\tpassword:  " . $row['password'] . "  \t\twin:  " . $row['win'] . "  \tlost:  " . $row['lost'] . "  \texp:  " . $row['exp'] . "  \tstr:  " . $row['str'] . "  \thp:  " . $row['hp'] . "  \tpoints:  " . $row['points'] . "<br>";
				//echo "$row";
				//echo var_export($row);
			}
		}
		if($value2 == "update" && isset($_POST['value3'])){

			$value3 = $_POST['value3'];

			if($value == "id"){
				$stmt = $db->prepare("UPDATE `Users` SET id = :idset WHERE id = :id");
				$stmt->execute(array(":idset"=>$value3, ":id"=>$sitem));
			}
			if($value == "username"){
				$stmt = $db->prepare("UPDATE `Users` SET username = :idset WHERE username = :id");
				$stmt->execute(array(":idset"=>$value3, ":id"=>$sitem));
			}
			if($value == "password"){
				$stmt = $db->prepare("UPDATE `Users` SET password = :idset WHERE password = :id");
				$stmt->execute(array(":idset"=>$value3, ":id"=>$sitem));
			}
			if($value == "email"){
				$stmt = $db->prepare("UPDATE `Users` SET email = :idset WHERE email = :id");
				$stmt->execute(array(":idset"=>$value3, ":id"=>$sitem));
			}
			if($value == "win"){
				$stmt = $db->prepare("UPDATE `Users` SET win = :idset WHERE win = :id");
				$stmt->execute(array(":idset"=>$value3, ":id"=>$sitem));
			}
			if($value == "lost"){
				$stmt = $db->prepare("UPDATE `Users` SET lost = :idset WHERE lost = :id");
				$stmt->execute(array(":idset"=>$value3, ":id"=>$sitem));
			}
			if($value == "exp"){
				$stmt = $db->prepare("UPDATE `Users` SET exp = :idset WHERE exp = :id");
				$stmt->execute(array(":idset"=>$value3, ":id"=>$sitem));
			}
			if($value == "str"){
				$stmt = $db->prepare("UPDATE `Users` SET str = :idset WHERE str = :id");
				$stmt->execute(array(":idset"=>$value3, ":id"=>$sitem));
			}
			if($value == "hp"){
				$stmt = $db->prepare("UPDATE `Users` SET hp = :idset WHERE hp = :id");
				$stmt->execute(array(":idset"=>$value3, ":id"=>$sitem));
			}
			if($value == "points"){
				$stmt = $db->prepare("UPDATE `Users` SET points = :idset WHERE points = :id");
				$stmt->execute(array(":idset"=>$value3, ":id"=>$sitem));
			}
		}else{
			if($value == "id"){
				$stmt = $db->prepare("select *  from `Users` ORDER BY email ASC, username ASC WHERE id == :id");
				$stmt->execute(array(":id"=>$sitem));
			}
			if($value == "username"){
				$stmt = $db->prepare("select *  from `Users` ORDER BY email ASC, username ASC WHERE id == :id");
				$stmt->execute(array(":id"=>$sitem));
			}
			if($value == "ID"){
				$stmt = $db->prepare("select *  from `Users` ORDER BY email ASC, username ASC WHERE id == :id");
				$stmt->execute(array(":id"=>$sitem));
			}
			if($value == "ID"){
				$stmt = $db->prepare("select *  from `Users` ORDER BY email ASC, username ASC WHERE id == :id");
				$stmt->execute(array(":id"=>$sitem));
			}
			if($value == "ID"){
				$stmt = $db->prepare("select *  from `Users` ORDER BY email ASC, username ASC WHERE id == :id");
				$stmt->execute(array(":id"=>$sitem));
			}
			if($value == "ID"){
				$stmt = $db->prepare("select *  from `Users` ORDER BY email ASC, username ASC WHERE id == :id");
				$stmt->execute(array(":id"=>$sitem));
			}

			$results = $stmt->fetchAll(); // get all not just 1

			foreach($results as $index => $row){
				echo "Email : " . $row['email'] . "  \t\tID:  " . $row['id'] . "  \tName:  " . $row['username'] . "  \t\tpassword:  " . $row['password'] . "  \t\twin:  " . $row['win'] . "  \tlost:  " . $row['lost'] . "  \texp:  " . $row['exp'] . "  \tstr:  " . $row['str'] . "  \thp:  " . $row['hp'] . "  \tpoints:  " . $row['points'] . "<br>";
				//echo "$row";
				//echo var_export($row);
			}
		}

	}else{
		$stmt = $db->prepare("select *  from `Users` ORDER BY email ASC, username ASC LIMIT 50");
		$stmt->execute();
	
	
	//FETCH DATA
	$results = $stmt->fetchAll(); // get all not just 1

	foreach($results as $index => $row){
		echo "Email : " . $row['email'] . "  \t\tID:  " . $row['id'] . "  \tName:  " . $row['username'] . "  \t\tpassword:  " . $row['password'] . "  \t\twin:  " . $row['win'] . "  \tlost:  " . $row['lost'] . "  \texp:  " . $row['exp'] . "  \tstr:  " . $row['str'] . "  \thp:  " . $row['hp'] . "  \tpoints:  " . $row['points'] . "<br>";
		//echo "$row";
		//echo var_export($row);
	}
	}
	echo "</div>";//ending of styled text
?>