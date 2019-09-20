

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
					<a tyle="color:gray;padding:5px;" href="orderinfo.php"><h2 bgcolor="red">Back</h2></a>
				</div>
				<center>


			     <?php 
					$id = $_GET['id'];
					$db = new database();
					$query = "SELECT * FROM orderinfo WHERE id=$id";
					$getData = $db->select($query)->fetch_assoc();


					if(isset($_POST['submit'])){

        				$name =mysqli_real_escape_string($db->link, $_POST['order_name']);
        				$city =mysqli_real_escape_string($db->link, $_POST['city']);
        				$houseno =mysqli_real_escape_string($db->link, $_POST['houseno']);
        				$email =mysqli_real_escape_string($db->link, $_POST['email']);
        				$birthday =mysqli_real_escape_string($db->link, $_POST['birthday']);
        				$age =mysqli_real_escape_string($db->link, $_POST['order_age']);
        				$timeslots =mysqli_real_escape_string($db->link, $_POST['selecttime']);
                        $Date =mysqli_real_escape_string($db->link, $_POST['Date']);
                        $gender =mysqli_real_escape_string($db->link, $_POST['SelectGender']);
                        $functiondate = mysqli_real_escape_string($db->link, $_POST['functiondate']);
                        $partytype =mysqli_real_escape_string($db->link, $_POST['partytype']);
                      $numberochilded =mysqli_real_escape_string($db->link, $_POST['numberofchildren']);

						

						if( $email == '' ||  $name == ''){
							 echo "<span style='color:green'>"."Field must not empty!!!"."</span>";
						} else {
							$query = "UPDATE orderinfo
							SET
							name = '$name ',
							city  = '$city',
							houseno = '$houseno',
							email = '$email',
							birthday = '$birthday',
							age = '$age',
							timeslots = '$timeslots',
							date = '$Date',
							gender = '$gender',
                            functiondate = '$functiondate',
							party = '$partytype',
							numberofchild = '$numberochilded'
							WHERE id = $id";
							$update = $db->update_order($query);

						}
					}
					?>

					<?php
					if(isset($_POST['delete'])){//delete the window php
						$query = "DELETE FROM orderinfo WHERE id=$id";
						$deleteData = $db->delete_order($query);
					}
					?>

                   <form action="orderdelete.php?id=<?php echo $id;?>" method="post">

						<table bgcolor="#DFEDC0" style="font-size:20px;padding:20px;border-radius:10px;border:1px solid black;">
							<tr>
								<td style="color:black;font-size:17px;">Name</td>
								<td><input style="margin-bottom:5px;font-size:15px;width:210px;height:30px;" type="text" name="order_name" value="<?php echo $getData['name']?>"/></td>
							</tr>
							<tr>
								<td style="color:black;font-size:17px;">City</td>
								<td><input style="margin-bottom:5px;font-size:15px;width:210px;height:30px;" type="text" name="city"
									value="<?php echo $getData['city']?>"/></td>
								</tr>

								<tr>
									<td style="color:black;font-size:17px;">House No</td>
									<td><input style="margin-bottom:5px;font-size:15px;width:210px;height:30px;" type="text" name="houseno" 
										value="<?php echo $getData['houseno']?>"/></td>

									</tr>


									<tr>
										<td style="color:black;font-size:17px;">E-mail</td>
										<td><input style="margin-bottom:5px;font-size:15px;width:210px;height:30px;" type="text" name="email" 
											value="<?php echo $getData['email']?>"/></td>
										</tr>

										<tr>
											<td style="color:black;font-size:17px;">Birthday</td>
											<td><input style="margin-bottom:5px;font-size:15px;width:210px;height:30px;" type="text" name="birthday" 
												value="<?php echo $getData['birthday']?>"/></td>
											</tr>

                                              <tr>
												<td style="color:black;font-size:17px;">Age</td>
												<td><input style="margin-bottom:5px;font-size:15px;width:210px;height:30px;" type="text" name="order_age" 
													value="<?php echo $getData['age']?>"/></td>
												</tr>

                                                 <tr>
													<td style="color:black;font-size:17px;">Time Slots</td>
													<td><input style="margin-bottom:5px;font-size:15px;width:210px;height:30px;" type="text" name="selecttime" 
														value="<?php echo $getData['timeslots']?>"/></td>
													</tr>

                                                      <tr>
														<td style="color:black;font-size:17px;">Submission Date</td>
														<td><input style="margin-bottom:5px;font-size:15px;width:210px;height:30px;" type="text" name="Date" 
															value="<?php echo $getData['date']?>"/></td>
														</tr>

                                                         <tr>
															<td style="color:black;font-size:17px;">Gender</td>
															<td><input style="margin-bottom:5px;font-size:15px;width:210px;height:30px;" type="text" name="SelectGender" 
																value="<?php echo $getData['gender']?>"/></td>
														</tr>

                                                      <tr>
														<td style="color:black;font-size:17px;">Function Date</td>
														<td><input style="margin-bottom:5px;font-size:15px;width:210px;height:30px;" type="text" name="functiondate" 
															value="<?php echo $getData['functiondate']?>"/></td>
														</tr>

                                                     <tr>
														<td style="color:black;font-size:17px;">Party Type</td>
														<td><input style="margin-bottom:5px;font-size:15px;width:210px;height:30px;" type="text" name="partytype" 
															value="<?php echo $getData['party']?>"/></td>
														</tr>

                                                      <tr>
														<td style="color:black;font-size:17px;">Total Child</td>
														<td><input style="margin-bottom:5px;font-size:15px;width:210px;height:30px;" type="text" name="numberofchildren" 
															value="<?php echo $getData['numberofchild']?>"/></td>
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