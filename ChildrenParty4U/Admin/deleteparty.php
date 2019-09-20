
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
					$id = $_GET['id'];
					$db = new database();
					$query = "SELECT * FROM tbl_party WHERE id=$id";
					$getData = $db->select($query)->fetch_assoc();
					if(isset($_POST['submit'])){
						$permited  = array('jpg', 'jpeg', 'png', 'gif');
						$file_name = $_FILES['img']['name'];
						$file_size = $_FILES['img']['size'];
						$file_temp = $_FILES['img']['tmp_name'];
						
						$type=mysqli_real_escape_string($db->link, $_POST['type']);
						$descripton=mysqli_real_escape_string($db->link, $_POST['decription']);
						$cost=mysqli_real_escape_string($db->link, $_POST['cost']);
						$length=mysqli_real_escape_string($db->link, $_POST['lenghtofparty']);
						$number=mysqli_real_escape_string($db->link, $_POST['attend']);
						$product=mysqli_real_escape_string($db->link, $_POST['product']);

						$folder = "uploads/";
						move_uploaded_file($file_temp, $folder.$file_name);

						if( $type == '' ||  $descripton == '' || $cost == ''|| $length == ''|| $number == ''|| $product == ''){
							echo "<span style='color:red'>"."Field Must Not Empty."."</span>";
						} else {
							$query = "UPDATE tbl_party
							SET
							type = '$type',
							description  = '$descripton',
							cost_perchild = '$cost',
							needtime = '$length',
							numofchild = '$number',
							product = '$product',
							img = '$file_name'
							WHERE id = $id";
							$update = $db->update_party($query);
						}
					}
					?>

					<?php 
					$id = $_GET['id'];
					$db = new database();
					$query = "SELECT * FROM tbl_party WHERE id=$id";
					$getData = $db->select($query)->fetch_assoc();
					if(isset($_POST['without'])){
						$permited  = array('jpg', 'jpeg', 'png', 'gif');
						$file_name = $_FILES['img']['name'];
						$file_size = $_FILES['img']['size'];
						$file_temp = $_FILES['img']['tmp_name'];
						
						$type=mysqli_real_escape_string($db->link, $_POST['type']);
						$descripton=mysqli_real_escape_string($db->link, $_POST['decription']);
						$cost=mysqli_real_escape_string($db->link, $_POST['cost']);
						$length=mysqli_real_escape_string($db->link, $_POST['lenghtofparty']);
						$number=mysqli_real_escape_string($db->link, $_POST['attend']);
						$product=mysqli_real_escape_string($db->link, $_POST['product']);

						$folder = "uploads/";
						move_uploaded_file($file_temp, $folder.$file_name);

						if( $type == '' ||  $descripton == '' || $cost == ''|| $length == ''|| $number == ''|| $product == ''){
							echo "<span style='color:red'>"."Field Must Not Empty."."</span>";
						} else {
							$query = "UPDATE tbl_party
							SET
							type = '$type',
							description  = '$descripton',
							cost_perchild = '$cost',
							needtime = '$length',
							numofchild = '$number',
							product = '$product'
							WHERE id = $id";
							$update = $db->update_party($query);
						}
					}
					?>

					<?php
					$id = $_GET['id'];
							if(isset($_POST['delete'])){//delete the window php

								$getquery = "SELECT * from tbl_party where id='$id'";
								$getImg = $db->select($getquery);
								if ($getImg) {
									while ($imgdata = $getImg->fetch_assoc()) {
										$delimg = $imgdata['img'];
									    unlink($delimg);
									}
								}

								$query = "DELETE FROM tbl_party WHERE id=$id";
								$deleteData = $db->delete_party($query);
							}
							?>






							<form action="deleteparty.php?id=<?php echo $id;?>" method="post" enctype="multipart/form-data">
								<table bgcolor="#DFEDC0" style="font-size:20px;padding:20px;border-radius:10px;border:1px solid black;">
									<tr>
										<td style="color:black;font-size:17px;">Party Type</td>
										<td><input style="margin-bottom:5px;font-size:15px;width:370px;height:30px;" type="text" name="type" value="<?php echo $getData['type']?>"/></td>
									</tr>
									<tr>
										<td style="color:black;font-size:17px;">Description</td>
										<td><input style="margin-bottom:5px;font-size:15px;width:370px;height:30px; type="text" name="decription"
											value="<?php echo $getData['description']?>"></td>
										</tr>

										<tr>
											<td style="color:black;font-size:17px;">Cost per Child</td>
											<td><input style="margin-bottom:5px;font-size:15px;width:370px;height:30px;" type="text" name="cost" 
												value="<?php echo $getData['cost_perchild']?>"/></td>
											</tr>
											<tr>
												<td style="color:black;font-size:17px;">Length Of Party</td>
												<td><input style="margin-bottom:5px;font-size:15px;width:370px;height:30px;" type="text" name="lenghtofparty" 
													value="<?php echo $getData['needtime']?>"/></td>
												</tr>
												<tr>
													<td style="color:black;font-size:17px;">Num of Child Attending</td>
													<td><input style="margin-bottom:5px;font-size:15px;width:370px;height:30px;" type="text" name="attend" 
														value="<?php echo $getData['numofchild']?>"/></td>
													</tr>
													<tr>
														<td style="color:black;font-size:17px;">Service/Products</td>
														<td><input style="margin-bottom:5px;font-size:15px;width:210px;height:30px;" type="text" name="product" 
															value="<?php echo $getData['product']?>"/></td>
														</tr>
														<tr>
															<td style="color:black;font-size:17px;">Select Image</td>
															<td><input style="margin-bottom:5px;font-size:15px;width:370px;height:30px;" type="file" name="img" value="<img src=" uploads/<?php echo $getData['img'];?>"/></td>
															
															<tr>
																<td></td>
																<td>
																	<input style="height:29px;font-size:15px;width:150px;" type="submit" name="submit" value="Update With Image"/>
																	<input style="height:29px;font-size:15px;width:150px;" type="submit" name="without" value="Update Without Image"/>
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