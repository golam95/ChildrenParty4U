 

<?php 
include "lib/Database.php";
include "config/config.php";
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
  <link rel="stylesheet"href="css2/gallary.css"/>
  <link rel="stylesheet"href="css2/availeparty.css"/>
  <link rel="stylesheet"href="css2/contact.css"/>
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

           <li><a href="myaccount.php ?id =<?php echo $mehedi;?>">My Account</a></li>
           <li><a href="viewprice.php">View price  ||</a></li>
           <li><a href="availeparty.php">See Avaliabel party  ||</a></li>
           <li><a href="availedate.php">See AvailableDate  ||</a></li>
           <li><a href="?action=logout">Log Out  ||</a></li>

           <?php }else {?> 

           <li><a href="registation.php">Regisation  ||</a></li>
           <li><a id="active" href="login.php">Log In ||</a></li>

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

   </div>


   <div class="headersectionthree template clear">
    <img src="image/www.jpg"alt="post image"/>
  </div>
  <div class="naviagation clear template">
    <ul>
      <li><a  href="home.php">Home</a></li>
      <li><a href="party.php">Party Info</a></li>
      <li><a href="index.php">About Us</a></li>
      <li><a  href="gallary.php">Gallary</a></li>
      <li><a  href="contact.php">Contact</a></li>
    </ul>
  </div>
  <div class="maincontented_gallary template clear">
   <center>

    <?php 
    $db = new database();
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
      $email = mysqli_real_escape_string($db->link, $_POST['email']);
      $pssword = mysqli_real_escape_string($db->link, $_POST['password']);
      $passwordencription=md5($pssword);

      $query = "SELECT * FROM user WHERE email ='$email' AND password = '$passwordencription'";
      $result = $db->Retrive($query); 
      if($result !=false){
        $value = mysqli_fetch_array($result);
        $row = mysqli_num_rows($result);
        if($row>0){
         Session:: set("login", true);
         Session::set("email", $value['email']);
         Session::set("name", $value['name']);
         Session::set("userid", $value['id']);
         header("Location:availeparty.php");


       }else{
        echo "<span style='color:red'>"."Please Try Again..."."</span>";
      }

    }else{
     echo "<span style='color:red'>"."Please Try Again..."."</span>";
   }
 }

 ?>

 <form action="" method="post">
   <h2 Style="color:#6A3E4F;font-size:17px;margin-top:5px;">SIGN-IN</h2>
 </br>
 <table bgcolor="#DFEDC0" style="font-size:20px;padding:20px;border-radius:15px;border:1px solid black;">
  <tr>
   <td><label style="color:black;font-size:17px;" for="Eamil">Email</label></td>
   <td><input style="margin-bottom:5px;font-size:13px;width:210px;height:20px;" type="text"  name="email" /></td>
 </tr>
 <tr>
   <td><label style="color:black;font-size:17px;" for="password">Password</label></td>
   <td><input style="margin-bottom:5px;font-size:13px;width:230px;height:35px;" type="password" name="password" /></td>
 </tr>
</table>
</br>
<input style="height:29px;font-size:15px;" type="submit" name="submit" value="Sign-In"/>
</br>
</br>
<p style="height:10px;font-size:15px;" >Not Registarted Yet Please <a style="color:gray;" href="registation.php">Click here..!!</a></p>
</br>
</br>
</form>
</center>
</div>
<?php include 'inc/functionfooter.php';?>