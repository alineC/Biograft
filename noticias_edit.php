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
	 
	 $archivo = $_FILES["foto"]['name'];
    $prefijo = substr(md5(uniqid(rand())),0,6);
	
	if ($archivo != "") {
        // guardamos el archivo a la carpeta files
        $noticias =  "noticias_img/".$prefijo."_".$archivo;
        if (copy($_FILES['foto']['tmp_name'],$noticias)) {
            $status = "Archivo subido: <b>".$archivo."</b>";
        } else {
            $status = "Error al subir el archivo";
        }
    } else {
		$noticias =  $_POST['foto'];
       
    }
	
	
  $updateSQL = sprintf("UPDATE noticias SET titulo=%s, subtitulo=%s, cuerpo=%s, foto=%s WHERE id=%s",
                       GetSQLValueString($_POST['titulo'], "text"),
                       GetSQLValueString($_POST['subtitulo'], "text"),
                       GetSQLValueString($_POST['cuerpo'], "text"),
                       GetSQLValueString($noticias, "text"),
                       GetSQLValueString($_POST['id'], "int"));

  mysql_select_db($database_connection, $connection);
  $Result1 = mysql_query($updateSQL, $connection) or die(mysql_error());

  $updateGoTo = "noticias_admin.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
}

$colname_noticias = "-1";
if (isset($_GET['id'])) {
  $colname_noticias = $_GET['id'];
}
mysql_select_db($database_connection, $connection);
$query_noticias = sprintf("SELECT * FROM noticias WHERE id = %s", GetSQLValueString($colname_noticias, "int"));
$noticias = mysql_query($query_noticias, $connection) or die(mysql_error());
$row_noticias = mysql_fetch_assoc($noticias);
$totalRows_noticias = mysql_num_rows($noticias);
?>
<?php include 'admin_layout/head.php';?>
<?php include 'admin_layout/header.php';?>
<h4 class="titulo">Editar Noticia</h4>
<div class="container-fluid">
  
  <div class="alert_info row no-margin">
    <i class="fa fa-info-circle fa-2x"></i>
    <p class=" text-info mt5">
      
      Todos los campos son obligatorios
    </p>
  </div>
  <form role="form" action="<?php echo $editFormAction; ?>" method="post" name="form1" id="form1" enctype="multipart/form-data">
    <div class="row">
      <div class="col-md-6">
        <div class="row">
          <div class="col-xs-12">
            <div class="form-group">
              <label>T&iacute;tulo:</label>
              <input class="form-control" type="text" name="titulo" value="<?php echo htmlentities($row_noticias['titulo'], ENT_COMPAT, 'UTF-8'); ?>" size="32" />
            </div>
          </div>
          <div class="col-xs-12">
            <div class="form-group">
              <label>Subtitulo:</label>
              <textarea name="subtitulo" id="subtitulo" cols="50" rows="5"><?php echo htmlentities($row_noticias['subtitulo'], ENT_COMPAT, 'UTF-8'); ?></textarea>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-sm-6">
        <div class="form-group">
          <label>Foto:</label>
          <input class="form-control" type="text" readonly="readonly" name="foto" value="<?php echo htmlentities($row_noticias['foto'], ENT_COMPAT, 'UTF-8'); ?>" size="32" />
        </div>
      </div>
      <div class="col-md-6 col-sm-6">
        <label>Elegir nueva foto</label>
        <input name="foto" type="file" size="35" class=""/>
      </div>
    </div>
    <div class="row">
      <div class="col-xs-12">
        <div class="form-group">
          <label>Cuerpo:</label>
          <textarea name="cuerpo" id="cuerpo" cols="50" rows="5"><?php echo htmlentities($row_noticias['cuerpo'], ENT_COMPAT, 'UTF-8'); ?></textarea>
        </div>
      </div>
    </div>
    <div class="row btn_bar">
      <div class="col-md-2 pull-right">
        <input class="pull-right btn btn-ok" type="submit" value="Guardar" />
      </div>
    </div>
    <input type="hidden" name="id" value="<?php echo $row_noticias['id']; ?>" />
  </form>
<!--
<form action="<?php echo $editFormAction; ?>" method="post" name="form1" id="form1" enctype="multipart/form-data">
  <table align="center">
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Titulo:</td>
      <td><input type="text" name="titulo" value="<?php echo htmlentities($row_noticias['titulo'], ENT_COMPAT, 'UTF-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Subtitulo:</td>
      <td>
      <textarea name="subtitulo" id="subtitulo" cols="50" rows="5"><?php echo htmlentities($row_noticias['subtitulo'], ENT_COMPAT, 'UTF-8'); ?></textarea>
      </td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Cuerpo:</td>
      <td><textarea name="cuerpo" id="cuerpo" cols="50" rows="5"><?php echo htmlentities($row_noticias['cuerpo'], ENT_COMPAT, 'UTF-8'); ?></textarea>
      
      </td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Foto:</td>
      <td><input type="text" readonly="readonly" name="foto" value="<?php echo htmlentities($row_noticias['foto'], ENT_COMPAT, 'UTF-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">&nbsp;</td>
      <td><input name="foto" type="file" size="35" class=""/></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">&nbsp;</td>
      <td><input type="submit" value="Update record" /></td>
    </tr>
  </table>
  <input type="hidden" name="MM_update" value="form1" />
  <input type="hidden" name="id" value="<?php echo $row_noticias['id']; ?>" />
</form>
-->
<?php include 'admin_layout/footer.php';?>
<?php include 'admin_layout/foot.php';?>
<?php
mysql_free_result($noticias);
?>
