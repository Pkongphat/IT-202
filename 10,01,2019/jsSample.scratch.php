<html>
<head>
<!--css and js here -->
<script>

//alert("Hello world");

var myVariable;
let myOtherVariable;

//myVariable = prompt("What's your name?");
//alert("Hello, " + myVariable);

let myNum = 0;
for(let i = 0; i < 10; i++){

	myNum += 0.1;

}

//alert("My Num is 1: " + (myNum== 1) + "\nMy Num: " + myNum);
console.log("My Num is 1: " + (myNum== 1) + "\nMy Num: " + myNum);

let myParagraph = document.getElementById("myParagraph");
console.log(myParagraph);

</script>
</head>

<body onload = "pageLoaded();">
<!-- html content -->
<p>IT loaded, yay!</p>
</body>
</html>
