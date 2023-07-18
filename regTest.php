<?php
include_once 'config.php';

$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$dob = $_POST['dob'];
$age = $_POST['age'];
$nic = $_POST['nic'];
$address = $_POST['address'];
$email = $_POST['email'];
$username = $_POST['username'];
$password = $_POST['password'];

$sql = "INSERT INTO reg (firstname, lastname, dob, age, nic, address, email, username, password) 
        VALUES ('$firstname', '$lastname', '$dob', '$age', '$nic', '$address', '$email', '$username', '$password')";

if ($conn->query($sql)) {
    echo "REGISTERED SUCCESSFULLY";
    header('Location: Profile.php');
    exit;
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
