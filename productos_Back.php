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

$colname_listaproductos = "1";
/*if (isset($_GET['cat'])) {
  $colname_listaproductos = $_GET['cat'];
}*/
mysql_select_db($database_connection, $connection);
$query_listaproductos = sprintf("SELECT * FROM productos WHERE categoria = %s ORDER BY id DESC", GetSQLValueString($colname_listaproductos, "int"));
$listaproductos = mysql_query($query_listaproductos, $connection) or die(mysql_error());
$row_listaproductos = mysql_fetch_assoc($listaproductos);
$totalRows_listaproductos = mysql_num_rows($listaproductos);

$colname_productoselec = "-1";
if (isset($_GET['id'])) {
  $colname_productoselec = $_GET['id'];
}else{
  $colname_productoselec = "5";
}

mysql_select_db($database_connection, $connection);
$query_productoselec = sprintf("SELECT * FROM productos WHERE id = %s", GetSQLValueString($colname_productoselec, "int"));
$productoselec = mysql_query($query_productoselec, $connection) or die(mysql_error());
$row_productoselec = mysql_fetch_assoc($productoselec);
$totalRows_productoselec = mysql_num_rows($productoselec);

$colname_cprod = "-1";
if (isset($_GET['id'])) {
  $colname_cprod = $_GET['id'];
}
mysql_select_db($database_connection, $connection);
$query_cprod = sprintf("SELECT * FROM cproductos WHERE producto_id = %s", GetSQLValueString($colname_cprod, "int"));
$cprod = mysql_query($query_cprod, $connection) or die(mysql_error());
$row_cprod = mysql_fetch_assoc($cprod);
$totalRows_cprod = mysql_num_rows($cprod);

$colname_listapps = "-1";
if (isset($_GET['id'])) {
  $colname_listapps = $_GET['id'];
}
mysql_select_db($database_connection, $connection);
$query_listapps = sprintf("SELECT * FROM prod_aplicaciones WHERE producto_id = %s", GetSQLValueString($colname_listapps, "int"));
$listapps = mysql_query($query_listapps, $connection) or die(mysql_error());
$row_listapps = mysql_fetch_assoc($listapps);
$totalRows_listapps = mysql_num_rows($listapps);

mysql_select_db($database_connection, $connection);
$query_prodyapps = "SELECT * FROM productos ORDER BY id DESC";
$prodyapps = mysql_query($query_prodyapps, $connection) or die(mysql_error());
$row_prodyapps = mysql_fetch_assoc($prodyapps);
$totalRows_prodyapps = mysql_num_rows($prodyapps);

$colname_listap2 = "2";
/*if (isset($_GET['cat'])) {
  $colname_listap2 = $_GET['cat'];
}*/

mysql_select_db($database_connection, $connection);
$query_listap2 = sprintf("SELECT * FROM productos WHERE categoria = %s", GetSQLValueString($colname_listap2, "int"));
$listap2 = mysql_query($query_listap2, $connection) or die(mysql_error());
$row_listap2 = mysql_fetch_assoc($listap2);
$totalRows_listap2 = mysql_num_rows($listap2);

$colname_listap3 = "3";
/*if (isset($_GET['cat'])) {
  $colname_listap3 = $_GET['cat'];
}*/
mysql_select_db($database_connection, $connection);
$query_listap3 = sprintf("SELECT * FROM productos WHERE categoria = %s", GetSQLValueString($colname_listap3, "int"));
$listap3 = mysql_query($query_listap3, $connection) or die(mysql_error());
$row_listap3 = mysql_fetch_assoc($listap3);
$totalRows_listap3 = mysql_num_rows($listap3);


$colname_listap4 = "4";
/*if (isset($_GET['cat'])) {
  $colname_listap4 = $_GET['cat'];
}*/
mysql_select_db($database_connection, $connection);
$query_listap4 = sprintf("SELECT * FROM productos WHERE categoria = %s", GetSQLValueString($colname_listap4, "int"));
$listap4 = mysql_query($query_listap4, $connection) or die(mysql_error());
$row_listap4 = mysql_fetch_assoc($listap4);
$totalRows_listap4 = mysql_num_rows($listap4);

$colname_listap5 = "5";
/*if (isset($_GET['cat'])) {
  $colname_listap5 = $_GET['cat'];
}*/
mysql_select_db($database_connection, $connection);
$query_listap5 = sprintf("SELECT * FROM productos WHERE categoria = %s", GetSQLValueString($colname_listap5, "int"));
$listap5 = mysql_query($query_listap5, $connection) or die(mysql_error());
$row_listap5 = mysql_fetch_assoc($listap5);
$totalRows_listap5 = mysql_num_rows($listap5);



$colname_listap6 = "6";
/*if (isset($_GET['cat'])) {
  $colname_listap6 = $_GET['cat'];
}*/
mysql_select_db($database_connection, $connection);
$query_listap6 = sprintf("SELECT * FROM productos WHERE categoria = %s", GetSQLValueString($colname_listap6, "int"));
$listap6 = mysql_query($query_listap6, $connection) or die(mysql_error());
$row_listap6 = mysql_fetch_assoc($listap6);
$totalRows_listap6 = mysql_num_rows($listap6);

$colname_listap7 = "7";
/*if (isset($_GET['cat'])) {
  $colname_listap7 = $_GET['cat'];
}*/
mysql_select_db($database_connection, $connection);
$query_listap7 = sprintf("SELECT * FROM productos WHERE categoria = %s", GetSQLValueString($colname_listap7, "int"));
$listap7 = mysql_query($query_listap7, $connection) or die(mysql_error());
$row_listap7 = mysql_fetch_assoc($listap7);
$totalRows_listap7 = mysql_num_rows($listap7);


$colname_listap8 = "8";
/*if (isset($_GET['cat'])) {
  $colname_listap8 = $_GET['cat'];
}*/
mysql_select_db($database_connection, $connection);
$query_listap8 = sprintf("SELECT * FROM productos WHERE categoria = %s", GetSQLValueString($colname_listap8, "int"));
$listap8 = mysql_query($query_listap8, $connection) or die(mysql_error());
$row_listap8 = mysql_fetch_assoc($listap8);
$totalRows_listap8 = mysql_num_rows($listap8);

