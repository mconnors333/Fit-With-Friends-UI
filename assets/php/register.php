<?php
	require("config.php");


	$date = time();
	$rating = null;
	$err = "none";
//check to make sure all fields have been filled
	if(isset($_POST['username'])){
		$name = $_POST['username'];
	}else{
		$err = "No name";
	}
	if(isset($_POST['password'])){
		$password = $password = md5($_POST['password']);
	}else{
		$err = $err . " No password ";
	}
	if(isset($_POST['fname'])){
		$fname = $_POST['fname'];
	}else{
		$err = $err . " No fname  ";
	}
	if(isset($_POST['lname'])){
		$lname = $_POST['lname'];
	}else{
		$err = $err . " No lname ";
	}
	if(isset($_POST['desc'])){
		$desc = $_POST['desc'];
	}else{
		$err = $err . " No desc ";
	}
	if(isset($_POST['email'])){
		$email = $_POST['email'];
	}else{
		$err = $err . " No email ";
	}
//connect to database
if($conn->connect_error){
	die("connection failed" . $conn->connect_error);
}
echo "connected, bitch.";
if($err == "none"){
$stmt = $conn->prepare("INSERT INTO users (username, firstName, lastName, description, dateJoined, email, userPassword) VALUES (?, ?, ?, ?, ?, ?, ?)"); 
$stmt->bind_param("sssssss", $a = 1, $b = 2, $c = 3, $a = 1, $date, $b = 2, $c = 3);
if($stmt->execute()){
	echo" stmt did a do ";
}else{
	echo $stmt->error;
}
echo"row inserted";
}else{
	echo $err;
}
?>