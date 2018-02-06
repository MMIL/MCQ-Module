<?php
    session_start();
    include("components/mcqstate.php");
    if(!$result['mcq_state'])
      {
        $_SESSION['message']="MCQ Disabled by Administrator";
        header("location:admin.php");
      }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Form-LogIn</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/mdb.min.css" rel="stylesheet">
    <link href="assets/css/animate.css" rel="stylesheet">
    <link href="assets/css/Form-LogIn.css" rel="stylesheet">
</head>

<body class="fixed-sn animated fadeIn">

    <header>
        <nav class="navbar navbar-expand-lg navbar-dark elegant-color">
            <a href="http://jssmmil.in/" class="navbar-brand" title="MMIL Website"><img src="assets/img/logo.png">
                <p id="head">MMIL</p>
            </a>
            <ul class="nav navbar-nav nav-flex-icons ml-auto">
                <li class="nav-item">
                    <a href="index.php" class="nav-link">
                        <i class="fa fa-home"></i>
                        <span class="clearfix d-none d-sm-inline-block">Home</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="signup.php" class="nav-link">
                        <i class="fa fa-sign-in"></i>
                        <span class="clearfix d-none d-sm-inline-block">Sign Up</span>
                    </a>
                </li>
            </ul>
    </header>
    <main class="container">
      <div class="row">
          <div class=" col-lg-3 col-md-3"></div>
          <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
            <div class="jumbotron">
			<form action="login.php" method="POST" class="form-signin" name="loginform">
                  <div class="card text-center z-depth-2">
                    <div class="card-body">
                      <p class="white-text mb-0">Sign In</p>
                    </div>
                  </div>
			<?php
				if($_SESSION["logging"] && $_SESSION["logged"])
				{
					content();
				}
				else
				{
					if(!$_SESSION["logging"])
					{
						$_SESSION["logging"]=true;
						loginform();
					}
					else if($_SESSION["logging"])
					{
						$no_of_rows=checkrows();
						if($no_of_rows==1)
						{
							$_SESSION["logged"]=true;
							content();
						}
						else
						{
							loginform();
							$_SESSION['success']=' ';
							echo '<div class="alert alert-danger">
							<strong>Error !</strong> Please try again with correct details.</div>';
						}
					}
				}
				function loginform()
				{
					?>
                  <div class="md-form">
                     <i class="fa fa-envelope prefix grey-text"></i>
					<input type="text" id="defaultForm-email" class="form-control" name="email" placeholder="Email address"/>
                     <label for="defaultForm-email">Email</label>
                  </div>
                  <div class="md-form">
                     <i class="fa fa-lock prefix grey-text"></i>
					<input class="form-control" id="defaultForm-pass" type="password" name="pass" placeholder="Password" />
                     <label for="defaultForm-email">Password</label>
                  </div>
                  <div class="text-center">
					<button type="submit" class="btn logIn">Login</button>
                  </div>
					<?php
				}
				function checkrows()
				{
					include("components/db_connect.php");
					if(!empty($_POST))
					{	
						$username=mysqli_real_escape_string($con,trim($_POST['email']));
						$password=md5(mysqli_real_escape_string($con,trim($_POST['pass'])));
					}
					$x="SELECT * FROM details WHERE email='$username' and password='$password'";
					$result=mysqli_prepare($con,$x);
					mysqli_stmt_execute($result);
					mysqli_stmt_store_result($result);
					$y =  mysqli_stmt_num_rows($result);
					$_SESSION['username']=$username;
					return $y;
				}
				function content()
				{
					include("components/db_connect.php");
					$username=$_SESSION['username'];
					$query="SELECT * FROM details WHERE email ='$username'";
					$result=mysqli_query($con,$query);
					$value=mysqli_fetch_array($result);
					$_SESSION['name']=$value['name'];
					$logout_status=$value['Logout_status'];
					$query="SELECT * FROM time_and_questions WHERE serial_num='1'";
					$result=mysqli_query($con,$query);
					$value=mysqli_fetch_array($result);
					setcookie("timer",$value['timer'],time()+3600*24);
					$_SESSION['no_of_ques']=$value['no_of_questions'];
					$query="SELECT * FROM questions";
					$result=mysqli_prepare($con,$query);
					mysqli_stmt_execute($result);
					mysqli_stmt_store_result($result);
					$value= mysqli_stmt_num_rows($result);
					$_SESSION['arr']=range(1,$value);
					shuffle($_SESSION['arr']);
					$_SESSION['completed']=0;
					$_SESSION['id']=0;
					$_SESSION['ansarray']=array();
					$_SESSION['actualans']=array();
					$_SESSION['ques_id']=array();
					include("components/db_disconnect.php");
					if($logout_status)
					{
						echo "<script>self.location='resume.php?logout_stat=1&us=$username'</script>";
					}
					else
					{
						echo '<script>self.location="resume.php?logout_stat=0"</script>';
					}	
				}
				if($_SESSION['success']!=' ')
				{	
					echo '<div class="alert alert-success">';
					echo '<strong>Success..! </strong>' . $_SESSION['success'] . '';
					echo '</div>';
				}
			?>
            </div>
          </div>
      </div>
    </main>
    <footer class="page-footer elegant-color center-on-small-only">
        <div class="footer-copyright">
            <div class="container-fluid">
                &copy; <?php echo date("Y"); ?> Copyright:
                <a href="http://jssmmil.in/"> Microsoft Mobile Innovation Labs</a>

            </div>
        </div>
    </footer>

    <script type="text/javascript" src="assets/js/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="assets/js/popper.min.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="assets/js/mdb.min.js"></script>
</body>

</html>