<!DOCTYPE html>
<html lang="en">
  <head>

 
 <script src="../JS/jsvalidation.js" type="text/javascript"></script>
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
 if(isset($_POST['btnadd'])){
 $data = file_get_contents('.../JSON/Properties.json');
 $data = json_decode($data, true);
 $add_arr = array(
 'Location' => $_POST['txtLocation'],
 'Address' => $_POST['txtAddress'],
 'Floor' => $_POST['txtFloor'],
 'Room' => $_POST['txtRoom']
 );
 $data[] = $add_arr;
 
 $data = json_encode($data, JSON_PRETTY_PRINT);
 file_put_contents('.../JSON/Properties.json', $data);
 
 header('location: View_Properties.php');
 }
?>



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
<!DOCTYPE html>
<html>
<head>
    
 <meta charset="utf-8">
 <title>ADD PROPERTIES</title>
</head>
<body>







<form method="post"  action=""  name="frmAdd" onsubmit="return validateform()">
        <table align="center">
            <tr>
                <h1 style="color:white" colspan="2" align="center"><i class="glyphicon glyphicon-plus"></i>&nbsp;Add Record</h1>
            </tr>
 
            <tr>
                <td style="font-size: 25px ; color: white">Location:</td>
                <td><input style="font-size: 20px ;" type="text" name="txtLocation" id="location" onkeyup="checkLoc()" onblur="checkLoc()">
                 </td>
                 <td><span id="locationErr" style="color:red"></span><br></td>
            </tr>
        
            <tr>
                <td style="font-size: 25px ; color: white">Address:</td>
                <td><textarea style="font-size: 20px ;" name="txtAddress" rows="4"  id="address"  onkeyup="checkAdd()" onblur="checkAdd()"></textarea> </td>
                <td><span id="addErr" style="color:red"></span><br></td>
            </tr>
            <tr>
                <td style="font-size: 25px ; color: white">Floor:</td>
                <td><input style="font-size: 20px ;" type="text" name="txtFloor" id="floor" onkeyup="checkFloor()" onblur="checkFloor()" > </td>
                <td><span id="floorErr" style="color:red"></span><br></td>
            </tr>
            <tr>
                <td style="font-size: 25px ; color: white">Room:</td>
                <td><input style="font-size: 20px ;" type="text" name="txtRoom" id="room" onkeyup="checkAdd()" onblur="checkRoom()"> </td>
                 <td><span id="roomErr" style="color:red"></span><br></td>
            </tr>
           <br><br> <tr>
                <td colspan="2" align="center" ><br><input style="font-size: 25px ;" class="btn btn-success" type="submit" value="Add" name="btnadd"> </td>
            </tr>
        </table>


</body>
<br>
         <div style="color:white; text-align:center; font-size: 20px  ">

<?php include 'footer.php';?>
</div>
</form>

</html>
