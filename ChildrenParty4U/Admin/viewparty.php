
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
					<a style="color:gray;padding:5px;" href="addpatry.php"><h2 bgcolor="red">Back</h2></a>
				</div>
				<center>

					<?php
					$db = new database();
					if(isset($_POST['add'])){
						$permited  = array('jpg', 'jpeg', 'png', 'gif');
						$file_name = $_FILES['sager']['name'];
						$file_size = $_FILES['sager']['size'];
						$file_temp = $_FILES['sager']['tmp_name'];
						$folder = "uploads/";
						move_uploaded_file($file_temp, $folder.$file_name);

						$type=mysqli_real_escape_string($db->link, $_POST['type']);
						$descripton=mysqli_real_escape_string($db->link, $_POST['decription']);
						$cost=mysqli_real_escape_string($db->link, $_POST['cost']);
						$length=mysqli_real_escape_string($db->link, $_POST['lenghtofparty']);
						$number=mysqli_real_escape_string($db->link, $_POST['attend']);
						$product=mysqli_real_escape_string($db->link, $_POST['product']);

						if( $type == '' ||  $descripton == '' || $cost == ''|| $length == ''|| $number == ''|| $product == ''){
							$error = "Field must not be Empty !!";

						}else if (filter_var($cost, FILTER_VALIDATE_INT) === false){

							echo "<span style='color:red'>"."Invalid Cost Number!!!"."</span>";

						}else if (filter_var($number, FILTER_VALIDATE_INT) === false){
							
							echo "<span style='color:red'>"."Invalid Maximum Number field!!!"."</span>";
							
						} else {
							$query = "INSERT INTO tbl_party(type, description, cost_perchild, needtime,numofchild,product,img) 
							Values('$type', '$descripton', '$cost', '$length','$number','$product','$file_name')";
							$registation = $db->insert($query);
							echo "<span style='color:green'>"."Party add Succefully!!!"."</span><br/><br/>";


						}
					}
					?>

					<form action="" method="post" enctype="multipart/form-data">
						<table bgcolor="#DFEDC0" style="font-size:20px;padding:20px;border-radius:10px;border:1px solid black;">
							<tr>
								<td style="color:black;font-size:17px;">Party Type</td>
								<td><input style="margin-bottom:5px;font-size:15px;width:210px;height:30px;" type="text" name="type" value=""/></td>
							</tr>
							<tr>
								<td style="color:black;font-size:17px;">Description</td>
								<td><input style="margin-bottom:5px;font-size:15px;width:210px;height:30px;" type="text" name="decription"
									value=""></td>
								</tr>

								<tr>
									<td style="color:black;font-size:17px;">Cost per Child</td>
									<td><input  style="margin-bottom:5px;font-size:15px;width:210px;height:30px;" type="text" name="cost" 
										value=""/></td>
									</tr>
									<tr>
										<td style="color:black;font-size:17px;">Length Of Party</td>
										<td><input style="margin-bottom:5px;font-size:15px;width:210px;height:30px;" type="text" name="lenghtofparty" 
											value=""/></td>
										</tr>
										<tr>
											<td style="color:black;font-size:17px;">Num of Child Attending</td>
											<td><input style="margin-bottom:5px;font-size:15px;width:210px;height:30px;" type="text" name="attend" 
												value=""/></td>
											</tr>
											<tr>
												<td style="color:black;font-size:17px;">Service/Products</td>
												<td><input style="margin-bottom:5px;font-size:15px;width:210px;height:30px;" type="text" name="product" 
													value=""/></td>
												</tr>
												<tr>
													<td style="color:black;font-size:17px;">Select Image</td>
													<td><input style="margin-bottom:5px;font-size:15px;width:210px;height:30px;" type="file" name="sager" value=""/></td>
												</tr>
												<tr>
													<td></td>
													<td>
														
														<input style="height:29px;font-size:15px;" type="submit" name="add" Value="Add" />
														
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