<?php
session_start();
   require_once("../include/database.php");
   $sql="SELECT * FROM classes ORDER BY class_id DESC";
   $result=mysqli_query($con,$sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<title>STUDENT CLASSES</title>
<link rel="stylesheet" href="../student.css">
</head>
<body id="index">
  <div id="header">
  <div class="weblink">
     <a href="../index.php"target="_SELF">HOME</a>
     <a href="student.php"target="_SELF">STUDENT</a>
     <a href="teacher.php"target="_SELF">TEACHER</a>
     <a href="subjects.php"target="_SELF">SUBJECTS</a>
     <a href="classes.php"target="_SELF">CLASSES</a>
     <a href="logout.php"target="_SELF">LOG OUT</a>
  </div>
   <h1>STUDENT MANAGEMENT SYSTEM</h1>
 </div>
 <h3 id="table_title" style="color:white;position:relative;left:30%;top:70%">CLASSES TABLE</h3>
   <div id="content">
     <div class="sub_container">
      <div class="content_header">
            <button type="button" class="hide_show" onclick="return hide_show()">Add</button>
            <p>
                <input type="text" size="20" placeholder="search...">
                <button type="submit"><img src="../images/search.png" width="30"height="25"></button>
            </p>
        </div>
      <div id="edit_id">
    <h1>ADD CLASS</h1>
     <form method="POST" action="action.php">
        <label for="class_name">class name:</label>
        <input type="text" id="class_name" name="class_name" class="input_box new_input"></br>
        <label for="class_name">Block Name:</label>
        <input type="text" id="block_name" name="block_name" class="input_box new_input"></br>
        <input type="submit"name="submit" value="Add class">
        <br><br>
  </form>
   </div>
      <div id="display_table">
       <table border="1"cellspacing="5"cellpadding="15" style="width:95%">
       <tr>
        <th>class Id</th>
        <th>class-Name</th>
        <th>View</th>
        <th>Edit</th>
        <th>Delete</th>
      </tr>
      <?php
      while($row=mysqli_fetch_array($result))
      {
       echo "<tr>
             <td>".$row['class_id']."</td>
             <td>".$row['class_name']."(".$row['block_name'].")"."</td>
             <td><img src='../images/view.png' width='42' height='28' class='view'></td>
             <td><img src='../images/edit.png' width='28' height='42' class='edit'></td>
             <td><img src='../images/delete.png' width='29' height='39' class='delete' onclick='delete_class(this); return false;' id='".$row['class_id']."'></td>
             <tr>";
      }
      ?>
        </table>
   </div>
  </div>
</div>
<script type="text/javascript" src="../student.js"></script>
</body>
</html>