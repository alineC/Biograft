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
$query_tec = "SELECT * FROM tecnologia ORDER BY id DESC";
$tec = mysql_query($query_tec, $connection) or die(mysql_error());
$row_tec = mysql_fetch_assoc($tec);
$totalRows_tec = mysql_num_rows($tec);
?>
<?php include 'layout/head.php';?>
<?php include 'layout/header.php';?>

<div class="slider banner">
	<img src="img/biograft_tecnologia_banner.png">
	<div class="primary_bg">
      <div class="container primary_bg">
			<h1 class="titulo">
				Nuestra Tecnolog&iacute;a
			</h1>
	  </div>
	</div>
</div>

<div class="gray_bg biograft_tabs slider">
  	<div class="container gray_bg">
		<ul class="nav nav-tabs">
		  <li><a show-tab href="#home" data-toggle="tab">Instalaciones</a></li>
		  <li><a show-tab href="#profile" data-toggle="tab">Procesos</a></li>
		  <li><a show-tab href="#messages" data-toggle="tab">Protocolos</a></li>
		  <li><a show-tab href="#settings" data-toggle="tab">Antenas Tecnol&oacute;gicas</a></li>
		</ul>
	</div>
</div>

<div class="slider">
	<div class="container">
		<!-- Tab panes -->
		<div class="tab-content">

		<!--  TAB INSTALACIONES -->
		  <div class="tab-pane active" id="home">
		  	<div class="row mt60 mb130">
				<div class="col-xs-4">
					<h2>
						Instalaciones <br>
						<small>
							Dise&ntilde;o y funcionalidad con altos est&aacute;ndares de calidad.
						</small>
					</h2>
					<p class="mt30">
						Con m&aacute;s de 2000m2, nuestras instalaciones han sido especialmente dise&ntilde;adas y validadas espec&iacute;ficamente para la producci&oacute;n de dispositivos m&eacute;dicos derivados de tejido musculo esquel&eacute;tico humano.
						<br>
			Bajo los m&aacute;s altos est&aacute;ndares de calidad e higiene, contamos con cuatro cuartos limpios (clean rooms) en donde se realiza la manufactura y procesamiento del tejido musculo esquel&eacute;tico para obtener los implantes <b>Biograft&reg;</b>.
						<br>
			Desde su concepci&oacute;n, las instalaciones fueron planeadas para contar con espacios espec&iacute;ficos para cada parte del proceso.

					</p>
				</div>
				<div class="col-xs-8 mt60">
					<div class="row">
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
					  <div class="col-xs-3">
							<a class="thumbnail thumb_hover" data-toggle="modal"  data-target=".bs-example-modal-lg" href="">
								<img src="img/nTecnologia_instalaciones_foto1.jpg">
								<i class="fa fa-search"></i>
							</a>
							<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
							  <div class="modal-dialog  modal-lg">
							    <div class="modal-content">
							      <div class="modal-header">
							        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
							        <h4 class="modal-title" id="myModalLabel">Titulo de la foto</h4>
							      </div>
							      <div class="modal-body">
							      	<img class="img" src="img/nTecnologia_instalaciones_foto1_B.jpg" alt="...">
						          </div>
							      <div class="modal-footer">
							      </div>
							    </div>
							  </div>
							</div>
						</div>
                        
                        
                        
                        <?php do { ?>
                          <div class="col-xs-3"> <a class="thumbnail  thumb_hover" href=""> <img src="<?php echo $row_tec['foto']; ?>"> <i class="fa fa-search"></i> </a> </div>
                          <?php } while ($row_tec = mysql_fetch_assoc($tec)); ?>
                  
                        
                        
						<div class="col-xs-3">
							<a class="thumbnail  thumb_hover" href="">
								<img src="img/nTecnologia_instalaciones_foto2.jpg">
								<i class="fa fa-search"></i>
							</a>
						</div>
						<div class="col-xs-3">
							<a class="thumbnail  thumb_hover" href="">
								<img src="img/nTecnologia_instalaciones_foto3.jpg">
								<i class="fa fa-search"></i>
							</a>
						</div>
						<div class="col-xs-3">
							<a class="thumbnail  thumb_hover" href="">
								<img src="img/nTecnologia_instalaciones_foto4.jpg">
								<i class="fa fa-search"></i>
							</a>
						</div>
						<div class="col-xs-3">
							<a class="thumbnail thumb_hover" href="">
								<img src="img/nTecnologia_instalaciones_foto5.jpg">
								<i class="fa fa-search"></i>
							</a>
						</div>
						<div class="col-xs-3">
							<a class="thumbnail thumb_hover" href="">
								<img src="img/nTecnologia_instalaciones_foto6.jpg">
								<i class="fa fa-search"></i>
							</a>
						</div>
						<div class="col-xs-3">
							<a class="thumbnail thumb_hover" href="">
								<img src="img/nTecnologia_instalaciones_foto7.jpg">
								<i class="fa fa-search"></i>
							</a>
						</div>
						<div class="col-xs-3">
							<a class="thumbnail thumb_hover" href="">
								<img src="img/nTecnologia_instalaciones_foto8.jpg">
								<i class="fa fa-search"></i>
							</a>
						</div>
					</div>
				</div>
			</div>
		  </div>
		<!--  TAB INSTALACIONES -->
		  <div class="tab-pane" id="profile">
		  	<div class="row mt60 mb130">
		  		<div class="col-xs-4">
		  			<h2>
		  				Procesos 
		  				<small>
		  					Integraci&oacute;n inteligente
		de procesos innovadores.
		  				</small>
		  			</h2>
		  			<p>
		  				Nuestros procesos nos permiten asegurar que nuestro producto es est&eacute;ril, gracias a la mezcla de:
  				  <ul>
		  					<li>Una adecuada selecci&oacute;n del donador.</li>
		  					<li>Procesamiento en instalaciones validadas.</li>
		  					<li>Procesamiento con t&eacute;cnicas as&eacute;pticas y controles adecuados.</li>
		  					<li>Esterilizaci&oacute;n con radiaci&oacute;n gamma usando el <b>Proceso Clearant&reg;</b>.</li>
  				  </ul>
		  			</p>
		  		</div>
		  		<div class="col-xs-8 mt60">
		  			<img class="img" src="img/biograft_tecnologia_procesos_foto1.jpg">
		  		</div>
		  	</div>
		  	<div class="row procesos-tab mt60 mb130">
		  		<div class="pleca-gris slider">
		  			<ul class="nav nav-pills container">
					  <li>
					  	<a show-tab href="#seleccion" data-toggle="tab">
					  		<img class="thumbnail" src="img/biograft_tecnologia_procesos_tab1.png">
					  		<h5>Selecci&oacute;n y Pruebas del Donador</h5>
					  	</a>
					  </li>
					  <li>
					  	<a show-tab href="#proceso" data-toggle="tab">
					  		<img class="thumbnail" src="img/biograft_tecnologia_procesos_tab2.png">
					  		<h5>Proceso de Producci&oacute;n</h5>
					    </a>
					  </li>
					  <li>
					  	<a show-tab href="#clearance" data-toggle="tab">
					  		<img class="thumbnail" src="img/biograft_tecnologia_procesos_tab3.png">
					  		<h5>Proceso Clearant&reg;</h5>
					  	</a>
					  </li>
					  <li>
					  	<a show-tab href="#esterilizacion" data-toggle="tab">
					  		<img class="thumbnail" src="img/biograft_tecnologia_procesos_tab4.jpg">
					  		<h5>Esterilizaci&oacute;n - Seguridad</h5>
					  	</a>
					  </li>
					</ul>
		  		</div>
		  		

				<!-- Tab panes -->
				<div class="tab-content">
				  <div class="tab-pane active" id="seleccion">
				  	<h3 class="mt40">Selecci&oacute;n y Pruebas del Donador</h3>
				  	<div class="row mb40">
				  		<div class="col-xs-4">
				  			<h2>
				  				<small>Certificados por la AATB como especialistas en banco de tejidos.</small>
				  			</h2>
				  			<p>
				  				<b>Biograft&reg; </b>se mantiene a la vanguardia en la calidad de sus productos, preocup&aacute;ndonos siempre por mantener la calidad de nuestra labor ya que incide en la vida de lso seres humanos que recibir&aacute;n nuestros implantes.
				  				<br><br>
								La calidad de nuestros productos comienza a generarse desde la adecuada selecci&oacute;n de los donantes. Para efectuar esta labor contamos con personal certificado por la <b>AATB (Asociaci&oacute;n Americana de Bancos de Tejidos)</b> como Especialista en Banco de Tejidos (CBTS). Quienes se encargan de hacer una revisi&oacute;n exhaustiva del historial m&eacute;dico–social del donador potencial. Lo anterior involucra la b&uacute;squeda de patrones cl&iacute;nicos y/o evidencias de alto riego para descartar enfermedades contagiosas o autoinmunes que representen un riesgo a la salud de los pacientes que reciban un implante. La labor de aprobar o rechazar un donador potencial se hace con base en lineamientos internacionales como los est&aacute;ndares de la <b>AATB
								(Asociaci&oacute;n Americana de Bancos de Tejidos)</b>, la regulaci&oacute;n nacional como la Ley General de Salud y nuestros procedimientos, los cuales han sido aprobados por el Director M&eacute;dico y auditados por COFEPRIS.
								<br><br>
								Para asegurar que los donadores est&aacute;n libres de enfermedades infecto–contagiosas, nuestro personal de procuraci&oacute;n realiza la toma de muestras sangu&iacute;neas al momento de la extracci&oacute;n del tejido. Estas muestras son analizadas y permiten descartar la presencia y/o ant&iacute;genos de enfermedades especificas que son criterios de rechazo. Estos an&aacute;lisis son realizados con altos est&aacute;ndares <b>FDA (Food and Drug Administration)</b> mediante reactivos aprobados para su uso en muestras de sangre provenientes de cad&aacute;veres.


				  			</p>
				  		</div>
				  		<div class="col-xs-4">
				  			<h2>
				  				<small>Procesos que aseguran implantes libres de riesgo.</small>
				  			</h2>
				  			<p>
				  				Las pruebas que se realizan a estas muestras son para descartar la presencia de hepatitis provocada por HBV y HCV, SIDA,  s&iacute;filis, leucemia por el HTLV I y II y enfermedad de Chagas, para garantizar que no existe riesgo de infecci&oacute;n de hepatitis y/o SIDA.
								A estas muestras sangu&iacute;neas se les realiza una prueba de amplificaci&oacute;n de &aacute;cidos nucleicos <b>(NAT: nucleic acid amplification testing)</b> los cuales aumentan la sensibilidad de detecci&oacute;n de los virus y permiten su descubrimiento aun cuando en las otras pruebas el resultado sea negativo.
								 <br><br>
								Para garantizar la calidad en este punto tan cr&iacute;tico las pruebas mencionadas son analizadas en un laboratorio en Estados Unidos, mismo que est&aacute; certificado bajo los lineamientos del programa <b>CLIA (Clinical Laboratory Improvement Amendments)</b>. Con esta licencia y certificaci&oacute;n los laboratorios que participan en el programa CLIA analizan cualquier tipo de analito asegurando que el resultado emitido sea preciso, exacto, fiable y entregado en el menor tiempo posible.
								<br><br>
								Adem&aacute;s este laboratorio cuenta con el respaldo de la <b>FDA (Food and Drug Administration)</b> para analizar muestras cadav&eacute;ricas, ya que por procesos propios derivados de la muerte, se requiere de un tratamiento diferente a las muestras pre-mortem. Con procesos y equipos que permiten identificar bajos niveles de ant&iacute;genos y/o anticuerpos, los laboratorios nos aseguran que los resultados son m&aacute;s confiables que los realizados por cualquier laboratorio nacional que no tienen la metodolog&iacute;a, certificaci&oacute;n o validaci&oacute;n para manejar y analizar muestras  de sangre cadav&eacute;rica.
				  			</p>
				  		</div>
				  		<div class="col-xs-4">
				  			<h2>
				  				<small>Respaldo de la FDA para
		el an&aacute;lisis de muestras.</small>
				  			</h2>
				  			<p>
				  				A nivel de literatura, Prauss A. recomienda en su art&iacute;culo: “Tissue donation and virus safety: more nucleic acid amplification testing is needed”, publicado en Transplant Infectious Disease, que si no existe un procedimiento efectivo para inactivar virus, para aprobar o rechazar donadores, se deben usar las pruebas de amplificaci&oacute;n de &aacute;cidos nucleicos para las hepatitis y el SIDA.
				  				<br><br>
								Considerando la importancia de las pruebas de <b>ELISA Y NAT</b>, <b>Biograft&reg;</b> las ha involucrado como parte de su proceso de selecci&oacute;n de donadores, no obstante de tener un m&eacute;todo de esterilizaci&oacute;n que garantiza la inactivaci&oacute;n de part&iacute;culas virales. Con ello aseguramos la confianza de que nuestros productos est&eacute;n libres de agentes infecciosos.
								<br><br>
								Asimismo, para garantizar la inocuidad de nuestros productos por contaminaci&oacute;n bacteriana, realizamos an&aacute;lisis microbiol&oacute;gicos de cada muestra procurada y el personal encargado de este an&aacute;lisis cuenta con la experiencia y la capacitaci&oacute;n adecuada para discernir entre una contaminaci&oacute;n de las muestras y la propia biota del donador.
								<br><br>
								De cada donador no solamente se busca los microorganismos que son criterio de rechazo para <b>Biograft&reg;</b>, sino que adem&aacute;s se busca la totalidad de la biocarga que esta contenida en los tejidos con el fin de medir la disminuci&oacute;n de los microorganismos a lo largo de nuestros procesos. Para  finalizar con la prueba de esterilidad que asegure que no hay microorganismos y/o sus toxinas presentes en nuestros productos.

				  			</p>
				  		</div>
				  	</div>
				  </div>
				  <div class="tab-pane" id="proceso">
				  	<h3 class="mt40">Proceso de Producci&oacute;n</h3>
				  	<div class="row mb40">
				  		<div class="col-xs-4">
				  			<h2>
				  				<small>
				  					Procesamiento de tejidos con altos est&aacute;ndares de calidad.
				  				</small>
				  			</h2>
				  			<p>
				  				Cada uno de los implantes <b>Biograft&reg;</b> son procesados a partir de tejidos procurados con t&eacute;cnicas as&eacute;pticas y con diferentes controles durante todo el proceso de procuraci&oacute;n. Entrando en una fase de cuarentena mientras recibimos y analizamos, tanto la documentaci&oacute;n como los resultados de las pruebas anal&iacute;ticas. Una vez que nos aseguramos que la documentaci&oacute;n y las pruebas cumplen con las regulaciones nacionales e internacionales con los requerimientos y est&aacute;ndares necesarios, los tejidos son liberados para su procesamiento.

								La ruta en la cual el tejido es aprobado por Direcci&oacute;n M&eacute;dica y se convierte en implante, empieza con el control de cada uno de los congeladores y ultracongeladores por donde el tejido va pasando hasta alcanzar una alteraci&oacute;n que permita su manipulaci&oacute;n y la reducci&oacute;n del deterioro por los cambios de temperatura.
				  			</p>
				  		</div>
				  		<div class="col-xs-4">
				  			<h2>
				  				<small>
				  					Contamos con Clean Rooms &uacute;nicos en M&eacute;xico.
				  				</small>
				  			</h2>
				  			<p>
				  				Cuando el tejido alcanza la temperatura ambiente es ingresado a nuestros <b>Clean Rooms</b>, en donde el personal de proceso se encarga de limpiar, cortar, medir e incubar el implante, transformando los tejidos para obtener implantes en sus diferentes formas y tama&ntilde;os.

								Cada acci&oacute;n de esta etapa es llevada bajo estrictos procesos de asepsia, alcanzando los est&aacute;ndares de limpieza y desinfecci&oacute;n de &aacute;reas de producci&oacute;n farmac&eacute;uticas.

								Para poder evaluar la calidad en cada etapa del procesamiento del implante, se ha desarrollado una serie de controles que permiten medir puntos cr&iacute;ticos como la humedad de tejidos, la carga microbiana, la hermeticidad y esterilidad.
				  			</p>
				  		</div>
				  		<div class="col-xs-4">
				  			<img class="img mt40" src="img/biograft_tecnologia_procesos_tab2_foto.png">
				  		</div>
				  	</div>
				  </div>
				  <div class="tab-pane" id="clearance">

				  	
				  	<div class="row mt40 mb30">
				  		<div class="col-xs-12">
				  			<h3 class="no-margin" >Proceso Clearant&reg;</h3>
				  		</div>
				  		
				  		<div class="col-xs-4">
					  		<h2>
					  			<small>Seguridad y esterilidad
	en nuestros productos.</small>
					  		</h2>
					  		<p class="mt20">
					  			Despu&eacute;s de la seguridad del producto, la segunda respuesta que se busca es la esterilidad, es necesario hacer la observaci&oacute;n que los procesos as&eacute;pticos y la irradiaci&oacute;n con rayos gamma, el procesamiento con soluciones antibi&oacute;ticas, el bleaching (exposici&oacute;n a productos clorados) y otros procesos de disminuci&oacute;n de biocarga, no son suficientes para asegurar que un producto es est&eacute;ril.
	<br>
	<br>
								Para lograr la satisfacci&oacute;n y la esterilidad  total de cada producto, Biograft&reg; ha incorporado el Proceso <b>Clearant&reg;</b> a su cadena de producci&oacute;n para garantizar la esterilidad superior a cualquier otro producto del mercado, con la seguridad de ser totalmente funcional y seguro.
	<br><br>
								El Proceso <b>Clearant&reg;</b> es un m&eacute;todo de gran alcance en la conservaci&oacute;n y funcionalidad de tejidos y ha sido dise&ntilde;ado para reducir todos los tipos de pat&oacute;genos presentes en productos biol&oacute;gicos.



					  		</p>
					  	</div>
					  	<div class="col-xs-4">
					  		<h2>
					  			<small>Implantes que mantienen fuerza y elasticidad.</small>
					  		</h2>
					  		<p class="mt20">
					  			Por el momento, fuera del Proceso <b>Clearant&reg;</b>, no existe una tecnolog&iacute;a capaz de reducir substancialmente todos los tipos de pat&oacute;genos.
					  			<br><br>
								El Proceso <b>Clearant&reg;</b> logra un nivel de esterilizaci&oacute;n convencional microbiana que excede el de un dispositivo m&eacute;dico, sin la afectaci&oacute;n de la integridad estructural o biomec&aacute;nica del aloinjerto. El implante mantiene fuerza y elasticidad, y se integra bien con el tejido circundante.
								<br><br>
								Estudios de histopatolog&iacute;a y microscopia electr&oacute;nica  realizados por nuestro Director M&eacute;dico (Matus Jim&eacute;nez et al Acta Ortop&eacute;dica mexicana vol 3 jul/Ago 2013) nos demuestran que la irradiaci&oacute;n en esas dosis altas no da&ntilde;an estructuralmente los productos y estos mantienen su integridad y funcionalidad.

					  		</p>	
					  	</div>
					  	<div class="col-xs-4">
					  		<img class="img mt30" src="img/biograft_tecnologia_procesos_tab3_foto.png">
					  	</div>
				  	</div>
				  	
				  </div>
				  <div class="tab-pane" id="esterilizacion">
				  	<div class="row mt40 mb30">
				  		<div class="col-xs-12">
				  			<h3 class="no-margin">Esterilizaci&oacute;n - Seguridad</h3>
				  		</div>
				  		<div class="col-xs-4">
				  			<h2>
				  				<small>Protecci&oacute;n de tejidos para
