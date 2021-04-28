<?php
     $data="k";
     if(isset($_GET['q']))
     {
       $data=$_GET['q'];
     }
     $db=new mysqli("localhost","root","","project_db");
     $x="select * from users where firstname like '%$data%' limit 1";
     $y=$db->query($x);
  if($y)
     {
       $z=$y->fetch_assoc(); 
       echo "<h2 >".'FirstName:'.$z['firstname']." <br>
       LastName: ".$z['lastname']. " <br>
       Address: ".$z['address']. " <br>
       Contact Number: ".$z['contact']. "</h2>";
      
     }

?>