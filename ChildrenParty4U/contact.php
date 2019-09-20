 


<?php 
include "lib/Database.php";
include "config/config.php";
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
	<link rel="stylesheet"href="css2/gallary.css"/>
	<link rel="stylesheet"href="css2/availeparty.css"/>
	<link rel="stylesheet"href="css2/contact.css"/>
</head>


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
				<li><a href="index.php">About Us</a></li>
				<li><a  href="gallary.php">Gallary</a></li>
				<li><a id="active" href="contact.php">Contact</a></li>
			</ul>
		</div>


		<div class="maincontented_contact template clear">
			<div class="sideleft clear">


				<div class="contact us clear">
					<h2 style="color:#703F54;">Contact Us</h2>
					<center>

						<?php
						$db = new database();
						$date = date('Y-m-d H:i:s');
						if(isset($_POST['submit'])){
							$firstname= mysqli_real_escape_string($db->link, $_POST['con_username']);
							$lastnamename= mysqli_real_escape_string($db->link, $_POST['con_userlastname']);
							$email= mysqli_real_escape_string($db->link, $_POST['con_email']);
							$address= mysqli_real_escape_string($db->link, $_POST['con_address']);
							$comments= mysqli_real_escape_string($db->link, $_POST['con_comments']);

							if( $firstname == '' ||  $lastnamename == '' || $email == ''|| $address == ''|| $comments == ''){
								echo "<span style='color:Red'>"."Field must not empty!!!"."</span>";

							}else if(strlen($firstname)<3){

								echo "<span style='color:red'>"."Name field is too Short!!!"."</span>";

							}else if(strlen($lastnamename)<3){

								echo "<span style='color:red'>"."Name field is too Short!!!"."</span>";

							}else if(preg_match('/[^a-z0-9_-]+/i',$name)){

								echo "<span style='color:red'>"."Your letter have some problem!!!"."</span>";


							}else if(strlen($address)<3){

								echo "<span style='color:red'>"."Wrong Address.Please Enter Correct Address!!!"."</span>";


							}else if(filter_var($email,FILTER_VALIDATE_EMAIL)==false){

								echo "<span style='color:red'>"."Your email addres is not correct!!!"."</span>";


							} else {

								$query = "INSERT INTO contact(firstname, lastname, email, address, comment, Date) 
								Values('$firstname', '$lastnamename', '$email', '$address','$comments','$date')";
								$contact = $db->contact_insert($query);
							}
						}
						?>
						<?php
		 if(isset($_GET['msg'])){//lencode function use kora get the message;
		 	echo "<span style='color:green'>".$_GET['msg']."</span>";

		 }

		 ?>
		 <form action="contact.php" method="post">
		 	<table >
		 		<tr>
		 			<td style="font-size:17px;font-weight:bold;color:#703F54;">First Name is :</td>
		 			<td><input type="text" name ="con_username" placeholder="Please Enter your name" required="1" /></td>
		 		</tr>
		 		<tr>
		 			<td style="font-size:17px;font-weight:bold;color:#703F54;">Last Name is :</td>
		 			<td><input type="text" name ="con_userlastname"placeholder="Please Enter your Lastname" required="1" /></td>
		 		</tr>
		 		<tr>
		 			<td style="font-size:17px;font-weight:bold;color:#703F54;">Email :</td>
		 			<td><input type="text" name ="con_email" placeholder="Please Enter your Email" required="1" /></td>
		 		</tr>
		 		<tr>
		 			<td style="font-size:17px;font-weight:bold;color:#703F54;">Address :</td>
		 			<td><input type="text" name ="con_address"placeholder="Please Enter your Address" required="1"/ ></td>
		 		</tr>
		 		<tr>
		 			<td style="font-size:17px;font-weight:bold;color:#703F54;">Comments :</td>
		 			<td><textarea rows="4" cols="20" name="con_comments" placeholder="commentss"></textarea></br></td>
		 		</tr>
		 		<tr>
		 			<td></td>
		 			<td><input type="submit" name ="submit" value="Submit" >
		 				<input type="reset" name ="res" value="Clear" ></td>
		 			</tr>
		 		</table>
		 	</form>
		 </center>
		</div>
	</div>
	<div class="sideright clear">
		<h2>Our Location</h2>
		<a href="#"> <img src="image/small.jpg"alt="Facebook"/></a>

		<h2>Our Address</h2>
		<h4>ChildrenParty4U Company</h4>
		<p>150-300 Fusce non libero sed,</p>
		<p>Vestibulum velit mauris, 10800</p>
		<p><Donec nec mauris justo</p>
	</br></br>
	<h5>Tel-01682976957</br>
		Fax-016-666-556</h5>
	</div>

	<?php include 'inc/functionfooter.php';?>