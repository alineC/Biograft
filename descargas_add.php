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
	
	$imagen = $_FILES["imagen"]['name'];
    $prefijo = substr(md5(uniqid(rand())),0,6);
   
     if ($imagen != "") {
        // guardamos el archivo a la carpeta files
        $descargas =  "descargas_img/".$prefijo."_".$imagen;
        if (copy($_FILES['imagen']['tmp_name'],$descargas)) {
            $status = "Archivo subido: <b>".$imagen."</b>";
        } else {
            $status = "Error al subir el archivo";
        }
    } else {
		$descargas =  "descargas_img/noticias.jpg";   
    }
	
	$archivo = $_FILES["archivo"]['name'];
   
     if ($archivo != "") {
        // guardamos el archivo a la carpeta files
        $descarga =  "descargas_file/".$prefijo."_".$archivo;
        if (copy($_FILES['archivo']['tmp_name'],$descarga)) {
            $status = "Archivo subido: <b>".$archivo."</b>";
        } else {
            $status = "Error al subir el archivo";
        }
    } else {
		$descarga =  "descargas_file/noticias.jpg";   
    }
	
	
	
  $insertSQL = sprintf("INSERT INTO descargas (imagen, archivo) VALUES (%s, %s)",
                       GetSQLValueString($descargas, "text"),
                       GetSQLValueString($descarga, "text"));

  mysql_select_db($database_connection, $connection);
  $Result1 = mysql_query($insertSQL, $connection) or die(mysql_error());

  $insertGoTo = "descargas_admin.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}
?>
<?php include 'admin_layout/head.php';?>
<?php include 'admin_layout/header.php';?>

<h4 class="titulo">Agregar Descarga</h4>
<div class="container-fluid">
  
  <div class="alert_info row no-margin">
    <i class="fa fa-info-circle fa-2x"></i>
    <p class=" text-info mt5">
      
      Todos los campos son obligatorios
    </p>
  </div>

<form action="<?php echo $editFormAction; ?>" method="post" name="form1" id="form1" enctype="multipart/form-data">
  <div class="row">
    <div class="col-md-4">
      <div class="form-group">
        <label>Imagen:</label>
        <input name="imagen" type="file" size="35" class=""/>
      </div>
    </div>
    <div class="col-md-4">
      <div class="form-group">
        <label>Archivo:</label>
        <input name="archivo" type="file" size="35" class=""/>
      </div>
    </div>

  </div>
  <div class="row btn_bar">
    <div class="col-md-2 pull-right">
      <input class="pull-right btn btn-ok" name="enviar" type="submit" value="Guardar" />
    </div>
  </div>
  <!--
  <table align="center">
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Imagen:</td>
      <td><input name="imagen" type="file" size="35" class=""/></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Archivo:</td>
      <td><input name="archivo" type="file" size="35" class=""/></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">&nbsp;</td>
      <td><input type="submit" value="Insert record" /></td>
    </tr>
  </table>
-->
  <input type="hidden" name="MM_insert" value="form1" />
</form>
</div>
</body>
</html>