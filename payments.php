<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="payments.css">
    <title>Edu Training</title>
</head>
<body>

    <!-- PHP configuration file for the database -->
    <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $db = "edutraining";

            $conn = new mysqli($servername, $username, $password, $db);

            
            if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
            }
            $name="";
            $email="";
            $cardName = "";
            $cardNo = "";
            $expDate = "";
            global $userEmail;
            ?>

    

    <!-- Header code -->
    <div class="header">
        <!-- Navigation links -->
        <div class="navButtons">
            <button onclick="location.href='home.html'"  class="navBtn">Home</button>
            <button onclick="location.href='courses.php'" class="navBtn">Courses</button>
            <button class="navBtn">Timetables</button>
            <button onclick="location.href='payments.php'" class="navBtn" id="homebtn">Payment</button>
            <button onclick="location.href='about.html'" class="navBtn" >Contact</button>
            
        </div>
        
        
        <!-- Search & Sign up -->
        <div class="navSearch">

            <!-- search bar image & input -->
            <div class="searchFull">
            <img id="searchGlass"src="./images/search.png" alt="search" width="15px" height="15px">
            <input id="searchbar" type="text" placeholder="Search..">
            </div>


            <button id="signup" onclick="location.href='home.html'">Sign Up</button>

        </div>
    </div>

    <hr width="1200px">

    <!-- middle section -->
    <div class="middle">
        <div id="billInfo"> Billing Information </div>

        <!-- Selection and cart -->
        <div class="cart">



            <!-- Form to get the details for a payment -->
            <div class="form1">

                <form method="post" >

                Email Address:<br/><input type="text" name="email"><br/>
                Name: <br/><input type="text" name="name"><br/>
                Purpose of Payment (Include the course Name)<br/><input type="text" name="information"><br/>
                Amount: <br/><input type="text" name="amount"><br/>
                Date:<br/><input type="date" name="date"><br/>
                <input type="submit" name="submit" value="Submit">

                </form>

            </div>


            <!-- PHP code to submit the payment details -->
            <?php
            
            if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {
                
                $email = $_POST["email"];
                $name = $_POST["name"];
                $information = $_POST["information"];
                $amount = $_POST["amount"];
                $date = $_POST["date"];
                $userEmail = $email;

                $sql2 = "INSERT INTO payments(Email,Name,CourseName,Amount,PaymentDate) values ('$email','$name','$information','$amount','$date')";

                if($conn->query($sql2)){
                    echo   "inserted successfully";
                    
                }
                else {
                    echo "Error:".$conn->error;
                }
            }
            ?>


            <!-- PHP code to Read the card details associated with the email of the user and to assign the data to variables -->
            <?php 

            if ($_SERVER["REQUEST_METHOD"] == "POST"){


            $sql = "SELECT nameOnCard,cardNumber,expDate FROM carddetails where email='$userEmail'";

            $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    // Loop through each row
                    while ($row = $result->fetch_assoc()) {
                    // Access the columns and assign them to variables
                    
                    $cardName = $row["nameOnCard"];
                    $cardNo = $row["cardNumber"];
                    $expDate = $row["expDate"];

                    }
                } else {
                
            } 
            }
            ?>
            
            <!-- Autofilling the card details using the data read from the DB -->
            <div class="card">

            <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            
            Name on Card:<br/><input id="nameOnCardInput" type="text" name="nameOnCard" value="<?php echo $cardName; ?> " readonly><br/>
            Card Number: <br/><input id="cardNoInput" type="text" name="cardNo" value="<?php echo $cardNo; ?>"readonly> <br/>
            Expiry date: <br/><input id="expDateInput" type="text" name="expDate" value="<?php echo $expDate; ?>"readonly><br/>
            
            <input id="paybtn" type="submit" name="Pay" value="Pay">
            </form>

            <!-- Button to redirect to the create/update card details -->
            <button id="cardUpdate" onclick="location.href='./cardDetails.html'" target="_blank">Create/Update Card Details</button>
            </div>



            <!-- Code to update the DB if paid successfully -->
            <?php
            
            if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["Pay"])) {
                
                

                $sql5 = "SELECT MAX(id) AS max_id FROM payments";
                $result = $result = $conn->query($sql5);
                $row = $result->fetch_assoc();
                $lastId = $row['max_id'];

                $value = "Paid";
                $sql6 = "UPDATE payments SET Paid = '$value' WHERE id = $lastId";
                $conn->query($sql6);


            
            }
            ?>


            <!-- Form and PHP to delete the card details from the DB if needed -->
            <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <input id="deletebtn" type="submit" name="delete" value="Delete Card Details">
            </form>

            <?php
                if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["delete"])) {

                    $sql3 = "DELETE FROM carddetails WHERE email = '$userEmail'";
                    
                    if($conn->query($sql3)){
                        echo   "deleted successfully";
                        
                    }
                    else {
                        echo "Error:".$conn->error;
                    }
        

                }

             ?>   
            </div>
        </div>
    </div>

    <!-- Footer Code -->
    <hr width="1200px">
    <div class="footer">
        <!-- rights -->
        <div> &copy; 2023 Sliit students, inc. All rights reserved </div>
        <!-- Social media links -->
        <div>
            <img class="logos" src="./images/fb.png" alt="fb logo" width="20px" height="20px">
            <img class="logos" src="./images/twitter.png" alt="" width="20px" height="20px">
            <img class="logos" src="./images/instagram.png" alt="ig logo" width="20px" height="20px">
            <img class="logos" src="./images/linkedin.png" alt="" width="20px" height="20px">
        </div>
    </div>
    
    
</body>
</html>