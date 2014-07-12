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
$query_tec = "SELECT * FROM tecnologia";
$tec = mysql_query($query_tec, $connection) or die(mysql_error());
$row_tec = mysql_fetch_assoc($tec);
$totalRows_tec = mysql_num_rows($tec);
?>
<?php include 'admin_layout/head.php';?>
<?php include 'admin_layout/header.php';?>

<div class="row titulo">
  <div class="col-xs-10">
    <h4>Galer&iacute;a Tecnolog&iacute;a</h4>
  </div>
  <div class="col-xs-2">
    <a class="btn-ok btn-sm btn pull-right" href="tecnologia_add.php">Agregar Imagen</a>
  </div>
</div>
<div class="container-fluid">
  <div class="table-responsive">
    <table class="table-hover table table-striped">
      <tr>
        <thead>
          <th>id</th>
          <th>titulo</th>
          <th>foto</th>
          <th>fecha</th>
          <th>Acciones</th>
        </thead>
        
      </tr>
      <tbody>
      <?php do { ?>

        <tr>
          <td><?php echo $row_tec['id']; ?></td>
          <td><?php echo $row_tec['titulo']; ?></td>
          <td><?php echo $row_tec['foto']; ?></td>
          <td><?php echo $row_tec['fecha']; ?></td>
          <td>
            <a class="actn_editar" href="tecnologias_edit.php?id=<?php echo $row_tec['id']; ?>"><i class="fa fa-pencil-square-o"></i> Editar</a>
            <a class="actn_eliminar" href="tecnologia_eliminar.php?id=<?php echo $row_tec['id']; ?>"><i class="fa fa-times"></i> Eliminar</a>
          </td>
        </tr>
        <?php } while ($row_tec = mysql_fetch_assoc($tec)); ?>
        </tbody>
    </table>
  </div>
</div>
<?php include 'admin_layout/footer.php';?>
<?php include 'admin_layout/foot.php';?>
<?php
mysql_free_result($tec);
?>
