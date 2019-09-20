
<?php 
	 include_once 'lib/Session.php';
	 Session::init();
	
   ?>



<!DOCTYPE HTML>
<html>
 <head>
  <title>ChildrenParty4U</title>
 <link href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.4/jquery-ui.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="jquery/jquery.js"></script>
<script type="text/javascript" src="jquery/jquery-ui.min.js"></script>
 <link rel="stylesheet"href="css2/game.css"/> 
  <link rel="stylesheet"href="css2/regisation.css"/>
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
</head>


<?php
   if(isset($_GET['action'])&& $_GET['action']=="logout" ){
	   Session::user_destroy();//just assain the message and call the destroy the message from session

	 }
  ?>


		<body>
		    <div class="headersectionsimple  clear">
			<div class="subheadersectionone template clear">
			 <ul>
			      <?php 
		   $mehedi = Session::get("userid");
		   $hasan = Session::get("login");
		   if($hasan == true){
			   ?>

				<li><a href="myaccount.php?id=<?php echo urlencode ($mehedi);?>">My Account</a></li>
				<li><a href="viewprice.php">View price  ||</a></li>
				<li><a href="availeparty.php">See Avaliabel party  ||</a></li>
				<li><a href="availedate.php">See AvailableDate  ||</a></li>
                <li><a href="?action=logout">Log Out  ||</a></li>

                <?php }else {?> 

				<li><a href="registation.php">Regisation  ||</a></li>
				<li><a href="login.php">Log In ||</a></li>

				  <?php } ?>

				
					</ul>
					</div>
			    <p><span class="pull_right"><strong>Welcome!</strong>

                              <?php
								 $name = Session::get("name");
								 if(isset($name)){
									 echo $name;
								}
								 
								 ?>
 



			    </span></p>
		
					</div>
					

				<div class="headersectionthree template clear">
				      <img src="image/www.jpg"alt="post image"/>
				  </div>
				    <div class="naviagation clear template">
							<ul>
							  <li><a  href="home.php">Home</a></li>
							  	<li><a href="party.php">Party Info</a></li>
								<li><a href="index.php">About Us</a></li>
								<li><a href="gallary.php">Gallary</a></li>
								<li><a href="contact.php">Contact</a></li>
							</ul>
               </div>
				 <div class="maincontented template clear">
				   <div class="imageall template clear">
				   <div class="callback template clear">
				    <a href="availeparty.php"><h2>Back<h2></a>
				   
				   </div>
								 <div class="subimage template clear">
								
									<a href="#"><img src="image/num.jpg"alt="post image"/></a>
									</div>
							</div>
				  