<?php
function getName(){
	if(isset($_GET['name'])){
		echo "<p>Hello, " . $_GET['name'] . "</p>";
	}

	if(isset($_POST['dropdown'])){
                $dDown = $_POST['dropdown'];
        }
	
	if(isset($dDown)){
                echo "<br><pre>" . "Option 1 selected" . "</pre><br>";
	}

}
?>
<html>
	<head></head>
	<body><?php getName();?>
		<form method="POST" action="#">
		<!--new content-->
		<!-- this is a comment -->

		<select required name="dropdown">
			<option value="1" selected>Select One</option>
			<option value="2">Select Two</option>
			<option value="3">Select Three</option>
		</select>

		<!--end new content-->
		<input type="submit" onclick="Validate()" value="select"/>
		<input type="reset" value="Clear Form"/>
		</form>
	</body>
</html>

<?php
if(isset($_POST)){
	echo "<br><pre>" . var_export($_POST, true) . "</pre><br>";

}
