 
<?php 
include '../lib/Session.php';
Session::init();
?>
<?php
include "../lib/database.php";
include "../config/config.php";
?>

<!DOCTYPE HTML>
<html>
<head>
	<title>ChildrenParty4U</title>
	<link rel="stylesheet"href="game.css"/> 
	<link rel="stylesheet"href="regisation.css"/>
</head>
<body>
	<div style= "text-align:center;color:white;"class="headersection  clear">
		<h2>ChildrenParty4U </h2>
	</div>
	
	<div style="background:#DDE2E8;" class="maincontented template clear">
		<div class="imageall template clear">
			<div class="subimage template clear">
				<a href="#"><img src="images/num.jpg"alt="post image"/></a>
			</div>
		</div>
		<center>
			<?php 
			$db = new database();
			if($_SERVER['REQUEST_METHOD'] == 'POST'){
				$username = mysqli_real_escape_string($db->link, $_POST['Name']);
				$password = mysqli_real_escape_string($db->link, $_POST['Password']);
				$encriptonpassword=md5($password);

				$query = "SELECT * FROM tbl_admin WHERE username ='$username' AND password = '$encriptonpassword'";

				$result = $db->Retrive($query); 
				if($result !=false){
					$value = mysqli_fetch_array($result);
					$row = mysqli_num_rows($result);
					if($row>0){
						Session:: set("login", true);
						Session::set("username", $value['username']);
						Session::set("userid", $value['id']);
						header("Location:index.php");


					}else{
						echo "No result found";
					}

				}else{
					echo "<span style='color:RED;'>"."Not Match!!!Try Again..."."</span></br>";
				}
			}

			?>
			<?php
              if(isset($_POST['reg'])){
              	header("Location:registationadmin.php");

              }
			?>
			<form action="" method="post">
				<h2 Style="color:#6A3E4F;">Admin LogIn Panel</h2>
			</br>
			<table bgcolor="#DFEDC0" style="padding:20px;font-size:21px;border:1px solid black;"cellspacing="4">
				<tr>
					<td><label style="font-size:17px;" for="name">Name</label></td>
					<td><input type="text" name="Name" /></td>
				</tr>
				<tr>
					<td><label style="font-size:17px;" for="password">Password</label></td>
					<td><input type="password" name="Password" /></td>
				</tr>
				
			</table>
		</br>
		<input bgcolor="#830505" type="submit" name="submit" class="submitbtn" value="Log In" />
		<input bgcolor="#830505" type="submit" name="reg" class="submitbtn" value="Signup" />
	</br>
</br>

</br>
</form>
</center>

</div>
<?php include 'incadmin/footer.php';?>