<?php
require_once("dbconnect.php");

function addJob($stuid,$name, $parent,$subsidy,$contact) {
	global $conn;
	$sql = "insert into form (stuid,name,parent, subsidy,contact, status) values ('$id','$name', '$parent','$subsidy', '$contact',0);";
	mysqli_query($conn, $sql) or die("Insert failed, SQL query error"); //執行SQL	
}

function cancelJob($jobID) {
	global $conn;
	$sql = "update form set status = 3 where id=$jobID and status <> 2;";
	mysqli_query($conn,$sql);
	//return T/F
}

function updateJob($id,$stuid,$name, $parent,$subsidy,$contact) {
	global $conn;
	if ($id== -1) {
		addJob($stuid,$name, $parent,$subsidy,$contact);
	} else {
		$sql = "update form set stuid='$stuid', name='$name', parent='$parent',subsidy='$subsidy',contact='$contact' where id=$id;";
		mysqli_query($conn, $sql) or die("Insert failed, SQL query error"); //執行SQL
	}
}

function getJobList($bossMode) {
	global $conn;
	if ($bossMode) {
		$sql = "select * from form order by status desc;";
	} else {
		$sql = "select * from form where status = 0;";
	}
	$result=mysqli_query($conn,$sql) or die("DB Error: Cannot retrieve message.");
	return $result;
}

function getJobDetail($id) {
	global $conn;
	if ($id == -1) { //-1 stands for adding a new record
		$rs=[
			"id" => -1,
			"stuid" =>"學號",
			"name" => "name",
			"parent" => "parent",
			"subsidy" => "低收"
		];
	} else {
		$sql = "select stuid,name,parent, subsidy,contact from form where id=$id;";
		$result=mysqli_query($conn,$sql) or die("DB Error: Cannot retrieve message.");
		$rs=mysqli_fetch_assoc($result);
	}
	return $rs;
}

function setFinished($jobID) {
	global $conn;
	$sql = "update form set status = 1 where id=$jobID and status = 0;";
	mysqli_query($conn,$sql) or die("MySQL query error"); //執行SQL
	
}

function rejectJob($jobID){
	global $conn;
	$sql = "update form set status = 0 where id=$jobID and status = 1;";
	mysqli_query($conn,$sql);
}

function setClosed($jobID) {
	global $conn;
	$sql = "update form set status = 2 where id=$jobID and status = 1;";
	mysqli_query($conn,$sql);
}


?>