el proceso de esterilizaci&oacute;n.</small>
				  			</h2>
				  			<p class="mt30">
				  				Como parte del procesamiento, los implantes <b>Biograft&reg;</b> son incubados en soluci&oacute;n radiocr&iacute;oprotectora <b>Clearant&reg;</b>, en este paso se brinda una protecci&oacute;n al tejido el cual se someter&aacute; a una alta dosis de irradiaci&oacute;n gamma. En caso de no brindarles esta protecci&oacute;n, los tejidos se ver&iacute;an da&ntilde;ados en su integridad con el consiguiente impacto en su desempe&ntilde;o.
				  				<br><br>
								Terminada la incubaci&oacute;n, se procede a esterilizar los implantes con cobalto 60, el cual genera una irradiaci&oacute;n gamma, que son ondas electromagn&eacute;ticas como las ondas de la luz pero con mayor energ&iacute;a. El material radioactivo no contamina nuestros implantes ya que durante todo el proceso de  esterilizaci&oacute;n se mantienen en recipientes herm&eacute;ticos de acero inoxidable de doble pared y los implantes s&oacute;lo reciben la energ&iacute;a de los rayos gamma. 
				  			</p>
				  		</div>
				  		<div class="col-xs-4">
				  			<h2>
				  				<small>Procesos avalados por
