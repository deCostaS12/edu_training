

<?php
include_once'config.php';

  

    $email = $_POST['email'];
    $course = $_POST["course"];

    $quary ="INSERT INTO course (courseName,email) VALUES ('$course','$email')";
    

    if($conn->query($quary)){
        Echo "Inserted sucsessfully";

        
    }
    else{
        echo "Not Inserted";
    }


?>