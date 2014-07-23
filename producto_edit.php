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

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form1")) {
  $updateSQL = sprintf("UPDATE productos SET categoria=%s, nombre=%s, foto=%s, registro=%s, descripcion=%s, aplicaciones=%s, cproducto=%s, activo=%s WHERE id=%s",
                       GetSQLValueString($_POST['categoria'], "int"),
                       GetSQLValueString($_POST['nombre'], "text"),
                       GetSQLValueString($_POST['foto'], "text"),
                       GetSQLValueString($_POST['registro'], "text"),
                       GetSQLValueString($_POST['descripcion'], "text"),
                       GetSQLValueString($_POST['aplicaciones'], "text"),
                       GetSQLValueString($_POST['cproducto'], "text"),
                       GetSQLValueString(isset($_POST['activo']) ? "true" : "", "defined","1","0"),
                       GetSQLValueString($_POST['id'], "int"));

  mysql_select_db($database_connection, $connection);
  $Result1 = mysql_query($updateSQL, $connection) or die(mysql_error());

  $updateGoTo = "productos_admin.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
}

$colname_productos = "-1";
if (isset($_GET['id'])) {
  $colname_productos = $_GET['id'];
}
mysql_select_db($database_connection, $connection);
$query_productos = sprintf("SELECT * FROM productos WHERE id = %s", GetSQLValueString($colname_productos, "int"));
$productos = mysql_query($query_productos, $connection) or die(mysql_error());
$row_productos = mysql_fetch_assoc($productos);
$totalRows_productos = mysql_num_rows($productos);

mysql_select_db($database_connection, $connection);
$query_categorias = "SELECT * FROM categorias ORDER BY id ASC";
$categorias = mysql_query($query_categorias, $connection) or die(mysql_error());
$row_categorias = mysql_fetch_assoc($categorias);
$totalRows_categorias = mysql_num_rows($categorias);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Untitled Document</title>
<script src="tinymce/tinymce.min.js"></script>
<script>
tinymce.init({selector:'textarea'});
</script>
</head>

<body>
<form action="<?php echo $editFormAction; ?>" method="post" name="form1" id="form1">
  <table align="center">
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Categoria:</td>
      <td><select name="categoria">
        <?php
do {  
?>
        <option value="<?php echo $row_categorias['id']?>"<?php if (!(strcmp($row_categorias['id'], htmlentities($row_productos['categoria'], ENT_COMPAT, 'UTF-8')))) {echo "selected=\"selected\"";} ?>><?php echo $row_categorias['nombre']?></option>
        <?php
} while ($row_categorias = mysql_fetch_assoc($categorias));
  $rows = mysql_num_rows($categorias);
  if($rows > 0) {
      mysql_data_seek($categorias, 0);
	  $row_categorias = mysql_fetch_assoc($categorias);
  }
?>
      </select></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Nombre:</td>
      <td><input type="text" name="nombre" value="<?php echo htmlentities($row_productos['nombre'], ENT_COMPAT, 'UTF-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Foto:</td>
      <td><input type="text" name="foto" value="<?php echo htmlentities($row_productos['foto'], ENT_COMPAT, 'UTF-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">&nbsp;</td>
      <td><input name="foto" type="file" size="35" class=""/></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Registro:</td>
      <td><input type="text" name="registro" value="<?php echo htmlentities($row_productos['registro'], ENT_COMPAT, 'UTF-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right" valign="top">Descripcion:</td>
      <td><textarea name="descripcion" cols="50" rows="5"><?php echo htmlentities($row_productos['descripcion'], ENT_COMPAT, 'UTF-8'); ?></textarea></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right" valign="top">Aplicaciones:</td>
      <td><textarea name="aplicaciones" cols="50" rows="5"><?php echo htmlentities($row_productos['aplicaciones'], ENT_COMPAT, 'UTF-8'); ?></textarea></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right" valign="top">codigo del producto:</td>
      <td><textarea name="cproducto" cols="50" rows="5"><?php echo htmlentities($row_productos['cproducto'], ENT_COMPAT, 'UTF-8'); ?></textarea></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Activo:</td>
      <td><input type="checkbox" name="activo" value=""  <?php if (!(strcmp(htmlentities($row_productos['activo'], ENT_COMPAT, 'UTF-8'),""))) {echo "checked=\"checked\"";} ?> /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">&nbsp;</td>
      <td><input type="submit" value="Update record" /></td>
    </tr>
  </table>
  <input type="hidden" name="MM_update" value="form1" />
  <input type="hidden" name="id" value="<?php echo $row_productos['id']; ?>" />
</form>
<p>&nbsp;</p>
</body>
</html>
<?php
mysql_free_result($productos);

mysql_free_result($categorias);
?>
