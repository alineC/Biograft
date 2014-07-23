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
	
	$archivo = $_FILES["archivo"]['name'];
    $prefijo = substr(md5(uniqid(rand())),0,6);
   
     if ($archivo != "") {
        // guardamos el archivo a la carpeta files
        $productos =  "productos_img/".$prefijo."_".$archivo;
        if (copy($_FILES['archivo']['tmp_name'],$productos)) {
            $status = "Archivo subido: <b>".$archivo."</b>";
        } else {
            $status = "Error al subir el archivo";
        }
    } else {
		$productos =  $_POST['foto'];
       
    }
	
  $updateSQL = sprintf("UPDATE productos SET categoria=%s, nombre=%s, foto=%s, registro=%s, descripcion=%s, aplicaciones=%s, cproducto=%s, activo=%s WHERE id=%s",
                       GetSQLValueString($_POST['categoria'], "int"),
                       GetSQLValueString($_POST['nombre'], "text"),
                       GetSQLValueString($productos, "text"),
                       GetSQLValueString($_POST['registro'], "text"),
                       GetSQLValueString($_POST['descripcion'], "text"),
                       GetSQLValueString($_POST['aplicaciones'], "text"),
                       GetSQLValueString($_POST['cproducto'], "text"),
                       GetSQLValueString(isset($_POST['activo']) ? "true" : "", "defined","1","0"),
                       GetSQLValueString($_POST['id'], "int"));

  mysql_select_db($database_connection, $connection);
  $Result1 = mysql_query($updateSQL, $connection) or die(mysql_error());

  $updateGoTo = "productos_admin.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
}

$colname_productos = "-1";
if (isset($_GET['id'])) {
  $colname_productos = $_GET['id'];
}
mysql_select_db($database_connection, $connection);
$query_productos = sprintf("SELECT * FROM productos WHERE id = %s", GetSQLValueString($colname_productos, "int"));
$productos = mysql_query($query_productos, $connection) or die(mysql_error());
$row_productos = mysql_fetch_assoc($productos);
$totalRows_productos = mysql_num_rows($productos);
?>
<?php include 'admin_layout/head.php';?>
<?php include 'admin_layout/header.php';?>
<h4 class="titulo">Editar Producto</h4>
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
        <label>Nombre</label>
        <input class="form-control" type="text" name="nombre" value="<?php echo htmlentities($row_productos['nombre'], ENT_COMPAT, 'UTF-8'); ?>" size="32" />
      </div>
    </div>
    <div class="col-md-4">
      <div class="form-group">
        <label>Categoria</label>
        <select name="categoria" class="form-control">
        <option value="1" <?php if (!(strcmp(1, htmlentities($row_productos['categoria'], ENT_COMPAT, 'UTF-8')))) {echo "SELECTED";} ?>>BioSponge</option>
        <option value="2" <?php if (!(strcmp(2, htmlentities($row_productos['categoria'], ENT_COMPAT, 'UTF-8')))) {echo "SELECTED";} ?>>BioDBM</option>
        <option value="3" <?php if (!(strcmp(3, htmlentities($row_productos['categoria'], ENT_COMPAT, 'UTF-8')))) {echo "SELECTED";} ?>>Hueso Esponjoso</option>
        <option value="4" <?php if (!(strcmp(4, htmlentities($row_productos['categoria'], ENT_COMPAT, 'UTF-8')))) {echo "SELECTED";} ?>>Cu&ntilde;a &Oacute;sea</option>
        <option value="5" <?php if (!(strcmp(5, htmlentities($row_productos['categoria'], ENT_COMPAT, 'UTF-8')))) {echo "SELECTED";} ?>>Bloques y Tiras</option>
        <option value="6" <?php if (!(strcmp(6, htmlentities($row_productos['categoria'], ENT_COMPAT, 'UTF-8')))) {echo "SELECTED";} ?>>Di&aacute;fisis y Hemidi&aacute;fisis</option>
        <option value="7" <?php if (!(strcmp(7, htmlentities($row_productos['categoria'], ENT_COMPAT, 'UTF-8')))) {echo "SELECTED";} ?>>Cabeza Femoral sin cart&iacute;lago</option>
        <option value="8" <?php if (!(strcmp(8, htmlentities($row_productos['categoria'], ENT_COMPAT, 'UTF-8')))) {echo "SELECTED";} ?>>Tendones</option>
        </select>
      </div>
    </div>
    <div class="col-md-4">
      <div class="form-group">
        <label>Registro</label>
        <input class="form-control" type="text" name="registro" value="<?php echo htmlentities($row_productos['registro'], ENT_COMPAT, 'UTF-8'); ?>" size="32"/>
      </div>
    </div>
    <div class="col-md-4">
      <div class="form-group">
        <label>Foto</label>
        <input class="form-control" type="text" name="foto" value="<?php echo htmlentities($row_productos['foto'], ENT_COMPAT, 'UTF-8'); ?>" size="32" readonly="readonly" />
      </div>
    </div>
    <div class="col-md-4">
      <div class="form-group">
        <label>Elegir otra imagen</label>
        <input name="archivo" type="file" size="35" class=""/>
      </div>
    </div>
    <div class="col-md-4">
        <div class="checkbox">
          <label>
            <input type="checkbox" name="activo" value=""  <?php if (!(strcmp(htmlentities($row_productos['activo'], ENT_COMPAT, 'UTF-8'),"1"))) {echo "checked=\"checked\"";} ?> > Mostrar en el Home
          </label>
        </div>
      </div>
  </div>
  <div class="row">
    <div class="col-md-6">
      <div class="form-group">
        <label>Descripcion</label>
        <textarea name="descripcion" cols="50" rows="5"><?php echo htmlentities($row_productos['descripcion'], ENT_COMPAT, 'UTF-8'); ?></textarea>
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group">
        <label>Aplicaciones</label>
        <textarea name="aplicaciones" cols="50" rows="5"><?php echo htmlentities($row_productos['aplicaciones'], ENT_COMPAT, 'UTF-8'); ?></textarea>
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group">
        <label>codigo del producto</label>
        <textarea name="cproducto" cols="50" rows="5"><?php echo htmlentities($row_productos['cproducto'], ENT_COMPAT, 'UTF-8'); ?></textarea>
      </div>
    </div>
  </div>
  <div class="row btn_bar">
      <div class="col-md-2 pull-right">
        <input class="pull-right btn btn-ok" name="enviar" type="submit" value="Guardar" />
      </div>
  </div>
  <input type="hidden" name="MM_update" value="form1" />
  <input type="hidden" name="id" value="<?php echo $row_productos['id']; ?>" />
</form>
</div>

</div>
</body>
</html>
<?php
mysql_free_result($productos);
?>
