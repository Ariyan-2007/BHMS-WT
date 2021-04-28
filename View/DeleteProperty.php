<!DOCTYPE html>
<html>
<head>
 <meta charset="utf-8">
 <title>DELETE PROPERTY</title>
</head>
</html>


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


<?php
 $delete_id = $_GET['delete_id'];
 
 $data = file_get_contents('.../JSON/Properties.json');
 $data = json_decode($data, true);
 
 unset($data[$delete_id]);
 
 //encode back to json
 $data = json_encode($data, JSON_PRETTY_PRINT);
 file_put_contents('.../JSON/Properties.json', $data);
 
 header('location: View_Properties.php'); 
?>


