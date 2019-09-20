
<?php 
include_once '../lib/Session.php';
Session::checkSession();
ob_start();
?>


<!DOCTYPE html>
<head>
	<meta charset="utf-8">
	<title>AdminPanel</title>
	<link media="all" rel="stylesheet" type="text/css" href="css/all.css" />
	<link rel="stylesheet"href="css/designall.css"/>
	<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
	<script type="text/javascript">window.jQuery || document.write('<script type="text/javascript" src="js/jquery-1.7.2.min.js"><\/script>');</script>
	<script type="text/javascript" src="js/jquery.main.js"></script>
	<link href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.4/jquery-ui.css" rel="stylesheet" type="text/css">
	<script type="text/javascript" src="jquery/jquery.js"></script>
	<script type="text/javascript" src="jquery/jquery-ui.min.js"></script>


	<link rel="stylesheet"href="game.css"/> 
	<link rel="stylesheet"href="regisation.css"/>
	<script>
		$(document).ready(function(){
						//Datepicker Popups calender to Choose date
						$(function(){
							$("#MyDatepicker").datepicker();
							//Pass the user selected date format 
							$( "#format" ).change(function() {
								$( "#datepicker" ).datepicker( "option", "dateFormat", $(this).val() );
							});
						});

					});
		$( "#datepicker" ).datepicker({
			inline: true
		});
	</script>  
	
	<script>
		$(document).ready(function(){
						//Datepicker Popups calender to Choose date
						$(function(){
							$("#datesubmit").datepicker();
							//Pass the user selected date format 
							$( "#format" ).change(function() {
								$( "#datesubmit" ).datepicker( "option", "dateFormat", $(this).val() );
							});
						});

					});
		$( "#datesubmit" ).datepicker({
			inline: true
		});
	</script> 
	<script>
		$(document).ready(function(){
						//Datepicker Popups calender to Choose date
						$(function(){
							$("#date").datepicker();
							//Pass the user selected date format 
							$( "#format" ).change(function() {
								$( "#datepicker" ).datepicker( "option", "dateFormat", $(this).val() );
							});
						});

					});
		$( "#datepicker" ).datepicker({
			inline: true
		});
	</script>  
	<script>
		$(document).ready(function(){
						//Datepicker Popups calender to Choose date
						$(function(){
							$("#submitdate").datepicker();
							//Pass the user selected date format 
							$( "#format" ).change(function() {
								$( "#datepicker" ).datepicker( "option", "dateFormat", $(this).val() );
							});
						});

					});
		$( "#datepicker" ).datepicker({
			inline: true
		});
	</script>  
	
	<script>
		$(document).ready(function(){
						//Datepicker Popups calender to Choose date
						$(function(){
							$("#updatedate").datepicker();
							//Pass the user selected date format 
							$( "#format" ).change(function() {
								$( "#datepicker" ).datepicker( "option", "dateFormat", $(this).val() );
							});
						});

					});
		$( "#datepicker" ).datepicker({
			inline: true
		});
	</script>  
	
</head>
<body>

<div id="wrapper">
		<div id="content">
			<div class="c1">
				<div class="controls">
					<nav class="links">
						<ul>

							<?php 
							$mehedi = Session::get("login");
							$hasan = Session::get("userid");
							if($mehedi == true){
								?>
								<li><a href="index.php" class="ico1" >Dash Board </span></a></li>
								<li><a href="contactinfo.php" class="ico1" >Contact Info</span></a></li>
								<li><a href="registation.php" class="ico1"> Registation Info</span></a></li>
								<li><a href="orderinfo.php" class="ico1">Order Info</span></a></li>
								<li><a href="calender.php" class="ico1">Add Event</span></a></li>
								<li><a href="viewparty.php" class="ico2" >Add Party</span></a></li>
								<li><a href="addpatry.php" class="ico2" >View Party</span></a></li>
								

								<li><a href="title.php"class="ico3" >Announce</span></a></li>

								<li><a href="profile.php?id=<?php echo urlencode ($hasan); ?>" class="ico1">Profile</a></li>

								<?php } ?>

							</ul>
						</nav>

						<?php
						if(isset($_GET['action'])&& $_GET['action'] =="logout"){
							Session::destroy();

						}
						?>

						<div class="profile-box">
							<span class="profile">
								<?php 
								$mehedi = Session::get("login");
								$hasan = Session::get("username");

								if($mehedi == true){
									?>

									<a style="color:black;padding:10px;margin-top:0px;font-size:17px;" href="?action=logout">Welcome<?php echo " $hasan";?></a>
									<?php } ?>
								</span>

							</div>
						</div>



