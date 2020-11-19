<?php
require("todoModel.php");

$stuid=mysqli_real_escape_string($conn,$_POST['stuid']);
$name=mysqli_real_escape_string($conn,$_POST['name']);
$parent=mysqli_real_escape_string($conn,$_POST['parent']);
$id=(int)$_POST['id'];
$subsidy=mysqli_real_escape_string($conn,$_POST['subsidy']);
$contact=mysqli_real_escape_string($conn,$_POST['contact']);

if ($stuid) { //if title is not empty
	updateJob($id,$stuid,$name, $parent,$subsidy,$contact);
	$msg="Message updateded";
} else {
	$msg= "Message title cannot be empty";
}
header("Location: todoListView.php?m=$msg");
?>