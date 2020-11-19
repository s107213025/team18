<?php
session_start();
if (! isset($_SESSION['uID']) or $_SESSION['uID']!="student") {
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

   stuid: <input name="stuid" type="text" id="stuid" value="<?php echo htmlspecialchars($rs['stuid']);?>" /> <br>

      name: <input name="name" type="text" id="name" value="<?php echo htmlspecialchars($rs['name']);?>" /> <br>

      parent: <input name="parent" type="text" id="parent" value="<?php echo htmlspecialchars($rs['parent']);?>" /> <br>

   subsidy: <select  name="subsidy" type="select" id="subsidy" /> 
    <?php
     echo "<option value='{$rs['subsidy']}'>{$rs['subsidy']}</option>";
    ?>
     <option value='低收'>低收入戶</option>
     <option value='中低收'>中低收入戶</option>
     <option value='家庭因素'>家庭突發因素</option>
     </select>
   <br>

      <input type="submit" name="Submit" value="送出" />
 </form>
  </tr>
</table>
</body>
</html>
