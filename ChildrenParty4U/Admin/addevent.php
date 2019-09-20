


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

         
		<h2 style="text-align:center;margin-bottom:20px;color:green;font-weight:bold;">Event  Information</h2>
		<center>

<?php
$db = new database();
if(isset($_POST[''])){
	$Valuetosearch =$_POST['input'];
	$query = "SELECT *FROM `events` WHERE CONCAT (`id`,`email`,`name`,`password`,`gender`) LIKE '%".$Valuetosearch."%'";
	$read = $db->select($query); 
}else{
	$query = "SELECT * FROM  events";
	$read = $db->select($query); 
}
?>






                    <?php
                        if(isset($_GET['msg'])){
 	                      echo "<span style='color:green'>".$_GET['msg']."</span>";
						}
					?>
					<br><br/>
			<form action="" method="POST">
				<table width="80%" class="mytable"style="text-align:center;font-size:16px;">
					<tr>
						<th width="13.33%"style="font-size:20px;font-weight:bold;color:white;background:black;height:60px;">Title</th> 
						<th width="13.33%"style="font-size:20px;font-weight:bold;color:white;background:black;">Date</th> 
						<th width="13.33%"style="font-size:20px;font-weight:bold;color:white;background:black;">Submit Date</th> 
						<th width="13.33%"style="font-size:20px;font-weight:bold;color:white;background:black;">Modified Date</th> 
						<th width="13.33%"style="font-size:20px;font-weight:bold;color:white;background:black;">Status</th> 
						<th width="13.33%"style="font-size:20px;font-weight:bold;color:white;background:black;">Action</th> 
					</tr>
					
            
            <?php if($read){?>
 <?php while($row = $read->fetch_assoc()){?>
   <tr>
  <td><?php echo $row['title']; ?></td>
   <td><?php echo $row['date']; ?></td>
   <td><?php echo $row['created']; ?></td>
   <td><?php echo $row['modified']; ?></td>
   <td><?php echo $row['status']; ?></td>
  <td><a href="deletevent.php?id=<?php echo urlencode ($row['id']); ?>">Edit</a></td>
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