diversas instituciones.</small>
				  			</h2>
				  			<p class="mt30">
				  				De acuerdo al Instituto Nacional de Investigaciones Nucleares, este proceso es autorizado por diferentes autoridades como: la Organizaci&oacute;n Mundial de la Salud (OMS), la <b>FDA (Food and Drug Administration)</b>, la Organizaci&oacute;n de la Alimentaci&oacute;n y de la Agricultura (FAO), la Comisi&oacute;n Codex Alimentarius y el Organismo Internacional de Energ&iacute;a At&oacute;mica (OIEA).
<br><br>
								Con esta dosis de radiaci&oacute;n aplicada en el proceso aseguramos la eliminaci&oacute;n de la biocarga (en caso en que los tejidos presenten cultivos positivos desde la procuraci&oacute;n como resultado de la flora del propio donador) y de esta manera alcanzar niveles de aseguramiento de la esterilidad que cumplen con los est&aacute;ndares nacionales e internacionales (Farmacopea Nacional y USP Pharmacopeia). 
				  			</p>
				  		</div>
				  		<div class="col-xs-4">
				  			<h2>
				  				<small>Niveles de aseguramiento de la esterilidad con altos est&aacute;ndares.</small>
				  			</h2>
				  			<p class="mt30">
				  				La soluci&oacute;n <b>Clearant&reg;</b> ejerce su funci&oacute;n al preservar la calidad tisular y de desempe&ntilde;o del producto para que este ejerza su funci&oacute;n y devuelva al paciente su calidad de vida.
				  			</p>
				  			<div class="">
						      <img class="img" src="img/biograft_tecnologia_procesos_clearant.gif">
						    </div>
						    <h4>Efecto de la soluci&oacute;n Clearant&reg; </h4>
				  		</div>
				  	</div>
				  </div>
				</div>
		  	</div>
		  </div>
		 <!-- TAB PROTOCOLOS -->
		  <div class="tab-pane" id="messages">
		  	<div class="row mt60 mb130">
		  		<div class="col-xs-4">
		  			<h2>
		  				Protocolos Cl&iacute;nicos
		y de Investigaci&oacute;n <br>
						<small>Evidencia cl&iacute;nica de
		nuestros productos.</small>
		  			</h2>
		  			<p class="mt20">
		  				Con una visi&oacute;n estrat&eacute;gica, pero sobre todo &eacute;tica, llevamos a cabo acciones apegadas a nuestra misi&oacute;n. Apoyamos el desarrollo de la ciencia en M&eacute;xico, por ello <b>Biograft&reg;</b> participa en protocolos cl&iacute;nicos en centros de alta especialidad, con el prop&oacute;sito de generar evidencia cl&iacute;nica del desempe&ntilde;o de nuestros productos.
		  				<br><br>
						<i>
							&ldquo;Reconstrucci&oacute;n de ligamento cruzado anterior con aloinjerto versus autoinjerto:
						Un ensayo cl&iacute;nico controlado aleatorizado&rdquo; Instituto Nacional de Rehabilitaci&oacute;n.
						<br><br>
						&ldquo;Reconstrucci&oacute;n de Ligamento Cruzado Anterior con injerto cadav&eacute;rico  Hueso-Tendon-Hueso tratado con altas dosis de radiaci&oacute;n gamma bajo el proceso Clearant, seguimiento minimo a 2 a&ntilde;os&rdquo; Instituto Nacional de Rehabilitaci&oacute;n.
						<br><br>
						&ldquo;Transplante de Menisco&rdquo; Instituto Nacional de Rehabilitaci&oacute;n.
						<br><br>
						&ldquo;Protecci&oacute;n de los tejidos cadav&eacute;ricos expuestos a alta radiaci&oacute;n gamma&rdquo; Hospital General Xoco
						</i>
		  			</p>
		  		</div>
		  		<div class="col-xs-8">
		  			<img class="img mt40" src="img/biograft_tecnologia_protocolos.jpg">
		  		</div>
		  	</div>
		  </div>

		<!-- TAB ANTENAS TECNOLÓGICAS -->
		  <div class="tab-pane" id="settings">
		  	<div class="row mt60 mb130">
		  		<div class="col-xs-8 pull-right mb20">
		  			<img class=" mt30 img" src="img/biograft_tecnologia_foto_antena.jpg">
		  		</div>
		  		<div class="col-xs-4">
		  			<h2 class="">
		  				Antenas Tecnol&oacute;gicas <br>
		  				<small>Contribuci&oacute;n y exportaci&oacute;n
		de tecnolog&iacute;a innovadora.
						</small>
		  			</h2>
		  			<p class="mt20">
		  				Una antena tecnol&oacute;gica es una entidad avanzada que provee a su socio tecnol&oacute;gico de informaci&oacute;n y know-how de procesos y productos de punta, generados y manufacturados en un &aacute;rea geogr&aacute;fica determinada.
