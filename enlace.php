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

$maxRows_noticias = 4;
$pageNum_noticias = 0;
if (isset($_GET['pageNum_noticias'])) {
  $pageNum_noticias = $_GET['pageNum_noticias'];
}
$startRow_noticias = $pageNum_noticias * $maxRows_noticias;

mysql_select_db($database_connection, $connection);
$query_noticias = "SELECT * FROM noticias ORDER BY id DESC";
$query_limit_noticias = sprintf("%s LIMIT %d, %d", $query_noticias, $startRow_noticias, $maxRows_noticias);
$noticias = mysql_query($query_limit_noticias, $connection) or die(mysql_error());
$row_noticias = mysql_fetch_assoc($noticias);

if (isset($_GET['totalRows_noticias'])) {
  $totalRows_noticias = $_GET['totalRows_noticias'];
} else {
  $all_noticias = mysql_query($query_noticias);
  $totalRows_noticias = mysql_num_rows($all_noticias);
}
$totalPages_noticias = ceil($totalRows_noticias/$maxRows_noticias)-1;

$colname_noticiasid = "-1";
if (isset($_GET['id'])) {
  $colname_noticiasid = $_GET['id'];
}
mysql_select_db($database_connection, $connection);
$query_noticiasid = sprintf("SELECT * FROM noticias WHERE id = %s", GetSQLValueString($colname_noticiasid, "int"));
$noticiasid = mysql_query($query_noticiasid, $connection) or die(mysql_error());
$row_noticiasid = mysql_fetch_assoc($noticiasid);
$totalRows_noticiasid = mysql_num_rows($noticiasid);
?>
<?php include 'layout/head.php';?>
<?php include 'layout/header.php';?>


<div class="slider banner">
  <img src="img/biograft_enlace_banner.png">
  <div class="primary_bg">
    <div class="container primary_bg">
      <div class="row primary_bg">
        <div class="col-xs-12">
          <h1 class="titulo">
            Enlace
          </h1>
        </div>
          
      </div>
      
    </div>
  </div>
</div>


  <div class="gray_bg biograft_tabs slider">
    <div class="container gray_bg">
      <ul class="nav nav-tabs ">
        <li><a show-tab href="#home" data-toggle="tab">Eventos y Noticias</a></li>
        <li><a show-tab href="#profile" data-toggle="tab">Descargas</a></li>
        <li><a show-tab href="#messages" data-toggle="tab">Informaci&oacute;n del Paciente</a></li>
      </ul>
    </div>
  </div>

<div class="slider">
  <div class="container">
    <!-- Tab panes -->
    <div class="tab-content">
      <div class="tab-pane active" id="home">
        <div class="row mt60 ">
          <div class="col-xs-12 mb20">
            <h4>Eventos y Noticias</h4>
          </div>
          
          <table class="noticias_table">
            <tr>
              <td style="width: 33%; " class="text-center">
                <?php do { ?>
                <a href="?id=<?php echo $row_noticias['id']; ?>" class="thumbnail_noticias">
                  <img src="<?php echo $row_noticias['foto']; ?>">
                  <div class="caption">
                    <h5><?php echo $row_noticias['titulo']; ?></h5>
                  </div>
                </a>
                <?php } while ($row_noticias = mysql_fetch_assoc($noticias)); ?>
              </td>
              <td style=" width: 66%;" class=" noticia">  
                <div class="">
                  <h2><?php echo $row_noticiasid['titulo']; ?></h2>
                    <img class="img" src="<?php echo $row_noticiasid['foto']; ?>">
                    <h3>
                        <?php echo $row_noticiasid['subtitulo']; ?>
                    </h3>
                    <p class="columnas mt20 text-justify">
            <?php echo $row_noticiasid['cuerpo']; ?>
                    </p>
                </div>
              </td>
            </tr>
          </table>
          <!--
          <div class="col-xs-3 ">
            <?php do { ?>
            <a href="?id=<?php echo $row_noticias['id']; ?>" class="thumbnail">
              <img src="<?php echo $row_noticias['foto']; ?>">
              <div class="caption">
                <h5><?php echo $row_noticias['titulo']; ?></h5>
              </div>
            </a>
            <?php } while ($row_noticias = mysql_fetch_assoc($noticias)); ?>
          </div>

          <div class="col-xs-8 pull-right ">
            <div class="noticia">
              <h2><?php echo $row_noticiasid['titulo']; ?></h2>
                <img class="img" src="<?php echo $row_noticiasid['foto']; ?>">
                <h3>
                    <?php echo $row_noticiasid['subtitulo']; ?>
                </h3>
                <p class="columnas mt20">
        <?php echo $row_noticiasid['cuerpo']; ?>
                </p>
            </div>
            </div>
          -->

          
        </div>
      </div>
      <div class="tab-pane" id="profile">
        <div class="row mt60">
          <div class="col-xs-12 mb20">
            <h4 class=" ">Descargas</h4>
          </div>
        </div>
        
        <div class="row mb130 ">
          <div class="col-xs-2 ">
            <a class="thumbnail" href="">
              <img src="img/enlace_descargas_docMuestra.jpg">
            </a>
          </div>
        </div>
      </div>
      <div class="tab-pane" id="messages">
        <div class="row mt60 mb130">
          <div class="col-xs-5">
            <h2 class="no-margin">Informaci&oacute;n del Paciente <br>
              <small class="text-justify">Consulte a su m&eacute;dico
    sobre nuestros productos.
    </small>
            </h2>
            <p class="mt20 text-justify">
              La informaci&oacute;n de este sitio de internet est&aacute; dirigida a profesionales de la salud y ha sido dise&ntilde;ada para facilitarles el acceso a informaci&oacute;n.
              <br><br>
            Su contenido no debe utilizarse para diagnosticar o tratar problema alguno.
            <br><br>
            Si tiene o sospecha la existencia de un problema de salud, consulte personalmente con su m&eacute;dico.
            </p>
          </div>
          <div class="col-xs-7">
            <img class="img" src="img/biograft_enlace_infoPaciente.jpg">
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
mysql_free_result($noticias);

mysql_free_result($noticiasid);
?>