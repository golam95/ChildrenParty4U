

<?php 
include_once 'lib/Session.php';
Session::init();

?>


<!DOCTYPE HTML>
<html>
<head>
	<title>ChildrenParty4U</title>
	<link rel="stylesheet"href="css2/game.css"/> 
	<link rel="stylesheet"href="css2/regisation.css"/>
	<link rel="stylesheet"href="css2/home.css"/>
	<script language="javascript" type="text/javascript">
		function clearText(field)
		{
			if (field.defaultValue == field.value) field.value = '';
			else if (field.value == '') field.value = field.defaultValue;
		}
	</script>

	<link rel="stylesheet" href="css/nivo-slider.css" type="text/css" media="screen" />
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js" type="text/javascript"></script>
	<script src="js/jquery.nivo.slider.js" type="text/javascript"></script>
	<script type="text/javascript">
		$(window).load(function() {
			$('#slider').nivoSlider({
				effect:'random',
				slices:10,
				animSpeed:500,
				pauseTime:2200,
		startSlide:0, //Set starting Slide (0 index)
		directionNav:false,
		directionNavHide:false, //Only show on hover
		controlNav:false, //1,2,3...
		controlNavThumbs:false, //Use thumbnails for Control Nav
		pauseOnHover:true, //Stop animation while hovering
		manualAdvance:false, //Force manual transitions
		captionOpacity:0.8, //Universal caption opacity
		beforeChange: function(){},
		afterChange: function(){},
		slideshowEnd: function(){} //Triggers after all slides have been shown
	});
		});
	</script>
</head>

<?php
if(isset($_GET['action'])&& $_GET['action']=="logout" ){
	   Session::user_destroy();//just assain the message and call the destroy the message from session

	}
	?>



	<body>
		<div class="headersection  clear">
			<div class="subheadersectionone template clear">
				<ul>
					<?php 
					$mehedi = Session::get("userid");
					$hasan = Session::get("login");
					if($hasan == true){
						?>

						<li><a href="myaccount.php?id=<?php echo urlencode ($mehedi); ?>">My Account</a></li>
						<li><a href="viewprice.php">View price  ||</a></li>
						<li><a href="availeparty.php">See Avaliabel party  ||</a></li>
						<li><a href="availedate.php">See AvailableDate  ||</a></li>
						<li><a href="?action=logout">Log Out  ||</a></li>

						<?php }else {?> 

						<li><a href="registation.php">Regisation  ||</a></li>
						<li><a href="login.php">Log In ||</a></li>

						<?php } ?>
					</ul>
				</div>
				<div class="subheadersection template clear">
					<h1>ChildrenParty4U</h1>

				</div>
				<p><span class="pull_right"><strong>Welcome!</strong>

					<?php
					$name = Session::get("name");
					if(isset($name)){
						echo $name;
					}

					?>
				</span></p>

                <?php
				include "lib/Database.php";
				include "config/config.php";
				$db = new database();
				$query = "SELECT * FROM announce";
				$read = $db->select($query); 
				?>
				<?php if($read){?>
				<?php while($row = $read->fetch_assoc()){?>

                <marquee style="color:red;font-size:15px;font-family:arail;"><span class="pull_right"><strong><h4>***<?php echo $row['description'];?>

					***</h4></strong></span></marquee>

					<?php } ?> 

					<?php } else {?>

					<p>Data is not available</p>

					<?php } ?>

                   </div>
                   <div class="tooplate_middle template clear">
                   <div id="slider">
						<a href="#"><img src="image/slideshow/01.jpg" alt="nature 1" title="" /></a>
						<a href="#"><img src="image/slideshow/02.jpg" alt="nature 2" title="" /></a>
						<a href="#"><img src="image/slideshow/03.jpg" alt="nature 3" title="" /></a>
						<a href="#"><img src="image/slideshow/04.jpg" alt="nature 4" title="" /></a>
					</div>
				</div>
				<div class="naviagation clear template">
					<ul>
						<li><a id="active" href="home.php">Home</a></li>
						<li><a href="party.php">Party Info</a></li>
						<li><a href="index.php">About Us</a></li>
						<li><a href="gallary.php">Gallary</a></li>
						<li><a href="contact.php">Contact</a></li>
					</ul>
				</div>