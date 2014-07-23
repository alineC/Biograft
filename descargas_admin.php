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

mysql_select_db($database_connection, $connection);
$query_descargas = "SELECT * FROM descargas ORDER BY id DESC";
$descargas = mysql_query($query_descargas, $connection) or die(mysql_error());
$row_descargas = mysql_fetch_assoc($descargas);
$totalRows_descargas = mysql_num_rows($descargas);
?>
<?php include 'admin_layout/head.php';?>
<?php include 'admin_layout/header.php';?>

<div class="row titulo">
  <div class="col-xs-10">
    <h4>Descargas</h4>
  </div>
  <div class="col-xs-2">
    <a class="btn-ok btn-sm btn pull-right" href="descargas_add.php">Agregar Descarga</a>
  </div>
</div>
<div class="container-fluid">
  <div class="table-responsive">
    <table class="table-hover table table-striped">
      <thead>
  <tr>
    <th>id</th>
    <th>imagen</th>
    <th>archivo</th>
    <th>fecha</th>
    <th>acciones</th>
  </tr>
  </thead>
      <tbody>
  <?php do { ?>
    <tr>
      <td><?php echo $row_descargas['id']; ?></td>
      <td><?php //echo $row_descargas['imagen']; ?> <img  style="width: 100px;" class="img table-img" src="<?php echo $row_descargas['imagen']; ?>"></td>
      <td><?php echo $row_descargas['archivo']; ?></td>
      <td><?php echo $row_descargas['fecha']; ?></td>
      <td>
        <a style="display: inline;" class="actn_eliminar" href="descargas_eliminar.php?id=<?php echo $row_descargas['id']; ?>">
            <i class="fa fa-times"></i> Eliminar
        </a>
      </td>
    </tr>
    <?php } while ($row_descargas = mysql_fetch_assoc($descargas)); ?>
    </tbody>
</table>
</body>
</html>
<?php
mysql_free_result($descargas);
?>
