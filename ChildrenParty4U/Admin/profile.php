

<?php 

include 'incadmin/header.php';
include "../lib/database.php";
include "../config/config.php";
?>

<div class="tabs">
	<div id="tab-1" class="tab">
		<article>
			<div class="text-section">
				<div class="contact_delete">
					
				</div>
				<br/><br/><br/><br/><br/>
				<center>

					<?php 
					$db = new database();
					$id = $_GET['id'];
					$query = "SELECT * FROM tbl_admin WHERE id=$id";
					$getData = $db->select($query)->fetch_assoc();

					if(isset($_POST['Update'])){

						$username=mysqli_real_escape_string($db->link, $_POST['name']);
						$password=mysqli_real_escape_string($db->link, $_POST['password']);
						$Repassword=md5($password);

						if( $username == '' || $password == ''){

							echo "<span style='color:red'>"."Field is Empty"."</span>";

						}else if(strlen($username)<3){

							echo "<span style='color:red'>"."Name field is too Short"."</span>";


						}else if(preg_match('/[^a-z0-9_-]+/i',$username)){

							echo "<span style='color:red'>"."Your letter have some problem"."</span>";

						} else {

							$query = "UPDATE tbl_admin
							SET
							username = '$username',
							password = '$password'
							WHERE id = $id";
							$update = $db->update_profile($query);
							echo "<span style='color:green'>"."Update is Successful"."</span>";
							
						}

					}
					?>
					<br/><br/><br/>

					<form action="profile.php?id=<?php echo $id;?>" method="post">
						<table bgcolor="#DFEDC0" style="font-size:20px;padding:20px;border-radius:10px;border:1px solid black;">
							<tr>
								<td style="color:black;font-size:17px;">User Name</td>
								<td><input style="margin-bottom:5px;font-size:15px;width:210px;height:30px;" type="text" name="name" value="<?php echo $getData['username']?>"/></td>
							</tr>
							<tr>
								<td style="color:black;font-size:17px;">User Password</td>
								<td><input style="margin-bottom:5px;font-size:15px;width:210px;height:30px;" type="text" name="password" value="<?php echo $getData['password']?>"/></td>
							</tr>
							
							<tr>
								<td></td>
								<td>
									<input style="height:29px;font-size:15px;" type="submit" name="Update" value="Update"/>
									

									
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