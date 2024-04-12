<?php
   include('includes/connection.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style/mystyle.css">
</head>
<body>
    <div class="parent-box">
        <div class="icon">
            <ion-icon name="library-outline"></ion-icon>
        </div>
        <p class="head">Sign Up to SRGEC Library</p>
        <div class="register-box">
            <form action="#" method="get">
            <div class="input-box">
                <div class="label">Rollnumber </div>
                <input type="text" name="name" id="username" required>
            </div>
            <div class="input-box">
                <div class="label">Email </div>
                <input type="email" name="email" id="email" required>
            </div>
            <div class="input-box">
                <div class="label">
                    <span>Password</span>
                </div>
                <input type="password" name="password" id="password" required>
            </div>
            <input type="submit" class="btn" name="signup" value="Sign Up">
            <div id="back_log">
</form>
            <p>Back to </p>
            <a href="log-in_admin.php">  Sign in</a>
            </div>
        </div>
    </div>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>

<?php
 if(isset($_GET['signup'])){

    $server = "localhost";
    $user = "root";
    $database = "my_database";
    $password = "";
    
    $con = new mysqli($server, $user, $password, $database);
    $con->query('create table if not exists login_student(rollnumber varchar(10) primary key,email text,password text)');
    $con->query('create table if not exists login_staff(employid varchar(30) primary key,email text,password text)');

    
    $name = $_GET['name'];
    $email = $_GET['email'];
    $pass = $_GET['password'];
    
    $query1 = $con->query("SELECT email from login_student WHERE email = '$email'");
    $query2 = $con->query("SELECT email from login_staff WHERE email = '$email'");

    if($query1->num_rows == 0 && $query2->num_rows == 0){
        $sql = "insert into login_student values('$name','$email','$pass')";
        $report = $con->query($sql);
    
        if($report === true){
            $con->close();
            header('Location:log-in_admin.php');  
        }
        else{
            $con->close();
            echo "<p style='color:red;position:absolute;top:1em;'>username already exists!!</p>";       
        }
    }
    else{
        
        $con->close();
        echo "<p style='color:red;position:absolute;top:1em;'>email already exists!!</p>";       
    }
 }

?>