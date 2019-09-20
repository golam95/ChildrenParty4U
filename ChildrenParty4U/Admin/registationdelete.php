
<?php 

include 'incadmin/header.php';
include "../lib/database.php";
include "../config/config.php";
?>

<?php 
$id = $_GET['id'];
$db = new database();
$query = "SELECT * FROM user WHERE id=$id";
$getData = $db->select($query)->fetch_assoc();


if(isset($_POST['submit'])){
	$email = mysqli_real_escape_string($db->link, $_POST['email']);
	$name  = mysqli_real_escape_string($db->link, $_POST['up_name']);
	$password = mysqli_real_escape_string($db->link, $_POST['up_passwordf']);
	$gender = mysqli_real_escape_string($db->link, $_POST['up_gender']);
	echo "acces the code";

	if( $email == '' ||  $name == '' || $password == ''){
		 echo "<span style='color:Red'>"."Field must not empty!!!"."</span>";
	} else {
		$query = "UPDATE user
		SET
		email = '$email',
		name  = '$name',
		password = '$password',
		gender = '$$gender'
		WHERE id = $id";
		$update = $db->update_registation($query);
	}
}
?>

<?php
if(isset($_POST['delete'])){//delete the window php
	$query = "DELETE FROM user WHERE id=$id";
	$deleteData = $db->del_registation($query);
}
?>


<?php 
if(isset($error)){
	echo "<span style='color:red'>".$error."</span>";
}
?>

<?php
 if(isset($_GET['msg'])){//lencode function use kora get the message;
 	echo "<span style='color:green'>".$_GET['msg']."</span>";
}
?>



 <div class="tabs">
 	<div id="tab-1" class="tab">
 		<article>
 			<div class="text-section">
 				<div class="contact_delete">
 					
 						<a style="color:gray;padding:5px;" href="registation.php"><h2 bgcolor="red">Back</h2></a>
 					</div>
 					<center>

 						<form action="registationdelete.php?id=<?php echo $id;?>" method="post">

 							<table bgcolor="#DFEDC0" style="font-size:20px;padding:20px;border-radius:10px;border:1px solid black;"
 								<tr>
 									<td style="color:black;font-size:17px;">Email</td>
 									<td><input style="margin-bottom:5px;font-size:15px;width:210px;height:30px;" type="text" name="email" value="<?php echo $getData['email']?>"/></td>

 								</tr>
 								<tr>
 									<td style="color:black;font-size:17px;">Name</td>

 									<td><input style="margin-bottom:5px;font-size:15px;width:210px;height:30px;" type="text" name="up_name" value="<?php echo $getData['name']?>"/></td>
 								</tr>

 								<tr>
 									<td style="color:black;font-size:17px;">Password</td>


 									<td><input style="margin-bottom:5px;font-size:15px;width:210px;height:30px;" type="password" name="up_passwordf" value="<?php echo $getData['password']?>"/></td>
 								</tr>
 								<tr>
 									<td style="color:black;font-size:17px;">Gender</td>

 									<td><input style="margin-bottom:5px;font-size:15px;width:210px;height:30px;" type="text" name="up_gender" value="<?php echo $getData['gender']?>"/></td>
 								</tr>
 								<tr>
 									<td style="color:black;font-size:17px;">Registation Date</td>
 									<td><input style="margin-bottom:5px;font-size:15px;width:210px;height:30px;" type="text" id="MyDatepicker" value="<?php echo $getData['date']?>"/></td>

 								</tr>
 								<tr>
 									<td></td>
 									<td>
 										<input style="height:29px;font-size:15px;" type="submit" name="submit" value="Update"/>
 										<input style="height:29px;font-size:15px;" type="submit" name="delete" Value="Delete" />
 									</td>
 								</tr>
 							</table>
 						</form>
 					</center>

 				</div>

 			</div>
 		</article>
 	</div>
 </div>
</div>
</div>

</div>
<?php include 'incadmin/footer.php';?>