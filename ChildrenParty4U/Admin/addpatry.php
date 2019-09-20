<?php 

include 'incadmin/header.php';
include "../lib/database.php";
include "../config/config.php";

?>

<?php
$db = new database();
if(isset($_POST[''])){
	$Valuetosearch =$_POST['input'];
	$query = "SELECT *FROM `user` WHERE CONCAT (`id`,`email`,`name`,`password`,`gender`) LIKE '%".$Valuetosearch."%'";
	$read = $db->select($query); 
}else{
	$query = "SELECT * FROM tbl_party";
	$read = $db->select($query); 

}
?>


<div class="tabs">
	<div id="tab-1" class="tab">
		<article>
			<div class="text-section">
				<div class="tablecontedn">
					<h2 style="text-align:center;margin-bottom:20px;color:green;font-weight:bold;">Party Information</h2>
					<center>

					<?php
                        if(isset($_GET['msg'])){
 	                      echo "<span style='color:green'>".$_GET['msg']."</span>";
						}
					?>
					<br><br/>
						<form>
							<table width="80%" class="mytable"style="text-align:center;font-size:16px;color:black;font-weight:bold;">
								<tr>
									<th width="11.42%"style="font-size:20px;font-weight:bold;color:white;background:black;height:60px;">Type</th> 
									<th width="11.42%"style="font-size:20px;font-weight:bold;color:white;background:black;">Description</th> 
									<th width="11.42%"style="font-size:20px;font-weight:bold;color:white;background:black;">Cost Per Child</th> 
									<th width="11.42%"style="font-size:20px;font-weight:bold;color:white;background:black;">Length party</th> 
									<th width="11.42%"style="font-size:20px;font-weight:bold;color:white;background:black;">Num of Child Attend(Max)</th> 
									<th width="11.42%"style="font-size:20px;font-weight:bold;color:white;background:black;">Product</th> 
									<th width="11.42%"style="font-size:20px;font-weight:bold;color:white;background:black;">Image</th>
									<th width="13.33%"style="font-size:20px;font-weight:bold;color:white;background:black;">Action</th> 
								</tr>
								

<?php if($read){?>
 <?php while($row = $read->fetch_assoc()){?>
   <tr>
  <td><?php echo $row['type']; ?></td>
   <td><?php echo $row['description']; ?></td>
   <td><?php echo $row['cost_perchild']; ?></td>
   <td><?php echo $row['needtime']; ?></td>
   <td><?php echo $row['numofchild']; ?></td>
   <td><?php echo $row['product']; ?></td>
    <td><img src="uploads/<?php echo $row['img'];?>"alt="post image height="70" width="70""/></td>
   <td><a href="deleteparty.php?id=<?php echo urlencode ($row['id']); ?>">Edit</a></td>
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


