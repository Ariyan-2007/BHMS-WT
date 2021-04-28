<!DOCTYPE html>
<html>
<title>User Details</title>
<body>

<?php
$mysqli = new mysqli("localhost", "root", "", "project_db");
if($mysqli->connect_error) {
  exit('Could not connect');
}

$sql = "SELECT username, email, phone, occupation FROM `owners` WHERE username = ?";

$stmt = $mysqli->prepare($sql);
$stmt->bind_param("s", $_GET['q']);
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($uname, $email, $phone, $occupation);
$stmt->fetch();
$stmt->close();


echo "<table>";
echo "<tr>";
echo "<th>Name:</th>";
echo "<td>" . $uname . "</td>";
echo "</tr>";
echo "<tr>";
echo "<th>Email:</th>";
echo "<td>" . $email . "</td>";
echo "</tr>";
echo "<tr>";
echo "<th>Phone:</th>";
echo "<td>" . $phone . "</td>";
echo "</tr>";
echo "<th>Occupation:</th>";
echo "<td>" . $occupation . "</td>";
echo "</tr>";

echo "</table>";
?>