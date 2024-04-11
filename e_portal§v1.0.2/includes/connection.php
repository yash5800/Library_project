<?php
  try{
   $con = new mysqli("localhost", "root", "", "my_database");
  }
  catch(Exception $e){
      header('location:../404-animation/index.html');
      exit; 
   }
?>
