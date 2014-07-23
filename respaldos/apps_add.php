<?php require_once('Connections/connection.php'); ?>
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

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
  /*$insertSQL = sprintf("INSERT INTO cproductos (producto_id, cproducto) VALUES (%s, %s)",
                       GetSQLValueString($_POST['producto_id'], "int"),
                       GetSQLValueString($_POST['cproducto'], "int"));*/


 $con=mysqli_connect($hostname_connection,$username_connection
,$password_connection,$database_connection);
  
  if (isset($_POST['enviar'])) {
        foreach ($_POST['tags'] as $Cprod)
            $Cprods[] = $Cprod.',';
			
			//die($Cprod);
    }
	$cproducto = implode($Cprods);
	$arraycp=split(",",$cproducto);
	
for($i=0;$i<count($arraycp);$i++) {
if(!empty($arraycp[$i])){
	mysqli_query($con,"INSERT INTO prod_aplicaciones (producto_id, aplicacion) values ('".$_POST['producto_id']."','".$arraycp[$i]."')");
}
}

/* mysql_select_db($database_connection, $connection);
  $Result1 = mysql_query($insertSQL, $connection) or die(mysql_error());
  */
   $insertGoTo = "apps_admin.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
  
 
  
}

$colname_producto = "-1";
if (isset($_GET['id'])) {
  $colname_producto = $_GET['id'];
}
mysql_select_db($database_connection, $connection);
$query_producto = sprintf("SELECT * FROM productos WHERE id = %s", GetSQLValueString($colname_producto, "int"));
$producto = mysql_query($query_producto, $connection) or die(mysql_error());
$row_producto = mysql_fetch_assoc($producto);
$totalRows_producto = mysql_num_rows($producto);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Untitled Document</title>

<link type="text/css" rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/themes/base/ui.all.css" />
<link type="text/css" href="multiselect/css/ui.multiselect.css" rel="stylesheet" />
<script src="multiselect/js/jquery-1.9.1.min.js" type="text/javascript"></script>

<script type="text/javascript" src="multiselect/js/jquery-ui-1.8.custom.min.js"></script>
<script type="text/javascript" src="multiselect/js/ui.multiselect.js"></script>
<script type="text/javascript">
    $(function(){
        $.localise('ui-multiselect', {path: 'multiselect/js/'});
        $(".multiselect").multiselect();        
    });
</script>


</head>

<body>
<form action="<?php echo $editFormAction; ?>" method="post" name="form1" id="form1">
  <table align="center">
    <tr valign="baseline">
      <td colspan="2" align="right" nowrap="nowrap"><?php echo $row_producto['nombre']; ?>
        <input type="text" name="producto_id" value="<?php echo $row_producto['id']; ?>" size="2" hidden="hidden" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right" valign="top">Aplicaciones:</td>
      <td><select id="tags" name="tags[]" class="multiselect" multiple="multiple" >
    <option value="app00001">app00001</option>
    <option value="app00002">app00002</option>
    <option value="app00003">app00003</option>
    <option value="app00004">app00004</option>
    <option value="app00005">app00005</option>
    <option value="app00006">app00006</option>
</select></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">&nbsp;</td>
      <td><input type="submit" name="enviar" value="Insert record" /></td>
    </tr>
  </table>
  <input type="hidden" name="MM_insert" value="form1" />
</form>
<p>&nbsp;</p>
</body>
</html>
<?php
mysql_free_result($producto);
?>
