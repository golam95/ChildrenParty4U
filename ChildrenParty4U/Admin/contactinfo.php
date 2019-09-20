

<?php 

include 'incadmin/header.php';
include "../lib/database.php";
include "../config/config.php";

?>

<?php
$db = new database();
if(isset($_POST['action'])){
	$Valuetosearch =$_POST['input'];
	$query = "SELECT *FROM `contact` WHERE CONCAT (`id`,`firstname`,`lastname`,`email`,`address`,`comments`) LIKE '%".$Valuetosearch."%'";
	$read = $db->select($query); 
}else{
	$query = "SELECT * FROM contact";
	$read = $db->select($query); 
}
?>


<div class="tabs">
	<div id="tab-1" class="tab">
		<article>
			<div class="text-section">
				<div class="tablecontedn">
					<h2 style="text-align:center;margin-bottom:20px;color:green;font-weight:bold;">Contact Information</h2>
					<center>

					<?php
                        if(isset($_GET['msg'])){
 	                      echo "<span style='color:green'>".$_GET['msg']."</span>";
						}
					?>
					</br></br>
						<form action="" method="post">
							<table width="80%" class="mytable"style="text-align:center;font-size:16px;color:black;font-weight:bold;">
								<tr>
									<th width="13.33%"style="font-size:20px;font-weight:bold;color:white;background:black;height:60px;">First Name</th> 
									<th width="13.33%"style="font-size:20px;font-weight:bold;color:white;background:black;">Last Name</th> 
									<th width="13.33%"style="font-size:20px;font-weight:bold;color:white;background:black;">Email Name</th> 
									<th width="13.33%"style="font-size:20px;font-weight:bold;color:white;background:black;">Address Name</th> 
									<th width="13.33%"style="font-size:20px;font-weight:bold;color:white;background:black;">Comment</th> 
									<th width="13.33%"style="font-size:20px;font-weight:bold;color:white;background:black;">Date</th> 
									<th width="13.33%"style="font-size:20px;font-weight:bold;color:white;background:black;">Action</th> 
									
								</tr>
								 

					<?php if($read){?>
					 <?php while($row = $read->fetch_assoc()){?>
					   <tr>
					  <td><?php echo $row['firstname']; ?></td>
					   <td><?php echo $row['lastname']; ?></td>
					   <td><?php echo $row['email']; ?></td>
					   <td><?php echo $row['address']; ?></td>
					   <td><?php echo $row['comment']; ?></td>
					   <td><?php echo $row['date']; ?></td>
					  <td><a href="contactdelete.php?id=<?php echo urlencode ($row['id']); ?>">Email</a></td>
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