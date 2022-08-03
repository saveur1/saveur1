<?php
include("../include/database.php");
if(isset($_POST['submit']))
{
  if($_POST['submit']=="Add Teacher")
  {   
    $teacher_name            =$_POST['teacher_name'];
    $dateofbirth             =$_POST['dateofbirth'];
    $qualification           =$_POST['qualification'];
    $experience              =$_POST['experience'];
    $phone_number            =$_POST['phone_number'];
    $email_id                =$_POST['email_id'];
    $address                 =$_POST['address'];
    $joiningdate             =$_POST['joiningdate'];
    $teacher_image="";
    if(!empty($_FILES['teacher_image']['name'])) {
      $image_folder="../images";
      $file_array=explode(".",$_FILES['teacher_image']['name']);
      $file_extension=strtolower($file_array[1]);
      $allowed_extension=array("jpg","png","jpeg","gif");
         if(in_array($file_extension,$allowed_extension))
         {
           $teacher_image = $image_folder."/".basename($_FILES['teacher_image']['name']);
           move_uploaded_file($_FILES['teacher_image']['tmp_name'],$teacher_image);
         }
         else 
         {
          echo "<script>
          if(alert('IMAGE OF JPG, PNG, JPEG, GIF ARE ONLY EXTENSION ALLOWED'))
          {
            ".header("Refresh:0.1;url=teacher.php")."
          }
          </script>";
        }
    }
    if( $teacher_name !="" && $email_id !="" && $address !="")
    {
        $sql = "INSERT INTO
        tbl_teacher(
        teacher_name,dateofbirth,qualification,experience,phone_number,email_id,address,joining_date,teacher_image
        )
        VALUES(
        '$teacher_name','$dateofbirth','$qualification',$experience,'$phone_number','$email_id','$address','$joiningdate','$teacher_image'
        )";
        $output=mysqli_query($con,$sql);
        if($output)
        {
           echo "
           <script>
           if(alert('DATA INSERTED SUCCESSFULLY'))
           {
            ".header("Refresh:0.1;url=teacher.php")."
           }
           </script>";
        }
     }
    else {
      echo "<script>alert('Fill in data please')</script>";
    }
 }
}
$sql="SELECT * FROM tbl_teacher ORDER BY teacher_id DESC";
$result=mysqli_query($con,$sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<title>TEACHERS</title>
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
 <h3 id="table_title" style="color:white;position:relative;left:30%;top:70%">TEACHER TABLE</h3>
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
        <h1>ADD TEACHER</h1>
        <form method="POST" action="">
        <label for="teacher_name">teacher name:</label>
        <input type="text" id="teacher_name" name="teacher_name"class="input_box new_input"><br>
        <label for="teacher_name">Date of Birth:</label>
        <input type="Date" id="dateofbirth" name="dateofbirth" class="input_box new_input"><br>
        <label for="qualification">Qualification:</label>
        <input type="text" id="qualification" name="qualification"class="input_box new_input"><br>
        <label for="experience">Experience:</label>
        <input type="Number" id="experience" name="experience"class="input_box new_input"><br>
        <label for="phone_number">Phone Number:</label>
        <input type="text" id="phone_number" name="phone_number"class="input_box new_input"><br>
        <label for="email_id">teacher Email:</label>
        <input type="email" id="email_id" name="email_id"class="input_box new_input"><br>
        <label for="address">Address:</label>
        <input type="text" id="address" name="address"class="input_box new_input"><br>
        <label for="joiningdate">Joining Date:</label>
        <input type="Date" id="joiningdate" name="joiningdate"class="input_box new_input"><br>
        <label for="image">choose Image</label>
        <input type="file" name="teacher_image" id="teacher_image">
        <input type="submit"name="submit" value="Add Teacher"><br>
       </form>
   </div>
        <div id="display_table">
<table border="1"cellspacing="5"cellpadding="15" style="width:95%">
    <tr>
        <th>image</th>
        <th>teacher_Id</th>
        <th>Names</th>
        <th>View</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>
     <?php
      while($row=mysqli_fetch_array($result))
      {
      echo "
    <tr>
        <td><img src='".$row['teacher_image']."' width='31' height='41PX'></td>
        <td>".$row['teacher_id']."</td>
        <td>".$row['teacher_name']."</td>
        <td><img src='../images/view.png' width='42' height='28' class='view'></td>
        <td><img src='../images/edit.png' width='28' height='42' class='edit'></td>
        <td><img src='../images/delete.png' width='29' height='39' class='delete' onclick='delete_teacher(this); return false;' id='".$row['teacher_id']."'></td>
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