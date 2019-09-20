<?php 

include 'incadmin/header.php';
include "../lib/database.php";
include "../config/config.php";
?>

<?php 
$id = $_GET['id'];
$db = new database();
$query = "SELECT * FROM events WHERE id=$id";
$getData = $db->select($query)->fetch_assoc();


if(isset($_POST['submit'])){
	$title = mysqli_real_escape_string($db->link, $_POST['title']);
	$date  = mysqli_real_escape_string($db->link, $_POST['date_event']);
	$created = mysqli_real_escape_string($db->link, $_POST['submitdate']);
	$modified = mysqli_real_escape_string($db->link, $_POST['updatedate']);
	$status= mysqli_real_escape_string($db->link, $_POST['Status']);
	

	if( $title == '' ||  $date == '' || $created == ''|| $modified == ''|| $status == ''){
		$error = "Field must not be Empty !!";
	} else {
		$query = "UPDATE events
		SET
		title = '$title',
		date  = '$date',
		created = '$created',
		modified = '$modified',
		status = '$status'
		WHERE id = $id";
		$update = $db->update_event($query);
	}
}
?>

<?php
if(isset($_POST['delete'])){//delete the window php
	$query = "DELETE FROM events WHERE id=$id";
	$deleteData = $db->del_event($query);
}
?>

<div class="tabs">
	<div id="tab-1" class="tab">
		<article>
			<div class="text-section">
				<div class="contact_delete">
						<a style="color:gray;padding:5px;" href="addevent.php"><h2 bgcolor="red">Back</h2></a>
					</div>
					<center>
                    


						<form action="deletevent.php?id=<?php echo $id;?>" method="post">
							<table bgcolor="#DFEDC0" style="font-size:20px;padding:20px;border-radius:10px;border:1px solid black;">
								<tr>
									<td style="color:black;font-size:17px;">Title</td>
									<td><input style="margin-bottom:5px;font-size:15px;width:210px;height:30px;" type="text" name="title" value="<?php echo $getData['title']?>"/></td>
								</tr>
								<tr>
									<td style="color:black;font-size:17px;">Date</td>
									<td><input style="margin-bottom:5px;font-size:15px;width:210px;height:30px;" type="text" name="date_event"
										value="<?php echo $getData['date']?>"></td>
									</tr>
									<tr>
										<td style="color:black;font-size:17px;">Submit Date</td>
										<td><input style="margin-bottom:5px;font-size:15px;width:210px;height:30px;" type="text" name="submitdate" 
											value="<?php echo $getData['created']?>"/></td>
										</tr>
										<tr>
											<td style="color:black;font-size:17px;">Modified Date</td>
											<td><input style="margin-bottom:5px;font-size:15px;width:210px;height:30px;" type="text" name="updatedate" 
												value="<?php echo $getData['modified']?>"/></td>
											</tr>
											<tr>
												<td style="color:black;font-size:17px;">Status</td>
												<td><input style="margin-bottom:5px;font-size:15px;width:210px;height:30px;" type="text" name="Status" 
													value="<?php echo $getData['status']?>"/></td>
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