 
<?php 
include 'inc/headerfunction.php';
include "lib/Database.php";
include "config/config.php";
?>
<div class="maincontented template clear">
	<div class="imageall template clear">
		<div class="callback template clear">
			<a href="availeparty.php"><h2>Back<h2></a>
		</div>
	</div>
	<center>
		<?php
		$db = new database();
		$date = date('Y-m-d H:i:s');
    if(isset($_POST['submit'])){

      $name =mysqli_real_escape_string($db->link, $_POST['order_name']);
      $city =mysqli_real_escape_string($db->link, $_POST['city']);
      $houseno =mysqli_real_escape_string($db->link, $_POST['houseno']);
      $email =mysqli_real_escape_string($db->link, $_POST['order_email']);
      $birthday =mysqli_real_escape_string($db->link, $_POST['birthday']);
      $age =mysqli_real_escape_string($db->link, $_POST['order_age']);
      $timeslots =mysqli_real_escape_string($db->link, $_POST['selecttime']);
      $gender =mysqli_real_escape_string($db->link, $_POST['SelectGender']);
      $functiondate = mysqli_real_escape_string($db->link, $_POST['functiondate']);
      $partytype =mysqli_real_escape_string($db->link, $_POST['partytype']);
      $numberochilded =mysqli_real_escape_string($db->link, $_POST['numberofchildren']);


      if($name==""||$city==""||$houseno==""||$email==""||$birthday==""||$age==""||$functiondate==""||$numberochilded==""){

        echo "<span style='color:red'>"."Field must not empty!!!"."</span>";

      }else if(strlen($name)<3){

        echo "<span style='color:red'>"."Name field is too Short!!!"."</span>";

      }else if(strlen($city)<3){

        echo "<span style='color:red'>"."Invalid City Name!!!"."</span>";

       }else if (preg_match("/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/",$birthday)==false){

        echo "<span style='color:red'>"."Please Check your dateformate!!!"."</span>";

      }else if (preg_match("/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/",$functiondate)==false){

        echo "<span style='color:red'>"."Please Check your dateformate!!!"."</span>";


      }else if(filter_var($email,FILTER_VALIDATE_EMAIL)==false){

        echo "<span style='color:red'>"."Your email addres is not correct!!!"."</span>";

      }else if (filter_var($age, FILTER_VALIDATE_INT) === false) {

        echo "<span style='color:red'>"."Age Field must be Integer!!!"."</span>";

      }else if (filter_var($numberochilded, FILTER_VALIDATE_INT) === false) {

        echo "<span style='color:red'>"."Number of Children Field must be Integer!!!"."</span>";

      }else if (!filter_var($name, FILTER_VALIDATE_INT) === false) {


        echo "<span style='color:red'>"."Number of Children Field must be Integer!!!"."</span>";

      }else if (!filter_var($city, FILTER_VALIDATE_INT) === false) {

        echo "<span style='color:red'>"."Number of Children Field must be Integer!!!"."</span>";


      }else{

            
     $order_query = "SELECT * FROM tbl_party WHERE type = '".$partytype."'";
     $ordersuccss = $db->Retrive($order_query);
     // $chech_sql = "SELECT timeslots FROM orderinfo WHERE timeslots = '".$timeslots."'";
     $Sqldate = "SELECT functiondate FROM orderinfo WHERE functiondate = '".$functiondate."'";

     // $result = $db->link->query($chech_sql);
     $result1 = $db->link->query($Sqldate);

     if (mysqli_num_rows($result1) > 0) {
       echo "<span style='color:RED;font-weight:bold;'>"."This date is already Booked!!!"."</span></br>";

     }else{

       $query = "INSERT INTO orderinfo(name,city,houseno,email,birthday, age,timeslots, date,gender,functiondate,party,numberofchild) 
       Values('$name', '$city', '$houseno', '$email','$birthday','$age','$timeslots','$date','$gender','$functiondate','$partytype','$numberochilded')";
        $query_events = "INSERT INTO events(title,date,created,modified)
        Values('$timeslots','$functiondate','$date','$date')";
       $addevent = $db->insert($query_events);
       echo "<span style='color:green;font-weight:bold;'>"."Order is Succesfull...."."</span></br>";
       $registation = $db->insert($query);
       $numberofchild = mysqli_real_escape_string($db->link, $_POST['numberofchildren']);
       $costperchild = mysqli_real_escape_string($db->link, $_POST['costofparty']);
       $sager=$numberofchild*$costperchild;
       $error= 'Hi '.$_POST['order_name'].','."</br>".'Your Total Price is (POUND):'."$sager"." £";
       $frommoney ='GBP';
       $tomoney= trim($_POST['second']);
       if($frommoney==$tomoney){
        echo "<span style='color:red;font-weight:bold;text-align:center;'>"."Please select Another Country!!"."</span>";
      }else{ 

       function convertCurrency($from='$frommoney',$to='$tomoney',$amount='$sager'){
        $url = "http://www.google.com/finance/converter?a=$amount&from=$from&to=$to"; 
        $request = curl_init(); 
        $timeOut = 0; 
        curl_setopt ($request, CURLOPT_URL, $url); 
        curl_setopt ($request, CURLOPT_RETURNTRANSFER, 1); 
        curl_setopt ($request, CURLOPT_USERAGENT,"Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.1)"); 
        curl_setopt ($request, CURLOPT_CONNECTTIMEOUT, $timeOut); 
        $response = curl_exec($request); 
        curl_close($request); 
        $regularExpression     = '#\<span class=bld\>(.+?)\<\/span\>#s';
        preg_match($regularExpression, $response, $finalData);
        return $finalData[0];
      } 
      $convertedAmount = convertCurrency("$frommoney","$tomoney","$sager");
      $hellow= $sager."  ".$frommoney." = ".$convertedAmount;

      $message=
        'Full Name'." Md. Golam Nobi Sheikh".'<br/>
        Subject: '." Online Children Party Booking Ensure Message".'<br/>
        phone:  '."01682976957".'<br/>
        Email Us:  '."1000363@daffodil.ac".'<br/>
        Money Details with pound:  '."$error"."<br/>"."Money details with your current Money currencey"." = "."$hellow".'<br/>
        Comments:  '."Your booking has been suceefully done.Thanks for booking children party.If you want to know about us/Service or other activites please contact us...".'';

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

     $mail->AddAddress(($_POST['order_email']),($_POST['order_name']));//where received it
     $result = $mail->Send();
     $message = $result ? 'Successfully Sent!':'Sending Failed';
     unset($mail);
     header("Location:ordersuccefull.php?mehedi=".urlencode("$error"."</br>"."$hellow"));

    }

  }
}

}
?>


