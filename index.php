<?php 
session_start();

$cn = mysqli_connect("localhost", "root", "", "bd_gym");

function ms($value)
{
    global $cn;
    return mysqli_real_escape_string($cn, $value);
}

include('component/accountmanager.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>BD GYM FITNESS SUPPLEMENTS</title>
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/tables.css">
    <link rel="stylesheet" href="css/css3menu.css">
    <link rel="stylesheet" href="css/control.css">
    <link rel="stylesheet" href="css/article.css">
</head>
<body>
   <div class="header">
       <h1>Header Here</h1>
   </div>
    <div class="main">
         <div class="menu">
          <?php 
             include('component/menu.php');
             ?>
         </div>
        <div class="content">
        <?php
            include('component/controller.php');
            ?>
       </div>
    </div>
     
     <div class="footer"><p>Footer Here</p></div>  
</body>
</html>