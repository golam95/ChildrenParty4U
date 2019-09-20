<?php 
include 'inc/headerfunction.php';

?>
<style>
	.succefull_order{
		width:500px;
		min-height:200px;
		border:1px solid black;
		margin:0 auto;
		padding:20px;
		background:#DFEDC0;
		border-radius: 10px;
	}
	.succefull_order h2{
		border-bottom:1px solid black;margin-bottom:20px;padding-bottom:10px;
		text-align:center;
		color:#6A3E4F;
	}
	.succefull_order p{
		line-height: 25px;
		text-align:left;
	}
	.succefull_order a{
		line-height: 25px;
		text-decoration:none;
		color:green;
	}

	.succefull_order a:hover{
		color:red;
	}

</style>

<div class="succefull_order">
	<h2>Success</h2>
	<?php
	if(isset($_GET['mehedi'])){
		echo "<span style='color:black'>".$_GET['mehedi']."</span>";
	}
	?>
	<h5>Thanks for Ordering. Receive Your order successfully. We will contact you Childrenparty4U with Email details. <h5 style="color:blue;text-decoration:underline;";> Please Check your booking confirm email !!!</h5></h5>

</div>

<?php include 'inc/functionfooter.php';?>