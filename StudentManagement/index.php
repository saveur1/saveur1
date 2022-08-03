<?php
  session_start();
  if(!isset($_SESSION["email"]) && !isset($_SESSION["password"]))
  {
    header("Location:login.php");
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<title>STUDENT MANAGEMENT</title>
<link rel="stylesheet" href="student.css">
<style type="text/css">

</style>
</head>
<body id="index">
   <?php include("include/header.html"); ?>
   <div id="content">
     <div class="sub_container">
       <h2>WELCOME TO HOME PAGE</h2>
       <p>
       this system is for tracking the students data
       as well as teacher data.
       and also for making quick report.
       </p>
    </div>
   </div>
  </body>
</html>