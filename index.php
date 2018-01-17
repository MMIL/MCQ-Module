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


			<div class="main-login main-center">


				<div class="panel-heading panel-local">
	               <div class="panel-title text-center img-circle">
	               		<h1 class="title">Register</h1>
	               	</div>
	            </div> 
			    <form class="form-horizontal" method="post" action="register_validate.php">
						
						

						<div class="form-group">
							<div class="cols-sm-10">
								<div class="input-group">
									
									<input type="text" required class="form-control" name="name"  placeholder="Full Name"/>
								</div>
							</div>
						</div>
						
						

						<div class="form-group">
							<div class="cols-sm-10">
								<div class="input-group">
									
									<input type="text" required class="form-control" name="admno"  placeholder="Admission Number (18IT007)"/>
								</div>
							</div>
						</div>
						
						

						<div class="form-group">
							<div class="cols-sm-10">
								<div class="input-group">
									<input type="email" required class="form-control" name="email"  placeholder="Email"/>
								</div>
							</div>
						</div>
						
						

						<div class="form-group">
							<div class="cols-sm-10">
								<div class="input-group">
									<input type="text" required class="form-control" name="mob"  placeholder="Mobile Number"/>
								</div>
							</div>
						</div>

						

						<div class="form-group">
							<div class="cols-sm-10">
								<div class="input-group">
									<input type="password" required class="form-control" name="password"  placeholder="Password"/>
								</div>
							</div>
						</div>

						

						<div class="form-group">
							<div class="cols-sm-10">
								<div class="input-group">
									<input type="password" required class="form-control" name="password2"  placeholder="Confirm Password"/>
								</div>
							</div>
						</div>
						
						
						<div class="form-group text-center">
							<input type="submit" class="btn btn-sm login-button" value="Register Now">
						</div>
      					<br>
      					<a class="link" href="login.php">Already have an account? Login</a>
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