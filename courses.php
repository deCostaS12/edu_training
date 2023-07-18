<Doctype html>
    <html>
    <head>
        <meta name="viewport" content="width= device-width , initial-scale = 1.0">   
        <title> Course </title>
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="home.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300&display=swap" rel="stylesheet">

        <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" >


    </head>
    <body>
        <?php
    $servername="localhost";
    $username = "root";
    $password = "";
    $db = "edutraining";
    
    
    
    // Create connection
    $conn = new mysqli($servername, $username, $password, $db);
    
    
    
    // Check connection
    if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
    }
    else
    {
    
    };



?>
       <!-- Header code -->
       <div class="header">


       <!-- Navigation links -->
       <div class="navButtons">
            <button onclick="location.href='home.html'"  class="navBtn">Home</button>
            <button onclick="location.href='courses.php'" class="navBtn" id="homebtn">Courses</button>
            <button class="navBtn">Timetables</button>
            <button onclick="location.href='payments.php'" class="navBtn">Payment</button>
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


<!-------------------Courses----------------->

        <section class="course">
            <h1>Courses we offer</h1>
            <p> lihini add some sort of a paragraph</p>

            <div class="row">
                <div class="course-col">
                    <h3>DIPLOMA IN EDUCATION, TEACHING & LEARNING</h3>
                    
                </div>

                <div class="course-col">
                    <h3>INTERNATIONAL TEACHING DIPLOMA</h3>
                    
                </div>

                <div class="course-col">
                    <h3>COUNSELLING COURSES FOR TEACHERS</h3>
                    
                </div>

                

            </div>
        </section>

        <section class="content">
            <h1>How it works</h1>
            <p>EduTraining simplifies professional development for teachers with its user-friendly platform. 
                Access a diverse range of courses, interactive modules, and collaborative forums tailored to your needs, 
                empowering you to enhance your skills and stay updated with the latest educational trends. Take control of your
                 professional growth and unlock your full potential in the classroom with EduTraining.</p>
        
            <div class="row">
                <div class="content-col">
                    <img src="images/enroll.webp"> 
                    <div class="layer">
                       <h3> 1. Enroll in the course </h3>
                       <p>Start by completing the course enrollment and get instant access to your 
                        TESOL/TEFL course. It takes less than two minutes to begin, and you can enroll at any time.</p>
                    </div>
                </div>
        
                <div class="content-col">
                    <img src="images/study.avif"> 
                    <div class="layer">
                       <h3> 2. Study online </h3>
                       <p>Study through the course materials all online at your own pace. You can use a computer or mobile device,
                         and study whenever you have time available. You don’t need any specialist equipment, just a computer/mobile
                          device with an internet connection.</p>
                    </div>
                </div>
                
        
                <div class="content-col">
                    <img src="images/Test.avif"> 
                    <div class="layer">
                       <h3>3. Pass the course assessments</h3>
                       <p>To make sure that you truly understand the principles and techniques in the course, you’ll complete 
                        a short assessment at the end of each module, and a full examination at the end of the course.</p>
                    </div>
                </div>
        
                <div class="content-col">
                    <img src="images/pass.avif"> 
                    <div class="layer">
                       <h3>4. Get your certificate</h3>
                       <p>You’ll receive your certificate as soon as you complete the course assessments. The certificate displays your name, your 
                        certificate’s unique ID number, date of completion, and the details of the course modules and assessments completed.</p>
                    </div>
                </div>
        
            </div>
        
        
        </section> <br><br><br>


<section>
    <h1>Courses we provide</h1>
    <p> Select Your Course</p>


<center>

    <?php
$sql = "SELECT courseName FROM courseDetails";
$result = $conn->query($sql);

$listItems = '';
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $courseName = $row["courseName"];
        $listItems .= "<li>$courseName</li>";
    }
}

echo "<ul>$listItems</ul>";

?>
</center> <br> <br>


<h1>Enroll for a course </h1>
    <p> Join us now!</p>

    <div class="container">
         <form method="post" action="connect.php">
          <div class="form-group">
            <label for="Email1">Email address</label>
            <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
          </div>
          <div class="form-group">
            <label for="CourseName">Enter the selected course name</label>
            <input type="text" name= "course" class="form-control" id="" placeholder="Text">
        </div>
          
          
      
        
    </div>  
          <div class="form-group form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Send course updates to the email</label>
          </div>
          
          <button type="submit" name="enroll" class="btn btn-primary">Enroll me!</button>
        </form>
    </div>       

</section>

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