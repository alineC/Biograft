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

$colname_cprod = "-1";
if (isset($_GET['id'])) {
  $colname_cprod = $_GET['id'];
}
mysql_select_db($database_connection, $connection);
$query_cprod = sprintf("SELECT * FROM cproductos WHERE producto_id = %s", GetSQLValueString($colname_cprod, "int"));
$cprod = mysql_query($query_cprod, $connection) or die(mysql_error());
$row_cprod = mysql_fetch_assoc($cprod);
$totalRows_cprod = mysql_num_rows($cprod);

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
  <div class="col-xs-10">
    <h4>CÓDIGOS DEL PRODUCTO : <?php echo $row_producto['nombre']; ?> </h4>
  </div>
  
  <div class="col-xs-2">
    <a class="btn-ok btn-sm btn pull-right" href="cproductos_add.php?id=<?php echo $row_producto['id']; ?>">Agregar</a>
  </div>
  
</div>
<div class="container-fluid">
  <div class="table-responsive">
    <table class="table-hover table table-striped">
  <tr>
  <thead>
    <td>producto_id</td>
    <td>códigos producto</td>
  	<th>Acciones</th>
   </thead>
  </tr>
  <tbody>
  <?php do { ?>
    <tr>
      <td><?php echo $row_cprod['producto_id']; ?></td>
      <td><?php echo $row_cprod['cproducto']; ?></td>
      <td>
            <a class="actn_eliminar" href="cproductos_eliminar.php?idproducto=<?php echo $row_cprod['id']; ?>&id=<?php echo $row_cprod['producto_id']; ?>"><i class="fa fa-times"></i> Eliminar</a>
          </td>
    </tr>
    </tr>
    <?php } while ($row_cprod = mysql_fetch_assoc($cprod)); ?>
    </tbody>
</table>
</body>
</html>
<?php
mysql_free_result($cprod);

mysql_free_result($producto);
?>
