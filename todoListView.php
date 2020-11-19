<?php
session_start();
$mentorMode=0;
if (! isset($_SESSION['uID']) or $_SESSION['uID']<="") {
	header("Location: loginForm.php");
} 
if ($_SESSION['uID']=='mentor'){
	$mentortMode = 1;
} else {
	$mentorMode=0;
}
require("todoModel.php");
if (isset($_GET['m'])){
	$msg="<font color='red'>" . $_GET['m'] . "</font>";
} else {
	$msg="Good morning";
}



$result=getJobList($mentorMode);
$jobStatus = array('未完成','已完成','已結案','已取消');


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>無標題文件</title>
</head>

<body>

<p>Subsidy Application Form !! </p>
<hr />
<div><?php echo $msg; ?></div><hr>
<a href="todoEditForm.php?id=-1">申請補助</a> <br>
<table width="200" border="1">
  <tr>
    <td>id</td>
	<td>stuid</td>
    <td>name</td>
    <td>parent</td>
	<td>subsidy</td>
    <td>contact</td>
	<td>status</td>
  </tr>
<?php
while ($rs = mysqli_fetch_assoc($result)){
	echo "<tr><td>" . $rs['id'] . "</td>";
	echo "<td>" . $rs['stuid'] . "</td>";
	echo "<td>", htmlspecialchars($rs['name']),"</td>";
	echo "<td>" , htmlspecialchars($rs['parent']), "</td>";
	echo "<td>" , htmlspecialchars($rs['subsidy']), "</td>";
	echo "<td>" , htmlspecialchars($rs['contact']), "</td>" ;
	echo "<td>{$rs['status']}</td></tr>";
	switch($rs['status']) {
		case 0:
			if ($mentorMode) {
				echo "<a href='todoEditForm.php?id={$rs['id']}'>Edit</a>  ";				
			}else{}

			break;
		case 1:
			echo "<a href='todoSetControl.php?act=ok&id={$rs['id']}'>OK</a>  " ;
			echo "<a href='todoSetControl.php?act=cancel&id={$rs['id']}'>Cancel</a>  " ;
			break;
		default:
			break;
	}
	echo "</td></tr>";
}
?>
</table>
</body>
</html>
