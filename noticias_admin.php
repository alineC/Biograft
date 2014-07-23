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
$query_noticias = "SELECT * FROM noticias";
$noticias = mysql_query($query_noticias, $connection) or die(mysql_error());
$row_noticias = mysql_fetch_assoc($noticias);
$totalRows_noticias = mysql_num_rows($noticias);
?>

<?php include 'admin_layout/head.php';?>
<?php include 'admin_layout/header.php';?>

<div class="row titulo">
  <div class="col-xs-10">
    <h4>Noticias</h4>
  </div>
  <div class="col-xs-2">
    <a class="btn-ok btn-sm btn pull-right" href="noticias_add.php">Agregar Noticia</a>
  </div>
</div>
<div class="container-fluid">
  <div class="table-responsive">
    <table class="table-hover table table-striped">
      <thead>
        <tr>
          <th>ID</th>
          <th>T&iacute;tulo</th>
          <th>Subt&iacute;tulo</th>
          <th>Cuerpo</th>
          <th>Foto</th>
          <th>Fecha</th>
          <th>Acciones</th>
        </tr>
        
      </thead>
      <tbody>
      <?php do { ?>
        <tr>
          <td><?php echo $row_noticias['id']; ?></td>
          <td><?php echo $row_noticias['titulo']; ?></td>
          <td><?php echo $row_noticias['subtitulo']; ?></td>
          <td><?php echo $row_noticias['cuerpo']; ?></td>
          <td ><?php //echo $row_productos['foto']; ?> <img  style="width: 100px;" class="img table-img" src="<?php echo $row_productos['foto']; ?>"> </td>
          <td><?php echo $row_noticias['fecha']; ?></td>
          <td>
            <a class="actn_editar" href="noticias_edit.php?id=<?php echo $row_noticias['id']; ?>">
              <i class="fa fa-pencil-square-o"></i>Editar
            </a>
            <a class="actn_eliminar" href="noticias_eliminar.php?id=<?php echo $row_noticias['id']; ?>">
                <i class="fa fa-times"></i> Eliminar
            </a>
          </td>
        </tr>
        <?php } while ($row_noticias = mysql_fetch_assoc($noticias)); ?>
      </tbody>
    </table>
  </div>
</div>

</body>
</html>
<?php
mysql_free_result($noticias);
?>
