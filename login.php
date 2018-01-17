<!DOCTYPE html>
<html>
<head>
	
	<title>Particle</title>
	<link rel="stylesheet" type="text/css" href="styles.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel='stylesheet prefetch' href='css/font-awesome.min.css'>
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
	
		<div id="particles-js">
			
			<div class="row main" id="login">
			<div class="img_back center-block" >
				<img src="logo.png" class="img-responsive center-block xyz " >
			</div>
			<br>


			<div class="main-login main-center">


				<div class="panel-heading panel-local">
	               <div class="panel-title text-center img-circle">
	               		<h1 class="title">Sign In</h1>
	               	</div>
	            </div> 
			    <form class="form-horizontal" method="post" action="login_validate.php">
						
						

						<div class="form-group">
							<div class="cols-sm-10">
								<div class="input-group">
									
									<input type="email" class="form-control" name="email" id="email"  placeholder="Email"/>
									<span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
								</div>
							</div>
						</div>

						

						<div class="form-group">
							<div class="cols-sm-10">
								<div class="input-group">
									
									<input type="password" class="form-control" name="password" id="password"  placeholder="Password"/>
									<span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
								</div>
							</div>
						</div>
						
						
						<div class="form-group text-center">
							<input type="submit" class="btn btn-sm login-button" value="Sign In">
						</div>
      					<br>
      					<a href="login.php">Already have an account? Login</a>
      					<br>
      					<br>

						
					</form>
				</div>
		</div>
		</div></div>

	<script type="text/javascript" src='https://cdn.jsdelivr.net/npm/particles.js@2.0.0/particles.min.js'></script>

	<script type="text/javascript">
		particlesJS.load('particles-js','particles.json',function(){
			console.log("File Loaded successfully...")
		});
	</script>
</body>
</html>