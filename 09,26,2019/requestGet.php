<?php
echo "<pre>" . var_export($_GET, true) . "</pre>";

if(isset($_GET['name'])){
	echo "<br>Hello, " . $_GET['name'] . "<br>";
}

if(isset($_GET['string1'])){
        $string1 = $_GET['string1'];
}

if(isset($_GET['string2'])){
        $string2 = $_GET['string2'];
}


if(isset($_GET['number1'])){
	$number1 = $_GET['number1'];
	echo "<br>num1 works<br>";
}

if(isset($_GET['number2'])){
	$number2 = $_GET['number2'];
	 echo "<br>num2 works<br>";
}

echo "<br>" . "part 1" . "<br>";

if((is_numeric($number1))&&(is_numeric($number2))){
	$sum = $number1 + $number2;
	echo "<br>" . $number1 . " + " . $number2 . " = " . $sum . "<br>";
}

echo "<br>" . "part 2" . "<br>";

echo  "<br>" . $string1 . " " . $string2 . "<br>";


echo "<br>" . "part 3" . "<br>";
echo "<br>" . "The value in name was replaced by the newest value" . "<br>";


echo "<br>" . "part 4" . "<br>";

if(isset($_GET['number3'])){
        $number3 = $_GET['number3'];
}

echo $number3;
if(is_numeric($number3)){
	echo " is a number.";
}else{
	echo " is not a number.";
}
?>
