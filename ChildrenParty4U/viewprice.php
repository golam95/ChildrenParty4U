
 <?php include 'inc/headerfunction.php';?>
 
 <center>


<?php
if(isset($_POST['convery'])){
	if (($_POST['first'] != "") &&($_POST['second'] != "")&& ($_POST['money'] != "")){
	$frommoney =trim($_POST['first']);
	$tomoney= trim($_POST['second']);
	$money= trim($_POST['money']);
	if($frommoney==$tomoney){
		echo "<span style='color:red;font-weight:bold;text-align:center;'>"."Please select Another Country!!"."</span>";
	  
		
		}else{ 
			
		function convertCurrency($from='$frommoney',$to='$tomoney',$amount='$money'){
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
    $convertedAmount = convertCurrency("$frommoney","$tomoney","$money");
		
		echo "<span style='color:Green;font-weight:bold;'>".$money."  ".$frommoney." = ".$convertedAmount;"</span>";
	}
	
}else{
	echo "<span style='color:red;font-weight:bold;'>"."Field is Empty!!"."</span>";
}

}
?>
 <br/>
     <h3 style="color:#6A3E4F;font-weight:bold;">Money Currencey</h3>
<br/>

	   <form action="" method="POST">
	   
	     <table bgcolor="#DFEDC0" style="font-size:20px;padding:20px;border-radius:10px;border:1px solid black;width:60%;">
		    <tr>
			    <td style="color:black;font-size:17px;width:250px;" >From</td>
				  <td>
					<select style="color:black;font-size:17px;width:223px;margin-bottom:15px;" name="first"> 
            				<option>Select</option>	
            				<option value="EUR">Euro</option>	
            				<option value="USD">US Dollar</option>
							      <option value="GBP">Pound</option>
            		  </select>	
				  </td>
			</tr>	
           <tr>
			    <td style="color:black;font-size:17px;">To</td>
				<td>
				 <select style="color:black;font-size:17px;width:223px;margin-bottom:15px;" name="second"> 
            				<option>Select</option>	
            				<option value="EUR">Euro</option>	
            				<option value="USD">US Dollar</option>
						       	<option value="GBP">Pound</option>
            		  </select>
					  </td>
				</tr>
         <tr>
			    <td  style="color:black;font-size:17px;">Amount</td>
				  <td><input style="color:black;font-size:17px;" type="text"name="money"placeholder="Enter Amount"/></td>
			 </tr>		
          <tr>
			    <td></td>

				  <td> <br/><br/><br/>
				  <input style="height:35px;font-size:15px;" type="submit" name="convery" value="Convert"/></td>
			 </tr>				 
		  </table>
	    </form>
	   




	</center>



 <?php include 'inc/functionfooter.php';?>