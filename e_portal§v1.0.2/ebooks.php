<?php
   include('includes/connection.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style/ebook_style.css">
</head>
<body>
    <input type="checkbox" id="menu-toggle">
    <label for="menu-toggle" id="menu-btn">&#9776;</label>
    <div class='e_p'>
           <h1>BOOKS</h1>
         </div>
         <nav class="books_e">
         <form action="#" method="get" >
             <ul>
                <button name='e_books' type="submit"><li>E-Books</li></button>
                <button name='e_journals' type="submit"><li>E-Journals</li></button>
                <button name='e_material' type="submit"><li>E-Material</li></button>
                <button name='books' type="submit"><li>Books</li></button>
             </ul>
         </form>
         </nav>
         <nav class="menu">
            <a href="home.php"><h1 style="background-color: rgb(180, 238, 238);  border-radius: 15px;"><img src="images/home.png" style="position:absolute;width:30px;height:30px;left:1em;opacity:80%;">Home</h1></a>
             
                <ul>
                    <a href="images/nptel.png"> <li name='acc'><img src="images/users.png" style="position:absolute;width:30px;height:30px;top:0.2em;left:1.5em;opacity:80%;">Account</li></a>
                    <a href="images/nptel.png"> <li name='np'><img src="images/nptel.png" style="position:absolute;width:40px;height:30px;top:2.9em;left:1.1em;opacity:97%;">Nptel</li></a>
                    <a href="ebooks.php"> <li name='bo'><img src="images/books.png" style="position:absolute;width:30px;height:30px;top:5.3em;left:1.5em;opacity:80%;">Books</li></a>
                </ul>
         </nav>
    
</body>
</html>

<?php
  if(isset($_GET['e_books'])){
    echo "
    <lable>E-Book Search</lable>
    <input type='text' placeholder='e-book' required></input>";
  }

?>