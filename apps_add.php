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
  /*$insertSQL = sprintf("INSERT INTO cproductos (producto_id, cproducto) VALUES (%s, %s)",
                       GetSQLValueString($_POST['producto_id'], "int"),
                       GetSQLValueString($_POST['cproducto'], "int"));*/


 $con=mysqli_connect($hostname_connection,$username_connection
,$password_connection,$database_connection);
  
  if (isset($_POST['enviar'])) {
        foreach ($_POST['tags'] as $Cprod)
            $Cprods[] = $Cprod.',';
			
			//die($Cprod);
    }
	$cproducto = implode($Cprods);
	$arraycp=split(",",$cproducto);
	
for($i=0;$i<count($arraycp);$i++) {
if(!empty($arraycp[$i])){
	mysqli_query($con,"INSERT INTO prod_aplicaciones (producto_id, aplicacion) values ('".$_GET['id']."','".$arraycp[$i]."')");

}
}

/* mysql_select_db($database_connection, $connection);
  $Result1 = mysql_query($insertSQL, $connection) or die(mysql_error());
  */
   $insertGoTo = "apps_admin.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
  
 
  
}

$colname_producto = "-1";
if (isset($_GET['id'])) {
  $colname_producto = $_GET['id'];
}
mysql_select_db($database_connection, $connection);
$query_producto = sprintf("SELECT * FROM productos WHERE id = %s", GetSQLValueString($colname_producto, "int"));
$producto = mysql_query($query_producto, $connection) or die(mysql_error());
$row_producto = mysql_fetch_assoc($producto);
$totalRows_producto = mysql_num_rows($producto);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Untitled Document</title>

<link type="text/css" rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/themes/base/ui.all.css" />
<link type="text/css" href="multiselect/css/ui.multiselect.css" rel="stylesheet" />
<script src="multiselect/js/jquery-1.9.1.min.js" type="text/javascript"></script>

<script type="text/javascript" src="multiselect/js/jquery-ui-1.8.custom.min.js"></script>
<script type="text/javascript" src="multiselect/js/ui.multiselect.js"></script>

<script src="js/less-1.7.3.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/bootstrap-touch-carousel.js"></script>


<link href="//fnt.webink.com/wfs/webink.css/?project=7962F9FA-37FB-4851-B130-44E68FB264E5&fonts=D5A41A05-F4AE-1EE5-603D-EE0B86BCFFA4:f=HedleyNewWeb-Italic,252247AF-799A-21F3-A673-E4A2DDB95E82:f=HedleyNewWeb-Light,509FB645-8C92-11EE-F17E-388437DB7C08:f=HedleyNewWeb-BoldItalic,5D296933-6F6E-E20A-F066-9E13A2AFF202:f=HedleyNewWeb-Regular,BD041ED6-244A-446C-451D-1F0B59279DFE:f=HedleyNewWeb-Bold,CAA1239C-5C8F-5316-1EC2-AA754A25FEF9:f=HedleyNewWeb-LightItalic,10E88086-2774-A0C9-1A35-08C7DE53A948:f=HedleyNewWeb-Medium,D6F4A9DA-F1BE-F813-07A8-DD1025BCB2FF:f=HedleyNewWeb-MediumItalic" rel="stylesheet" type="text/css"/>
  <link rel="stylesheet" href="css/admin/admin.css">
  <link rel="stylesheet" href="css/font-awesome.min.css">
  <link rel="stylesheet" href="css/bootstrap-touch-carousel.css">

<script type="text/javascript">
    $(function(){
        $.localise('ui-multiselect', {path: 'multiselect/js/'});
        $(".multiselect").multiselect();        
    });
</script>


</head>

