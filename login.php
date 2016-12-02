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
?>
<?php
// *** Validate request to login to this site.
if (!isset($_SESSION)) {
  session_start();
}

$loginFormAction = $_SERVER['PHP_SELF'];
if (isset($_GET['accesscheck'])) {
  $_SESSION['PrevUrl'] = $_GET['accesscheck'];
}

if (isset($_POST['txtusername'])) {
  $loginUsername=$_POST['txtusername'];
  $password=$_POST['txtpassword'];
  $MM_fldUserAuthorization = "";
  $MM_redirectLoginSuccess = "regis.php";
  $MM_redirectLoginFailed = "login.php";
  $MM_redirecttoReferrer = false;
  mysql_select_db($database_dbconnect, $dbconnect);
  
  $LoginRS__query=sprintf("SELECT user_name, user_pass FROM admin_system WHERE user_name=%s AND user_pass=%s",
    GetSQLValueString($loginUsername, "text"), GetSQLValueString($password, "text")); 
   
  $LoginRS = mysql_query($LoginRS__query, $dbconnect) or die(mysql_error());
  $loginFoundUser = mysql_num_rows($LoginRS);
  if ($loginFoundUser) {
     $loginStrGroup = "";
    
	if (PHP_VERSION >= 5.1) {session_regenerate_id(true);} else {session_regenerate_id();}
    //declare two session variables and assign them
    $_SESSION['MM_Username'] = $loginUsername;
    $_SESSION['MM_UserGroup'] = $loginStrGroup;	      

    if (isset($_SESSION['PrevUrl']) && false) {
      $MM_redirectLoginSuccess = $_SESSION['PrevUrl'];	
    }
    header("Location: " . $MM_redirectLoginSuccess );
  }
  else {
    header("Location: ". $MM_redirectLoginFailed );
  }
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>User Login</title>

<style type="text/css">
<!--
#apDiv1 {
position: absolute;
top: 50%;
left: 50%;
width: 300px;
height: 200px;
margin-left: -250px;
margin-top: -150px;
background-color: #468879;
border-radius:5px;
-khtml-border-radius:5px;
-moz-border-radius:5px;
}
.style1 {color: #FFFFFF}
.style4 {color: #F5F5F5}
-->
</style>
<link href="registor.php.css" rel="stylesheet" type="text/css" />
<script type="text/javascript">
function MM_goToURL() { //v3.0
  var i, args=MM_goToURL.arguments; document.MM_returnValue = false;
  for (i=0; i<(args.length-1); i+=2) eval(args[i]+".location='"+args[i+1]+"'");
}
</script>
</head>
<body bgcolor="#F0F0F0" >
<form id="form1" name="form1" method="POST" action="<?php echo $loginFormAction; ?>">
<div id="apDiv1">
<h1 align="center" class="style4">USER LOGIN</h1>
<table width="284" border="0" align="center">
<tr>
<td width="124"><span class="style1">User Name</span></td>
<td width="144" colspan="2">
<label>
<input type="text" name="txtusername" id="txtusername" autofocus />
</label> </td>
</tr>
<tr>
<td><span class="style1">Password</span></td>
<td colspan="2"><input type="password" name="txtpassword" id="txtpassword" /></td>
</tr>
<tr>
<td><div align="right"></div></td>
<td>

<div align="left">
  <input name="Button" type="button" onclick="MM_goToURL('parent','registor.php');return document.MM_returnValue" value="สมัครสมาชิก" />
</div></td>
<td><div align="right">
<input type="submit" name="button" id="button" value="LOGIN" />
</div></td>
</tr>
</table>

<label></label>
<p>&nbsp;</p>
</div>
</form>
</body>
</html>