<?php 

$id = $_GET['id'];
$db = new database();
$query = "SELECT * FROM tbl_party WHERE id=$id";
$getData = $db->select($query)->fetch_assoc();

?>
<form action="order.php?id=<?php echo $id;?>" method="post">
 <table  bgcolor="#DFEDC0" style="font-size:20px;padding:20px;border-radius:10px;border:1px solid black;padding:6px;width:60%;">
  <tr>
   <td><label style="font-size:15px;" for="email">Customer Name</label></td>
   <td><input style ="width:200px;margin-bottom:2px;" type="text" name="order_name" value=""/></td>
 </tr>
 <tr>
   <td><label style="font-size:15px;" for="email">City</label></td>
   <td><input style ="width:200px;margin-bottom:2px;" type="text" name="city" value="" /></td>
 </tr>
 <tr>
   <td><label style="font-size:15px;" for="email">House No</label></td>
   <td><input style ="width:200px;margin-bottom:2px;" type="text" name="houseno" /></td>
 </tr>

 <tr>
   <td><label style="font-size:15px;" for="email">E-Mail</label></td>
   <td><input style ="width:200px;margin-bottom:2px;" type="text" name="order_email" /></td>
 </tr>
 <tr>
   <td><label style="font-size:15px;" for="login">Childred Birthday</label></td>
   <td><input style ="width:200px;margin-bottom:2px;height:20px;" type="text" name="birthday" placeholder="YYYY-mm-dd"/></td>
 </tr>
 <tr>
   <td><label style="font-size:15px;" for="password">Children Age</label></td>
   <td><input style ="width:200px;margin-bottom:2px;height:20px;" type="text" name="order_age" /></td>
 </tr>
 <tr>
   <td><label style="font-size:15px;" for="password">Time Slots</label></td>
   <td>  
    <select style="width:210px;height:30px;
    margin-bottom:2px;" name="selecttime"> 
    <option>Select</option>	
    <option value="9am-11am">9am-11am</option>	
    <option value="12pm-2am">12pm-2am</option>
    <option value="3pm-5pm">3pm-5pm</option>
    <option value="7pm-9pm">7pm-9pm</option>
    <option value="10pm-12am">10pm-12am</option>
  </select>						
</td>	
</select></br>
</tr>
<tr>
 <td><label style="font-size:15px;" for="Gender">Children Gender</label></td>
 <td>  
  <select style ="width:210px;margin-bottom:2px;height:30px;" name="SelectGender"> 
   <option >Select</option>	
   <option value="Male">Male</option>	
   <option value="Female">Female</option>	
 </td>
</tr>

<tr>
  <td><label style="font-size:15px;" for="functiondate">Event Date</label></td>
  <td><input style ="width:200px;margin-bottom:2px;" type="text" name="functiondate" placeholder="YYYY-mm-dd"/></td>
</tr>

<tr>
  <td><label style="font-size:15px;" for="functiondate">Party Name</label></td>
  <td> 
   <input style ="width:200px;margin-bottom:2px;" type="text" name="partytype" value="<?php echo $getData['type']?>"/>


 </td>
</tr>
<tr>
 <td><label style="font-size:15px;" for="functiondate">Number of Childred(Maximum)participate</label></td>
 <td><input style ="width:200px;margin-bottom:2px;" type="text" name="numberofchildren" value=""/></td>
</tr>
<tr>
  <td><label style="font-size:15px;"  for="costofparty">Cost of Party</label></td>
  <td><input style ="width:200px;margin-bottom:20px;" type="text" name="costofparty" value="<?php echo $getData['cost_perchild']?>"/></td>
</tr>


<tr>

 <td>
</td>
</tr> 
<tr>
  <td style="font-size:15px;">Select Your Money Currency</td>
  <td>
   <select style="width:210px;height:30px;
   margin-bottom:12px;" name="second"> 

   <option value="EUR">Euro</option>   
   <option value="USD">US Dollar</option>
   
 </select>
</td>
</tr>
</table>
</br>
<input type="submit" name="submit" value="Order" />
</br></br>
</form>
<p><?php if(!empty($message))echo $message;?><p>
</center>
</div>

<?php include 'inc/functionfooter.php';?>