<body>
  <?php include 'admin_layout/header.php';?>
  <div class="container-fluid">
    <div class="row titulo">
      <div class="col-xs-8">
        <h4>Agregar Aplicaciones - <small><?php echo $row_producto['nombre']; ?>
            <input type="text" name="producto_id" value="<?php echo $row_producto['id']; ?>" size="2" hidden="hidden" /></small> </h4>
      </div>
    </div>
    <form action="<?php echo $editFormAction; ?>" method="post" name="form1" id="form1">
      <div class="row mt30 mb40">
        <div class="col-md-6 col-md-offset-3 ">
          <table style="width: 100%;"> 
            <tr>
              <td class="text-center">
                <select id="tags" name="tags[]" class="multiselect" multiple="multiple" >
                  <option value="Artrodesis de muñeca, de hombro, de codo, cadera, rodilla, tobillo, metatarsianos, metacarpianos, falanges de los dedos de la mano y pies">Artrodesis de muñeca, de hombro, de codo, cadera, rodilla, tobillo, metatarsianos, metacarpianos, falanges de los dedos de la mano y pies</option>
                <option value="Cirugía Columna: Corperectomia">Cirugía Columna: Corperectomia</option>
                <option value="Cirugía de Columna">Cirugía de Columna</option>
                <option value="Cirugía de Revisión de rodilla">Cirugía de Revisión de rodilla</option>
                <option value="Cirugía de Revisión de cadera">Cirugía de Revisión de cadera</option>
                <option value="Clavo Centromedular">Clavo Centromedular</option>
                <option value="Como complemento a las cirugías de columna en las instrumentaciones posteriores o anteriores y que se busca artrodesar esos segmentos">Como complemento a las cirugías de columna en las instrumentaciones posteriores o anteriores y que se busca artrodesar esos segmentos</option>
                <option value="Como membrana biológica">Como membrana biológica</option>
                <option value="Consolidación viciosa y osteotomías correctivas">Consolidación viciosa y osteotomías correctivas</option>
                <option value="Elongaciones">Elongaciones</option>
                <option value="En defectos de tibia, fémur y cadera en prótesis de revisión">En defectos de tibia, fémur y cadera en prótesis de revisión</option>
                <option value="En el tratamiento de defectos de cráneo posterior a traumatismo y pérdida de tejido óseo">En el tratamiento de defectos de cráneo posterior a traumatismo y pérdida de tejido óseo</option>
                <option value="En la reconstrucción de defectos manipulares o pérdidas de tejido óseo en mandíbula o maxilar">En la reconstrucción de defectos manipulares o pérdidas de tejido óseo en mandíbula o maxilar</option>
                <option value="En los defectos alveolares en maxilares o mandíbula que requiera un apoyo mayor de tejido óseo">En los defectos alveolares en maxilares o mandíbula que requiera un apoyo mayor de tejido óseo</option>
                <option value="En tratamiento de tumores óseos que provocan defectos en los huesos o cavidades que requieran su relleno">En tratamiento de tumores óseos que provocan defectos en los huesos o cavidades que requieran su relleno</option>
                <option value="En tratamientos de fracturas que provocan pérdida de tejido óseo debido al traumatismo que la provocó">En tratamientos de fracturas que provocan pérdida de tejido óseo debido al traumatismo que la provocó</option>
                <option value="Espaciador para Cuerpo Vertebral">Espaciador para Cuerpo Vertebral</option>
                <option value="Fracturas por colapso">Fracturas por colapso</option>
                <option value="Osteotomía Pélvica">Osteotomía Pélvica</option>
                <option value="Seudoartrosis">Seudoartrosis</option>
                <option value="Quistes óseos">Quistes óseos</option>
                <option value="Reconstrucción de Fracturas por pérdida de sustancia ósea">Reconstrucción de Fracturas por pérdida de sustancia ósea</option>
                <option value="Reconstrucción de Ligamento Cruzado">Reconstrucción de Ligamento Cruzado</option>
                <option value="Reconstrucción de Meseta Tibial">Reconstrucción de Meseta Tibial</option>
                <option value="Relleno de cajas cervicales">Relleno de cajas cervicales</option>
                <option value="Relleno de cajas lumbares">Relleno de cajas lumbares</option>
                <option value="Relleno de cavidades producidas por osteomielitis, tumores">Relleno de cavidades producidas por osteomielitis, tumores</option>
                <option value="Relleno de defectos de fracturas">Relleno de defectos de fracturas</option>
                <option value="Relleno de defectos óseos y cavidades óseas en procedimientos quirúrgicos de Área Dental y Maxilofacial">Relleno de defectos óseos y cavidades óseas en procedimientos quirúrgicos de Área Dental y Maxilofacial</option>
                <option value="Relleno de defectos óseos y cavidades óseas en procedimientos quirúrgicos en Ortopedia y Traumatología">Relleno de defectos óseos y cavidades óseas en procedimientos quirúrgicos en Ortopedia y Traumatología</option>
                <option value="Relleno de fracturas de los cuerpos vertebrales cervicales, torácicas y lumbares">Relleno de fracturas de los cuerpos vertebrales cervicales, torácicas y lumbares</option>
                <option value="Relleno en defectos de prótesis primarias">Relleno en defectos de prótesis primarias</option>
                <option value="Retardo de Consolidación">Retardo de Consolidación</option>
                <option value="Seudoartrosis de cualquier hueso">Seudoartrosis de cualquier hueso</option>
                <option value="Tumores">Tumores</option>
                <option value="Tumores: Pérdida Masiva de Tejido">Tumores: Pérdida Masiva de Tejido</option>
              </select>
              </td>
            </tr>
          </table>
          
        </div>
      </div>
      <div class="row btn_bar">
        <div class="col-md-2 pull-right">
          <input class="pull-right btn btn-ok" type="submit" name="enviar" value="Guardar" />
        </div>
      </div>
      <!--
      <table align="center">
        <tr valign="baseline">
          <td nowrap="nowrap" align="right" valign="top">Aplicaciones:</td>
          <td><select id="tags" name="tags[]" class="multiselect" multiple="multiple" >
        <option value="app00001">app00001</option>
        <option value="app00002">app00002</option>
        <option value="app00003">app00003</option>
        <option value="app00004">app00004</option>
        <option value="app00005">app00005</option>
        <option value="app00006">app00006</option>
    </select></td>
        </tr>
        <tr valign="baseline">
          <td nowrap="nowrap" align="right">&nbsp;</td>
          <td><input type="submit" name="enviar" value="Insert record" /></td>
        </tr>
      </table>
    -->
      <input type="hidden" name="MM_insert" value="form1" />
    </form>
  </div>

</body>
</html>
<?php
mysql_free_result($producto);
?>
