<?php
require("todoModel.php");

$stuid=mysqli_real_escape_string($conn,$_POST['stuid']);
$name=mysqli_real_escape_string($conn,$_POST['name']);
$parent=mysqli_real_escape_string($conn,$_POST['parent']);
$id=(int)$_POST['id'];
$subsidy=mysqli_real_escape_string($conn,$_POST['subsidy']);
$men=mysqli_real_escape_string($conn,$_POST['men']);
$sec=mysqli_real_escape_string($conn,$_POST['sec']);
$amount=mysqli_real_escape_string($conn,$_POST['amount']);

if ($stuid or $men or $sec) { //if title is not empty
	updateJob($id,$stuid,$name, $parent,$subsidy,$men,$sec,$amount);
	$msg="Message updateded";
} else {
	$msg= "Message title cannot be empty";
}
header("Location: todoListView.php?m=$msg");
?>