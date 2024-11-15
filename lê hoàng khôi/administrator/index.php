<?php
   session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>web của khôi</title>
   <script src="./js_LHK/jquery-3.7.1.js"></script>
   <script src="./js_LHK/jscript.js"></script>
   <link type="text/css" rel="stylesheet" href="./stylecss_LHK/mycss.css">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body>
   <?php
      if (!isset($_SESSION['USER']) && !isset($_SESSION['ADMIN'])) {
         header('location: userLogin.php');
         exit();
      }
   ?>

   
   <div id="top">
      <?php
         require './element_LHK/top.php';
      ?>
      
   </div>
   
   <div id="left">
      <?php
         require './element_LHK/left.php';
      ?>
   </div>
   <div id="center">
      <?php 
     
         require './element_LHK/center.php';
      ?>
   </div>
   <div id="right"></div>
   <div id="bottom"></div>
   <div id="signoutbutton">
      <a href="./element_LHK/mUser/userAct.php?reqact=userlogout" class="btn btn-link text-danger">Logout
         <img src="./img_LHK/logout.png" class="iconbutton" alt="Logout"/>
      </a>
   </div>
</body>
</html>
