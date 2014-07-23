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



mysql_select_db($database_connection, $connection);
$query_catprod = "SELECT categorias.nombre AS catnom, productos.id, productos.nombre, productos.categoria FROM categorias, productos WHERE productos.categoria = categorias.id ORDER BY categorias.orden";
$catprod = mysql_query($query_catprod, $connection) or die(mysql_error());
$row_catprod = mysql_fetch_assoc($catprod);
$totalRows_catprod = mysql_num_rows($catprod);

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
                              
                              <?php


								mysql_select_db($database_connection, $connection);
								$categorias = "SELECT id, nombre FROM categorias";

								$productos = "SELECT categoria, nombre, id FROM productos";


								$resultado_prod = mysql_query($productos); 
								while ($filas_prod = mysql_fetch_row($resultado_prod)) { 
								$datos_prod[] = $filas_prod;  //cada elemento de $datos va a ser una fila del resultado; 
								}
								// echo('<pre>');
								// var_dump($datos_prod);
								// echo('</pre>');
								// echo"___________";

								$resultado_cat = mysql_query($categorias); 
								while ($filas_cat = mysql_fetch_row($resultado_cat)) { 
								$datos_cat[] = $filas_cat;  //cada elemento de $datos va a ser una fila del resultado; 
								}
								/*echo('<pre>');
								var_dump($datos_cat);
								echo('</pre>');*/


								foreach( $datos_cat as $itema ) {
									$hijos = NULL;
									$list .= "<h4>" . $itema['1']."</h4>";
									foreach( $datos_prod as $itemb ) {
										if ( $itemb['0'] == $itema['0'] ) {
											$hijos .= "<li><a href='?id=".$itemb['2']."'><i class='fa fa-minus'></i>".$itemb['1']."</a></li>";
										}
									}
									if ( isset( $hijos ) && $hijos != NULL )	{
										$list .= "<ul>".$hijos."</ul>";
									}
									//$list .= "</li>";
								}
								echo "<li>".$list."</li>";





								?>
								                              

							</ul>
		  				</td>



		  					
                              
                              
							
		  				
		  				





		  				<td>
		  					<h1>
							<?php echo $row_productoselec['nombre']; ?></h1>
							<img class="img-producto mt20" src="<?php echo $row_productoselec['foto']; ?>">
							<h4>
							Registro Sanitario: <?php echo $row_productoselec['registro']; ?> </h4>
							<div class="row mt20">
								<div class="col-xs-6">
									<h3>Descripci&oacute;n</h3>
									<p>
										<?php echo $row_productoselec['descripcion']; ?></p>
								</div>
								<div class="col-xs-6">
									<h3>Aplicaciones</h3>
									<p>


				                  <?php echo $row_productoselec['aplicaciones']; ?></p>
                                  
                                  
                                 
                                        
                                  <ul>
                                  <?php do { ?>
                                  <li>
							  <?php echo $row_listapps['aplicacion']; ?>
							  
                                  </li>
                                  <?php } while ($row_listapps = mysql_fetch_assoc($listapps)); ?>
                                    </ul> 
                                  
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
		  		
		  		<div class="">
		  			<table style="width: 100%;">
			  			<thead>
			  				<tr>
				  				<td class="w25p aplicacion">Aplicaci&oacute;n de productos</td>
                                
                                <?php do { ?>
				  				<td class="w5p cell_primary ">
			  				      <p class="vertical-text"><?php echo $row_prodyapps['nombre']; ?></p>
			  				    </td>
                               	<?php } while ($row_prodyapps = mysql_fetch_assoc($prodyapps)); ?>
                                  
				  			</tr>
			  			</thead>
			  			<tbody>
                           
                            <tr>
                                <td class="white_bg">	Adelantamiento patelar	</td>
                                <td class="text-center cell_primary_opacity"><i class="fa fa-circle"></i></td>
                                <td class="text-center cell_primary_opacity"><i class="fa fa-circle"></i></td>
                                <td class="text-center cell_primary_opacity"><i class="fa fa-circle"></i></td>
                                <td class="text-center cell_primary_opacity"><i class="fa fa-circle"></i></td>
                                <td class="text-center cell_primary_opacity"><i class="fa fa-circle"></i></td>
                                <td class="text-center cell_primary_opacity"><i class="fa fa-circle"></i></td>
                                <td class="text-center cell_primary_opacity"><i class="fa fa-circle"></i></td>
                                <td class="text-center cell_primary_opacity"><i class="fa fa-circle"></i></td>
                                <td class="text-center cell_primary_opacity"><i class="fa fa-circle"></i></td>
				  				<td class="text-center cell_primary_opacity"><i class="fa fa-circle"></i></td>
				  				<td class="text-center cell_primary_opacity"><i class="fa fa-circle"></i></td>
				  				<td class="text-center cell_primary_opacity"><i class="fa fa-circle"></i></td>
				  				<td class="text-center cell_primary_opacity"><i class="fa fa-circle"></i></td>
				  				<td class="text-center cell_primary_opacity"><i class="fa fa-circle"></i></td>
				  				<td class="text-center cell_primary_opacity"><i class="fa fa-circle"></i></td>
				  				<td class="text-center cell_primary_opacity"><i class="fa fa-circle"></i></td>
				  				<td class="text-center cell_primary_opacity"><i class="fa fa-circle"></i></td>
				  				<td class="text-center cell_primary_opacity"><i class="fa fa-circle"></i></td>
				  				<td class="text-center cell_primary_opacity"><i class="fa fa-circle"></i></td>
				  				<td class="text-center cell_primary_opacity"><i class="fa fa-circle"></i></td>
				  				<td class="text-center cell_primary_opacity"><i class="fa fa-circle"></i></td>
				  				<td class="text-center cell_green_opacity "><i class="fa fa-circle"></i></td>
				  				<td class="text-center cell_purple_opacity "><i class="fa fa-circle"></i></td>
                            </tr>
                            <tr>
                                <td class="white_bg">	Artrodesis de columna cervical, lumbar, torácica	</td>
                                <td class="text-center cell_primary_opacity"><i class="fa fa-circle"></i></td>
                                <td class="text-center cell_primary_opacity"><i class="fa fa-circle"></i></td>
                                <td class="text-center cell_primary_opacity"><i class="fa fa-circle"></i></td>
                                <td class="text-center cell_primary_opacity"><i class="fa fa-circle"></i></td>
                                <td class="text-center cell_primary_opacity"><i class="fa fa-circle"></i></td>
                                <td class="text-center cell_primary_opacity"><i class="fa fa-circle"></i></td>
                                <td class="text-center cell_primary_opacity"><i class="fa fa-circle"></i></td>
                                <td class="text-center cell_primary_opacity"><i class="fa fa-circle"></i></td>
                                <td class="text-center cell_primary_opacity"><i class="fa fa-circle"></i></td>
				  				<td class="text-center cell_primary_opacity"><i class="fa fa-circle"></i></td>
				  				<td class="text-center cell_primary_opacity"><i class="fa fa-circle"></i></td>
				  				<td class="text-center cell_primary_opacity"><i class="fa fa-circle"></i></td>
				  				<td class="text-center cell_primary_opacity"><i class="fa fa-circle"></i></td>
				  				<td class="text-center cell_primary_opacity"><i class="fa fa-circle"></i></td>
				  				<td class="text-center cell_primary_opacity"><i class="fa fa-circle"></i></td>
				  				<td class="text-center cell_primary_opacity"><i class="fa fa-circle"></i></td>
				  				<td class="text-center cell_primary_opacity"><i class="fa fa-circle"></i></td>
				  				<td class="text-center cell_primary_opacity"><i class="fa fa-circle"></i></td>
				  				<td class="text-center cell_primary_opacity"><i class="fa fa-circle"></i></td>
				  				<td class="text-center cell_primary_opacity"><i class="fa fa-circle"></i></td>
				  				<td class="text-center cell_primary_opacity"><i class="fa fa-circle"></i></td>
				  				<td class="text-center cell_green_opacity "><i class="fa fa-circle"></i></td>
				  				<td class="text-center cell_purple_opacity "><i class="fa fa-circle"></i></td>
                            </tr>
                            <tr>
                                <td class="white_bg">	Artrodesis de muñeca, de hombro, de codo, cadera, rodilla, tobillo, metatarsianos, metacarpianos, falanges de los dedos de la mano y pies	</td>
                            </tr>
                            <tr>
                                <td class="white_bg">	Cirugía Columna: Corperectomia	</td>
                            </tr>
                            <tr>
                                <td class="white_bg">	Cirugía de Columna	</td>
                            </tr>
                            <tr>
                                <td class="white_bg">	Cirugía de Revisión de rodilla	</td>
                            </tr>
                            <tr>
                                <td class="white_bg">	Cirugía de Revisión de cadera	</td>
                            </tr>
                            <tr>
                                <td class="white_bg">	Clavo Centromedular	</td>
                            </tr>
                            <tr>
                                <td class="white_bg">	Como complemento a las cirugías de columna en las instrumentaciones posteriores o anteriores y que se busca artrodesar esos segmentos	</td>
                             </tr>
                            <tr>   
                                <td class="white_bg">	Como membrana biológica	</td>
                            </tr>
                            <tr>
                                <td class="white_bg">	Consolidación viciosa y osteotomías correctivas	</td>
                            </tr>
                            <tr>
                                <td class="white_bg">	Elongaciones	</td>
                            </tr>
                            <tr>
                                <td class="white_bg">	En defectos de tibia, fémur y cadera en prótesis de revisión	</td>
                            </tr>
                            <tr>
                                <td class="white_bg">	En el tratamiento de defectos de cráneo posterior a traumatismo y pérdida de tejido óseo	</td>
                            </tr>
                            <tr>
                                <td class="white_bg">	En la reconstrucción de defectos manipulares o pérdidas de tejido óseo en mandíbula o maxilar	</td>
                            </tr>
                            <tr>
                                <td class="white_bg">	En los defectos alveolares en maxilares o mandíbula que requiera un apoyo mayor de tejido óseo	</td>
                            </tr>
                            <tr>
                                <td class="white_bg">	En tratamiento de tumores óseos que provocan defectos en los huesos o cavidades que requieran su relleno	</td>
                            </tr>
                            <tr>
                                <td class="white_bg">	En tratamientos de fracturas que provocan pérdida de tejido óseo debido al traumatismo que la provocó	</td>
                            </tr>
                            <tr>
                                <td class="white_bg">	Espaciador para Cuerpo Vertebral	</td>
                            </tr>
                            <tr>
                                <td class="white_bg">	Fracturas por colapso	</td>
                            </tr>
                            <tr>
                                <td class="white_bg">	Osteotomía Pélvica	</td>
                             </tr>
                            <tr>   
                             
                                <td class="white_bg">	Seudoartrosis	</td>
                            </tr>
                            <tr>
                                <td class="white_bg">	Quistes óseos	</td>
                            </tr>
                            <tr>
                                <td class="white_bg">	Reconstrucción de Fracturas por pérdida de sustancia ósea	</td>
                            </tr>
                            <tr>
                                <td class="white_bg">	Reconstrucción de Ligamento Cruzado	</td>
                            </tr>
                            <tr>
                                <td class="white_bg">	Reconstrucción de Meseta Tibial	</td>
                            </tr>
                            <tr>
                                <td class="white_bg">	Relleno de cajas cervicales	</td>
                            </tr>
                            <tr>
                                <td class="white_bg">	Relleno de cajas lumbares	</td>
                             </tr>
                            <tr>
                                
                                <td class="white_bg">	Relleno de cavidades producidas por osteomielitis, tumores	</td>
                            </tr>
                            <tr>
                                <td class="white_bg">	Relleno de defectos de fracturas	</td>
                            </tr>
                            <tr>
                                <td class="white_bg">	Relleno de defectos óseos y cavidades óseas en procedimientos quirúrgicos de Área Dental y Maxilofacial	</td>
                            </tr>
                            <tr>
                                <td class="white_bg">	Relleno de defectos óseos y cavidades óseas en procedimientos quirúrgicos en Ortopedia y Traumatología	</td>
                             </tr>
                            <tr>
                                <td class="white_bg">	Relleno de fracturas de los cuerpos vertebrales cervicales, torácicas y lumbares	</td>
                             </tr>
                            <tr>
                                <td class="white_bg">	Relleno en defectos de prótesis primarias	</td>
                            </tr>
                            <tr>
                                <td class="white_bg">	Retardo de Consolidación	</td>
                            </tr>
                            <tr>
                                <td class="white_bg">	Seudoartrosis de cualquier hueso	</td>
                             </tr>
                            <tr>
                                <td class="white_bg">	Tumores	</td>
                                
                              </tr>
                            <tr>
                                <td class="white_bg">	Tumores: Pérdida Masiva de Tejido	</td>
                              </tr>
			  			</tbody>
			  		</table>
		  		</div>

		  	</div>
		  </div>
		</div>
	</div>
	</div>
	


<?php include 'layout/footer.php';?>
<?php include 'layout/foot.php';?>
<?php


mysql_free_result($productoselec);
mysql_free_result($listaproductos);

mysql_free_result($cprod);

mysql_free_result($listapps);

mysql_free_result($prodyapps);


mysql_free_result($catprod);


mysql_free_result($categorias);
mysql_free_result($productos);

?>
