<?php require_once('Connections/dbconnect.php'); ?>
<?php
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

$colname_show_name = "-1";
if (isset($_SESSION['MM_Username'])) {
  $colname_show_name = $_SESSION['MM_Username'];
}
mysql_select_db($database_dbconnect, $dbconnect);
$query_show_name = sprintf("SELECT * FROM admin_system WHERE user_name = %s", GetSQLValueString($colname_show_name, "text"));
$show_name = mysql_query($query_show_name, $dbconnect) or die(mysql_error());
$row_show_name = mysql_fetch_assoc($show_name);
$totalRows_show_name = mysql_num_rows($show_name);
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
      <td  colspan="2" bgcolor="#FFCC00"><strong>แสดงข้อมูลสมาชิก</strong></td>
    </tr>
    <tr>
      <td  width="200"><strong>Username</strong></td>
      <td  width="284"><?php echo $row_show_name['user_name']; ?></td>
    </tr>
    <tr>
      <td>ชื่อ-สกุล</td>
       <td><?php echo $row_show_name['name']; ?></td>
    </tr>
    <tr>
       <td>&nbsp;</td>
      <td><a href="<?php echo $logoutAction ?>">ออกจากระบบ</a></td>
    </tr>
    <tr>
       <td>&nbsp;</td>
      <td><form name="form1" method="post" action="">
        <input name="cal" type="button" id="cal" onClick="MM_goToURL('parent','norre.php');return document.MM_returnValue" value="คำนวณ">
        <input name="rep" type="submit" id="rep" onClick="MM_goToURL('parent','show.php');return document.MM_returnValue" value="แสดงผล">
      </form></td>
    </tr>
</table>
</body>
</html>
<?php
mysql_free_result($show_name);
?>
