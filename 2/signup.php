<?php
    session_start();
    include("components/mcqstate.php");
    if(!$result['mcq_state'])
      {
        $_SESSION['message']="MCQ Disabled by Administrator";
        header("location:admin.php");
      }
?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Form-SignUp</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/mdb.min.css" rel="stylesheet">
    <link href="assets/css/animate.css" rel="stylesheet">
    <link href="assets/css/Form-SignUp.css" rel="stylesheet">
</head>

<body class="fixed-sn animated fadeIn">

    <header>
        <nav class="navbar navbar-expand-lg navbar-dark elegant-color">
            <a href="http://jssmmil.in/" class="navbar-brand" title="MMIL Website"><img src="assets/img/logo.png">
                <p id="head">MMIL</p>
            </a>
            <ul class="nav navbar-nav nav-flex-icons ml-auto">
                <li class="nav-item">
                    <a href="home.php" class="nav-link">
                        <i class="fa fa-home"></i>
                        <span class="clearfix d-none d-sm-inline-block">Home</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="login.php" class="nav-link">
                        <i class="fa fa-sign-in"></i>
                        <span class="clearfix d-none d-sm-inline-block">Sign In</span>
                    </a>
                </li>
            </ul>
    </header>
    <main class="container">
      <div class="row">
          <div class=" col-lg-3 col-md-3"></div>
          <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
            <div class="jumbotron">
        <form action="register.php"  method="POST" class="form-horizontal" name="signupform">
                  <div class="card text-center z-depth-2">
                    <div class="card-body">
                      <p class="white-text mb-0">Sign Up</p>
                    </div>
                  </div>
                   <div class="md-form">
                     <i class="fa fa-user prefix grey-text"></i>
            <input id="firstname" type="text" id="f_name" name="f_name" placeholder="Name" Autofocus/>
                  </div>
                  <div class="md-form">
                     <i class="fa fa-book prefix grey-text"></i>
            <input id="branchyear" type="text" id="branch" name="branch" placeholder="Branch Eg. CS1" />
                  </div>
                  <div class="md-form">
				  Year
              <select class="form-control" name="year">
              <option value=1>1</option>
              <option value=2>2</option>
              <option value=3>3</option>
              <option value=4>4</option>
              </select>
			  <br>
                  </div>
                  <div class="md-form">
             <input type="radio" name="gndr" value="Male">Male
             <input type="radio" name="gndr" value="Female">Female
                  </div>
                  <div class="md-form">
                     <i class="fa fa-user prefix grey-text"></i>
              <input id="email" type="text" id="email" name="email" placeholder="Email"/>
                  </div>
                  <div class="md-form">
                     <i class="fa fa-lock prefix grey-text"></i>
            <input id="password" type="password" id="pass" name="pass" placeholder="Password"/>
                  </div>
                  <div class="md-form">
                     <i class="fa fa-lock prefix grey-text"></i>
            <input id="rpassword" type="password" id="rpass" name="rpass" placeholder="Confirm Password" />
                  <div class="text-center">
                     <a href="Instructions.html"><button id="signinbutton" type="submit" class="btn logIn">Sign Up</button></a>
                  </div>
            </div>
          </div>
        </form>
        <?php 
          if($_SESSION['signup_error']!=' ')
          {
            echo ' <div class="alert alert-danger">';
            echo '<strong>Error..! </strong>' . $_SESSION['signup_error'];
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
    <script type="text/javascript" src="assets/js/Form.js"></script>
</body>

</html>