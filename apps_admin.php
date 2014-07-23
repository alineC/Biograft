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

$colname_p_app = "-1";
if (isset($_GET['id'])) {
  $colname_p_app = $_GET['id'];
}
mysql_select_db($database_connection, $connection);
$query_p_app = sprintf("SELECT * FROM prod_aplicaciones WHERE producto_id = %s", GetSQLValueString($colname_p_app, "int"));
$p_app = mysql_query($query_p_app, $connection) or die(mysql_error());
$row_apps = mysql_fetch_assoc($p_app);
$totalRows_p_app = mysql_num_rows($p_app);

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
<?php include 'admin_layout/head.php';?>
<?php include 'admin_layout/header.php';?>

<div class="row titulo">
  <div class="col-xs-8">
    <h4>APLICACIONES DEL PRODUCTO - <small><?php echo $row_producto['nombre']; ?></small> </h4>
  </div>
  
  <div class="col-xs-2">
    <a class="btn-ok btn-sm btn pull-right" href="productos_admin.php"><i class="fa fa-angle-double-left"></i>  Regresar a Productos</a>
  </div>
  <div class="col-xs-2">
    <a class="btn-ok btn-sm btn pull-right" href="apps_add.php?id=<?php echo $row_producto['id']; ?>">Agregar</a>
  </div>
  
  
</div>
<div class="container-fluid">
  <div class="table-responsive">
    <table class="table-hover table table-striped">
  <tr>
  <thead>
    <td>producto_id</td>
    <td>aplicacion</td>
  	<th>Acciones</th>
   </thead>
  </tr>
  <tbody>
  <?php do { ?>
    <tr>
      <td><?php echo $row_apps['producto_id']; ?></td>
      <td><?php echo $row_apps['aplicacion']; ?></td>
      <td>
        <a style="display: inline;" class="actn_eliminar" href="apps_eliminar.php?idproducto=<?php echo $row_apps['id']; ?>&id=<?php echo $row_apps['producto_id']; ?>"><i class="fa fa-times"></i> Eliminar</a>
      </td>
    </tr>
    </tr>
    <?php } while ($row_apps = mysql_fetch_assoc($p_app)); ?>
    </tbody>
</table>
</body>
</html>
<?php
mysql_free_result($p_app);

mysql_free_result($producto);
?>
