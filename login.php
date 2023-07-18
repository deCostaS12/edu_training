<?php
include_once'config.php';
$servername="localhost";
$username = "root";
$password = "";
$db = "registration";


$conn = new mysqli($servername, $username , $password, $db);


$username = $_POST['username'];
$password= $_POST['password'];


$sql = "SELECT * FROM reg WHERE username = '$username'";
$result = $conn->query($sql);


if ($result->num_rows > 0) 
{
  $row = $result->fetch_assoc();

  if ($password == $row['password']) 
  {
  
    header("Location:profile.html");
    exit();
  }
  else 
  {
   echo("Invalid Username or Password");
  }
}

$conn->close();
?>