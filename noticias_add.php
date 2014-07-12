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
		$noticias =  "noticias_img/noticias.jpg";
       
    }
	
	/*$archivo_pdf = $_FILES["pdf"]['name'];
	if ($archivo_pdf != "") {
        $pdfs =  "noticias_pdf/".$prefijo."_".$archivo_pdf;
        if (copy($_FILES['pdf']['tmp_name'],$pdfs)) {
            $statusb = "Archivo subido: <b>".$archivo_pdf."</b>";
        } else {
            $statusb = "Error al subir el archivo";
        }
    } else {
		$pdfs =  "noticias_img/noticias.jpg";
       
    }*/
	
  /*$insertSQL = sprintf("INSERT INTO noticias (titulo, subtitulo, cuerpo, foto, pdf) VALUES (%s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['titulo'], "text"),
                       GetSQLValueString($_POST['subtitulo'], "text"),
                       GetSQLValueString($_POST['cuerpo'], "text"),
                       GetSQLValueString($noticias, "text"),
                       GetSQLValueString($pdfs, "text"));*/
					   
	$insertSQL = sprintf("INSERT INTO noticias (titulo, subtitulo, cuerpo, foto) VALUES (%s, %s, %s, %s)",
                       GetSQLValueString($_POST['titulo'], "text"),
                       GetSQLValueString($_POST['subtitulo'], "text"),
                       GetSQLValueString($_POST['cuerpo'], "text"),
                       GetSQLValueString($noticias, "text"));

  mysql_select_db($database_connection, $connection);
  $Result1 = mysql_query($insertSQL, $connection) or die(mysql_error());

  $insertGoTo = "noticias_admin.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}
?>
<?php include 'admin_layout/head.php';?>
<?php include 'admin_layout/header.php';?>

 
<h4 class="titulo">Agregar Noticias</h4>
<div class="container-fluid">
  
  <div class="alert_info row no-margin">
    <i class="fa fa-info-circle fa-2x"></i>
    <p class=" text-info mt5">
      
      Todos los campos son obligatorios
    </p>
      
  </div>
  <form role="form" action="<?php //echo $editFormAction; ?>" method="post" name="form1" id="form1" enctype="multipart/form-data">
    <div class="row">
      <div class="col-md-6">
        <div class="row">
          <div class="col-xs-12">
            <div class="form-group">
              <label>T&iacute;tulo:</label>
              <input class="form-control" name="titulo" type="text" id="titulo" value="" />
            </div>
          </div>
          <div class="col-xs-12">
            <div class="form-group">
              <label>Subtitulo:</label>
              <textarea class="form-control" name="subtitulo"  id="subtitulo" ></textarea>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label>Foto:</label>
          <input name="foto" type="file" size="35" class=""/>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-xs-12">
        <div class="form-group">
          <label>Cuerpo:</label>
          <textarea class="form-control" name="cuerpo" cols="50" rows="5" id="cuerpo"></textarea>
        </div>
      </div>
    </div>
    <div class="row btn_bar">
      <div class="col-md-2 pull-right">
        <input class="pull-right btn btn-ok" type="submit" value="Guardar" />
      </div>
    </div>
    <input type="hidden" name="MM_insert" value="form1" />
  </form>
  <!--
  <form action="<?php //echo $editFormAction; ?>" method="post" name="form1" id="form1" enctype="multipart/form-data">
    <table align="center">
      <tr valign="baseline">
        <td nowrap="nowrap" align="right">Titulo:</td>
        <td><input name="titulo" type="text" id="titulo" value="" size="50" /></td>
      </tr>
      <tr valign="baseline">
        <td nowrap="nowrap" align="right">Subtitulo:</td>
        <td><textarea name="subtitulo" cols="50" rows="5" id="subtitulo" ></textarea></td>
      </tr>
      <tr valign="baseline">
        <td nowrap="nowrap" align="right" valign="top">Cuerpo:</td>
        <td><textarea name="cuerpo" cols="50" rows="5" id="cuerpo"></textarea></td>
      </tr>
      <tr valign="baseline">
        <td nowrap="nowrap" align="right">Foto:</td>
        <td>
        <input name="foto" type="file" size="35" class=""/>
        </td>
      </tr>
      <tr valign="baseline">
        <td nowrap="nowrap" align="right">Pdf:</td>
        <td><input name="pdf" type="file" size="35" class=""/></td>
      </tr>
      <tr valign="baseline">
        <td nowrap="nowrap" align="right">&nbsp;</td>
        <td><input type="submit" value="Insert record" /></td>
      </tr>
    </table>
    <input type="hidden" name="MM_insert" value="form1" />
  </form>
-->
</div>
<?php include 'admin_layout/footer.php';?>
<?php include 'admin_layout/foot.php';?>
