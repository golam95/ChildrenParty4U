

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
					
					<center>

						<?php

						if(isset($_POST['back'])){

							header("Location:title.php");

						}else if(isset($_POST['update'])){
							$db = new database();

							$description = mysqli_real_escape_string($db->link, $_POST['TITLE']);
							$id = mysqli_real_escape_string($db->link, $_POST['ID']);
							if($description == ''){
								echo "<span style='color:green'>"."Field must not empty!!!"."</span>";
							} else {
								$query = "UPDATE announce
								SET
								description = '$description'
								WHERE id = $id";
								$update = $db->update_profile($query);
								echo "<span style='color:green'>"."Update is succefully!!!"."</span>"; 
							}


						}else if(isset($_POST['delete'])){
							$db = new database();
							$id = mysqli_real_escape_string($db->link, $_POST['ID']);

							$query = "DELETE FROM announce WHERE id=$id";

							$deleteData = $db->delete_announce($query);
							echo "<span style='color:green'>"."Delete is succefully!!!"."</span>";
						}



					

					?>
					<form action="" method="post">
						<table bgcolor="#DFEDC0" style="font-size:20px;padding:20px;border-radius:10px;border:1px solid black;width:80%;margin-top:50px;">


							<?php
							$db = new database();
							$query = "SELECT * FROM announce";
							$read = $db->select($query); 
							?>
							<?php if($read){?>
							<?php while($row = $read->fetch_assoc()){?>

							<tr>
								<td style="color:black;font-size:17px;">ID</td>
								<td><input style="margin-bottom:5px;font-size:15px;width:710px;height:30px;" type="text" name="ID" value="<?php echo $row['id']; ?>"/></td>
							</tr>
							<tr>
								<td style="color:black;font-size:17px;">Description</td>
								<td><input style="margin-bottom:5px;font-size:15px;width:710px;height:30px;" type="text" name="TITLE" value="<?php echo $row['description']; ?>"/></td>
							</tr>

							<?php } ?> 

							<?php } else {?>

							<p>Data is not available</p>

							<?php } ?>

							<tr>
								<td></td>
								<td>

									<input style="height:29px;font-size:15px;" type="submit" name="update" Value="Update" />
									<input style="height:29px;font-size:15px;" type="submit" name="delete" Value="Delete" />

									<input style="height:29px;font-size:15px;" type="submit" name="back" Value="Back" />



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