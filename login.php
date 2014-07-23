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
?>
<?php
// *** Validate request to login to this site.
if (!isset($_SESSION)) {
  session_start();
}

$loginFormAction = $_SERVER['PHP_SELF'];
if (isset($_GET['accesscheck'])) {
  $_SESSION['PrevUrl'] = $_GET['accesscheck'];
}

if (isset($_POST['user'])) {
  $loginUsername=$_POST['user'];
  $password=$_POST['password'];
  $MM_fldUserAuthorization = "";
  $MM_redirectLoginSuccess = "productos_admin.php";
  $MM_redirectLoginFailed = "login.php";
  $MM_redirecttoReferrer = false;
  mysql_select_db($database_connection, $connection);
  
  $LoginRS__query=sprintf("SELECT usuario, password FROM usuarios WHERE usuario=%s AND password=%s",
    GetSQLValueString($loginUsername, "text"), GetSQLValueString($password, "text")); 
   
  $LoginRS = mysql_query($LoginRS__query, $connection) or die(mysql_error());
  $loginFoundUser = mysql_num_rows($LoginRS);
  if ($loginFoundUser) {
     $loginStrGroup = "";
    
	if (PHP_VERSION >= 5.1) {session_regenerate_id(true);} else {session_regenerate_id();}
    //declare two session variables and assign them
    $_SESSION['MM_Username'] = $loginUsername;
    $_SESSION['MM_UserGroup'] = $loginStrGroup;	      

    if (isset($_SESSION['PrevUrl']) && false) {
      $MM_redirectLoginSuccess = $_SESSION['PrevUrl'];	
    }
    header("Location: " . $MM_redirectLoginSuccess );
  }
  else {
    header("Location: ". $MM_redirectLoginFailed );
  }
}
?>
<?php include 'admin_layout/head.php';?>
<div class="container-fluid no-padding">
	<div class="pleca">
		<div class="text-center">
			<img src="img/biograft_admin_logo.png">
		</div>
	</div>
	<div class="">

		<div class="row no-margin">
        <form name="form1" action="<?php echo $loginFormAction; ?>" method="POST">
        
			<div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-8 col-xs-offset-2 login-box">
				<h3 class="text-center mb20 text-primary">Iniciar Sesi&oacute;n</h3>
				<div class="col-xs-12">
					<div class="form-group">
					    <div class="input-group">
					      <div class="input-group-addon"><i class="fa fa-user"></i></div>
					      <input class="form-control" type="text" name="user" placeholder="Usuario">
					    </div>
					  </div>
				</div>
				<div class="col-xs-12">
					<div class="form-group">
					    <div class="input-group">
					      <div class="input-group-addon"><i class="fa fa-key"></i></div>
					      <input class="form-control" type="password" name="password" placeholder="Contrase&ntilde;a">
					    </div>
					</div>
					<div class="row btn_bar">
						<div class="col-xs-12">
                        
                        <input type="submit" name="enviar" class="btn-ok btn btn-block" value="Entrar" />
						</div>
					</div>
				</div>
				
			</div>
            
            </form>

		</div>

	</div>
	
</div>

<?php include 'admin_layout/footer.php';?>
<?php include 'admin_layout/foot.php';?>