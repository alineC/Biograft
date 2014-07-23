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
$query_categorias = "SELECT * FROM categorias ORDER BY orden DESC";
$categorias = mysql_query($query_categorias, $connection) or die(mysql_error());
$row_categorias = mysql_fetch_assoc($categorias);
$totalRows_categorias = mysql_num_rows($categorias);
?>
<?php include 'admin_layout/head.php';?>
<?php include 'admin_layout/header.php';?>

<div class="row titulo">
  <div class="col-xs-10">
    <h4>Categorias</h4>
  </div>
  <div class="col-xs-2">
    <a class="btn-ok btn-sm btn pull-right" href="categorias_add.php">Agregar Categoria</a>
  </div>
</div>
<div class="container-fluid">
  <div class="">
  <table style="width: 100%;" class="">
  <tbody><MM_REPEATEDREGION SOURCE="@@rs@@"><MM:DECORATION OUTLINE="Repeat" OUTLINEID=1>
    <tr>
      <td>
        <table class="table-hover table table-striped">
        <tr></tr>
        <thead>
          <tr>
            <th>id</th>
            <th>nombre</th>
            <th>orden</th>
            <th>color</th>
            <th>fecha</th>
          </tr>
        </thead>
        <tbody>
          <?php do { ?>
          <tr>
            <td><?php echo $row_categorias['id']; ?></td>
            <td><?php echo $row_categorias['nombre']; ?></td>
            <td><?php echo $row_categorias['orden']; ?></td>
            <td><i class="fa fa-square fa-lg text-<?php echo $row_categorias['color']; ?>"></i></td>
            <td><?php echo $row_categorias['fecha']; ?></td>
            <td><a style="display: inline;" class="actn_editar" href="categorias_edit.php?id=<?php echo $row_categorias['id']; ?>"><i class="fa fa-pencil-square-o"></i> Editar</a> 
      <!--      <a class="actn_eliminar" href="categorias_eliminar.php?id=<?php echo $row_categorias['id']; ?>"><i class="fa fa-times"></i> Eliminar</a>-->
            
            </td>
          </tr>
          <?php } while ($row_categorias = mysql_fetch_assoc($categorias)); ?>
        </tbody>
</table>
</body>
</html>
<?php
mysql_free_result($categorias);
?>
