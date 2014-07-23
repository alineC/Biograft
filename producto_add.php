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
$query_categorias = "SELECT * FROM categorias ORDER BY id ASC";
$categorias = mysql_query($query_categorias, $connection) or die(mysql_error());
$row_categorias = mysql_fetch_assoc($categorias);
$totalRows_categorias = mysql_num_rows($categorias);

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
	
	$archivo = $_FILES["foto"]['name'];
    $prefijo = substr(md5(uniqid(rand())),0,6);
   
     if ($archivo != "") {
        // guardamos el archivo a la carpeta files
        $productos =  "productos_img/".$prefijo."_".$archivo;
        if (copy($_FILES['foto']['tmp_name'],$productos)) {
            $status = "Archivo subido: <b>".$archivo."</b>";
        } else {
            $status = "Error al subir el archivo";
        }
    } else {
		$productos =  "productos_img/productos.jpg";
       
    }
	
	
  $insertSQL = sprintf("INSERT INTO productos (categoria, nombre, foto, registro, descripcion, aplicaciones, cproducto, activo) VALUES (%s, %s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['categoria'], "int"),
                       GetSQLValueString($_POST['nombre'], "text"),
                       GetSQLValueString($productos, "text"),
                       GetSQLValueString($_POST['registro'], "text"),
                       GetSQLValueString($_POST['descripcion'], "text"),
                       GetSQLValueString($_POST['aplicaciones'], "text"),
					   GetSQLValueString($_POST['cproducto'], "text"),
                       GetSQLValueString(isset($_POST['activo']) ? "true" : "", "defined","1","0"));

  mysql_select_db($database_connection, $connection);
  $Result1 = mysql_query($insertSQL, $connection) or die(mysql_error());

  $insertGoTo = "productos_admin.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}
?>
<?php include 'admin_layout/head.php';?>
<?php include 'admin_layout/header.php';?>
<h4 class="titulo">Agregar Producto</h4>
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
          <input class="form-control" type="text" name="nombre" value="" size="32" />
        </div>
      </div>
      <div class="col-md-4">
        <div class="form-group">
          <label>Categoria</label>
          <select name="categoria" class="form-control">
            <?php
do {  
?>
            <option value="<?php echo $row_categorias['id']?>"><?php echo $row_categorias['nombre']?></option>
            <?php
} while ($row_categorias = mysql_fetch_assoc($categorias));
  $rows = mysql_num_rows($categorias);
  if($rows > 0) {
      mysql_data_seek($categorias, 0);
	  $row_categorias = mysql_fetch_assoc($categorias);
  }
?>
          </select>
        </div>
      </div>
      <div class="col-md-4">
        <div class="form-group">
          <label>Registro</label>
          <input class="form-control" type="text" name="registro" value="" size="32"/>
        </div>
      </div>
      <div class="col-md-4">
        <div class="form-group">
          <label>Foto</label>
          <input name="foto" type="file" size="35" />
        </div>
      </div>
      
      <div class="col-md-4">
        <div class="checkbox">
          <label>
            <input type="checkbox" name="activo" value="" checked="checked" > Mostrar en el Home
          </label>
        </div>
      </div>

    </div>
    <hr>
    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          <label>Descripcion</label>
          <textarea name="descripcion" cols="50" rows="5"></textarea>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label>Aplicaciones</label>
          <textarea name="aplicaciones" cols="50" rows="5"></textarea>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label>C&oacute;digos de Producto</label>
          <textarea name="cproducto" cols="50" rows="5"></textarea>
        </div>
      </div>
    </div>
    <div class="row btn_bar">
      <div class="col-md-2 pull-right">
        <input class="pull-right btn btn-ok" name="enviar" type="submit" value="Guardar" />
      </div>
    </div>
    <input type="hidden" name="MM_insert" value="form1" />
  </form>
</div>
<!--
<form action="<?php echo $editFormAction; ?>" method="post" name="form1" id="form1" enctype="multipart/form-data">
  <table align="center">
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Categoria:</td>
      <td><select name="categoria">
        <option value="1" <?php if (!(strcmp(1, ""))) {echo "SELECTED";} ?>>categoria1</option>
        <option value="2" <?php if (!(strcmp(2, ""))) {echo "SELECTED";} ?>>categoria2</option>
        <option value="3" <?php if (!(strcmp(3, ""))) {echo "SELECTED";} ?>>categoria3</option>
        <option value="4" <?php if (!(strcmp(4, ""))) {echo "SELECTED";} ?>>categoria4</option>
      </select></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Nombre:</td>
      <td><input type="text" name="nombre" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Foto:</td>
      <td><input name="foto" type="file" size="35" class=""/></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Registro:</td>
      <td><input type="text" name="registro" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right" valign="top">Descripcion:</td>
      <td><textarea name="descripcion" cols="50" rows="5"></textarea></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right" valign="top">Aplicaciones:</td>
      <td><textarea name="aplicaciones" cols="50" rows="5"></textarea></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right" valign="top">Códigos de producto </td>
      <td><textarea name="cproducto" cols="50" rows="5"></textarea></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">mostrar en pagina :</td>
      <td><input type="checkbox" name="activo" value="" checked="checked" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">&nbsp;</td>
      <td><input type="submit" name="enviar" value="Insert record" /></td>
    </tr>
  </table>
  <input type="hidden" name="MM_insert" value="form1" />
</form>
<p>&nbsp;</p>
-->
<?php include 'admin_layout/footer.php';?>
<?php include 'admin_layout/foot.php';?>
<?php
mysql_free_result($categorias);
?>
