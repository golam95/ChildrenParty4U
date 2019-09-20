
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
					$mehedi = Session::get("id");
					$hasan = Session::get("login");
					if($hasan == true){
						?>

						<li><a href="myaccount.ph ?id =<?php echo $mehedi;?>">My Account</a></li>
						<li><a href="viewprice.php">View price  ||</a></li>
						<li><a href="availeparty.php">See Avaliabel party  ||</a></li>
						<li><a href="availedate.php">See AvailableDate  ||</a></li>
						<li><a href="?action=logout">Log Out  ||</a></li>

						<?php }else {?> 

						<li><a id="active" href="registation.php">Regisation  ||</a></li>
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
					<li><a  href="contact.php">Contact</a></li>
				</ul>
			</div>
			<div class="maincontented_gallary template clear">

				<center>
					<?php
					$db = new database();
					$date = date('Y-m-d H:i:s');
					if(isset($_POST['submit'])){
						$Email = mysqli_real_escape_string($db->link, $_POST['email']);
						$name  = mysqli_real_escape_string($db->link, $_POST['username']);
						$password = mysqli_real_escape_string($db->link, $_POST['passwordf']);
						 $gender = mysqli_real_escape_string($db->link, $_POST['SelectGender']);
                        $encriptionpasssword=md5($password);



						$sql = "SELECT email FROM user WHERE email = '$Email'";
						$result = $db->Retrive($sql); 

		         if($result !=false){
                        $check2 = mysqli_num_rows($result);

							//if the name exists it gives an error
					 if ($check2 > 0) {
					   echo "<span style='color:red'>"."Sorry email is already exit"."</span>";
					}


                     }else if( $Email == '' ||  $name == '' || $password == ''){

							echo "<span style='color:red'>"."Field is Empty"."</span>";

						}else if(strlen($name)<3){

							echo "<span style='color:red'>"."Name field is too Short"."</span>";

						}else if(strlen($encriptionpasssword)<=8){

							echo "<span style='color:red'>"."Password field is Week"."</span>";

						}else if(preg_match('/[^a-z0-9_-]+/i',$name)){

							echo "<span style='color:red'>"."Your letter have some problem"."</span>";

						}else if(filter_var($Email,FILTER_VALIDATE_EMAIL)==false){

							echo "<span style='color:red'>"."Your email addres is not correct"."</span>";


						} else {

							$query = "INSERT INTO user(email, name, password, gender,Date) 
							Values('$Email', '$name', '$encriptionpasssword', '$gender','$date')";
							$registation = $db->insert($query);
							if($registation !=false){

								echo "<span style='color:green'>"."Registation is Succefully done."."</span>";
							}else{
								echo "<span style='color:green'>"."Some Information Missing."."</span>";
							}
						}
				    	
					}
					?>

                   <?php
						 if(isset($_GET['msg'])){//lencode function use kora get the message;
						 	echo "<span style='color:green'>".$_GET['msg']."</span>";

					       }

                    ?>
 
 <form action="registation.php" method="post">
 	<h2 Style="color:#6A3E4F;font-size:20px;margin-top:5px;">SIGN-UP</h2>
 </br>
 <table  bgcolor="#DFEDC0" style="font-size:20px;padding:20px;border-radius:10px;border:1px solid black;">
 	<tr>
 		<td><label style="color:black;font-size:17px;" for="email">E-mail</label></td>
 		<td><input style="margin-bottom:5px;font-size:15px;width:210px;height:15px;" type="text" name="email"/></td>
 	</tr>
 	<tr>
 		<td><label style="color:black;font-size:17px;" for="name">Name</label></td>
 		<td><input style="margin-bottom:5px;font-size:15px;width:210px;height:15px;" type="text" name="username" /></td>
 	</tr>
 	<tr>
 		<td><label style="color:black;font-size:17px;" for="password">Password</label></td>
 		<td><input style="margin-bottom:5px;font-size:15px;width:230px;height:33px;" type="password" name="passwordf"/></td>
 	</tr>
 	<tr>
 		<td><label style="color:black;font-size:17px;" for="gender">Gender</label></td>
 		<td>  
 			<select style="color:black;font-size:17px;" name="SelectGender"> 
 				<option style="margin-bottom:5px;font-size:15px;width:218px;height:33px;" >Select</option>	
 				<option value="Male">Male</option>	
 				<option value="Female">Female</option>
 			</select>	
 		</td>
 	</tr>
 </table>
</br>
<input style="height:29px;font-size:15px;" type="submit" name="submit" class="submitbtn" value="Sign Up" />
</br></br>
<p style="height:10px;font-size:15px;" >Already Registarted <a style="color:gray;" href="login.php">Click Here..!!</a></p>
</br></br>
</form>
</center>
</div>
<?php include 'inc/functionfooter.php';?>