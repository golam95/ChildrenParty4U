


<?php 
	 include_once 'lib/Session.php';
	 Session::init();
	
   ?>


 
<!DOCTYPE HTML>
<html>
 <head>
  <title>ChildrenParty4U</title>
  <link rel="stylesheet"href="css2/game.css"/> 
  <link rel="stylesheet"href="css2/regisation.css"/>
   <link rel="stylesheet"href="css2/home.css"/>
 </head>
 <?php
   if(isset($_GET['action'])&& $_GET['action']=="logout" ){
	   Session::user_destroy();//just assain the message and call the destroy the message from session

	 }
  ?>

		<body>
		    <div class="headersection  clear">
			<div class="subheadersectionone template clear">
			 <ul>
				 <?php 
		   $mehedi = Session::get("userid");
		   $hasan = Session::get("login");
		   if($hasan == true){
			   ?>

				<li><a href="myaccount.php?id=<?php echo urlencode ($mehedi); ?>">My Account</a></li>
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
			     <div class="subheadersection template clear">
			        <h1>ChildrenParty4U</h1>
			   
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
								<li><a id="active" href="index.php">About Us</a></li>
								<li><a href="gallary.php">Gallary</a></li>
								<li><a  href="contact.php">Contact</a></li>
							</ul>
               </div>
				  
				   <div class="maincontented_home template clear">
				     <div class="sideleft clear">
      <div class="samesidebarleft clear">
   <h2>About Us</h2>
                 <img src="image/num.jpg"alt="post image"/>
							<p>
							Children party envent is a online event booking system. where the customer see the available dates and if he/she want they can booked the event. We are trying to provide the best service possible.If any customer or visitor faced problem they can contact with us.There are various party are included when need we can add the party.Our main focuse on customer service trying to provide our best service.
							</p>
							
							
               </div>
		
			   
			
   </div>
     

		<?php include 'inc/sideright.php';?>


		<?php include 'inc/functionfooter.php';?>