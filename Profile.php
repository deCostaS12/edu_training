<?php
$servername = "localhost";
$username = "root";
$password = "";
$db = "edutraining";

// Create connection
$conn = new mysqli($servername, $username, $password, $db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$id = isset($_GET['nic']) ? $_GET['nic'] : '';

$sql = "SELECT * FROM reg WHERE nic = '$id'";
$result = $conn->query($sql);

if ($result && $result->num_rows > 0) {
    $row = $result->fetch_assoc();

    // Assign the retrieved data to variables
    $fn = $row["firstname"];
    $ln = $row["lastname"];
    $dateofbirth = $row["dob"];
    $ag = $row["age"];
    $id = $row["nic"];
    $add = $row["address"];
    $mail = $row["email"];
    $un = $row["username"];
    $pw = $row["password"];
    // ... assign other columns to variables
}

$sql = "SELECT * FROM reg";
$result = $conn->query($sql);

if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        // Access the columns and assign them to variables
        $fn = $row["firstname"];
        $ln = $row["lastname"];
        $dateofbirth = $row["dob"];
        $ag = $row["age"];
        $id = $row["nic"];
        $add = $row["address"];
        $mail = $row["email"];
        $un = $row["username"];
        $pw = $row["password"];
    }
}
?>

<html>
<head>
    <title>Profile Page</title>
    <link rel="stylesheet" href="registration.css">
</head>

<body>

<!-- Header code -->
<div class="header">


<!-- Navigation links -->
<div class="navButtons">
    <button  id="homeBtn" class="navBtn">Home</button>
    <button href="./courses.html" class="navBtn">Courses</button>
    <button href="./timetable.html" class="navBtn">Timetables</button>
    <button href="./payments.html" class="navBtn">Payment</button>
    <button href="./contact.html" class="navBtn">Contact</button>
    
</div>


<!-- Search & Sign up -->
<div class="navSearch">

    <!-- search bar = image & input -->
    <div class="searchFull">
    <img id="searchGlass"src="./images/search.png" alt="search" width="15px" height="15px">
    <input id="searchbar" type="text" placeholder="Search..">
    </div>


    <button id="signup">Sign Up</button>

</div>
</div>

    <div id="login">
        <img src="images/pro.png" style="width:200px;">
    </div>

    <script>
        alert("WELCOME TO EDUTRAINING!");
    </script>

    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        Firstname:<br /><input id="firstname" type="text" name="firstname" value="<?php echo $fn; ?>" readonly><br />
        Lastname: <br /><input id="lastname" type="text" name="lastname" value="<?php echo $ln; ?>" readonly> <br />
        Date Of Birth: <br /><input id="dob" type="text" name="dob" value="<?php echo $dateofbirth; ?>" readonly><br />
        Age: <br /><input id="age" type="text" name="age" value="<?php echo $ag; ?>" readonly><br />
        NIC: <br /><input id="nic" type="text" name="nic" value="<?php echo $id; ?>" readonly><br />
        Address: <br /><input id="address" type="text" name="address" value="<?php echo $add; ?>" readonly><br />
        Email: <br /><input id="email" type="text" name="email" value="<?php echo $mail; ?>" readonly><br />
        Username: <br /><input id="username" type="text" name="username" value="<?php echo $un; ?>" readonly><br />
        Password: <br /><input id="password" type="password" name="password" value="<?php echo $pw; ?>" readonly><br />
    </form>


    <button onclick="location.href='./editprofile.php'">Edit Profile</button>

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
