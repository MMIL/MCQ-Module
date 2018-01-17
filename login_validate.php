<?php
session_set_cookie_params(172800,"/");
session_start();

if( isset($_POST['email']) )
{
     include 'config.php';

     $myusername=mysqli_real_escape_string($connection,$_POST['email']); 
     $mypassword=mysqli_real_escape_string($connection,$_POST['password']); 

     $sql="SELECT count(email) FROM user WHERE email='$myusername' AND password='$mypassword'";
     $result=mysqli_query($connection,$sql);
     $count=mysqli_result($result,0);
echo $sql;
     if($count>0)
     {
          $_SESSION["email"]=$myusername;

          echo"<script type='text/javascript'>
          window.location.href='home.php';
          </script>";
     }
     else
     {
         echo"<script type='text/javascript'>
         alert('The username or password you entered is incorrect');
         window.location.href='login.php';
         </script>";
     }
	mysqli_close($connection);
}
else
{
     echo"<script type='text/javascript'>
     alert('Oops something went wrong');
     window.location.href='login.php';
     </script>";
}
?>