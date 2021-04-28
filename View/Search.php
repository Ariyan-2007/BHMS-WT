<!DOCTYPE html> 
<head>
<script>
function showmyuser() {
  var uname=  document.getElementById("uname").value;
  
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {

    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("mytext").innerHTML = this.responseText;
    }
	else
	{
		 document.getElementById("mytext").innerHTML = this.status;
	}
  };
  xhttp.open("POST", "/project_try/View/getlocation.php", true);
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhttp.send("uname="+uname);


}

</script>


	</head>
<html>
<body>

  


  <body style="background-color:powderblue;">
  	
  


<h1>Search your Desired Location</h1>


 <input type="text" id="uname" >
<button onclick="showmyuser()">Search</button>
<p id="mytext"></p>



</body>
</html>