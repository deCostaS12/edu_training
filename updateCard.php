<?php

    include_once'config.php';

    $email = $_POST["email"];
    $uCardName = $_POST["nameOnCard"];
    $uCardNo = $_POST["cardNo"];
    $uExpDate = $_POST["expDate"];


    $sql = "UPDATE carddetails SET nameOnCard = '$uCardName', cardNumber = '$uCardNo', expDate = '$uExpDate' WHERE email='$email'";

    //excuting the query

    if($conn->query($sql)){
       
        sleep(5);
        header('Location:payments.php');
    }
    else {
        echo "Error:".$conn->error;
    }

    $conn->close();
?>