<?php


 include_once('functions.php'); 

?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf- 8" />
<title>PHP Event Calendar by CodexWorld</title>
<link type="text/css" rel="stylesheet" href="style.css"/>
<script src="jquery.min.js"></script>
</head>
<body>

<div style="background:#6A3E4F" id="calendar_div">
 <?php echo getCalender(); ?>

</div>
<a style="padding:5px;color:gray;font-weight:bold;" href="addevent.php">View Event</a></br>
<a style="padding:5px;color:gray;font-weight:bold;" href="index.php">Home</a>
<h5 style="color:green;">Pink color dermine date is booked</h5>
<h5 style="color:green;">Otherwise date is available</h5>

</body>
</html>


