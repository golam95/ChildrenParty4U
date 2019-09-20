 


<?php 
include 'inc/headerfunction.php';
include "lib/Database.php";
include "config/config.php";
?>

<center> 
	<?php 
	$db = new database();
	$id = $_GET['id'];
	$query = "SELECT * FROM user WHERE id=$id";
	$getData = $db->select($query)->fetch_assoc();

	if(isset($_POST['Update'])){

		$email=mysqli_real_escape_string($db->link, $_POST['email']);
		$name=mysqli_real_escape_string($db->link, $_POST['name']);
		$password=mysqli_real_escape_string($db->link, $_POST['confirmpass']);
		$Repassword=md5($password);

          if( $email == '' ||  $name == '' || $password == ''){

				echo "<span style='color:red'>"."Field is Empty"."</span>";

			}else if(strlen($name)<3){

				echo "<span style='color:red'>"."Name field is too Short"."</span>";

			}else if(strlen($password)<=8){

				echo "<span style='color:red'>"."Password field is Week"."</span>";

			}else if(preg_match('/[^a-z0-9_-]+/i',$name)){

				echo "<span style='color:red'>"."Your letter have some problem"."</span>";

			}else if(filter_var($email,FILTER_VALIDATE_EMAIL)==false){

				echo "<span style='color:red'>"."Your email addres is not correct"."</span>";


			} else {
				$query = "UPDATE user
				SET
				email = '$email',
				name  = '$name',
				password = '$password'
				WHERE id = $id";
				$update = $db->update_profile($query);
				echo "<span style='color:green'>"."Update is Successful"."</span>";
			}
		
	}
?>

















		<form action="myaccount.php?id=<?php echo $id;?>" method="post">
			<h2 Style="color:#6A3E4F;">Update Profile</h2>
		</br>
		<table  bgcolor="#DFEDC0" style="font-size:20px;padding:20px;border-radius:10px;border:1px solid black;">
			<tr>
				<td><label for="email">E-mail</label></td>
				<td><input type="text" name="email" value="<?php echo $getData['email']?>"/></td>
			</tr>
			<tr>
				<td><label for="login">Name</label></td>
				<td><input type="text" name="name" value="<?php echo $getData['name']?>"/></td>
			</tr>

			<tr>
				<td><label for="confirmpass">Password</label></td>
				<td><input type="text" name="confirmpass" value="<?php echo $getData['password']?>"/></td>
			</tr>

		</table>
	</br>
	<input type="submit" name="Update" class="updatebutton" value="Update" />

</br></br>
</form>
</center>
<?php include 'inc/functionfooter.php';?>