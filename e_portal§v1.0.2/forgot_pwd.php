<?php
  include('includes/connection.php');
  session_start();

  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\Exception;
  
  require 'PHPMailer/Exception.php';                 
  require 'PHPMailer/PHPMailer.php';
  require 'PHPMailer/SMTP.php';
  
  
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        *{
            margin: 0;
            padding: 0;
        }
        body{
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .main{
            position: absolute;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 22em;
            width: 16em;
            border-radius: 1rem;
            background: linear-gradient(rgba(143, 1, 251),rgb(247, 0, 247));
        }
        .main h1{
            position: absolute;
            margin-top: -7.5em;
            background: linear-gradient(145deg,white,greenyellow);
            background-clip: text;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
            color: transparent;
           
        }
        .main input{
            margin-bottom: 20px;
            padding: 5px 15px;
            border-radius: 1px;
            border: none;
            border-bottom: 1px solid white;
            transition: all .5s;
            background-color: transparent;
            color: aliceblue;
        }
        .main input::placeholder {
            color: white; 
            font-style: italic; 
        }
        .main button{
            margin-top: 1em;
            margin-left: 4em;
            padding: 8px 25px;
            border-radius: 1rem;
            border: 1px solid black;
            transition: all .5s;
        }
        .main button:hover{
      
            transform: scale(1.1);
        }
    </style>
</head>
<body>
   <div class="main">
    <p id="not_mat" style="position:absolute;display:none;color:azure;top:5em;">Not Match!!</p>
    <h1 id='head'>Email</h1>
    <p id="inval" style="text-shadow:0 0 5px red;position:absolute;top:-1.2em;color:red;display:none;">Invalid OTP</p>
    <form action="#" method="post">
        <input type='email' style="display:block;outline:none;" id="mail" name="mail" required placeholder="Email" autofocus>
        <input type="text" style="display:none;outline:none;" id="otp" minlength="4" maxlength="4" name="otp" placeholder="OTP" autofocus>
        <input type="text" style="display:none;outline:none;" id="new_pwd" name="new_pwd" placeholder="New Password" autofocus>
        <input type="text" style="display:none;outline:none;" id="re_new_pwd" name="re_new_pwd" placeholder="Re-enter Password" >
        <button type="submit" id="but" name="but">Send</button>
    </form>
   </div>
</body>
</html>
<?php
 if(isset($_POST["but"])){
    
    $con = new mysqli("localhost", "root", "" , "my_database");

    if(isset($_POST["mail"]) && !empty(($_POST["mail"])) ){

     $_SESSION['mail'] = $_POST["mail"];
     $response_student = $con->query("select email from login_student where email = '".$_POST["mail"]."'");
     $response_staff = $con->query("select email from login_staff where email = '".$_POST["mail"]."'");

     if($response_staff->num_rows > 0 || $response_student->num_rows > 0){

      $_SESSION['user'] = $response_staff->num_rows > 0?"staff":"student" ;  
      echo "<p style='color:green;position:absolute;top:1em;'>".$_SESSION['user'] ." it's been a while</p>";
     function genrate(){
       $str = "";
       for( $index = 0; $index < 4 ; $index++){
           $str = $str . strval(rand(0,9)); 
       }
       return $str;
     }
    
     $otp = genrate();
     $_SESSION['otp'] = $otp;

     //creating otp input field
     if(isset($otp)){
        //sending otp to email
          $mail = new PHPMailer(true);
          
          try {
              $mail->isSMTP();    
              $mail->Host       = 'smtp.gmail.com';                     
              $mail->SMTPAuth   = true;                                  
              $mail->Username   = 'jokerdeva18@gmail.com';                 
              $mail->Password   = 'acnubsolosuitlps';          
              $mail->SMTPSecure = 'ssl';     
              $mail->Port       = 465;                                   
          
              $mail->setFrom('jokerdeva18@gmail.com','GEC Library');
              $mail->addAddress($_SESSION['mail']); 
          
          
              $mail->isHTML(true);   
              $mail->Subject = "OTP";
              $mail->Body    = $_SESSION['otp'];
              $mail->send();
              echo 'Message has been sent';
          } catch (Exception $e) {
            header('location:../404-animation/index.html');
        }
          
     ?>
        <script>
            var input = document.getElementById('otp');
            var mail = document.getElementById('mail');
            input.style.display = "block";
            mail.style.display = "none";
            document.getElementById('head').innerHTML = "Enter OTP";
            document.getElementById('but').innerHTML = "Submit";
            mail.required = false;
            input.required = true;
            input.autofocus = true;
        </script>
    <?php
      }
     }
     else{
        echo "<p style='color:red;position:absolute;top:1em;'>No such email exists!!</p>";
     }
    }
    elseif(isset($_POST["otp"]) && !empty(($_POST["otp"])) ){
        if(isset($_SESSION['otp']) && $_SESSION['otp'] == $_POST['otp']){
            //valid otp
    ?>
               <script>
                   var input = document.getElementById('otp');
                   var mail = document.getElementById('mail');
                   input.required = false;
                   input.style.display = "none";
                   mail.required = false;
                   mail.style.display = "none";
                   
                   var pwd = document.getElementById('new_pwd');
                   var re_pwd = document.getElementById('re_new_pwd');
                   pwd.required = true;
                   pwd.style.display = "block";
                   re_pwd.required = true;
                   re_pwd.style.display = "block";
       
                   document.getElementById('head').innerHTML = "New Pwd";
                   document.getElementById('but').innerHTML = "Reset";
                   
               </script>
    <?php
        }else {
            //invaild case of otp
            echo "<p style='color:green;position:absolute;top:1em;'>".$_SESSION['user'] ." good to see u again</p>";
    ?>  
           <script>
            var inval = document.getElementById('inval');
            inval.style.display = "block";

            var input = document.getElementById('otp');
            var mail = document.getElementById('mail');
            input.style.display = "block";
            mail.style.display = "none";
            document.getElementById('head').innerHTML = "Enter OTP";
            document.getElementById('but').innerHTML = "Submit";
            mail.required = false;
            input.required = true;
           </script>
    <?php        
        }
    }
    elseif(isset($_POST["new_pwd"]) && !empty(($_POST["new_pwd"])) ){
        if($_POST["new_pwd"] == $_POST["re_new_pwd"]){
           
        $return = $con->query("update login_".$_SESSION['user']." set password = '".$_POST["re_new_pwd"]."' where email = '".$_SESSION['mail']."'");
        if($return == true){
            echo "<p style='color:green;position:absolute;top:1em;'>Updated</p>"; 
            session_destroy();
            $con->close();
            header('location:log-in_admin.php');
            
         }
        else{   
                $con->close();
                session_destroy();
                echo "<p style='color:red;position:absolute;top:1em;'>Not Updated</p>";                       
        }
        }
        else{

?>  
            <script>

                   var input = document.getElementById('otp');
                   var mail = document.getElementById('mail');
                   input.required = false;
                   input.style.display = "none";
                   mail.required = false;
                   mail.style.display = "none";
                   
                   var pwd = document.getElementById('new_pwd');
                   var re_pwd = document.getElementById('re_new_pwd');
                   pwd.required = true;
                   pwd.style.display = "block";
                   re_pwd.required = true;
                   re_pwd.style.display = "block";
       
                   document.getElementById('head').innerHTML = "New Pwd";
                   document.getElementById('but').innerHTML = "Reset";
             document.getElementById('not_mat').style.display = 'block';
            </script>
<?php 
        }
    }
  }

?>




