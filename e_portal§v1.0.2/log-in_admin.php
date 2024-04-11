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
        <p class="head">Sign in to SRGEC Library</p>
        <div class="login-box">
            <form action="#" method="get"> 
                 <input type="hidden" name="sourse" value="">
                 <div class="input-box">
                     <div class="label">User ID </div>
                     <input type="text" name="name" id="username" maxlength="10" minlength="10" required>
                 </div>
                 <div class="input-box">
                     <div class="label">
                         <span>Password</span>
                         <a href="forgot_pwd.php" >Forgot Password?</a>
                     </div>
                     <input type="password" name="password" id="password" required>
                 </div>
                 <input type="submit" class="btn" name='submit' value="Sign in">
            </form>
        </div>
        <div class="signup">
            <span>New to Library </span><br>
            <a href="register_student.php"> Create an account for student?</a><br>
            <a href="register_staff.php"> Create an account for staff?</a>
        </div>
    </div>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>

<?php
session_start();

if(isset($_GET['submit'])){
    $server = 'localhost';
    $user = 'root';
    $db_password = '';
    $database = 'my_database';

    $con = new mysqli($server, $user, $db_password, $database);

    $username = $_GET['name'];
    $password = $_GET['password'];

    $query1 = "SELECT rollnumber, password FROM login_student WHERE rollnumber = '$username' AND password = '$password'";
    $query2 = "SELECT employid, password FROM login_staff WHERE employid = '$username' AND password = '$password'";

    $result1 = $con->query($query1);
    $result2 = $con->query($query2);

    if($result1->num_rows !== 0){
        $_SESSION['username'] = 'student';
        $con->close();
        header('Location: home.php');
        exit();
    }
    elseif($result2->num_rows !== 0){
        $_SESSION['username'] = 'staff';
        $con->close();
        header('Location: home.php');
        exit();
    }
    else{
        $con->close();
        header('Location: faill.html');
        exit();
    }
}
?>
