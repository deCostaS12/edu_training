<?php

    include_once'config.php';

    $email = $_POST["email"];
    $uCardName = $_POST["nameOnCard"];
    $uCardNo = $_POST["cardNo"];
    $uExpDate = $_POST["expDate"];


    $sql = "INSERT INTO carddetails(nameOnCard,email,cardNumber,expDate) values ('$uCardName','$email','$uCardNo','$uExpDate')";

    //ecuting the query

    if($conn->query($sql)){
       
        sleep(5);
        header('Location:payments.php');
    }
    else {
        echo "Error:".$conn->error;
    }

    $conn->close();
?>