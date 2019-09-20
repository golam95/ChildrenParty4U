<?php
	$con=mysqli_connect("localhost", "root", "");
	$query="drop database if exists childrenparty4u";
	$result=(mysqli_query($con,$query));
	
	$query="create database childrenparty4u";
	$result=(mysqli_query($con,$query));
	$con=mysqli_connect("localhost", "root", "","childrenparty4u");
	
	$query = "CREATE TABLE `announce` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `description` varchar(265) DEFAULT NULL,
  `date` date DEFAULT NULL,
   PRIMARY KEY (`id`)
  )";
   $result=(mysqli_query($con,$query));
	
	$query="CREATE TABLE `contact` (
		  `id` int(10) NOT NULL AUTO_INCREMENT,
		  `firstname` varchar(55) DEFAULT NULL,
		  `lastname` varchar(55) DEFAULT NULL,
		  `email` varchar(55) DEFAULT NULL,
		  `address` varchar(55) DEFAULT NULL,
		  `comment` varchar(55) DEFAULT NULL,
		  `date` timestamp(6) DEFAULT NULL,
		   PRIMARY KEY (`id`)
		)";
	$result=(mysqli_query($con,$query));
	$query="CREATE TABLE `events` (
		  `id` int(10) NOT NULL AUTO_INCREMENT,
		  `title` varchar(55) DEFAULT NULL,
		  `date` date DEFAULT NULL,
		  `created` datetime(6) DEFAULT NULL,
		  `modified` datetime(6) DEFAULT NULL,
		  `status` tinyint(2) DEFAULT 1,
		   PRIMARY KEY (`id`)
		)";
	$result=(mysqli_query($con,$query));
	
	
	$query="CREATE TABLE `orderinfo` (
		  `id` int(10) NOT NULL AUTO_INCREMENT,
		  `name` varchar(55) DEFAULT NULL,
		  `city` varchar(55) DEFAULT NULL,
		  `houseno` varchar(55) DEFAULT NULL,
		  `email` varchar(55) DEFAULT NULL,
		  `birthday` date DEFAULT NULL,
		  `age` varchar(20) DEFAULT NULL,
		  `timeslots` varchar(20) DEFAULT NULL,
		  `date` date DEFAULT NULL,
		  `gender` varchar(20) DEFAULT NULL,
		  `functiondate` date DEFAULT NULL,
		  `party` varchar(55) DEFAULT NULL,
		  `numberofchild` int(30) DEFAULT NULL,
		  PRIMARY KEY (`id`)
		)";
	$result=(mysqli_query($con,$query));
	
	$query="CREATE TABLE `tbl_admin` (
		  `id` int(10) NOT NULL AUTO_INCREMENT,
		  `username` varchar(55) DEFAULT NULL,
		  `password` varchar(55) DEFAULT NULL,
		   PRIMARY KEY (`id`)
		)";
	$result=(mysqli_query($con,$query));
	
	
	$query="CREATE TABLE `tbl_party` (
		  `id` int(10) NOT NULL AUTO_INCREMENT,
		  `type` varchar(55) DEFAULT NULL,
		  `description` varchar(255) DEFAULT NULL,
		  `cost_perchild` int(55) DEFAULT NULL,
		  `needtime` varchar(55) DEFAULT NULL,
		  `numofchild` int(55) DEFAULT NULL,
		  `product` varchar(255) DEFAULT NULL,
		  `img` varchar(250) DEFAULT NULL,
		   PRIMARY KEY (`id`)
		)";
	$result=(mysqli_query($con,$query));
	
	$query="CREATE TABLE `user` (
		  `id` int(10) NOT NULL AUTO_INCREMENT,
		  `email` varchar(55) DEFAULT NULL,
		  `name` varchar(55) DEFAULT NULL,
		  `password` varchar(55) DEFAULT NULL,
		  `gender` varchar(55) DEFAULT NULL,
		  `date` timestamp(6) DEFAULT NULL,
		   PRIMARY KEY (`id`)
		)";
		$result=(mysqli_query($con,$query));
		
		if($result){
			echo "<div id='text' style='padding-left:40%;background-color:Orange;'><h1 style='padding-left:10%;'>Congrats</h1><h2>Database has been created successfully!</h2></div>";
			
		}else{
			 "Sorry Error Create Database....!!".mysqli_error($con);
		}
	
	
?>