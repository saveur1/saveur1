<?php
   require_once("../include/database.php");
   $sql="SELECT * FROM tbl_student st,classes cl
         WHERE st.class_id=cl.class_id
         ORDER BY reg_no DESC";
   $result=mysqli_query($con,$sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<title>STUDENTS</title>
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
 <h3 id="table_title" style="color:white;position:relative;left:30%;top:70%">STUDENT TABLE</h3>
   <div id="content">
     <div class="sub_container">
        <div class="content_header">
            <button type="button" class="hide_show" onclick="return hide_show()">Add</button>
            <p>
                <input type="text" size="20" placeholder="search...">
                <button type="submit"><img src="../images/search.png" width="30"height="25"></button>
            </p>
        </div>
      <div id="edit_id" class="add_student">
       <h1>ADD STUDENT</h1>
       <form method="POST" action="action.php" enctype="multipart/form-data">
        <label for="student_name">student name:</label>
        <input type="text" id="student_name" name="student_name"class="input_box new_input"><br>
        <label for="dateofbirth">Date of Birth:</label>
        <input type="Date" id="dateofbirth" name="dateofbirth" class="input_box new_input"><br>
        <label for="stud_id">Student ID:</label>
        <input type="number" id="student_id" name="student_id" class="input_box new_input"><br>
        <label for="stud_id">student address:</label>
        <input type="text" id="address" name="address"class="input_box new_input"><br>
        <label for="guardianidnumber">Guardian ID number:</label>
        <input type="number" id="guardianidnumber" name="guardianidnumber"class="input_box new_input"><br>
        <label for="fatherorguardian_name">Father Or Guardian Name:</label>
        <input type="text" id="fatherorguardian_name" name="fatherorguardian_name" class="input_box new_input"><br>
        <label for="">Phone Number:</label>
        <input type="number" id="phone_number" name="phone_number" class="input_box new_input"><br>
        <label for="dateofbirth">Admission Date:</label>
        <input type="Date" id="admission_date" name="admission_date" class="input_box new_input"><br>
        <label for="class_id">student class:</label>
        <select name="class_id" id="class_id" class="input_box new_input">
          <?php echo fetchOption($con); ?>
        </select>
        <label for="image">student image:</label>
        <input type="file" id="image" name="image"><br>
        <input type="submit"name="submit" value="Add student">

        <input type="hidden" name="hidden_stud_id" id="hidden_stud_id">
        <br><br>
  </form>
   </div>
      <div id="display_table">
    <table border="1"cellspacing="5"cellpadding="15" style="width:95%">
    <tr>
        <th>Image</th>
        <th>Reg NO.</th>
        <th>Names</th>
        <th>class</th>
        <th>View</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>
        <?php
      while($row=mysqli_fetch_array($result))
      {
      echo "
        <tr>
        <td><img src='".$row['image']."'width='30'height='30'/></td>
        <td>".$row['reg_no']."</td>
        <td>".$row['student_name']."</td>
        <td>".$row['class_name']."</td>
        <td><img src='../images/view.png' width='42' height='28' class='view'></td>
        <td><img src='../images/edit.png' width='28' height='42' class='edit' onclick='update_student(this); return false;' id='".$row['reg_no']."'></td>
        <td><img src='../images/delete.png' width='29' height='39' class='delete' onclick='delete_student(this); return false;' id='".$row['reg_no']."'></td>
       </tr>";
      }
      ?>
    </table>
   </div>
  </div>
</div>
<script type="text/javascript" src="../student.js"></script>
</body>
</html>