<?php
session_start();
if (! isset($_SESSION['uID']) or $_SESSION['uID']!="mentor"and"sec") {
 header("Location: loginForm.php");
} 

require("todoModel.php");

$id = (int)$_GET['id'];
$rs = getJobDetail($id);
if (! $rs) {
 echo "no data found";
 exit(0);
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>無標題文件</title>
</head>
<body>
<h1>貧困學生補助經費申請表</h1>
<form method="post" action="todoUpdControl.php">
   <input type='hidden' name='id' value='<?php echo $id ?>'>
   stuid: <input name="stuid" type="hidden" id="stuid" value="<?php echo $rs['stuid'] ?>" /><?php echo $rs['stuid'] ?><br>

      name: <input name="name" type="hidden" id="name" value="<?php echo $rs['name'] ?>" /><?php echo $rs['name'] ?> <br>

      parent: <input name="parent" type="hidden" id="parent" value="<?php echo $rs['parent'] ?>" /><?php echo $rs['parent'] ?> <br>

   subsidy: <input  name="subsidy" type="hidden" id="subsidy" value="<?php echo $rs['subsidy'] ?>"/> <?php echo $rs['subsidy'] ?><br>
    contact: <input name="contact" type="text" id="contact" value="<?php echo htmlspecialchars($rs['contact']);?>" /> <br>




   <br>

      <input type="submit" name="Submit" value="送出" />
 </form>
  </tr>
</table>
</body>
</html>
