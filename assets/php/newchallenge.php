<?php
require("config.php");
session_start();
	$id = $_SESSION['id'];
	$userid = $_POST['hisid'];
	$workoutid = $_POST['workoutid'];
	$timestamp = time();
	$stmt = $conn->prepare("INSERT INTO challenges(challengerid, userid, workoutid) VALUES(?, ?, ?)");
	$stmt->bind_vars("sss", $id, $userid, $workoutid);
	if($stmt->execute()){
		echo"This does the thing.";
	}else{
		echo $stmt-error();
	}
?>