

<html>
    <head>
    <title> Edit Profile </title>
    </head>
    <body>  
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            
            firstname:<br/> <input id="firstname" type="text" name="firstname"  ><br/>
            lastname: <br/> <input id="lastname" type="text" name="lastname" > <br/>
            dob: <br/> <input id="dob" type="text" name="dob" > <br/>
            age: <br/> <input id="age" type="text" name="age" > <br/>   
            nic: <br/> <input id="id" type="text" name="id" > <br/>
            address: <br/> <input id="address" type="text" name="address" > <br/>
            email: <br/> <input id="email" type="text" name="email" > <br/>
            gender: <br/> <input id="gender" type="text" name="gender" > <br/>
            username: <br/> <input id="username" type="text" name="username" > <br/>
            password: <br/> <input id="password" type="password" name="password" > <br/>
            <button class="button" type="submit" name="save" value="save">Save</button>
            </form>
    <?php
            
            $servername="localhost";
            $username = "root";
            $password = "";
            $db = "edutraining";
          
            
            // Create connection
            $conn = new mysqli($servername, $username, $password, $db);
            
            // Check connection
            if ($conn->connect_error)
            {
             die("Connection failed: " . $conn->connect_error);
            }


                $sql = "SELECT * FROM reg WHERE id = $id";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) 
                {
                    $row = $result->fetch_assoc();

                    // Assign the retrieved data to varia
                    $fn = $row["firstname"];
                    $ln = $row["lastname"];
                    $dateofbirth = $row["dob"];
                    $ag = $row["age"];
                    $id = $row["id"];
                    $add = $row["address"];
                    $mail = $row["email"];
                    $g = $row["gender"];
                    $un = $row["username"];
                    $pw = $row["password"];
                   
                    

    }

    $conn->close();
    ?>


    </body>
</html>

