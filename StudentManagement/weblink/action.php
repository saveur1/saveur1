<?php
require_once("../include/database.php");
if(isset($_POST['submit']))
{
	if($_POST['submit']=="Add class")
	{
	$class_name=$_POST['class_name'];
	$block_name=$_POST['block_name'];
	if($class_name !="" && $block_name !="")
	{
		$sql="INSERT INTO classes(class_name,block_name)VALUE('$class_name','$block_name')";
		$output=mysqli_query($con,$sql);
		if($output) {
		echo "<script>
		if(alert('DATA INSERTED SUCCESSFULLY'))
		{
			".header("Refresh:0.1;url=classes.php")."
		}
		</script>";
	  }
	}
    }
if($_POST['submit']=="Add subject")
{
	$subject_name=$_POST['subject_name'];
	$marks=$_POST['marks'];
	if( $subject_name !="" && $marks !="")
	{
		$sql="INSERT INTO subjects(subject_name,marks)VALUE('$subject_name',$marks)";
		$output=mysqli_query($con,$sql);
		if($output) {
		echo "<script>
		if(alert('DATA INSERTED SUCCESSFULLY'))
		{
			".header("Refresh:0.1;url=subjects.php")."
		}
		</script>";
	  }
	}
}
  if($_POST['submit']=="Add student")
  {
  	$image="";
    $dateofbirth             =$_POST['dateofbirth'];
	$student_name            =$_POST['student_name'];
	$student_id              =$_POST['student_id'];
    $address                 =$_POST['address'];
	$guardianidnumber        =$_POST['guardianidnumber'];
    $fatherorguardian_name   =$_POST['fatherorguardian_name'];
	$phone_number            =$_POST['phone_number'];
    $admission_date          =$_POST['admission_date'];
	$class_id                =$_POST['class_id'];
    if(!empty($_FILES['image']['name'])) {
      $image_folder="../images";
      $file_array=explode(".",$_FILES['image']['name']);
      $file_extension=strtolower($file_array[1]);
      $allowed_extension=array("jpg","png","jpeg","gif");
      if(in_array($file_extension,$allowed_extension))
      {
      	$image = $image_folder."/".basename($_FILES['image']['name']);
      	move_uploaded_file($_FILES['image']['tmp_name'],$image);
      }
      else {
        echo "<script>
		if(alert('IMAGE OF JPG, PNG, JPEG, GIF ARE ONLY EXTENSION ALLOWED'))
		{
			".header("Refresh:0.1;url=teacher.php")."
		}
		</script>";
      }
    }
	if( $student_name !="" && $class_id !="" && $address !="")
	{
		$sql = " INSERT INTO
        tbl_student(
        student_name,dateofbirth,student_ID,address,guardianidnumber,fatherorguardian_name,phone_number,admission_date,image,class_id
        )
        VALUES(
        '$student_name','$dateofbirth','$student_id','$address','$guardianidnumber','$fatherorguardian_name','$phone_number','$admission_date','$image',$class_id
        )";
		$output=mysqli_query($con,$sql);
		if($output)
        {
		echo "<script>
		if(alert('DATA INSERTED SUCCESSFULLY'))
		{
			".header("Refresh:0.1;url=student.php")."
		}
		</script>";
	    }
	 }
    else {
      echo "script>
		if(alert('Fill in data please'))
		{
			".header("Refresh:0.1;url=student.php")."
		}
		</script>";
    }
  }
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
      else {
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
        teacher_name,dateofbirth,qualification,experience,phone_number,email_id,address,joiningdate,teacher_image
        )
        VALUES(
        '$teacher_name','$dateofbirth','$qualification',$experience,'$phone_number','$email_id','$joiningdate','$student_image'
        )";
		$output=mysqli_query($con,$sql);
		if($output)
        {
		echo "<script>
		if(alert('DATA INSERTED SUCCESSFULLY'))
		{
			".header("Refresh:0.1;url=teacher.php")."
		}
		</script>";
	    }
	    else {
	    	echo mysqli_error($con);
	    }
	 }
    else {
      echo "script>
		if(alert('Fill in data please'))
		{
			".header("Refresh:0.1;url=teacher.php")."
		}
		</script>";
    }
  }
}
if(isset($_POST['delete_id']))
{
   $sql="DELETE FROM tbl_student WHERE reg_no=".$_POST['delete_id']."";
   $result=mysqli_query($con,$sql);
   if($result) {
     header("Location:student.php");
   }
}
if(isset($_POST['teacher_id']))
{
   $sql="DELETE FROM tbl_teacher WHERE teacher_id=".$_POST['teacher_id']."";
   $result=mysqli_query($con,$sql);
   if($result) {
     header("Location:teacher.php");
   }
}
if(isset($_POST['subject_id']))
{
   $sql="DELETE FROM subjects WHERE subject_id=".$_POST['subject_id']."";
   $result=mysqli_query($con,$sql);
   if($result) {
     header("Location:subjects.php");
   }
}
if(isset($_POST['class_id']))
{
   $sql="DELETE FROM classes WHERE class_id=".$_POST['class_id']."";
   $result=mysqli_query($con,$sql);
   if($result) {
     header("Location:classes.php");
   }
}
if(isset($_POST['update_stud_id']))
{
   $output=array();
   $sql="SELECT * FROM tbl_student WHERE reg_no=".$_POST['update_stud_id']."";
   $result=mysqli_query($con,$sql);
   while($row=mysqli_fetch_array($result))
   {
   	$output=array(
    "image"                  => $row['image'],
    "dateofbirth"            => $row['dateofbirth'],
	"student_name"           => $row['student_name'],
    "address"                => $row['address'],
	"guardianidnumber"       => $row['guardianidnumber'],
    "fatherorguardian_name"  => $row['fatherorguardian_name'],
	"phone_number"           => $row['phone_number'],
    "admission_date"         => $row['admission_date'],
	"class_id"               => $row['class_id']
   	);
   }
   echo json_encode($output);
}
?>