
          


			<?php

			
include 'incadmin/header.php';
include "../lib/database.php";
include "../config/config.php";
?>
			
         <div class="tabs">
					<div id="tab-1" class="tab">
						<article>
							<div class="text-section">
				<div class="tablecontedn">
				 <h2 style="text-align:center;margin-bottom:20px;color:green;font-weight:bold;">Order Information</h2>
				 <center>

				      <?php
							$db = new database();
							if(isset($_POST['action'])){
								$Valuetosearch =$_POST['input'];
								$query = "SELECT *FROM `orderinfo` WHERE CONCAT (`id`,`email`,`name`,`password`,`gender`) LIKE '%".$Valuetosearch."%'";
								$read = $db->select($query); 
							}else{
								$query = "SELECT * FROM orderinfo";
								$read = $db->select($query); 
							}
							?>


                    



					<?php
                        if(isset($_GET['msg'])){
 	                      echo "<span style='color:green'>".$_GET['msg']."</span>";
						}
					?>
					<br><br/>



					<form action="" method="post">
					<table width="90%" class="mytable"style="text-align:center;font-size:16px;">
					  <tr>
					   <th width="8%"style="font-size:16px;font-weight:bold;color:white;background:black;height:60px;">Name</th> 
					   <th width="8%"style="font-size:16px;font-weight:bold;color:white;background:black;">City</th> 
					   <th width="8%"style="font-size:16px;font-weight:bold;color:white;background:black;">House No</th> 
					   <th width="8%"style="font-size:16px;font-weight:bold;color:white;background:black;">E-mail</th> 
					  <th width="8%"style="font-size:16px;font-weight:bold;color:white;background:black;">Children Birthday</th> 
					  
					  <th width="8%"style="font-size:16px;font-weight:bold;color:white;background:black;">Age</th> 
					  <th width="8%"style="font-size:16px;font-weight:bold;color:white;background:black;">Time Slots</th> 
					  <th width="8%"style="font-size:16px;font-weight:bold;color:white;background:black;">Create Date</th> 
					  <th width="8%"style="font-size:16px;font-weight:bold;color:white;background:black;">Gender</th> 
					  <th width="8%"style="font-size:16px;font-weight:bold;color:white;background:black;">Fun/Date</th> 
					  <th width="8%"style="font-size:16px;font-weight:bold;color:white;background:black;">Party</th> 
					  <th width="8%"style="font-size:16px;font-weight:bold;color:white;background:black;">Total Child</th> 



					  <th width="8%"style="font-size:16px;font-weight:bold;color:white;background:black;">Action</th> 
					  </tr>
					 

					 <?php if($read){?>
							 <?php while($row = $read->fetch_assoc()){?>
							   <tr>
							  <td><?php echo $row['name']; ?></td>
							   <td><?php echo $row['city']; ?></td>
							   <td><?php echo $row['houseno']; ?></td>
							   <td><?php echo $row['email']; ?></td>
							   <td><?php echo $row['birthday']; ?></td>

							      <td><?php echo $row['age']; ?></td>
							      <td><?php echo $row['timeslots']; ?></td>
							       <td><?php echo $row['date']; ?></td>
							       <td><?php echo $row['gender']; ?></td>
							       <td><?php echo $row['functiondate']; ?></td>
							       <td><?php echo $row['party']; ?></td>
							       <td><?php echo $row['numberofchild']; ?></td>


							  <td><a href="orderdelete.php?id=<?php echo urlencode ($row['id']); ?>">Edit</a></td>
							   </tr>
							   <?php } ?> 
							 <?php } else {?>
							    <p>Data is not available</p>
						 <?php } ?>





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