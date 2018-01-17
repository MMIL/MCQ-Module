<?php
session_start();

if(isset($_SESSION['email']))
{
    include 'config.php';
    include 'head.php';

?>
<div class="container-fluid">
        <div class="panel">
          <div class="panel panel-body">
<div class="jumbotron">
        <h1>Welcome</h1>
        <p>Please read the following</p>
		<h3>Rules & instructions</h3>
		<ul>
		<li>No negative marking.
		<li>Duration of test is 30 minutes only. Your time will start when you press below button.
		<li>To submit the answer of any question press NEXT button only.
		</ul>
		<h3>Terms & Condition</h3>
		<ul>
		<li>Decision taken by the judge will be final
		<li>Your entry can be canceled if we found any unethical activity
		</ul>
		<h3>Privacy Policy</h3>
		<ul>
		<li>Your information will be used for training and quality purpose
		<li>Your information may get shared with 3rd party (outside the society) such as college administration, tech fest sponsors etc. 
		</ul>
        <p>
          <a class="btn btn-lg btn-primary" href="dashboard.php" role="button">I had readed it and agree it, Start the Test</a>
        </p>
</div>
</div>
</div>
</div>
<?php include 'foot.php'; ?>
</body>
</html>

<?php
	mysqli_close($connection);
}
else
{
     echo"<script type='text/javascript'>
     window.location.href='login.php';
     </script>";
}
?>
