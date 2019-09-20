 

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
            if(isset($_POST['back'])){
            	header("Location:loginpanel.php");

            }

		?>

		     <?php
					$db = new database();
					
					if(isset($_POST['submit'])){
						$username= mysqli_real_escape_string($db->link, $_POST['rName']);
						$password  = mysqli_real_escape_string($db->link, $_POST['rPassword']);
						$encriptionpasssword=md5($password);



						$sql = "SELECT username FROM tbl_admin WHERE username = '$username'";
						$result = $db->Retrive($sql); 

		         if($result !=false){
                        $check2 = mysqli_num_rows($result);

							//if the name exists it gives an error
					 if ($check2 > 0) {
					   echo "<span style='color:red'>"."Sorry Username is already exit"."</span>";
					}


                     }else if( $username == '' ||  $password == ''){

							echo "<span style='color:red'>"."Field is Empty"."</span>";

						}else if(strlen($username)<3){

							echo "<span style='color:red'>"."Name field is too Short"."</span>";

						}else if(strlen($password)<=8){

							echo "<span style='color:red'>"."Password field is Week"."</span>";

						}else if(preg_match('/[^a-z0-9_-]+/i',$username)){

							echo "<span style='color:red'>"."Your letter have some problem"."</span>";

					

						} else {

							$query = "INSERT INTO tbl_admin(username, password) 
							Values('$username', '$encriptionpasssword')";
							$registation = $db->insert($query);
							if($registation !=false){

								echo "<span style='color:green'>"."Registation is Succefully Done."."</span>";
							}else{
								echo "<span style='color:Red'>"."Some Information Missing."."</span>";
							}
						}
				    	
					}
					?>

		
			<form action="" method="post">
				<h2 Style="color:#6A3E4F;">Admin Registation From</h2>
			</br>
			<table bgcolor="#DFEDC0" style="padding:20px;font-size:21px;border:1px solid black;"cellspacing="4">
				<tr>
					<td><label style="font-size:17px;" for="User Name">User Name</label></td>
					<td><input type="text" name="rName" /></td>
				</tr>
				<tr>
					<td><label style="font-size:17px;" for="password">Password</label></td>
					<td><input type="password" name="rPassword" /></td>
				</tr>
				
			</table>
		</br>
		<input bgcolor="#830505" type="submit" name="submit" class="submitbtn" value="Sign Up"/>
		<input bgcolor="#830505" type="submit" name="back" class="submitbtn" value="Back"/>
		
	</br>
</br>

</br>
</form>
</center>

</div>
<?php include 'incadmin/footer.php';?>