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
$query_productos = "SELECT productos.*, categorias.id AS cate_id, categorias.nombre AS cate_nombre FROM productos, categorias WHERE productos.categoria=categorias.id ORDER BY productos.id";
$productos = mysql_query($query_productos, $connection) or die(mysql_error());
$row_productos = mysql_fetch_assoc($productos);
$totalRows_productos = mysql_num_rows($productos);
?>
<?php include 'admin_layout/head.php';?>
<?php include 'admin_layout/header.php';?>

<div class="row titulo">
  <div class="col-xs-10">
    <h4>Productos</h4>
  </div>
  <div class="col-xs-2">
    <a class="btn-ok btn-sm btn pull-right" href="producto_add.php">Agregar Producto</a>
  </div>
</div>
<div class="container-fluid">
  <div class="">
  <table class="class="table-hover table table-striped"">
  <tbody><MM_REPEATEDREGION SOURCE="@@rs@@"><MM:DECORATION OUTLINE="Repeat" OUTLINEID=1>
    <tr>
      <td>
        <table class="table table-striped" >
        <thead>
          <tr>
            <th>ID</th>
            <th>Categoria</th>
            <th>Nombre</th>
            <th>Foto</th>
            <th>Registro</th>
            <th>Activo</th>
            <th>Fecha</th>
            <th>&nbsp;</th>
            <th>Acciones</th>
          </tr>
        </thead>
        <tbody>
          <?php do { ?>
            <tr>
              <td><?php echo $row_productos['id']; ?></td>
              <td><?php echo $row_productos['cate_nombre']; ?></td>
              <td><?php echo $row_productos['nombre']; ?></td>
              <td ><?php //echo $row_productos['foto']; ?> <img  style="width: 100px;" class="img table-img" src="<?php echo $row_productos['foto']; ?>"> </td>
              <td><?php echo $row_productos['registro']; ?></td>
              <td><?php echo $row_productos['activo']; ?></td>
              <td><?php echo $row_productos['fecha']; ?></td>
              <td><a href="apps_admin.php?id=<?php echo $row_productos['id']; ?>">Agregar aplicaciones</a></td>
              <td><a class="actn_editar" href="productos_edit.php?id=<?php echo $row_productos['id']; ?>"><i class="fa fa-pencil-square-o"></i> Editar</a> <a class="actn_eliminar" href="productos_eliminar.php?id=<?php echo $row_productos['id']; ?>"><i class="fa fa-times"></i> Eliminar</a></td>
            </tr>
            <tr>
              <td colspan="11">
                <div class="panel panel-default">
                  <div class="panel-heading">
                    <h4 class="panel-title">
                      <a data-toggle="collapse" data-parent="#accordion" href="#collapse_1">
                        Detalles
                      </a>
                    </h4>
                  </div>
                  <div id="collapse_1" class="panel-collapse collapse in">
                    <div class="panel-body">
                      <div class="row">
                        <div class="col-xs-4">
                          <h5 class="page-header text-primary">Descripción</h5>
                          <?php echo $row_productos['descripcion']; ?>
                        </div>
                        <div class="col-xs-4">
                          <h5 class="page-header text-primary">Aplicaciones</h5>
                          <?php echo $row_productos['aplicaciones']; ?>
                        </div>
                        <div class="col-xs-4">
                          <h5 class="page-header text-primary">Código de Producto</h5>
                          <?php echo $row_productos['cproducto']; ?>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </td>
            </tr>
          <!--
          <tr>
            <td><?php echo $row_productos['id']; ?></td>
            <td><?php echo $row_productos['nombre']; ?></td>
            <td><?php echo $row_productos['nombre']; ?></td>
            <td ><?php //echo $row_productos['foto']; ?> <img  style="width: 100px;" class="img table-img" src="<?php echo $row_productos['foto']; ?>"> </td>
            <td><?php echo $row_productos['registro']; ?></td>
            <td><?php echo $row_productos['descripcion']; ?></td>
            <td><?php echo $row_productos['aplicaciones']; ?></td>
            <td><?php echo $row_productos['cproducto']; ?></td>
            <td><?php echo $row_productos['activo']; ?></td>
            <td><?php echo $row_productos['fecha']; ?></td>
            <td><a href="apps_admin.php?id=<?php echo $row_productos['id']; ?>">Agregar aplicaciones</a></td>
            <td><a class="actn_editar" href="productos_edit.php?id=<?php echo $row_productos['id']; ?>"><i class="fa fa-pencil-square-o"></i> Editar</a> <a class="actn_eliminar" href="productos_eliminar.php?id=<?php echo $row_productos['id']; ?>"><i class="fa fa-times"></i> Eliminar</a></td>
          </tr>
        -->
          <?php } while ($row_productos = mysql_fetch_assoc($productos)); ?>
        </tbody>
      </table>
    </td>
    </tr>
    </MM:DECORATION></MM_REPEATEDREGION>
  </tbody>
</table>
</body>
</html>
<?php
mysql_free_result($productos);
?>
