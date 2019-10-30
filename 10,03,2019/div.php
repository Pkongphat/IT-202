<html>
<head>
	<script>
		function newElement(){
			//showing order of execution
			var newDiv = document.createElement("div");
			var divContent = document.createTextNode("new element added");
			
			newDiv.appendChild(divContent);
			var thisDiv = document.getElementById("div1"); 
  			document.body.insertBefore(newDiv, thisDiv);
		}
	</script>
</head>
<!--Added onload function that's called when the html is loaded-->
<body onload=newElement()>
</body>
</html>
