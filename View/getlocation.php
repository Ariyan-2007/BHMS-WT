<?php
include('../connection/locationdb.php');

$user = $_POST['uname'];

if($user!="")
{
$connection = new db();
$conobj=$connection->OpenCon();

$MyQuery=$connection->CheckUsername($conobj,"location",$user );



if ($MyQuery->num_rows > 0) {
  echo "<table><tr><th>City</th><th>Address</th><th>Mobile</th></tr>";
    // output data of each row
    while($row = $MyQuery->fetch_assoc()) {
      echo "<tr><td>".$row["name"]."</td><td>".$row["address"]."</td><td>".$row["mobile"]."</td></tr>";
    }
    echo "</table>";
  } else {
    echo "0 results";
  }
}
else{
  echo "please enter something";
}