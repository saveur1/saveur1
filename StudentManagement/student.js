function validate()
  {
   var email=document.getElementById("email");
   var password=document.getElementById("password");
   var error_message=document.getElementsByClassName("error_message")[0];
   var msg=document.getElementById("msg");
     if(email.value != "" && password.value != "")
     {
        if(password.value.length <= 4 || password.value.length >= 15)
        {
           msg.innerHTML="passwod must be between 4 and 15";
           error_message.style.display="block";
           password.style.border="1px solid red";
        }
     }
      else
      {
       error_message.style.display="block";
       email.style.border="1px solid red";
       password.style.border="1px solid red";
       return false;
       }
   }

  document.getElementById("cross").onclick=function()
  {
       document.getElementsByClassName("error_message")[0].style.display="none";
  };

  function hide_show()
  {
    if(document.getElementById("display_table").style.display != "none")
    {
      document.getElementById("display_table").style.display = "none"
      document.getElementById("edit_id").style.display="block";
      document.getElementsByClassName("hide_show")[0].innerHTML="Back";
    }else {
      document.getElementById("display_table").style.display="block";
      document.getElementById("edit_id").style.display="none";
      document.getElementsByClassName("hide_show")[0].innerHTML="Add";
    }
  }
  function delete_student(e)
  {
    if (confirm("ARE YOU SURE YOU WANT TO DELETE THIS STUDENT"))
    { 
         var delete_id=e.getAttribute('id');
         var ajaxRequest=new XMLHttpRequest();
         var serverForm=new FormData();
         serverForm.append("delete_id",delete_id);
         ajaxRequest.open("POST","action.php");
         ajaxRequest.send(serverForm);
         ajaxRequest.onreadystatechange =function()
         {
            if(ajaxRequest.readyState==4 && ajaxRequest.status == 200)
            {
                 window.location.href="student.php";
            }
         }
    } else {
      return false;
    }
  }
   function delete_teacher(e)
  {
    if (confirm("ARE YOU SURE YOU WANT TO DELETE THIS TEACHER"))
    { 
         var teacher_id=e.getAttribute('id');
         var ajaxRequest=new XMLHttpRequest();
         var serverForm=new FormData();
         serverForm.append("teacher_id",teacher_id);
         ajaxRequest.open("POST","action.php");
         ajaxRequest.send(serverForm);
         ajaxRequest.onreadystatechange =function()
         {
            if(ajaxRequest.readyState==4 && ajaxRequest.status == 200)
            {
                 window.location.href="teacher.php";
            }
         }
    } else {
      return false;
    }
  }
   function delete_subject(e)
  {
    if (confirm("ARE YOU SURE YOU WANT TO DELETE THIS SUBJECT"))
    { 
         var subject_id=e.getAttribute('id');
         var ajaxRequest=new XMLHttpRequest();
         var serverForm=new FormData();
         serverForm.append("subject_id",subject_id);
         ajaxRequest.open("POST","action.php");
         ajaxRequest.send(serverForm);
         ajaxRequest.onreadystatechange =function()
         {
            if(ajaxRequest.readyState==4 && ajaxRequest.status == 200)
            {
                 window.location.href="subjects.php";
            }
         }
    } else {
      return false;
    }
  }
   function delete_class(e)
  {
    if (confirm("ARE YOU SURE YOU WANT TO DELETE THIS CLASS"))
    { 
         var class_id=e.getAttribute('id');
         var ajaxRequest=new XMLHttpRequest();
         var serverForm=new FormData();
         serverForm.append("class_id",class_id);
         ajaxRequest.open("POST","action.php");
         ajaxRequest.send(serverForm);
         ajaxRequest.onreadystatechange =function()
         {
            if(ajaxRequest.readyState==4 && ajaxRequest.status == 200)
            {
                 window.location.href="classes.php";
            }
         }
    } else {
      return false;
    }
  }
   function update_student(e)
  {
         hide_show();
         var student_id=e.getAttribute('id');
         var ajaxRequest=new XMLHttpRequest();
         var serverForm=new FormData();
         serverForm.append("update_stud_id",student_id);
         ajaxRequest.open("POST","action.php");
         ajaxRequest.send(serverForm);
         ajaxRequest.onreadystatechange =function()
         {
            if(ajaxRequest.readyState==4 && ajaxRequest.status == 200)
            {
              var data=JSON.parse(ajaxRequest.responseText);
              document.getElementById("student_name").value=data.student_name;
              document.getElementById("dateofbirth").value=data.dateofbirth;
              document.getElementById("address").value=data.address;
              document.getElementById("guardianidnumber").value=data.guardianidnumber;
              document.getElementById("fatherorguardian_name").value=data.fatherorguardian_name;
              document.getElementById("admission_date").value=data.admission_date;
              document.getElementById("image").value=data.image;
              document.getElementById("class_id").value=data.class_id;
              document.getElementById("phone_number").value=data.phone_number;
            }
         }
  }

