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
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/mdb.min.css" rel="stylesheet">
    <link href="assets/css/animate.css" rel="stylesheet">
    <link href="assets/css/dashboard.css" rel="stylesheet">
		<script src="js/timer.js"></script>
		<script src="js/mcqfonts.js"></script>
		<script type="text/javascript">
		function finish(clicked_name)
		{
			var x;
			if(clicked_name=="done")
			{
				x = confirm("Are you sure to submit all your answers");
				if(x==true)
				{
					document.cookie="proceed=1";
					return true;
				}
				else
				{
					document.cookie="proceed=0";
					return false;
				}
			}
		}
		</script>
	</head>
	<body class="fixed-sn animated fadeIn">

    <header>
        <nav class="navbar navbar-expand-lg navbar-dark elegant-color">
            <a href="http://jssmmil.in/" class="navbar-brand" title="MMIL website"><img src="assets/img/logo.png">
                <p id="head">MMIL</p>
            </a>
            <ul class="nav navbar-nav nav-flex-icons ml-auto">
                <li class="nav-item">
                    <a href="logout.php" class="nav-link">
                        <i class="fa fa-sign-out"></i>
                        <span class="clearfix d-none d-sm-inline-block">Sign Out</span>
                    </a>
                </li>
            </ul>
        </nav>
    </header>
	<?php  
		if($_SESSION['logged'])
		{	
			$_SESSION['prev_id']=$_SESSION['id'];
			$_SESSION['id']++;
			if($_SESSION['id']==$_SESSION['no_of_ques']+1 && !isset($_GET['question']))
				{
					$_SESSION['id']=1;
				}
			else
				if(isset($_GET['question']))
					if($_GET['question']==-9 && $_SESSION['id']==2)
						$_SESSION['id']=intval($_SESSION['no_of_ques']);
					else
						if($_SESSION['id']>=1)
							$_SESSION['id']=$_SESSION['id']-2;
			if(isset($_SESSION['mcqdone']))
				if($_SESSION['mcqdone']==1)
					$_SESSION['id']=$_SESSION['no_of_ques']+9;
			/*Submitting All answers and ending mcq*/

			if (!empty($_POST['done'])) 
			{
				if($_COOKIE['proceed']==1)
					{
						$_SESSION['id']=$_SESSION['no_of_ques']+9;
						$_SESSION['mcqdone']=1;
					}
				else
					$_SESSION['id']=$_SESSION['prev_id'];
			}

			/*----------------------------------------------*/

			if($_SESSION['id']<=$_SESSION['no_of_ques']+9)
				{
					if(array_key_exists($_SESSION['id']-1, $_SESSION['arr']))
						$c=$_SESSION['arr'][$_SESSION['id']-1];
					else
						$c=-1;
				}
			else
				$c=-1;
			include("components/db_connect.php");
			$q_sec="SELECT * FROM questions WHERE id='$c'";
			$result_sec=mysqli_query($con,$q_sec);
			$h_sec=mysqli_fetch_array($result_sec);

			/*Storing answers in answers array and questions answered in question array*/

			if(!empty($_POST['choice'])&& !empty($_POST['submitted']))
			{	
				if(array_key_exists($_SESSION['index'], $_SESSION['arr']))
				{
					$d=$_SESSION['arr'][$_SESSION['index']];	
					$_SESSION['ansarray'][$d]=$_POST['choice'];
				}
				if(!in_array($d,$_SESSION['ques_id']))
					array_push($_SESSION['ques_id'],$d);
			}
			$_SESSION['index']=$_SESSION['id']-1;

			/*---------------------------------------------------*/
			/*Timer*/

				echo '
  <div class="row parent_row">
     <div class="col-lg-3 col-md-3 col-12">
        <div class="panel">
          <div class="panel panel-body" id="border">
             <div class="row">';
			if($_SESSION['id']<=$_SESSION['no_of_ques']+5)	
				echo '<center><h1 id="time" ></h1></center>';
				
			/*-------------------------*/			

			/*Side menu of questions links*/	

			if($_SESSION['id']<=$_SESSION['no_of_ques']+5)
			{
				echo '</div></div>
          <div class="panel panel-body" id="border">
             <div class="row">';
				for ($link=0; $link < $_SESSION['no_of_ques']; $link++) 
				{
					$button="linkbutton";
					if(array_key_exists($_SESSION['arr'][$link], $_SESSION['ansarray']))
						$button="answered";
					if($link==$_SESSION['id']-1) 
						$button="current_ques";	
					echo "
               <div class='col-lg-4 col-4 col-md-6'>
                 <a class='$button' id='buttons' href='link.php?question=$link'><button type='button' id='twoD''>".($link+1)."</button></a>
               </div>";
				} 
				echo '
             </div>    
          </div>
        </div>
     </div>';				
			}

			/*------------------------------------------------------*/

			$ques=htmlspecialchars($h_sec['question']);
			$no=intval($h_sec['id']);
			$op1=htmlspecialchars($h_sec['a']);
			$op2=htmlspecialchars($h_sec['b']);
			$op3=htmlspecialchars($h_sec['c']);
			$op4=htmlspecialchars($h_sec['d']);
			if(in_array($no,$_SESSION['ques_id']))
				$x=$_SESSION['ansarray'][$no];										
			if($_SESSION['id']<=$_SESSION['no_of_ques']+5)
			{
				?>	
     <div class="col-lg-9 col-md-9 col-12">
        <div class="panel">
          <div class="panel panel-body">
				<form action="mcq.php" method="POST">
					<h3>
								<?php echo 'Question' . $_SESSION['id'];?>
							</h3>
             <hr>
							<p>
								<?php echo nl2br($ques);?>
							</p><br>
             <ul id="listOptions">
               <li id="option">
								<input id="a" type="radio" name="choice" value="<?php echo 'a' . $no;?>" <?php if(isset($x)) if($x==('a'.$no)) echo 'checked';?>/> 
								
                 <label for="f-option"><?php echo nl2br($op1); ?></label>
    
                 <div class="check"></div>
               </li>
  
               <li id="option">
									<input id="b" type="radio" name="choice" value="<?php echo 'b' . $no;?>" <?php if(isset($x)) if($x==('b'.$no)) echo 'checked';?>/> 
								
                 <label for="f-option"><?php echo nl2br($op2); ?></label>
    
                 <div class="check"></div>
               </li>
  
               <li id="option">
									<input id="c" type="radio" name="choice" value="<?php echo 'c' . $no; ?>" <?php if(isset($x)) if($x==('c'.$no)) echo 'checked';?>/> 
								
                 <label for="f-option"><?php echo nl2br($op3); ?></label>
    
                 <div class="check"></div>
               </li>
  
               <li id="option">
									<input id="d" type="radio" name="choice" value="<?php echo 'd' . $no; ?>" <?php if(isset($x)) if($x==('d'.$no)) echo 'checked';?>/> 
							                 <label for="u-option"><?php echo nl2br($op4); ?></label>
	
    
                 <div class="check"><div class="inside"></div></div>
               </li>
            </ul>
					<div id="button" class="prev-next">
						<input type="button" class="btn btn-info btn-large" value="Back" onclick="self.location='mcq.php?question=-9'">
						<input type="submit" class="btn btn-info btn-large" value="Next" name="submitted">	
					</div>
					<div class="alert alert-success done">
					<p class="pull-left">Press <strong>Done</strong> to submit all answers</p>
					<div id="button">
						<input type="submit" onclick="finish(this.name)"  name="done" class="btn btn-success btn-large" value="Done">
					</div>
					</div>							
				</form>	
          </div>
        </div>
     </div>
  </div>

    </main>							
				<?php			
			}
			else
			{
				echo '<div class="container">';
				echo '<div class="container" id="mainarea2">';	
				$res=0;
				for($i=0;$i<count($_SESSION['ques_id']);$i++)
				{ 	
					if(array_key_exists($i, $_SESSION['ques_id']))
					{
						$f=$_SESSION['ques_id'][$i];
						$q_sec="SELECT * FROM questions WHERE id='$f'";
						$result_sec=mysqli_query($con,$q_sec);
						$h_sec=mysqli_fetch_array($result_sec);
						$d=$_SESSION['ques_id'][$i];	
						$_SESSION['actualans'][$d]=($h_sec['ans'].$h_sec['id']);
					}
				}
				echo '<script>DeleteAllCookies();</script>';
				echo '<div class="alert alert-success"><strong>Thanks</strong> for Participating</div>';
				$e=count($_SESSION['ansarray']);
				/*--------------- Checking of answers ------------ */

        $query="SELECT * FROM marking_scheme";
        $qresult=mysqli_query($con,$query);
        $result=mysqli_fetch_array($qresult);
        $pos=$result ["positive"];
        $neg=$result["negative"];
        $marking=$result["negative_marking"];
        if($marking==0)				
					for($i=0;$i<$e;$i++)
					{	
						$g=$_SESSION['ques_id'][$i];
						if($_SESSION['ansarray'][$g]==$_SESSION['actualans'][$g])
						$res=$res+$pos;
					}
				else
				for($i=0;$i<$e;$i++)
					{	
						$g=$_SESSION['ques_id'][$i];
						if($_SESSION['ansarray'][$g]==$_SESSION['actualans'][$g])
							$res=$res+$pos;
						else
							$res=$res-$neg;
					}				

				/* ------------------------------- */
				$p=$_SESSION['username'];
				$q_sec="UPDATE  details SET score='$res' WHERE email = '$p'";
				mysqli_query($con,$q_sec);
				echo '<div class="alert alert-error"><p>Please Logout before leaving.</p></div>';
    			//echo '<p class="lead">No of questions correct answered = ' . $res . ' Out of '. $_SESSION['no_of_ques'] . '</p>';
				$_SESSION['completed']=1;
				include("components/db_disconnect.php");
			}
			echo '</div>';
			echo '</div>';
			setcookie("id",serialize($_SESSION['id']),time()+3600);
			setcookie("ques_id",serialize($_SESSION['ques_id']),time()+3600);
			setcookie("ansarray",serialize($_SESSION['ansarray']),time()+3600);
		}
		else
		{
			echo '<div class="container" id="content">';
			echo '<div class="container" id="mainarea2">';
			echo '<div class="alert alert-error"><strong>Error !</strong>  You need to login to continue</div>';
			echo '</div>';
			echo '</div>';	
		}
	?>
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