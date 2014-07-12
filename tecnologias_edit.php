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
        $tec =  "tec_img/".$prefijo."_".$archivo;
        if (copy($_FILES['foto']['tmp_name'],$tec)) {
            $status = "Archivo subido: <b>".$archivo."</b>";
        } else {
            $tec = "Error al subir el archivo";
        }
    } else {
		$tec =  $_POST['foto'];
       
    }
	
	
  $updateSQL = sprintf("UPDATE tecnologia SET titulo=%s, foto=%s WHERE id=%s",
                       GetSQLValueString($_POST['titulo'], "text"),
                       GetSQLValueString($tec, "text"),
                       GetSQLValueString($_POST['id'], "int"));

  mysql_select_db($database_connection, $connection);
  $Result1 = mysql_query($updateSQL, $connection) or die(mysql_error());

  $updateGoTo = "tecnologia_admin.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
}

$colname_tec = "-1";
if (isset($_GET['id'])) {
  $colname_tec = $_GET['id'];
}
mysql_select_db($database_connection, $connection);
$query_tec = sprintf("SELECT * FROM tecnologia WHERE id = %s", GetSQLValueString($colname_tec, "int"));
$tec = mysql_query($query_tec, $connection) or die(mysql_error());
$row_tec = mysql_fetch_assoc($tec);
$totalRows_tec = mysql_num_rows($tec);
?>


<?php include 'admin_layout/head.php';?>
<?php include 'admin_layout/header.php';?>

<h4 class="titulo">Editar Imagen</h4>
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
          <input class="form-control" type="text" name="titulo" value="<?php echo htmlentities($row_tec['titulo'], ENT_COMPAT, 'UTF-8'); ?>" size="32" />
        </div>
      </div>
      <div class="col-md-4 col-sm-6">
        <div class="form-group">
          <label>Foto:</label>
          <input class="form-control" type="text" name="foto" value="<?php echo htmlentities($row_tec['foto'], ENT_COMPAT, 'UTF-8'); ?>" size="32" />
        </div>
      </div>
      <div class="col-md-4 col-sm-6">
        <div class="form-group">
          <label>Elegir nuevo archivo</label>
          <input name="foto" type="file" size="35" class=""/>
        </div>
      </div>
    </div>
    <div class="row btn_bar">
      <div class="col-md-2 pull-right">
        <input class="pull-right btn btn-ok" type="submit" value="Guardar" />
      </div>
    </div>
    <input type="hidden" name="MM_update" value="form1" />
    <input type="hidden" name="id" value="<?php echo $row_tec['id']; ?>" />
  </form>
</div>
<!--
<form action="<?php echo $editFormAction; ?>" method="post" name="form1" id="form1" enctype="multipart/form-data">
  <table align="center">
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Titulo:</td>
      <td><input type="text" name="titulo" value="<?php echo htmlentities($row_tec['titulo'], ENT_COMPAT, 'UTF-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Foto:</td>
      <td><input type="text" name="foto" value="<?php echo htmlentities($row_tec['foto'], ENT_COMPAT, 'UTF-8'); ?>" size="32" /></td>
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
  <input type="hidden" name="id" value="<?php echo $row_tec['id']; ?>" />
</form>
-->
<?php include 'admin_layout/footer.php';?>
<?php include 'admin_layout/foot.php';?>
<?php
mysql_free_result($tec);
?>
