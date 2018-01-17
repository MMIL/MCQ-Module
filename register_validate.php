<?php
include 'config.php';
if($_POST['name']=="")
{
	echo "<script type='text/javascript'>
	alert('Name can not be blank');
	window.location.href='index.php';
	</script>";
}
else if(preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $_POST['name']))
{
	echo "<script type='text/javascript'>
	alert('Speacial chracter is not allowed in Name');
	window.location.href='index.php';
	</script>";
}
else if($_POST['admno']=="")
{
	echo "<script type='text/javascript'>
	alert('Admission Number can not be blank');
	window.location.href='index.php';
	</script>";
}
else if(preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $_POST['admno']))
{
	echo "<script type='text/javascript'>
	alert('Speacial chracter is not allowed in Admission Number');
	window.location.href='index.php';
	</script>";
}
else if($_POST['email']=="")
{
	echo "<script type='text/javascript'>
	alert('Email can not be blank');
	window.location.href='index.php';
	</script>";
}
else if(preg_match('/[\'^£$%&*()}{#~?><>,|=+¬-]/', $_POST['email']))
{
	echo "<script type='text/javascript'>
	alert('Speacial chracter is not allowed in Email maddress');
	window.location.href='index.php';
	</script>";
}
else if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
{
	echo "<script type='text/javascript'>
	alert('Invalid Email address');
	window.location.href='index.php';
	</script>";
}
else if($_POST['mob']!="" && !is_numeric($_POST['mob']))
{
	echo "<script type='text/javascript'>
	alert('Mobile number can contain numbers only');
	window.location.href='index.php';
	</script>";
}
else if($_POST['password']!=$_POST['password2'])
{
	echo "<script type='text/javascript'>
	alert('Password not match');
	window.location.href='index.php';
	</script>";
}
else
{
	$sql = "SELECT * FROM user WHERE email='".$_POST['email']."' or admno='".$_POST['admno']."'";
	$result = mysqli_query($connection,$sql);
	$count = mysqli_num_rows($result);
	if ($count > 0)
	{
		echo "<script type='text/javascript'>
		alert('This Email or admission Number already registered');
		window.location.href='index.php';
		</script>";
	}
	else
	{
		mysqli_query($connection,"INSERT INTO user(name, admno, email, mob, password)
		VALUES ('".mysqli_real_escape_string($connection,$_POST['name'])."', '".mysqli_real_escape_string($connection,$_POST['admno'])."', '".mysqli_real_escape_string($connection,$_POST['email'])."', 
		'".mysqli_real_escape_string($connection,$_POST['mob'])."', '".mysqli_real_escape_string($connection,$_POST['password'])."')");
		
		$_SESSION['email']=$_POST['email'];
		
		echo "<script type='text/javascript'>
		window.location.href='home.php';
		</script>";
	}
}
?>