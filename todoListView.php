<?php
session_start();
//$mentorMode=0;
if (! isset($_SESSION['uID']) or $_SESSION['uID']<="") {
	header("Location: loginForm.php");
} 
if ($_SESSION['uID']=='mentor'){
	$bossMode = 1;
} elseif($_SESSION['uID']=='sec') {
	$bossMode=2;
}elseif($_SESSION['uID']=='pri') {
	$bossMode=3;
}else{
	$bossMode=0;
}

require("todoModel.php");
if (isset($_GET['m'])){
	$msg="<font color='red'>" . $_GET['m'] . "</font>";
} else {
	$msg="Good morning";
}



$result=getJobList($bossMode);
$jobStatus = array('未審核','老師已審核','秘書已審核','通過','不通過');


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
<a href="loginForm.php">login</a> 
<table width="200" border="1">
  <tr>
    <td>id</td>
	<td>stuid</td>
    <td>name</td>
    <td>parent</td>
	<td>subsidy</td>
    <td>opinion-men</td>
	<td>opinion-sec</td>
	<td>amount</td>
	<td>status</td>
	<td>-</td>
  </tr>
<?php
if ($bossMode == 0) {
	echo "<a href='todoEditForm.php?id=-1'>申請補助</a>  ";
					
}
while ($rs = mysqli_fetch_assoc($result)){

	echo "<tr><td>" . $rs['id'] . "</td>";
	echo "<td>" . $rs['stuid'] . "</td>";
	echo "<td>", htmlspecialchars($rs['name']),"</td>";
	echo "<td>" , htmlspecialchars($rs['parent']), "</td>";
	echo "<td>" , htmlspecialchars($rs['subsidy']), "</td>";
	echo "<td>" , htmlspecialchars($rs['men']), "</td>" ;
	echo "<td>" , htmlspecialchars($rs['sec']), "</td>" ;
	echo "<td>" . $rs['amount'] . "</td>";

	echo "<td>{$jobStatus[$rs['status']]}</td><td>";
	switch($rs['status']) {
		case 0:
			if ($bossMode == 1) {
				echo "<a href='mentorEditForm.php?id={$rs['id']}'>opinion</a>  ";
				echo "<a href='todoSetControl.php?act=finish&id={$rs['id']}'>ok</a>  ";				
			}
			/* else if ($bossMode == 0) {
				echo "<a href='todoEditForm.php?id={$rs['id']}'>edit</a>  ";
			}*/

			break;
		case 1;
			if ($bossMode == 2) {
				echo "<a href='secEditForm.php?id={$rs['id']}'>opinion</a>  ";
				echo "<a href='todoSetControl.php?act=secfinish&id={$rs['id']}'>ok</a>  ";				
			}
			break;
		case 2:
			if($bossMode == 3){
			echo "<a href='todoSetControl.php?act=close&id={$rs['id']}'>yes</a>  " ;
			echo "<a href='todoSetControl.php?act=cancel&id={$rs['id']}'>no</a>  " ;
			}
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
