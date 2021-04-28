<?php
$databaseReport="";
class db{
 
function OpenCon()
 {
 $dbhost = "localhost";
 $dbuser = "root";
 $dbpass = "";
 $db = "mydatabase";
 $conn = new mysqli($dbhost, $dbuser, $dbpass,$db);
 
 return $conn;
 }
 function CheckUsername ($conn, $table, $locationname)
 {
    $result = $conn->query("SELECT * FROM ". $table." WHERE name='". $locationname."'");
    return $result;
    
 } 
function CloseCon($conn)
 {
 $conn -> close();
 }

 }