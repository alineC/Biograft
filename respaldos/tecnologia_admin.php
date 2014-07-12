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
$query_tec = "SELECT * FROM tecnologia";
$tec = mysql_query($query_tec, $connection) or die(mysql_error());
$row_tec = mysql_fetch_assoc($tec);
$totalRows_tec = mysql_num_rows($tec);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Untitled Document</title>
</head>

<body>
<p><a href="tecnologia_add.php">Agregar</a></p>
<table border="1">
  <tr>
    <td>id</td>
    <td>titulo</td>
    <td>foto</td>
    <td>fecha</td>
    <td>Editar</td>
    <td>Eliminar</td>
  </tr>
  <?php do { ?>
    <tr>
      <td><?php echo $row_tec['id']; ?></td>
      <td><?php echo $row_tec['titulo']; ?></td>
      <td><?php echo $row_tec['foto']; ?></td>
      <td><?php echo $row_tec['fecha']; ?></td>
      <td><a href="tecnologias_edit.php?id=<?php echo $row_tec['id']; ?>">editar</a></td>
      <td><a href="tecnologia_eliminar.php?id=<?php echo $row_tec['id']; ?>">eliminar</a></td>
    </tr>
    <?php } while ($row_tec = mysql_fetch_assoc($tec)); ?>
</table>
</body>
</html>
<?php
mysql_free_result($tec);
?>
