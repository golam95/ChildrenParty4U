 

<?php 
include 'inc/headerfunction.php';
include "lib/Database.php";
include "config/config.php";
?>




	<div class="maincontented_availparty template clear">
		<div class="imageall template clear">
			
			<div class="title template clear">
				<h2 style="color:#6A3E4F;">Party Details Information</h2>
           </div>
		</div>

		<div class="tablecontedn template clear">

		 <center>


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

     <form action="" method="post">
      <table width="88%"style="text-align:center;" class="mytable">
				<tr>
					<th width="8%"bgcolor="green">Party type</th>
					<th  width="12.5%"bgcolor="green">Description</th>
					<th width="8%"bgcolor="green">Cost per child</th>
					<th width="8%"bgcolor="green">Length of party</th>
					<th width="8%"bgcolor="green">Num of Child</th>
					<th width="12.5%"bgcolor="green">Products</th>
					<th width="12.5%"bgcolor="green">Image</th>
					<th width="5%"bgcolor="green">Action</th>
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

  <td><img src="Admin/uploads/<?php echo $row['img'];?>"alt="post image"width="70px"/></td>
  <td><a href="order.php?id=<?php echo urlencode ($row['id']); ?>">Order</a></td>
 

  
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
      <?php include 'inc/functionfooter.php';?>	     



