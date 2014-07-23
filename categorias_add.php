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
  $insertSQL = sprintf("INSERT INTO categorias (nombre, color) VALUES (%s, %s)",
                       GetSQLValueString($_POST['nombre'], "text"),
                       GetSQLValueString($_POST['color'], "text"));

  mysql_select_db($database_connection, $connection);
  $Result1 = mysql_query($insertSQL, $connection) or die(mysql_error());

  $insertGoTo = "categorias_admin.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}
?>
<?php include 'admin_layout/head.php';?>
<?php include 'admin_layout/header.php';?>
<div class="row titulo">
  <div class="col-xs-10">
    <h4>Agregar Categor&iacute;a</h4>
  </div>
  
</div>
<form action="<?php echo $editFormAction; ?>" method="post" name="form1" id="form1">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-3">
        <div class="form-group">
          <label>Nombre</label>
          <input class="form-control"  type="text" name="nombre" value="" size="32" />
        </div>
      </div>
      <div class="col-md-4">
        <div class="form-group">
          <h5>Color</h5>
          <label class="checkbox-inline">
            <input name="color" type="radio" value="cat_azul" checked="checked" /> Azúl
          </label>
          <label class="checkbox-inline">
            <input type="radio" name="color" value="cat_morado" /> Morado
          </label>
          <label class="checkbox-inline">
            <input type="radio" name="color" value="cat_verde" /> Verde
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
  <!--
  <table align="center">
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Nombre:</td>
      <td><input type="text" name="nombre" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Color:</td>
      <td valign="baseline"><table>
        <tr>
          <td><input name="color" type="radio" value="cat_azul" checked="checked" />
            Azúl</td>
        </tr>
        <tr>
          <td><input type="radio" name="color" value="cat_morado" />
            Morado</td>
        </tr>
        <tr>
          <td><input type="radio" name="color" value="cat_verde" />
            Verde</td>
        </tr>
      </table></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">&nbsp;</td>
      <td><input type="submit" value="Insert record" /></td>
    </tr>
  </table>
-->
  <input type="hidden" name="MM_insert" value="form1" />
</form>
<?php include 'admin_layout/footer.php';?>
<?php include 'admin_layout/foot.php';?>