?>
<?php include 'layout/head.php';?>
<?php include 'layout/header.php';?>

	<div class="slider banner">
		<img src="img/biograft_productos_banner.png">
		<div class="primary_bg">
		    <div class="container primary_bg">
				<h1 class="titulo">
					Productos
				</h1>
			</div>
		</div>
	</div>
	<div class="gray_bg biograft_tabs slider">
  		<div class="container gray_bg">
			<ul class="nav nav-tabs">
			  <li><a  href="#home" data-toggle="tab">Por Familia</a></li>
			  <li><a  href="#messages" data-toggle="tab">Tabla de Aplicaciones</a></li>
			</ul>
		</div>
	</div>

	<div class="slider">
		<div class="container">
		<!-- Tab panes -->
		<div class="tab-content">
		  <div class="tab-pane active " id="home">
		  	<div class="row mt60 ">
		  		<table class="productos">
		  			<tr>
		  				<td class="menu_productos" style="width: 320px;">
		  					<ul class="productos_menu fill">
							
                              <li>
									<h4>BioSponge</h4>
								<ul>
										<?php if(empty($row_listaproductos['nombre'])){}else{  do { ?>
                                        <?php if($row_listaproductos['activo']==0){}else{?>
                                       
									    <li>
										    <a href="?id=<?php echo $row_listaproductos['id']; ?>">
										      <i class="fa fa-minus"></i> <?php echo $row_listaproductos['nombre']?>
									        </a>
									      </li>
										  <?php }} while ($row_listaproductos = mysql_fetch_assoc($listaproductos)); } ?>
									</ul>
								
                                
                                
                                <h4>BioDBM</h4>
								<ul>
										<?php if(empty($row_listap2['nombre'])){}else{ do { ?>
                                        <?php if($row_listap2['activo']==0){}else{?>
                                        
									    <li>
										    <a href="?id=<?php echo $row_listap2['id']; ?>">
										      <i class="fa fa-minus"></i> <?php echo $row_listap2['nombre']; ?>
									        </a>
									      </li>
                                 			 <?php }} while ($row_listap2 = mysql_fetch_assoc($listap2)); } ?>
									</ul>
								
                                
                                
                                <h4>Hueso Esponjoso</h4>
								<ul>
										<?php if(empty($row_listap3['nombre'])){}else{ do { ?>
                                        <?php if($row_listap3['activo']==0){}else{?>
									    <li>
										    <a href="?id=<?php echo $row_listap3['id']; ?>">
										      <i class="fa fa-minus"></i> <?php echo $row_listap3['nombre']; ?>
									        </a>
									      </li>
                                 			 <?php }} while ($row_listap3 = mysql_fetch_assoc($listap3)); } ?>
									</ul>
								
                                
                                <h4>Cu&ntilde;a &Oacute;sea</h4>
								<ul>
										<?php if(empty($row_listap4['nombre'])){}else{  do { ?>
                                        <?php if($row_listap4['activo']==0){}else{?>
									    <li>
										    <a href="?id=<?php echo $row_listap4['id']; ?>">
										      <i class="fa fa-minus"></i> <?php echo $row_listap4['nombre']; ?>
									        </a>
									      </li>
                                 			 <?php }} while ($row_listap4 = mysql_fetch_assoc($listap4)); } ?>
									</ul>
								
                                  
                                <h4>Bloques y Tiras</h4>
								<ul>
										<?php if(empty($row_listap5['nombre'])){}else{  do { ?>
                                        <?php if($row_listap5['activo']==0){}else{?>
									    <li>
										    <a href="?id=<?php echo $row_listap5['id']; ?>">
										      <i class="fa fa-minus"></i> <?php echo $row_listap5['nombre']; ?>
									        </a>
									      </li>
                                 			 <?php }} while ($row_listap5 = mysql_fetch_assoc($listap5)); } ?>
									</ul>
								
                                
                                
                                <h4>Diáfisis y Hemidiáfisis</h4>
								<ul>
										<?php if(empty($row_listap6['nombre'])){}else{ do { ?>
                                        <?php if($row_listap6['activo']==0){}else{?>
									    <li>
										    <a href="?id=<?php echo $row_listap6['id']; ?>">
										      <i class="fa fa-minus"></i> <?php echo $row_listap6['nombre']; ?>
									        </a>
									      </li>
                                 			 <?php }} while ($row_listap6 = mysql_fetch_assoc($listap6)); } ?>
									</ul>
								
                                
                                
                                <h4>Cabeza Femoral </h4>
								<ul>
										<?php if(empty($row_listap7['nombre'])){}else{ do { ?>
                                        <?php if($row_listap7['activo']==0){}else{?>
									    <li>
										    <a href="?id=<?php echo $row_listap7['id']; ?>">
										      <i class="fa fa-minus"></i> <?php echo $row_listap7['nombre']; ?>
									        </a>
									      </li>
                                 			 <?php }} while ($row_listap7 = mysql_fetch_assoc($listap7)); }?>
									</ul>
								
                                
                                <h4>Tendones</h4>
								<ul>
										<?php if(empty($row_listap8['nombre'])){}else{ do {  ?>
                                        <?php if($row_listap8['activo']==0){}else{?>
									    <li>
										    <a href="?id=<?php echo $row_listap8['id']; ?>">
										      <i class="fa fa-minus"></i> <?php echo $row_listap8['nombre']; ?>
									        </a>
									      </li>
                                 			 <?php }} while ($row_listap8 = mysql_fetch_assoc($listap8)); }?>
									</ul>
								</li>
                                
                                
							</ul>
		  				</td>
		  				<td>
		  					<h1>
							<?php echo $row_productoselec['nombre']; ?></h1>
							<img class="img-producto mt20" src="<?php echo $row_productoselec['foto']; ?>">
							<h4>
							Registro Sanitario: <?php echo $row_productoselec['registro']; ?> </h4>
							<div class="row mt20">
								<div class="col-xs-6 bullets-squared">
									<h3>Descripci&oacute;n</h3>
									<p>
										<?php echo $row_productoselec['descripcion']; ?></p>
								</div>
								<div class="col-xs-6 bullets-squared">
									<h3>Aplicaciones</h3>
									<p class="aplicaciones_pers">


				                  <?php echo $row_productoselec['aplicaciones']; ?></p>
                                  <!--      
                                  <ul>

                                  <?php do { ?>
                                  <li>
							  		<?php echo $row_listapps['aplicacion']; ?>
							  
                                  </li>
                                  <?php } while ($row_listapps = mysql_fetch_assoc($listapps)); ?>
                                    </ul> 
                                  -->
								</div>
							</div>
							<div class="row">
								<div class="col-xs-12">
									<h3>C&oacute;digo de Producto</h3>
									<ul class="producto_codigo">
										
                                        <?php echo $row_productoselec['cproducto']; ?>
                                        	
									</ul>
								</div>
							</div>
		  				</td>
		  			</tr>
		  		</table>

			</div>

		  </div>
		  <div class="tab-pane" id="messages">
		  	<div class=" mt60 mb130">
		  		<h2>Tabla de aplicaciones <br>
		  			<small>Aplicaciones de todos nuestros productos</small>
		  		</h2>
		  		<div class="row mt20 mb30">
		  			<div class="col-xs-6 pull-right simbologia_aplicaciones">
		  				<table>
		  					<tr>
		  						<td class="cell_primary">
		  							Implante Osteoconductor
		  						</td>
		  						<td class="cell_green">
		  							Implante con potencial Osteoinductor
		  						</td>
		  						<td class="cell_purple">
		  							Implante Osteoconductor con potencial osteoinductor
		  						</td>
		  					</tr>
		  				</table>
		  				<!--
			  			<ul>
			  				<li>Implante Osteoconductor</li>
			  				<li>Implante con potencial Osteoinductor</li>
			  				<li>Implante Osteoconductor con potencial osteoinductor</li>
			  			</ul>
			  		-->
			  		</div>
		  		</div>
		  		<div id="my-affix">
		  			<table>
		  				<thead>
			  				<tr>
				  				<td style="min-width: 272px;" class="w25p aplicacion">Aplicaci&oacute;n <br>de productos</td>
				  				<td class="w5p cell_primary ">
			  				      <p class="vertical-text">Chips Cubos</p>
			  				    </td>
			  				    <td class="w5p cell_primary ">
			  				      <p class="vertical-text">Chips Granulados</p>
			  				    </td>
			  				    <td class="w5p cell_primary ">
			  				      <p class="vertical-text">Bloque de Esponjoso</p>
			  				    </td>
			  				    <td class="w5p cell_primary ">
			  				      <p class="vertical-text">Hueso en Polvo</p>
			  				    </td>
			  				    <td class="w5p cell_primary ">
			  				      <p class="vertical-text">Cuñas</p>
			  				    </td>
			  				    <td class="w5p cell_primary ">
			  				      <p class="vertical-text">Bloque Tricortical</p>
			  				    </td>
			  				    <td class="w5p cell_primary ">
			  				      <p class="vertical-text">Bloque Bicortical</p>
			  				    </td>
			  				    <td class="w5p cell_primary ">
			  				      <p class="vertical-text">Tira Barra Cortical</p>
			  				    </td>
			  				    <td class="w5p cell_primary ">
			  				      <p class="vertical-text">Diafisis</p>
			  				    </td>
			  				    <td class="w5p cell_primary ">
			  				      <p class="vertical-text">HemiDiafisis Femoral</p>
			  				    </td>
			  				    <td class="w5p cell_primary ">
			  				      <p class="vertical-text">Cabeza Femoral</p>
			  				    </td>
			  				    <td class="w5p cell_primary ">
			  				      <p class="vertical-text">Tendones</p>
			  				    </td>
			  				    <td class="w5p cell_primary ">
			  				      <p class="vertical-text">Fascia Lata</p>
			  				    </td>
			  				    <td class="w5p cell_green ">
			  				      <p class="vertical-text">BioDBM</p>
			  				    </td>
			  				    <td class="w5p cell_purple ">
			  				      <p class="vertical-text">BioSponge</p>
			  				    </td>
	                            <!--
	                            <?php do { ?>
				  				<td class="w5p cell_primary ">
			  				      <p class="vertical-text"><?php echo $row_prodyapps['nombre']; ?></p>
			  				    </td>
	                           	<?php } while ($row_prodyapps = mysql_fetch_assoc($prodyapps)); ?>
	                              -->
				  			</tr>
			  			</thead>
		  			</table>
		  			
		  		</div>
		  		<div id="aplicaciones" class="container_tabla_aplicaciones">
		  			<table style="width: 100%;" class="tabla_aplicaciones">
			  			
			  			<tbody>
			  				<tr>
							    <td class="white_bg">	Adelantamiento patelar	</td>
							    <td>&nbsp;</td>
							    <td>&nbsp;</td>
							    <td>&nbsp;</td>
							    <td>&nbsp;</td>
							    <td>&nbsp;</td>
							    <td><i class="fa fa-circle"></i></td>
							    <td><i class="fa fa-circle"></i></td>
							    <td>&nbsp;</td>
							    <td>&nbsp;</td>
							    <td>&nbsp;</td>
							    <td>&nbsp;</td>
							    <td>&nbsp;</td>
							    <td>&nbsp;</td>
							    <td>&nbsp;</td>
							    <td>&nbsp;</td>
							  </tr>
							  <tr>
							    <td>Artrodesis de columna cervical, lumbar, torácica</td>
							    <td><i class="fa fa-circle"></i></td>
							    <td><i class="fa fa-circle"></i></td>
							    <td><i class="fa fa-circle"></i></td>
							    <td>&nbsp;</td>
							    <td><i class="fa fa-circle"></i></td>
							    <td><i class="fa fa-circle"></i></td>
							    <td><i class="fa fa-circle"></i></td>
							    <td><i class="fa fa-circle"></i></td>
							    <td><i class="fa fa-circle"></i></td>
							    <td>&nbsp;</td>
							    <td><i class="fa fa-circle"></i></td>
							    <td>&nbsp;</td>
							    <td>&nbsp;</td>
							    <td><i class="fa fa-circle"></i></td>
							    <td><i class="fa fa-circle"></i></td>
							  </tr>
							  <tr>
							    <td>Artrodesis de muñeca, de hombro, de codo, cadera, rodilla, tobillo, metatarsianos, metacarpianos, falanges de los dedos de la mano y pies</td>
							    <td><i class="fa fa-circle"></i></td>
							    <td><i class="fa fa-circle"></i></td>
							    <td><i class="fa fa-circle"></i></td>
							    <td>&nbsp;</td>
							    <td><i class="fa fa-circle"></i></td>
							    <td><i class="fa fa-circle"></i></td>
							    <td><i class="fa fa-circle"></i></td>
							    <td><i class="fa fa-circle"></i></td>
							    <td>&nbsp;</td>
							    <td>&nbsp;</td>
							    <td><i class="fa fa-circle"></i></td>
							    <td>&nbsp;</td>
							    <td>&nbsp;</td>
							    <td><i class="fa fa-circle"></i></td>
							    <td><i class="fa fa-circle"></i></td>
							  </tr>
							  <tr>
							    <td>Cirugía Columna: Corperectomia</td>
							    <td><i class="fa fa-circle"></i></td>
							    <td><i class="fa fa-circle"></i></td>
							    <td><i class="fa fa-circle"></i></td>
							    <td>&nbsp;</td>
							    <td><i class="fa fa-circle"></i></td>
							    <td><i class="fa fa-circle"></i></td>
							    <td><i class="fa fa-circle"></i></td>
							    <td><i class="fa fa-circle"></i></td>
							    <td><i class="fa fa-circle"></i></td>
							    <td>&nbsp;</td>
							    <td><i class="fa fa-circle"></i></td>
							    <td>&nbsp;</td>
							    <td>&nbsp;</td>
							    <td><i class="fa fa-circle"></i></td>
							    <td><i class="fa fa-circle"></i></td>
							  </tr>
							  <tr>
							    <td>Cirugía de Columna</td>
							    <td><i class="fa fa-circle"></i></td>
							    <td><i class="fa fa-circle"></i></td>
							    <td><i class="fa fa-circle"></i></td>
							    <td>&nbsp;</td>
							    <td><i class="fa fa-circle"></i></td>
							    <td><i class="fa fa-circle"></i></td>
							    <td><i class="fa fa-circle"></i></td>
							    <td><i class="fa fa-circle"></i></td>
							    <td><i class="fa fa-circle"></i></td>
							    <td><i class="fa fa-circle"></i></td>
							    <td><i class="fa fa-circle"></i></td>
							    <td>&nbsp;</td>
							    <td>&nbsp;</td>
							    <td><i class="fa fa-circle"></i></td>
							    <td><i class="fa fa-circle"></i></td>
							  </tr>
							  <tr>
							    <td>Cirugía de Revisión de rodilla</td>
							    <td><i class="fa fa-circle"></i></td>
							    <td><i class="fa fa-circle"></i></td>
							    <td><i class="fa fa-circle"></i></td>
							    <td>&nbsp;</td>
							    <td><i class="fa fa-circle"></i></td>
							    <td><i class="fa fa-circle"></i></td>
							    <td><i class="fa fa-circle"></i></td>
							    <td><i class="fa fa-circle"></i></td>
							    <td><i class="fa fa-circle"></i></td>
							    <td><i class="fa fa-circle"></i></td>
							    <td><i class="fa fa-circle"></i></td>
							    <td>&nbsp;</td>
							    <td>&nbsp;</td>
							    <td><i class="fa fa-circle"></i></td>
							    <td><i class="fa fa-circle"></i></td>
							  </tr>
							  <tr>
							    <td>Cirugía de Revisión de cadera</td>
							    <td><i class="fa fa-circle"></i></td>
							    <td><i class="fa fa-circle"></i></td>
							    <td><i class="fa fa-circle"></i></td>
							    <td>&nbsp;</td>
							    <td><i class="fa fa-circle"></i></td>
							    <td><i class="fa fa-circle"></i></td>
							    <td><i class="fa fa-circle"></i></td>
							    <td><i class="fa fa-circle"></i></td>
							    <td><i class="fa fa-circle"></i></td>
							    <td><i class="fa fa-circle"></i></td>
							    <td><i class="fa fa-circle"></i></td>
							    <td>&nbsp;</td>
							    <td>&nbsp;</td>
							    <td><i class="fa fa-circle"></i></td>
							    <td><i class="fa fa-circle"></i></td>
							  </tr>
							  <tr>
							    <td>Clavo Centromedular</td>
							    <td><i class="fa fa-circle"></i></td>
							    <td><i class="fa fa-circle"></i></td>
							    <td><i class="fa fa-circle"></i></td>
							    <td>&nbsp;</td>
							    <td><i class="fa fa-circle"></i></td>
							    <td>&nbsp;</td>
							    <td>&nbsp;</td>
							    <td><i class="fa fa-circle"></i></td>
							    <td><i class="fa fa-circle"></i></td>
							    <td><i class="fa fa-circle"></i></td>
							    <td><i class="fa fa-circle"></i></td>
							    <td>&nbsp;</td>
							    <td>&nbsp;</td>
							    <td><i class="fa fa-circle"></i></td>
							    <td><i class="fa fa-circle"></i></td>
							  </tr>
							  <tr>
							    <td>Como complemento a las cirugías de columna en las instrumentaciones posteriores o anteriores y que se busca artrodesar esos segmentos</td>
							    <td><i class="fa fa-circle"></i></td>
							    <td><i class="fa fa-circle"></i></td>
							    <td><i class="fa fa-circle"></i></td>
							    <td>&nbsp;</td>
							    <td><i class="fa fa-circle"></i></td>
							    <td><i class="fa fa-circle"></i></td>
							    <td><i class="fa fa-circle"></i></td>
							    <td><i class="fa fa-circle"></i></td>
							    <td><i class="fa fa-circle"></i></td>
							    <td><i class="fa fa-circle"></i></td>
							    <td><i class="fa fa-circle"></i></td>
							    <td>&nbsp;</td>
							    <td>&nbsp;</td>
							    <td><i class="fa fa-circle"></i></td>
							    <td><i class="fa fa-circle"></i></td>
							  </tr>
							  <tr>
							    <td>Como membrana biológica</td>
							    <td>&nbsp;</td>
							    <td>&nbsp;</td>
							    <td>&nbsp;</td>
							    <td>&nbsp;</td>
							    <td>&nbsp;</td>
							    <td>&nbsp;</td>
							    <td>&nbsp;</td>
							    <td>&nbsp;</td>
							    <td>&nbsp;</td>
							    <td>&nbsp;</td>
							    <td>&nbsp;</td>
							    <td>&nbsp;</td>
							    <td><i class="fa fa-circle"></i></td>
							    <td>&nbsp;</td>
							    <td>&nbsp;</td>
							  </tr>
							  <tr>
							    <td>Consolidación viciosa y osteotomías correctivas</td>
							    <td><i class="fa fa-circle"></i></td>
							    <td><i class="fa fa-circle"></i></td>
							    <td><i class="fa fa-circle"></i></td>
							    <td>&nbsp;</td>
							    <td><i class="fa fa-circle"></i></td>
							    <td><i class="fa fa-circle"></i></td>
							    <td><i class="fa fa-circle"></i></td>
							    <td><i class="fa fa-circle"></i></td>
							    <td><i class="fa fa-circle"></i></td>
							    <td><i class="fa fa-circle"></i></td>
							    <td><i class="fa fa-circle"></i></td>
							    <td>&nbsp;</td>
							    <td>&nbsp;</td>
							    <td><i class="fa fa-circle"></i></td>
							    <td><i class="fa fa-circle"></i></td>
							  </tr>
							  <tr>
							    <td>Elongaciones</td>
							    <td><i class="fa fa-circle"></i></td>
							    <td><i class="fa fa-circle"></i></td>
							    <td><i class="fa fa-circle"></i></td>
							    <td>&nbsp;</td>
							    <td><i class="fa fa-circle"></i></td>
							    <td>&nbsp;</td>
							    <td>&nbsp;</td>
							    <td><i class="fa fa-circle"></i></td>
							    <td><i class="fa fa-circle"></i></td>
							    <td>&nbsp;</td>
							    <td><i class="fa fa-circle"></i></td>
							    <td>&nbsp;</td>
							    <td>&nbsp;</td>
							    <td><i class="fa fa-circle"></i></td>
							    <td><i class="fa fa-circle"></i></td>
							  </tr>
							  <tr>
							    <td>En defectos de tibia, fémur y cadera en prótesis de revisión</td>
							    <td><i class="fa fa-circle"></i></td>
							    <td><i class="fa fa-circle"></i></td>
							    <td><i class="fa fa-circle"></i></td>
							    <td>&nbsp;</td>
							    <td><i class="fa fa-circle"></i></td>
							    <td><i class="fa fa-circle"></i></td>
							    <td><i class="fa fa-circle"></i></td>
							    <td><i class="fa fa-circle"></i></td>
							    <td><i class="fa fa-circle"></i></td>
							    <td><i class="fa fa-circle"></i></td>
							    <td><i class="fa fa-circle"></i></td>
							    <td>&nbsp;</td>
							    <td>&nbsp;</td>
							    <td><i class="fa fa-circle"></i></td>
							    <td><i class="fa fa-circle"></i></td>
							  </tr>
							  <tr>
							    <td>En el tratamiento de defectos de cráneo posterior a traumatismo y pérdida de tejido óseo</td>
							    <td>&nbsp;</td>
							    <td>&nbsp;</td>
							    <td>&nbsp;</td>
							    <td>&nbsp;</td>
							    <td>&nbsp;</td>
							    <td>&nbsp;</td>
							    <td>&nbsp;</td>
							    <td>&nbsp;</td>
							    <td>&nbsp;</td>
							    <td>&nbsp;</td>
							    <td>&nbsp;</td>
							    <td>&nbsp;</td>
							    <td>&nbsp;</td>
							    <td><i class="fa fa-circle"></i></td>
							    <td>&nbsp;</td>
							  </tr>
							  <tr>
							    <td>En la reconstrucción de defectos manipulares o pérdidas de tejido óseo en mandíbula o maxilar</td>
							    <td><i class="fa fa-circle"></i></td>
							    <td><i class="fa fa-circle"></i></td>
							    <td><i class="fa fa-circle"></i></td>
							    <td><i class="fa fa-circle"></i></td>
							    <td><i class="fa fa-circle"></i></td>
							    <td><i class="fa fa-circle"></i></td>
							    <td><i class="fa fa-circle"></i></td>
							    <td><i class="fa fa-circle"></i></td>
							    <td>&nbsp;</td>
							    <td><i class="fa fa-circle"></i></td>
							    <td><i class="fa fa-circle"></i></td>
							    <td>&nbsp;</td>
							    <td>&nbsp;</td>
							    <td><i class="fa fa-circle"></i></td>
							    <td><i class="fa fa-circle"></i></td>
							  </tr>
							  <tr>
							    <td>En los defectos alveolares en maxilares o mandíbula que requiera un apoyo mayor de tejido óseo</td>
							    <td><i class="fa fa-circle"></i></td>
							    <td><i class="fa fa-circle"></i></td>
							    <td><i class="fa fa-circle"></i></td>
							    <td><i class="fa fa-circle"></i></td>
							    <td><i class="fa fa-circle"></i></td>
							    <td>&nbsp;</td>
							    <td>&nbsp;</td>
							    <td><i class="fa fa-circle"></i></td>
							    <td>&nbsp;</td>
							    <td><i class="fa fa-circle"></i></td>
							    <td><i class="fa fa-circle"></i></td>
							    <td>&nbsp;</td>
							    <td>&nbsp;</td>
							    <td><i class="fa fa-circle"></i></td>
							    <td><i class="fa fa-circle"></i></td>
							  </tr>
							  <tr>
							    <td>En tratamiento de tumores óseos que provocan defectos en los huesos o cavidades que requieran su relleno</td>
							    <td><i class="fa fa-circle"></i></td>
							    <td><i class="fa fa-circle"></i></td>
							    <td><i class="fa fa-circle"></i></td>
							    <td>&nbsp;</td>
							    <td><i class="fa fa-circle"></i></td>
							    <td><i class="fa fa-circle"></i></td>
							    <td><i class="fa fa-circle"></i></td>
							    <td><i class="fa fa-circle"></i></td>
							    <td><i class="fa fa-circle"></i></td>
							    <td><i class="fa fa-circle"></i></td>
							    <td><i class="fa fa-circle"></i></td>
							    <td>&nbsp;</td>
							    <td>&nbsp;</td>
							    <td><i class="fa fa-circle"></i></td>
							    <td><i class="fa fa-circle"></i></td>
							  </tr>
							  <tr>
							    <td>En tratamientos de fracturas que provocan pérdida de tejido óseo debido al traumatismo que la provocó</td>
							    <td><i class="fa fa-circle"></i></td>
							    <td><i class="fa fa-circle"></i></td>
							    <td><i class="fa fa-circle"></i></td>
							    <td>&nbsp;</td>
							    <td><i class="fa fa-circle"></i></td>
							    <td><i class="fa fa-circle"></i></td>
							    <td><i class="fa fa-circle"></i></td>
							    <td><i class="fa fa-circle"></i></td>
							    <td><i class="fa fa-circle"></i></td>
							    <td><i class="fa fa-circle"></i></td>
							    <td><i class="fa fa-circle"></i></td>
							    <td>&nbsp;</td>
							    <td>&nbsp;</td>
							    <td><i class="fa fa-circle"></i></td>
							    <td><i class="fa fa-circle"></i></td>
							  </tr>
							  <tr>
							    <td>Espaciador para Cuerpo Vertebral</td>
							    <td><i class="fa fa-circle"></i></td>
							    <td><i class="fa fa-circle"></i></td>
							    <td><i class="fa fa-circle"></i></td>
							    <td>&nbsp;</td>
							    <td><i class="fa fa-circle"></i></td>
							    <td><i class="fa fa-circle"></i></td>
							    <td><i class="fa fa-circle"></i></td>
							    <td><i class="fa fa-circle"></i></td>
							    <td><i class="fa fa-circle"></i></td>
							    <td><i class="fa fa-circle"></i></td>
							    <td><i class="fa fa-circle"></i></td>
							    <td>&nbsp;</td>
							    <td>&nbsp;</td>
							    <td><i class="fa fa-circle"></i></td>
							    <td><i class="fa fa-circle"></i></td>
							  </tr>
							  <tr>
							    <td>Fracturas por colapso</td>
							    <td><i class="fa fa-circle"></i></td>
							    <td><i class="fa fa-circle"></i></td>
							    <td><i class="fa fa-circle"></i></td>
							    <td>&nbsp;</td>
							    <td><i class="fa fa-circle"></i></td>
							    <td><i class="fa fa-circle"></i></td>
							    <td><i class="fa fa-circle"></i></td>
							    <td><i class="fa fa-circle"></i></td>
							    <td><i class="fa fa-circle"></i></td>
							    <td><i class="fa fa-circle"></i></td>
							    <td><i class="fa fa-circle"></i></td>
							    <td>&nbsp;</td>
							    <td>&nbsp;</td>
							    <td><i class="fa fa-circle"></i></td>
							    <td><i class="fa fa-circle"></i></td>
							  </tr>
							  <tr>
							    <td>Osteotomía Pélvica</td>
							    <td><i class="fa fa-circle"></i></td>
							    <td><i class="fa fa-circle"></i></td>
							    <td><i class="fa fa-circle"></i></td>
							    <td>&nbsp;</td>
							    <td><i class="fa fa-circle"></i></td>
							    <td><i class="fa fa-circle"></i></td>
							    <td><i class="fa fa-circle"></i></td>
							    <td><i class="fa fa-circle"></i></td>
							    <td><i class="fa fa-circle"></i></td>
							    <td><i class="fa fa-circle"></i></td>
							    <td><i class="fa fa-circle"></i></td>
							    <td>&nbsp;</td>
							    <td>&nbsp;</td>
							    <td><i class="fa fa-circle"></i></td>
							    <td><i class="fa fa-circle"></i></td>
							  </tr>
							  <tr>
							    <td>Seudoartrosis</td>
							    <td><i class="fa fa-circle"></i></td>
							    <td><i class="fa fa-circle"></i></td>
							    <td><i class="fa fa-circle"></i></td>
							    <td>&nbsp;</td>
							    <td><i class="fa fa-circle"></i></td>
							    <td><i class="fa fa-circle"></i></td>
							    <td><i class="fa fa-circle"></i></td>
							    <td><i class="fa fa-circle"></i></td>
							    <td><i class="fa fa-circle"></i></td>
							    <td><i class="fa fa-circle"></i></td>
							    <td><i class="fa fa-circle"></i></td>
							    <td>&nbsp;</td>
							    <td>&nbsp;</td>
							    <td><i class="fa fa-circle"></i></td>
							    <td><i class="fa fa-circle"></i></td>
							  </tr>
							  <tr>
							    <td>Quistes óseos</td>
							    <td><i class="fa fa-circle"></i></td>
							    <td><i class="fa fa-circle"></i></td>
							    <td><i class="fa fa-circle"></i></td>
							    <td>&nbsp;</td>
							    <td>&nbsp;</td>
							    <td>&nbsp;</td>
							    <td>&nbsp;</td>
							    <td><i class="fa fa-circle"></i></td>
							    <td>&nbsp;</td>
							    <td><i class="fa fa-circle"></i></td>
							    <td><i class="fa fa-circle"></i></td>
							    <td>&nbsp;</td>
							    <td>&nbsp;</td>
							    <td><i class="fa fa-circle"></i></td>
							    <td><i class="fa fa-circle"></i></td>
							  </tr>
							  <tr>
							    <td>Reconstrucción de Fracturas por pérdida de sustancia ósea</td>
							    <td><i class="fa fa-circle"></i></td>
							    <td><i class="fa fa-circle"></i></td>
							    <td><i class="fa fa-circle"></i></td>
							    <td>&nbsp;</td>
							    <td><i class="fa fa-circle"></i></td>
							    <td><i class="fa fa-circle"></i></td>
							    <td><i class="fa fa-circle"></i></td>
							    <td><i class="fa fa-circle"></i></td>
							    <td><i class="fa fa-circle"></i></td>
							    <td><i class="fa fa-circle"></i></td>
							    <td><i class="fa fa-circle"></i></td>
							    <td>&nbsp;</td>
							    <td>&nbsp;</td>
							    <td><i class="fa fa-circle"></i></td>
							    <td><i class="fa fa-circle"></i></td>
							  </tr>
							  <tr>
							    <td>Reconstrucción de Ligamento Cruzado</td>
							    <td>&nbsp;</td>
							    <td>&nbsp;</td>
							    <td>&nbsp;</td>
							    <td>&nbsp;</td>
							    <td>&nbsp;</td>
							    <td>&nbsp;</td>
							    <td>&nbsp;</td>
							    <td>&nbsp;</td>
							    <td>&nbsp;</td>
							    <td>&nbsp;</td>
							    <td>&nbsp;</td>
							    <td><i class="fa fa-circle"></i></td>
							    <td><i class="fa fa-circle"></i></td>
							    <td>&nbsp;</td>
							    <td>&nbsp;</td>
							  </tr>
							  <tr>
							    <td>Reconstrucción de Meseta Tibial</td>
							    <td><i class="fa fa-circle"></i></td>
							    <td><i class="fa fa-circle"></i></td>
							    <td><i class="fa fa-circle"></i></td>
							    <td>&nbsp;</td>
							    <td><i class="fa fa-circle"></i></td>
							    <td><i class="fa fa-circle"></i></td>
							    <td><i class="fa fa-circle"></i></td>
							    <td><i class="fa fa-circle"></i></td>
							    <td>&nbsp;</td>
							    <td>&nbsp;</td>
							    <td><i class="fa fa-circle"></i></td>
							    <td>&nbsp;</td>
							    <td>&nbsp;</td>
							    <td><i class="fa fa-circle"></i></td>
							    <td><i class="fa fa-circle"></i></td>
							  </tr>
							  <tr>
							    <td>Relleno de cajas cervicales</td>
							    <td><i class="fa fa-circle"></i></td>
							    <td><i class="fa fa-circle"></i></td>
							    <td><i class="fa fa-circle"></i></td>
							    <td>&nbsp;</td>
							    <td>&nbsp;</td>
							    <td>&nbsp;</td>
							    <td>&nbsp;</td>
							    <td>&nbsp;</td>
							    <td>&nbsp;</td>
							    <td>&nbsp;</td>
							    <td>&nbsp;</td>
							    <td><i class="fa fa-circle"></i></td>
							    <td>&nbsp;</td>
							    <td><i class="fa fa-circle"></i></td>
							    <td><i class="fa fa-circle"></i></td>
							  </tr>
							  <tr>
							    <td>Relleno de cajas lumbares</td>
							    <td><i class="fa fa-circle"></i></td>
							    <td><i class="fa fa-circle"></i></td>
							    <td><i class="fa fa-circle"></i></td>
							    <td>&nbsp;</td>
							    <td>&nbsp;</td>
							    <td>&nbsp;</td>
							    <td>&nbsp;</td>
							    <td>&nbsp;</td>
							    <td>&nbsp;</td>
							    <td>&nbsp;</td>
							    <td>&nbsp;</td>
							    <td><i class="fa fa-circle"></i></td>
							    <td>&nbsp;</td>
							    <td><i class="fa fa-circle"></i></td>
							    <td><i class="fa fa-circle"></i></td>
							  </tr>
							  <tr>
							    <td>Relleno de cavidades producidas por osteomielitis, tumores</td>
							    <td><i class="fa fa-circle"></i></td>
							    <td><i class="fa fa-circle"></i></td>
							    <td><i class="fa fa-circle"></i></td>
							    <td>&nbsp;</td>
							    <td><i class="fa fa-circle"></i></td>
							    <td><i class="fa fa-circle"></i></td>
							    <td><i class="fa fa-circle"></i></td>
							    <td><i class="fa fa-circle"></i></td>
							    <td><i class="fa fa-circle"></i></td>
							    <td><i class="fa fa-circle"></i></td>
							    <td><i class="fa fa-circle"></i></td>
							    <td>&nbsp;</td>
							    <td>&nbsp;</td>
							    <td><i class="fa fa-circle"></i></td>
							    <td><i class="fa fa-circle"></i></td>
							  </tr>
							  <tr>
							    <td>Relleno de defectos de fracturas</td>
							    <td><i class="fa fa-circle"></i></td>
							    <td><i class="fa fa-circle"></i></td>
							    <td><i class="fa fa-circle"></i></td>
							    <td><i class="fa fa-circle"></i></td>
							    <td><i class="fa fa-circle"></i></td>
							    <td><i class="fa fa-circle"></i></td>
							    <td><i class="fa fa-circle"></i></td>
							    <td><i class="fa fa-circle"></i></td>
							    <td><i class="fa fa-circle"></i></td>
							    <td><i class="fa fa-circle"></i></td>
							    <td><i class="fa fa-circle"></i></td>
							    <td>&nbsp;</td>
							    <td>&nbsp;</td>
							    <td><i class="fa fa-circle"></i></td>
							    <td><i class="fa fa-circle"></i></td>
							  </tr>
							  <tr>
							    <td>Relleno de defectos óseos y cavidades óseas en procedimientos quirúrgicos de Área Dental y Maxilofacial</td>
							    <td><i class="fa fa-circle"></i></td>
							    <td><i class="fa fa-circle"></i></td>
							    <td><i class="fa fa-circle"></i></td>
							    <td><i class="fa fa-circle"></i></td>
							    <td>&nbsp;</td>
							    <td>&nbsp;</td>
							    <td><i class="fa fa-circle"></i></td>
							    <td><i class="fa fa-circle"></i></td>
							    <td>&nbsp;</td>
							    <td>&nbsp;</td>
							    <td><i class="fa fa-circle"></i></td>
							    <td>&nbsp;</td>
							    <td>&nbsp;</td>
							    <td><i class="fa fa-circle"></i></td>
							    <td><i class="fa fa-circle"></i></td>
							  </tr>
							  <tr>
							    <td>Relleno de defectos óseos y cavidades óseas en procedimientos quirúrgicos en Ortopedia y Traumatología</td>
							    <td><i class="fa fa-circle"></i></td>
							    <td><i class="fa fa-circle"></i></td>
							    <td><i class="fa fa-circle"></i></td>
							    <td>&nbsp;</td>
							    <td><i class="fa fa-circle"></i></td>
							    <td><i class="fa fa-circle"></i></td>
							    <td><i class="fa fa-circle"></i></td>
							    <td><i class="fa fa-circle"></i></td>
							    <td><i class="fa fa-circle"></i></td>
							    <td><i class="fa fa-circle"></i></td>
							    <td><i class="fa fa-circle"></i></td>
							    <td>&nbsp;</td>
							    <td>&nbsp;</td>
							    <td><i class="fa fa-circle"></i></td>
							    <td><i class="fa fa-circle"></i></td>
							  </tr>
							  <tr>
							    <td>Relleno de fracturas de los cuerpos vertebrales cervicales, torácicas y lumbares</td>
							    <td><i class="fa fa-circle"></i></td>
							    <td><i class="fa fa-circle"></i></td>
							    <td><i class="fa fa-circle"></i></td>
							    <td>&nbsp;</td>
							    <td><i class="fa fa-circle"></i></td>
							    <td><i class="fa fa-circle"></i></td>
							    <td><i class="fa fa-circle"></i></td>
							    <td><i class="fa fa-circle"></i></td>
							    <td><i class="fa fa-circle"></i></td>
							    <td><i class="fa fa-circle"></i></td>
							    <td><i class="fa fa-circle"></i></td>
							    <td>&nbsp;</td>
							    <td>&nbsp;</td>
							    <td><i class="fa fa-circle"></i></td>
							    <td><i class="fa fa-circle"></i></td>
							  </tr>
							  <tr>
							    <td>Relleno en defectos de prótesis primarias</td>
							    <td><i class="fa fa-circle"></i></td>
							    <td><i class="fa fa-circle"></i></td>
							    <td><i class="fa fa-circle"></i></td>
							    <td>&nbsp;</td>
							    <td><i class="fa fa-circle"></i></td>
							    <td><i class="fa fa-circle"></i></td>
							    <td><i class="fa fa-circle"></i></td>
							    <td><i class="fa fa-circle"></i></td>
							    <td><i class="fa fa-circle"></i></td>
							    <td><i class="fa fa-circle"></i></td>
							    <td><i class="fa fa-circle"></i></td>
							    <td>&nbsp;</td>
							    <td>&nbsp;</td>
							    <td><i class="fa fa-circle"></i></td>
							    <td><i class="fa fa-circle"></i></td>
							  </tr>
							  <tr>
							    <td>Retardo de Consolidación</td>
							    <td><i class="fa fa-circle"></i></td>
							    <td><i class="fa fa-circle"></i></td>
							    <td><i class="fa fa-circle"></i></td>
							    <td>&nbsp;</td>
							    <td>&nbsp;</td>
							    <td>&nbsp;</td>
							    <td>&nbsp;</td>
							    <td><i class="fa fa-circle"></i></td>
							    <td>&nbsp;</td>
							    <td>&nbsp;</td>
							    <td><i class="fa fa-circle"></i></td>
							    <td>&nbsp;</td>
							    <td>&nbsp;</td>
							    <td><i class="fa fa-circle"></i></td>
							    <td><i class="fa fa-circle"></i></td>
							  </tr>
							  <tr>
							    <td>Seudoartrosis de cualquier hueso</td>
							    <td><i class="fa fa-circle"></i></td>
							    <td><i class="fa fa-circle"></i></td>
							    <td><i class="fa fa-circle"></i></td>
							    <td>&nbsp;</td>
							    <td><i class="fa fa-circle"></i></td>
							    <td><i class="fa fa-circle"></i></td>
							    <td><i class="fa fa-circle"></i></td>
							    <td><i class="fa fa-circle"></i></td>
							    <td><i class="fa fa-circle"></i></td>
							    <td><i class="fa fa-circle"></i></td>
							    <td><i class="fa fa-circle"></i></td>
							    <td>&nbsp;</td>
							    <td>&nbsp;</td>
							    <td><i class="fa fa-circle"></i></td>
							    <td><i class="fa fa-circle"></i></td>
							  </tr>
							  <tr>
							    <td>Tumores</td>
							    <td><i class="fa fa-circle"></i></td>
							    <td><i class="fa fa-circle"></i></td>
							    <td><i class="fa fa-circle"></i></td>
							    <td>&nbsp;</td>
							    <td><i class="fa fa-circle"></i></td>
							    <td><i class="fa fa-circle"></i></td>
							    <td><i class="fa fa-circle"></i></td>
							    <td><i class="fa fa-circle"></i></td>
							    <td><i class="fa fa-circle"></i></td>
							    <td><i class="fa fa-circle"></i></td>
							    <td><i class="fa fa-circle"></i></td>
							    <td>&nbsp;</td>
							    <td>&nbsp;</td>
							    <td><i class="fa fa-circle"></i></td>
							    <td><i class="fa fa-circle"></i></td>
							  </tr>
							  <tr>
							    <td>Tumores: Pérdida Masiva de Tejido</td>
							    <td><i class="fa fa-circle"></i></td>
							    <td><i class="fa fa-circle"></i></td>
							    <td><i class="fa fa-circle"></i></td>
							    <td>&nbsp;</td>
							    <td><i class="fa fa-circle"></i></td>
							    <td><i class="fa fa-circle"></i></td>
							    <td><i class="fa fa-circle"></i></td>
							    <td><i class="fa fa-circle"></i></td>
							    <td><i class="fa fa-circle"></i></td>
							    <td><i class="fa fa-circle"></i></td>
							    <td><i class="fa fa-circle"></i></td>
							    <td>&nbsp;</td>
							    <td>&nbsp;</td>
							    <td><i class="fa fa-circle"></i></td>
							    <td><i class="fa fa-circle"></i></td>
							  </tr>

                           <!--
                            <tr>
                                <td class="white_bg">	Adelantamiento patelar	</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity"><i class="fa fa-circle"></i></td>
				  				<td class="text-center cell_primary_opacity"><i class="fa fa-circle"></i></td>
				  				<td class="text-center cell_primary_opacity"><i class="fa fa-circle"></i></td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_green_opacity ">&nbsp;</td>
				  				<td class="text-center cell_purple_opacity ">&nbsp;</td>
                            </tr>
                            <tr>
                                <td class="white_bg">	Artrodesis de columna cervical, lumbar, torácica	</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_green_opacity ">&nbsp;</td>
				  				<td class="text-center cell_purple_opacity ">&nbsp;</td>
                            </tr>
                            <tr>
                                <td class="white_bg">	Artrodesis de muñeca, de hombro, de codo, cadera, rodilla, tobillo, metatarsianos, metacarpianos, falanges de los dedos de la mano y pies	</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_green_opacity ">&nbsp;</td>
				  				<td class="text-center cell_purple_opacity ">&nbsp;</td>
                            </tr>
                            <tr>
                                <td class="white_bg">	Cirugía Columna: Corperectomia	</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
                                <td class="text-center cell_primary_opacity"><i class="fa fa-circle"></i></td>
                                <td class="text-center cell_primary_opacity"><i class="fa fa-circle"></i></td>
                                <td class="text-center cell_primary_opacity"><i class="fa fa-circle"></i></td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity"><i class="fa fa-circle"></i></td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_green_opacity ">&nbsp;</td>
				  				<td class="text-center cell_purple_opacity ">&nbsp;</td>
                            </tr>
                            <tr>
                                <td class="white_bg">	Cirugía de Columna	</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity"><i class="fa fa-circle"></i></td>
				  				<td class="text-center cell_green_opacity ">&nbsp;</td>
				  				<td class="text-center cell_purple_opacity ">&nbsp;</td>
                            </tr>
                            <tr>
                                <td class="white_bg">	Cirugía de Revisión de rodilla	</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
                                <td class="text-center cell_primary_opacity"><i class="fa fa-circle"></i></td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity"><i class="fa fa-circle"></i></td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_green_opacity ">&nbsp;</td>
				  				<td class="text-center cell_purple_opacity ">&nbsp;</td>
                            </tr>
                            <tr>
                                <td class="white_bg">	Cirugía de Revisión de cadera	</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
                                <td class="text-center cell_primary_opacity"><i class="fa fa-circle"></i></td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity"><i class="fa fa-circle"></i></td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_green_opacity ">&nbsp;</td>
				  				<td class="text-center cell_purple_opacity ">&nbsp;</td>
                            </tr>
                            <tr>
                                <td class="white_bg">	Clavo Centromedular	</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
                                <td class="text-center cell_primary_opacity"><i class="fa fa-circle"></i></td>
				  				<td class="text-center cell_primary_opacity"><i class="fa fa-circle"></i></td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity"><i class="fa fa-circle"></i></td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_green_opacity ">&nbsp;</td>
				  				<td class="text-center cell_purple_opacity ">&nbsp;</td>
                            </tr>
                            <tr>
                                <td class="white_bg">	Como complemento a las cirugías de columna en las instrumentaciones posteriores o anteriores y que se busca artrodesar esos segmentos	</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_green_opacity ">&nbsp;</td>
				  				<td class="text-center cell_purple_opacity ">&nbsp;</td>
                             </tr>
                            <tr>   
                                <td class="white_bg">	Como membrana biológica	</td>
                                <td class="text-center cell_primary_opacity"><i class="fa fa-circle"></i></td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_green_opacity ">&nbsp;</td>
				  				<td class="text-center cell_purple_opacity ">&nbsp;</td>
                            </tr>
                            <tr>
                                <td class="white_bg">	Consolidación viciosa y osteotomías correctivas	</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_green_opacity ">&nbsp;</td>
				  				<td class="text-center cell_purple_opacity ">&nbsp;</td>
                            </tr>
                            <tr>
                                <td class="white_bg">	Elongaciones	</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity"><i class="fa fa-circle"></i></td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_green_opacity ">&nbsp;</td>
				  				<td class="text-center cell_purple_opacity ">&nbsp;</td>
                            </tr>
                            <tr>
                                <td class="white_bg">	En defectos de tibia, fémur y cadera en prótesis de revisión	</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_green_opacity ">&nbsp;</td>
				  				<td class="text-center cell_purple_opacity ">&nbsp;</td>
                            </tr>
                            <tr>
                                <td class="white_bg">	En el tratamiento de defectos de cráneo posterior a traumatismo y pérdida de tejido óseo	</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_green_opacity ">&nbsp;</td>
				  				<td class="text-center cell_purple_opacity ">&nbsp;</td>
                            </tr>
                            <tr>
                                <td class="white_bg">	En la reconstrucción de defectos manipulares o pérdidas de tejido óseo en mandíbula o maxilar	</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_green_opacity ">&nbsp;</td>
				  				<td class="text-center cell_purple_opacity ">&nbsp;</td>
                            </tr>
                            <tr>
                                <td class="white_bg">	En los defectos alveolares en maxilares o mandíbula que requiera un apoyo mayor de tejido óseo	</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_green_opacity ">&nbsp;</td>
				  				<td class="text-center cell_purple_opacity ">&nbsp;</td>
                            </tr>
                            <tr>
                                <td class="white_bg">	En tratamiento de tumores óseos que provocan defectos en los huesos o cavidades que requieran su relleno	</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_green_opacity ">&nbsp;</td>
				  				<td class="text-center cell_purple_opacity ">&nbsp;</td>
                            </tr>
                            <tr>
                                <td class="white_bg">	En tratamientos de fracturas que provocan pérdida de tejido óseo debido al traumatismo que la provocó	</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_green_opacity ">&nbsp;</td>
				  				<td class="text-center cell_purple_opacity ">&nbsp;</td>
                            </tr>
                            <tr>
                                <td class="white_bg">	Espaciador para Cuerpo Vertebral	</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity"><i class="fa fa-circle"></i></td>
				  				<td class="text-center cell_primary_opacity"><i class="fa fa-circle"></i></td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_green_opacity ">&nbsp;</td>
				  				<td class="text-center cell_purple_opacity ">&nbsp;</td>
                            </tr>
                            <tr>
                                <td class="white_bg">	Fracturas por colapso	</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity"><i class="fa fa-circle"></i></td>
				  				<td class="text-center cell_primary_opacity"><i class="fa fa-circle"></i></td>
				  				<td class="text-center cell_primary_opacity"><i class="fa fa-circle"></i></td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_green_opacity ">&nbsp;</td>
				  				<td class="text-center cell_purple_opacity ">&nbsp;</td>
                            </tr>
                            <tr>
                                <td class="white_bg">	Osteotomía Pélvica	</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity"><i class="fa fa-circle"></i></td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_green_opacity ">&nbsp;</td>
				  				<td class="text-center cell_purple_opacity ">&nbsp;</td>
                             </tr>
                            <tr>   
                             
                                <td class="white_bg">	Seudoartrosis	</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity"><i class="fa fa-circle"></i></td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity"><i class="fa fa-circle"></i></td>
				  				<td class="text-center cell_green_opacity ">&nbsp;</td>
				  				<td class="text-center cell_purple_opacity ">&nbsp;</td>
                            </tr>
                            <tr>
                                <td class="white_bg">	Quistes óseos	</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity"><i class="fa fa-circle"></i></td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity"><i class="fa fa-circle"></i></td>
				  				<td class="text-center cell_primary_opacity"><i class="fa fa-circle"></i></td>
				  				<td class="text-center cell_green_opacity ">&nbsp;</td>
				  				<td class="text-center cell_purple_opacity ">&nbsp;</td>
                            </tr>
                            <tr>
                                <td class="white_bg">	Reconstrucción de Fracturas por pérdida de sustancia ósea	</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
                                <td class="text-center cell_primary_opacity"><i class="fa fa-circle"></i></td>
                                <td class="text-center cell_primary_opacity"><i class="fa fa-circle"></i></td>
                                <td class="text-center cell_primary_opacity"><i class="fa fa-circle"></i></td>
                                <td class="text-center cell_primary_opacity"><i class="fa fa-circle"></i></td>
				  				<td class="text-center cell_primary_opacity"><i class="fa fa-circle"></i></td>
				  				<td class="text-center cell_primary_opacity"><i class="fa fa-circle"></i></td>
				  				<td class="text-center cell_primary_opacity"><i class="fa fa-circle"></i></td>
				  				<td class="text-center cell_primary_opacity"><i class="fa fa-circle"></i></td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_green_opacity ">&nbsp;</td>
				  				<td class="text-center cell_purple_opacity ">&nbsp;</td>
                            </tr>
                            <tr>
                                <td class="white_bg">	Reconstrucción de Ligamento Cruzado	</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
                                <td class="text-center cell_primary_opacity"><i class="fa fa-circle"></i></td>
                                <td class="text-center cell_primary_opacity"><i class="fa fa-circle"></i></td>
                                <td class="text-center cell_primary_opacity"><i class="fa fa-circle"></i></td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_green_opacity ">&nbsp;</td>
				  				<td class="text-center cell_purple_opacity ">&nbsp;</td>
                            </tr>
                            <tr>
                                <td class="white_bg">	Reconstrucción de Meseta Tibial	</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity"><i class="fa fa-circle"></i></td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity"><i class="fa fa-circle"></i></td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_green_opacity ">&nbsp;</td>
				  				<td class="text-center cell_purple_opacity ">&nbsp;</td>
                            </tr>
                            <tr>
                                <td class="white_bg">	Relleno de cajas cervicales	</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_green_opacity ">&nbsp;</td>
				  				<td class="text-center cell_purple_opacity ">&nbsp;</td>
                            </tr>
                            <tr>
                                <td class="white_bg">	Relleno de cajas lumbares	</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_green_opacity ">&nbsp;</td>
				  				<td class="text-center cell_purple_opacity ">&nbsp;</td>
                             </tr>
                            <tr>
                                
                                <td class="white_bg">	Relleno de cavidades producidas por osteomielitis, tumores	</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_green_opacity ">&nbsp;</td>
				  				<td class="text-center cell_purple_opacity ">&nbsp;</td>
                            </tr>
                            <tr>
                                <td class="white_bg">	Relleno de defectos de fracturas	</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_green_opacity ">&nbsp;</td>
				  				<td class="text-center cell_purple_opacity ">&nbsp;</td>
                            </tr>
                            <tr>
                                <td class="white_bg">	Relleno de defectos óseos y cavidades óseas en procedimientos quirúrgicos de Área Dental y Maxilofacial	</td>
                                <td class="text-center cell_primary_opacity"><i class="fa fa-circle"></i></td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity"><i class="fa fa-circle"></i></td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity"><i class="fa fa-circle"></i></td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_green_opacity ">&nbsp;</td>
				  				<td class="text-center cell_purple_opacity ">&nbsp;</td>
                            </tr>
                            <tr>
                                <td class="white_bg">	Relleno de defectos óseos y cavidades óseas en procedimientos quirúrgicos en Ortopedia y Traumatología	</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity"><i class="fa fa-circle"></i></td>
				  				<td class="text-center cell_primary_opacity"><i class="fa fa-circle"></i></td>
				  				<td class="text-center cell_primary_opacity"><i class="fa fa-circle"></i></td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity"><i class="fa fa-circle"></i></td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity"><i class="fa fa-circle"></i></td>
				  				<td class="text-center cell_primary_opacity"><i class="fa fa-circle"></i></td>
				  				<td class="text-center cell_green_opacity ">&nbsp;</td>
				  				<td class="text-center cell_purple_opacity ">&nbsp;</td>
                             </tr>
                            <tr>
                                <td class="white_bg">	Relleno de fracturas de los cuerpos vertebrales cervicales, torácicas y lumbares	</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_green_opacity ">&nbsp;</td>
				  				<td class="text-center cell_purple_opacity ">&nbsp;</td>
                             </tr>
                            <tr>
                                <td class="white_bg">	Relleno en defectos de prótesis primarias	</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_green_opacity ">&nbsp;</td>
				  				<td class="text-center cell_purple_opacity ">&nbsp;</td>
                            </tr>
                            <tr>
                                <td class="white_bg">	Retardo de Consolidación	</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity"><i class="fa fa-circle"></i></td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity"><i class="fa fa-circle"></i></td>
				  				<td class="text-center cell_green_opacity ">&nbsp;</td>
				  				<td class="text-center cell_purple_opacity ">&nbsp;</td>
                            </tr>
                            <tr>
                                <td class="white_bg">	Seudoartrosis de cualquier hueso	</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_green_opacity ">&nbsp;</td>
				  				<td class="text-center cell_purple_opacity ">&nbsp;</td>
                             </tr>
                            <tr>
                                <td class="white_bg">	Tumores	</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity"><i class="fa fa-circle"></i></td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity"><i class="fa fa-circle"></i></td>
				  				<td class="text-center cell_primary_opacity"><i class="fa fa-circle"></i></td>
				  				<td class="text-center cell_green_opacity ">&nbsp;</td>
				  				<td class="text-center cell_purple_opacity ">&nbsp;</td>
                                
                              </tr>
                            <tr>
                                <td class="white_bg">	Tumores: Pérdida Masiva de Tejido	</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
                                <td class="text-center cell_primary_opacity">&nbsp;</td>
                                <td class="text-center cell_primary_opacity"><i class="fa fa-circle"></i></td>
                                <td class="text-center cell_primary_opacity"><i class="fa fa-circle"></i></td>
                                <td class="text-center cell_primary_opacity"><i class="fa fa-circle"></i></td>
                                <td class="text-center cell_primary_opacity"><i class="fa fa-circle"></i></td>
				  				<td class="text-center cell_primary_opacity"><i class="fa fa-circle"></i></td>
				  				<td class="text-center cell_primary_opacity"></td>
				  				<td class="text-center cell_primary_opacity"><i class="fa fa-circle"></i></td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_primary_opacity">&nbsp;</td>
				  				<td class="text-center cell_green_opacity ">&nbsp;</td>
				  				<td class="text-center cell_purple_opacity ">&nbsp;</td>
                              </tr>
                          -->
			  			</tbody>
			  		</table>
		  		</div>

		  	</div>
		  </div>
		</div>
	</div>
	</div>
	
<script type="text/javascript">
	$('#my-affix').affix({
	    offset: {
	      top: 920
	    , bottom: function () {
	        return (this.bottom = $('.footer').outerHeight(true))
	      }
	    }
	  })
</script>

<?php include 'layout/footer.php';?>
<?php include 'layout/foot.php';?>
<?php
mysql_free_result($listaproductos);

mysql_free_result($productoselec);

mysql_free_result($cprod);

mysql_free_result($listapps);

mysql_free_result($prodyapps);

mysql_free_result($listap2);
mysql_free_result($listap3);
mysql_free_result($listap4);
mysql_free_result($listap5);
mysql_free_result($listap6);
mysql_free_result($listap7);
mysql_free_result($listap8);
?>