<br><br>
						Por ello, <b>Biograft&reg; </b> pone al alcance de la comunidad m&eacute;dica implantes de tejido m&uacute;sculo esquel&eacute;tico humano, procesados con la mejor tecnolog&iacute;a a nivel mundial y siguiendo los m&aacute;s estrictos est&aacute;ndares internacionales como ISO 13485 y los lineamientos de la <b>AATB (Asociaci&oacute;n Americana de Bancos de Tejidos)</b>.
<br><br>
						Somos una empresa de innovaci&oacute;n que ofrece alternativas a la comunidad m&eacute;dica y gracias a nuestras antenas tecnol&oacute;gicas en: Corea del Sur, Estados Unidos, Espa&ntilde;a y Suiza, ofrecemos al mercado nuevos productos tales como: <b>BioSponge&reg;</b> y <b>BioCartilago&reg;</b>.  Fruto de estas relaciones contamos con un pipeline de productos en desarrollo que nos mantendr&aacute; a la vanguardia de los bancos de tejidos en M&eacute;xico y Latinoam&eacute;rica en los pr&oacute;ximos a&ntilde;os.
		  			</p>
		  		</div>
		  		<div class="col-xs-4">
		  			<p>
		  				As&iacute; mismo, exportamos tambi&eacute;n  tecnolog&iacute;a a Espa&ntilde;a y Corea del Sur. Recibimos tejidos de dichos pa&iacute;ses para ser procesados con tecnolog&iacute;a <b>Biograft&reg;</b> en nuestras instalaciones y posteriormente
		ser enviados a dichos pa&iacute;ses como un producto terminado, incluso con su marca.
<br><br>
						Los implantes <b>Biograft&reg;</b> son procesados en el Banco de Tejidos M&uacute;sculo Esquel&eacute;tico, el cual cuenta con Licencia Sanitaria N&uacute;mero 12-TR-09-014-0001.
		  			</p>
		  		</div>
		  		<div class="col-xs-4">
		  			<p>
		  				Adem&aacute;s, contamos con un registro ante la <b>FDA (Food and Drug Administration)</b> con N&uacute;mero FEI 3004642077 y cada uno de nuestros productos cuenta con registro sanitario propio, expedido por la Secretaria de Salud a trav&eacute;s de la Comisi&oacute;n Federal de Protecci&oacute;n Contra Riesgos Sanitarios (COFEPRIS).
		  			</p>
		  		</div>
		  	</div>
		  </div>
		</div>
	</div>
</div>
</div>




<?php include 'layout/footer.php';?>
<?php include 'layout/foot.php';?>
<?php
mysql_free_result($tec);
?>
