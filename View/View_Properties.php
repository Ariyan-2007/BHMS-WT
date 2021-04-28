<!DOCTYPE html>
<html lang="en">
  <head>

 

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style>
    /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
    .row.content {height: 550px}
    
    /* Set gray background color and 100% height */
    .sidenav {
      background-color: #f1f1f1;
      height: 100%;
    }
        
    /* On small screens, set height to 'auto' for the grid */
    @media screen and (max-width: 767px) {
      .row.content {height: auto;} 
    }
       .background
   {
      background-image: url("../Pictures/background.webp");
       background-repeat: repeat;
   background-position: cover;

   }

   .my-color
   {
    background: #000;
   }


  </style>
</head>
<body>




<nav class="navbar navbar-inverse visible-xs">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
    
    </div>
     <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav my-color">
              <li class="active"><a style="font-size:20px; " href= "Logged_in_dashboard.php">Dashboard</a></li>
              <li><br><a style="font-size:20px; "  href= "adminProfile.php">Profile</a></li>
        <li><a style="font-size:20px; " href= "View_Properties.php">View All Properties</a></li>
        <li><a style="font-size:20px; "  href= "users.php">View Managers</a></li>
        <li><a style="font-size:20px; " href= "insert.php">Hire Manager</a></li>
        <li><a style="font-size:20px; " href= "Edit_Profile.php">Edit profile</a></li>
         <li><a style="font-size:20px; " href= "Users_list.php">Users List</a></li>
              <li><a style="font-size:20px; " href= "Change_Password.php">Change Password</a></li>
              <li><a style="font-size:20px; " href= "Logout.php">Logout</a></li>
      </ul>
    </div>

  </div>
</nav>



<div class="container-fluid my-color">
  <div class="row content my-color">
    <div class="col-sm-3 sidenav hidden-xs my-color">
      <ul class="nav nav-pills nav-stacked my-color">
        <li class="active"><br><br><a style="font-size:20px; " href= "Logged_in_dashboard.php">Dashboard</a></li>
        <li><br><a style="font-size:20px; "  href= "adminProfile.php">Profile</a></li>
        <li><a style="font-size:20px; " href= "View_Properties.php">View All Properties</a></li>
      <li><a style="font-size:20px; "  href= "users.php">View Managers</a></li>
        <li><a style="font-size:20px; " href= "insert.php">Hire Manager</a></li>
        <li><a style="font-size:20px; " href= "Edit_Profile.php">Edit profile</a></li>
        <li><a style="font-size:20px; " href= "Users_list.php">Users List</a></li>
              <li><a style="font-size:20px; "  href= "Change_Password.php">Change Password</a></li>
              <li><a style="font-size:20px; " href= "Logout.php">Logout</a></li>
      </ul><br>
    </div>
    
    <br>
      
      <?php 


session_start();

if (isset($_SESSION['username'])) {

   
   echo "<br><a href='Logout.php'></a><br>";

   

}
else{
      $msg="error";
      header("location:Login.php");
      // echo "<script>location.href='login.php'</script>";
   }

 ?>

    <div class="col-sm-9">
      <div class="well my-color">
        <a class="navbar-brand my-color "> <img src="../Pictures/logo.PNG" alt="logo" style="width:100px"></a>
        <h1 style="font-weight: bold; color: green; font-size: 60px; float: middle; font-family: Brush Script MT;text-align: center; ">Bachelor’s Housing Management Website</h1><br><br>
        <p style="color:white; font-size:25px; text-align:center;   ">List of available Rental Houses</p>







<!DOCTYPE html>
<html>
<head>
 <meta charset="utf-8">
 <title>PROPERTY LIST</title>
</head>





<body>




  <table class="table table-bordered table-hover text-primary table-condensed ">
    <thead class="thead-light">
       <tr class="table-success">


        <td style="font-size: 30px ; "  colspan="7" align="right"><a style="font-size:25px " class='btn btn-success' href="AddProperty.php">Add Property</a></td>
    </tr>
    <tr>
        <td style="font-size: 30px ; color:brown;  font-weight: bold;" >Location</td>
        <td style="font-size: 30px ; color:brown;  font-weight: bold;" >Address</td>
        <td style="font-size: 30px ; color:brown;  font-weight: bold;" >Floor</td>
        <td style="font-size: 30px ; color:brown;  font-weight: bold;" >Room</td>
        <td style="font-size: 30px ; color:brown;  font-weight: bold;"  >Action</td>
    </tr>
  </thead>
    <?php
 $data = file_get_contents('../JSON/Properties.json');
 $data = json_decode($data);
 $index = 1;
 if(!empty($data)){
 foreach($data as $row){ 
        ?>
        <tr>
            <td style="font-size: 25px ;" ><?php echo $row->Location; ?></td>
            <td style="font-size: 25px ;" ><?php echo $row->Address; ?></td>
            <td style="font-size: 25px ;" ><?php echo $row->Floor; ?></td>
            <td style="font-size: 25px ;" ><?php echo $row->Room; ?></td>
            <td style="font-size: 25px ;">
              <a style="color:white; font-size: 20px" class='btn btn-danger' href="DeleteProperty.php?delete_id=<?php echo $index; ?>">Delete</a></td>
        </tr>
        <?php
 $index++;
 }
    }
    ?>

</table>


</body>

<br>
 <div style="color:white; text-align:center; font-size: 20px  ">

<?php include 'footer.php';?>
</div>


</html>

