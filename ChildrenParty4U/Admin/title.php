

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
						$date = date('Y-m-d H:i:s');
						$db = new database();
						if(isset($_POST['add'])){
							$Title = mysqli_real_escape_string($db->link, $_POST['title']);
							if($Title == ""){
								echo "<span style='color:red'>"."Field Must Not Empty!!"."</span>";

							}else{
								$query = "INSERT INTO announce(description, date) 
								Values('$Title', '$date')";

								$Addtitle = $db->insert($query);
								if($Addtitle !=false){

									echo "<span style='color:green'>"."Title Add Succefully."."</span>";
								}else{
									echo "<span style='color:Red'>"."Some Information Missing."."</span>";
								}

							}
						}
						
						?>
						<?php
							if(isset($_POST['view'])){
								header("Location:updateannunace.php");

							}



						?>

						<form action="" method="post">
							<table bgcolor="#DFEDC0" style="font-size:20px;padding:20px;border-radius:10px;border:1px solid black;width:80%;margin-top:50px;">
								<tr>
									<td style="color:black;font-size:17px;">Announce</td>
									<td><input style="margin-bottom:5px;font-size:15px;width:710px;height:30px;" type="text" name="title" value=""/></td>
								</tr>
								<tr>
									<td></td>
									<td>

										<input style="height:29px;font-size:15px;" type="submit" name="add" Value="Add" />

										<input style="height:29px;font-size:15px;" type="submit" name="view" Value="Edit" />
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