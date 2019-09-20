
<?php 
	 include_once 'lib/Session.php';
	 Session::checkSession_user();
	
   ?>


 
<!DOCTYPE HTML>
<html>
<head>
	<title>ChildrenParty4U</title>
	<link rel="stylesheet"href="css2/game.css"/> 
    <link rel="stylesheet"href="css2/regisation.css"/>
    <link rel="stylesheet"href="css2/home.css"/>
    <link rel="stylesheet"href="css2/gallary.css"/>

    <link rel="stylesheet"href="css2/reg.css"/>
    <link rel="stylesheet"href="css2/contact.css"/>
    <link rel="stylesheet"href="css2/availeparty.css"/>

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
		   if($hasan == true ){
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
			<li><a  href="index.php">About Us</a></li>
			<li><a href="gallary.php">Gallary</a></li>
			<li><a  href="contact.php">Contact</a></li>
		</ul>
	</div>


	
	<div class="maincontented template clear">
	
			
		