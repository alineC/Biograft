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
        $tec =  "tec_img/".$prefijo."_".$archivo;
        if (copy($_FILES['foto']['tmp_name'],$tec)) {
            $status = "Archivo subido: <b>".$archivo."</b>";
        } else {
            $tec = "Error al subir el archivo";
        }
    } else {
		$tec =  "tec_img/tec.jpg";
       
    }
	
  $insertSQL = sprintf("INSERT INTO tecnologia (titulo, foto) VALUES (%s, %s)",
                       GetSQLValueString($_POST['titulo'], "text"),
                       GetSQLValueString($tec, "text"));

  mysql_select_db($database_connection, $connection);
  $Result1 = mysql_query($insertSQL, $connection) or die(mysql_error());

  $insertGoTo = "tecnologia_admin.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}
?>
<?php include 'admin_layout/head.php';?>
<?php include 'admin_layout/header.php';?>

<h4 class="titulo">Agregar Imagen</h4>
<div class="container-fluid">
  
  <div class="alert_info row no-margin">
    <i class="fa fa-info-circle fa-2x"></i>
    <p class=" text-info mt5">
      
      Todos los campos son obligatorios
    </p>
      
  </div>
<form action="<?php echo $editFormAction; ?>" method="post" name="form1" id="form1" enctype="multipart/form-data">
  <div class="row">
    <div class="col-md-4 col-sm-6">
      <div class="form-group">
        <label>T&iacute;tulo:</label>
        <input class="form-control" type="text" name="titulo" value="" size="32" />
      </div>
    </div>
    <div class="col-md-4 col-sm-6">
      <div class="form-group">
        <label>Foto:</label>
        <input name="foto" type="file" size="35" class=""/>
      </div>
    </div>
  </div>
  <div class="row btn_bar">
    <div class="col-md-2 pull-right">
      <input class="pull-right btn btn-ok" type="submit" value="Guardar" />
    </div>
  </div>
  <input type="hidden" name="MM_insert" value="form1" />
</div>
</form>

<!--
<form action="<?php echo $editFormAction; ?>" method="post" name="form1" id="form1" enctype="multipart/form-data">
  <table align="center">
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Titulo:</td>
      <td><input type="text" name="titulo" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Foto:</td>
      <td><input name="foto" type="file" size="35" class=""/></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">&nbsp;</td>
      <td><input type="submit" value="Insert record" /></td>
    </tr>
  </table>
  <input type="hidden" name="MM_insert" value="form1" />
</form>
-->
<p>&nbsp;</p>
<?php include 'admin_layout/footer.php';?>
<?php include 'admin_layout/foot.php';?>