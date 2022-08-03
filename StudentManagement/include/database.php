<?php
define("DB_HOST","sql306.epizy.com");
define("DB_USER","epiz_31909648");
define("DB_PASSWORD","oGVCTTxQ6i");
define("DB","epiz_31909648_student_management");
$con=mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB);
function fetchOption($con)
{
	$output="";
	$sql="SELECT * FROM classes";
	$result=mysqli_query($con,$sql);
	while($row=mysqli_fetch_array($result))
	{
		$output.="<option value='".$row['class_id']."'>".$row['class_name']."</option>";
	}
  return $output;
}
?>