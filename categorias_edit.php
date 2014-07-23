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
  $updateSQL = sprintf("UPDATE categorias SET nombre=%s, orden=%s, color=%s WHERE id=%s",
                       GetSQLValueString($_POST['nombre'], "text"),
                       GetSQLValueString($_POST['orden'], "int"),
                       GetSQLValueString($_POST['color'], "text"),
                       GetSQLValueString($_POST['id'], "int"));

  mysql_select_db($database_connection, $connection);
  $Result1 = mysql_query($updateSQL, $connection) or die(mysql_error());

  $updateGoTo = "categorias_admin.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
}

$colname_cats = "-1";
if (isset($_GET['id'])) {
  $colname_cats = $_GET['id'];
}
mysql_select_db($database_connection, $connection);
$query_cats = sprintf("SELECT * FROM categorias WHERE id = %s", GetSQLValueString($colname_cats, "int"));
$cats = mysql_query($query_cats, $connection) or die(mysql_error());
$row_cats = mysql_fetch_assoc($cats);
$totalRows_cats = mysql_num_rows($cats);

mysql_select_db($database_connection, $connection);
$query_allcats = "SELECT id FROM categorias ORDER BY id DESC";
$allcats = mysql_query($query_allcats, $connection) or die(mysql_error());
$row_allcats = mysql_fetch_assoc($allcats);
$totalRows_allcats = mysql_num_rows($allcats);
?>

<?php include 'admin_layout/head.php';?>
<?php include 'admin_layout/header.php';?>
<div class="row titulo">
  <div class="col-xs-10">
    <h4>Editar Categor&iacute;a</h4>
  </div>
  
</div>
<div class="container-fluid">
  <div class="row">
    <div class="col-md-3">
      <div class="form-group">
        <label>Nombre</label>
        <input class="form-control" type="text" name="nombre" value="<?php echo htmlentities($row_cats['nombre'], ENT_COMPAT, 'UTF-8'); ?>" size="32" />
      </div>
    </div>
    <div class="col-md-3">
      <div class="form-group">
        <label>Orden</label>
        <select class="form-control" name="orden">
        <?php 
        do {  
        ?>
        <option value="<?php echo $row_allcats['id']?>" <?php if (!(strcmp($row_allcats['id'], htmlentities($row_cats['orden'], ENT_COMPAT, 'UTF-8')))) {echo "SELECTED";} ?>><?php echo $row_allcats['id']?></option>
        <?php
          } while ($row_allcats = mysql_fetch_assoc($allcats));
          ?>
      </select>
      </div>
    </div>
    <div class="col-md-4">
      <div class="form-group">
        <h5>Color</h5>
        <label class="checkbox-inline">
          <input type="radio" name="color" value="cat_azul" <?php if (!(strcmp(htmlentities($row_cats['color'], ENT_COMPAT, 'UTF-8'),"cat_azul"))) {echo "checked=\"checked\"";} ?> /> Azul
        </label>
        <label class="checkbox-inline">
          <input type="radio" name="color" value="cat_morado" <?php if (!(strcmp(htmlentities($row_cats['color'], ENT_COMPAT, 'UTF-8'),"cat_morado"))) {echo "checked=\"checked\"";} ?> /> Morado
        </label>
        <label class="checkbox-inline">
          <input type="radio" name="color" value="cat_verde" <?php if (!(strcmp(htmlentities($row_cats['color'], ENT_COMPAT, 'UTF-8'),"cat_verde"))) {echo "checked=\"checked\"";} ?> /> Verde
        </label>
      </div>
    </div>

  </div>
  <div class="row btn_bar">
      <div class="col-md-2 pull-right">
        <input class="pull-right btn btn-ok" <input type="submit" value="Guardar" />
      </div>
  </div>
</div>
<form action="<?php echo $editFormAction; ?>" method="post" name="form1" id="form1">
  <!--
  <table align="center">
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Nombre:</td>
      <td><input type="text" name="nombre" value="<?php echo htmlentities($row_cats['nombre'], ENT_COMPAT, 'UTF-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Orden:</td>
      <td><select name="orden">
        <?php 
do {  
?>
        <option value="<?php echo $row_allcats['id']?>" <?php if (!(strcmp($row_allcats['id'], htmlentities($row_cats['orden'], ENT_COMPAT, 'UTF-8')))) {echo "SELECTED";} ?>><?php echo $row_allcats['id']?></option>
        <?php
} while ($row_allcats = mysql_fetch_assoc($allcats));
?>
      </select></td>
    </tr>
    <tr> </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Color:</td>
      <td valign="baseline"><table>
        <tr>
          <td><input type="radio" name="color" value="cat_azul" <?php if (!(strcmp(htmlentities($row_cats['color'], ENT_COMPAT, 'UTF-8'),"cat_azul"))) {echo "checked=\"checked\"";} ?> />
            Azúl</td>
        </tr>
        <tr>
          <td><input type="radio" name="color" value="cat_morado" <?php if (!(strcmp(htmlentities($row_cats['color'], ENT_COMPAT, 'UTF-8'),"cat_morado"))) {echo "checked=\"checked\"";} ?> />
            Morado</td>
        </tr>
        <tr>
          <td><input type="radio" name="color" value="cat_verde" <?php if (!(strcmp(htmlentities($row_cats['color'], ENT_COMPAT, 'UTF-8'),"cat_verde"))) {echo "checked=\"checked\"";} ?> />
            Verde</td>
        </tr>
      </table></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">&nbsp;</td>
      <td><input type="submit" value="Update record" /></td>
    </tr>
  </table>
-->
  <input type="hidden" name="MM_update" value="form1" />
  <input type="hidden" name="id" value="<?php echo $row_cats['id']; ?>" />
</form>

<?php include 'admin_layout/footer.php';?>
<?php include 'admin_layout/foot.php';?>
<?php
mysql_free_result($cats);

mysql_free_result($allcats);
?>
