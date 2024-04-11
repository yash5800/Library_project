<?php
   include('includes/connection.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style/style.css">
</head>
<body>
    <input type="checkbox" id="menu-toggle">
    <label for="menu-toggle" id="menu-btn">&#9776;</label>


    <div class='e_p'>
           <h1>Welcome! To Gec OPAC </h1>
    </div>

         
    <nav class="menu">
        <a href="home.php"><h1 style="background-color: rgb(180, 238, 238);  border-radius: 15px;"><img src="images/home.png" style="position:absolute;width:30px;height:30px;left:1em;opacity:80%;">Home</h1></a>
        <form action="#" method="get">
           <ul>
               <a href="index.php"> <li ><img src="images/users.png" style="position:absolute;width:30px;height:30px;top:0.2em;left:1.5em;opacity:80%;">Account</li></a>
               <a href="images/nptel.png"> <li name='np'><img src="images/nptel.png" style="position:absolute;width:40px;height:30px;top:2.9em;left:1.1em;opacity:97%;">Nptel</li></a>
               <a href="ebooks.php"> <li name='bo'><img src="images/books.png" style="position:absolute;width:30px;height:30px;top:5.3em;left:1.5em;opacity:80%;">Books</li></a>
           </ul>
        </form>
    </nav>
    
</body>
</html>

<?php
  

?>