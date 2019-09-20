<?php 

include 'incadmin/header.php';
include "../lib/database.php";
include "../config/config.php";

?>

<?php 
$id = $_GET['id'];
$db = new database();
$query = "SELECT * FROM contact WHERE id=$id";
$getData = $db->select($query)->fetch_assoc();
?>

<?php
 if(isset($_POST['submit'])){//delete the window php
 	$query ="DELETE FROM contact WHERE id=$id";
 	$deleteData = $db->delete_registation($query);
 }

 ?>


 <?php
   if(isset($_POST['send'])){
        
        $message=
        'Full Name'." Md. Golam Nobi Sheikh".'<br/>
        Subject: '."Offer From ChildrenParty4U".'<br/>
        phone:  '."01682976957".'<br/>
        Email Us:  '."1000363@daffodil.ac".'<br/>
        Comments:  '.$_POST['comments'].'';

        require "PHPMailer/class.phpmailer.php";
        require "PHPMailer/class.smtp.php";
        $mail= new PHPMailer();
    //set up SMTP
        $mail->IsSMTP();
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = "ssl";
        $mail->Host ="smtp.gmail.com";
        $mail->Port =465;
        $mail->Encoding = '7bit';

    //Authentication

        $mail->Username = "golamnobi280@gmail.com";
        $mail->Password = "sager1.z";
    //compose

        $mail->SetFrom("1000363@daffodil.ac"," Golam Nobi Sheikh");
        $mail->AddReplyTo("1000363@daffodil.ac"," Golam Nobi Sheikh");
        $mail->Subject = "Contact Form ChildrenpartyforU";
        $mail->MsgHTML($message);
     //send to

     $mail->AddAddress(($_POST['email']),($_POST['email']));//where received it
     $result = $mail->Send();
     $message = $result ? 'Message Successfully Sent!':'Sending Failed Email';
     unset($mail);
    

   }
   

 ?>
 <div class="tabs">
 	<div id="tab-1" class="tab">
 		<article>
 			<div class="text-section">
 				<div class="contact_delete">
 					
 					<a style="color:gray;padding:5px;" href="contactinfo.php"><h2>Back</h2></a>
 					
 					<center>
 					<p style="color:green;"><?php if(!empty($message))echo $message;?><p>
 						<form action="contactdelete.php?id=<?php echo $id;?>" method="post">

 							<table bgcolor="#DFEDC0" style="font-size:20px;padding:20px;border-radius:10px;border:1px solid black;">
 								<tr>
 									<td style="color:black;font-size:17px;">First Name</td>
 									<td><input style="margin-bottom:5px;font-size:15px;width:210px;height:30px;" type="text" name="fistname" value="<?php echo $getData['firstname']?>"/></td>
 								</tr>
 								<tr>
 									<td style="color:black;font-size:17px;">Last Name</td>
 									<td><input style="margin-bottom:5px;font-size:15px;width:210px;height:30px;" type="text" name="lastname" value="<?php echo $getData['lastname']?>"/></td>
 									
 								</tr>

 								<tr>
 									<td style="color:black;font-size:17px;">Email</td>
 									<td><input style="margin-bottom:5px;font-size:15px;width:210px;height:30px;" type="text" name="email" value="<?php echo $getData['email']?>"/></td>
 									
 								</tr>
 								<tr>
 									<td style="color:black;font-size:17px;">Address</td>
 									<td><input style="margin-bottom:5px;font-size:15px;width:210px;height:30px; type="text" name="address" value="<?php echo $getData['address']?>"/></td>
 									
 								</tr>
 								<tr>
 									<td style="color:black;font-size:17px;">Date</td>
 									<td><input style="margin-bottom:5px;font-size:15px;width:210px;height:30px;" type="text" name="date" value="<?php echo $getData['date']?>"/></td>
 									
 								</tr>
 								<tr>
 									<td style="color:black;font-size:17px;">Comments</td>
 									<td><input style="margin-bottom:5px;font-size:15px;width:310px;height:100px;" type="textarea" name="comments" value="<?php echo $getData['comment']?>"/></td>
 									
 								</tr>
 								<tr>
 									<td></td>
 									<td>
 										
 										<input style="height:29px;font-size:15px;" type="submit" name="submit" Value="Delete" />
 										<input style="height:29px;font-size:15px;width:150px;" type="submit" name="send" Value="Send Email" />
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