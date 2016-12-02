<?php require_once('Connections/dbconnect.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

mysql_select_db($database_dbconnect, $dbconnect);
$query_date = "SELECT * FROM `user` ORDER BY id DESC";
$date = mysql_query($query_date, $dbconnect) or die(mysql_error());
$row_date = mysql_fetch_assoc($date);
$totalRows_date = mysql_num_rows($date);

//initialize the session
if (!isset($_SESSION)) {
  session_start();
}

// ** Logout the current user. **
$logoutAction = $_SERVER['PHP_SELF']."?doLogout=true";
if ((isset($_SERVER['QUERY_STRING'])) && ($_SERVER['QUERY_STRING'] != "")){
  $logoutAction .="&". htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_GET['doLogout'])) &&($_GET['doLogout']=="true")){
  //to fully log out a visitor we need to clear the session varialbles
  $_SESSION['MM_Username'] = NULL;
  $_SESSION['MM_UserGroup'] = NULL;
  $_SESSION['PrevUrl'] = NULL;
  unset($_SESSION['MM_Username']);
  unset($_SESSION['MM_UserGroup']);
  unset($_SESSION['PrevUrl']);
	
  $logoutGoTo = "login.php";
  if ($logoutGoTo) {
    header("Location: $logoutGoTo");
    exit;
  }
}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
<script type="text/javascript">
function MM_goToURL() { //v3.0
  var i, args=MM_goToURL.arguments; document.MM_returnValue = false;
  for (i=0; i<(args.length-1); i+=2) eval(args[i]+".location='"+args[i+1]+"'");
}
</script>
</head>

<body>
<table width="500" border="1"  align="center">
    <tr>
      <td  colspan="4" bgcolor="#FFCC00"><strong>แสดงรายรับรายจ่าย</strong></td>
    </tr>
    <tr>
      <td  width="200"><strong>วันที่</strong></td>
      <td  width="284">รายรับ</td>
      <td  width="284">รายจ่าย</td>
      <td  width="284">คงเหลือ</td>
    </tr>
    <?php do { ?>
      <tr>
        <td  width="200"><?php echo $row_date['date']; ?></td>
        <td  width="284"><?php echo $row_date['re']; ?></td>
        <td  width="284"><?php echo $row_date['ex']; ?></td>
        <td  width="284"><?php echo $row_date['to']; ?></td>
      </tr>
      <?php } while ($row_date = mysql_fetch_assoc($date)); ?>
   
  <tr>
    
    
</tr>
</table>
<p>&nbsp;</p>
<form name="form1" method="post" action="" align = "center">
  <input name="back" type="button" id="back" onClick="MM_goToURL('parent','regis.php');return document.MM_returnValue" value="Back">
</form>
</body>
</html>
<?php
mysql_free_result($date);
?>
