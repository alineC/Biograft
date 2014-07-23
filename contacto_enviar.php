<?php
if(isset($_POST['email'])) {

$email_to = "aline.calderon@gmail.com";
$email_subject = "Contacto Biograft";

if(!isset($_POST['nombre']) ||
!isset($_POST['email']) ||
!isset($_POST['ocupacion']) ||
!isset($_POST['mensaje'])) {

echo "<b>Ocurrió un error y el formulario no ha sido enviado. </b><br />";
echo "Por favor, vuelva atrás y verifique la información ingresada<br />";
die();
}

$email_message = "Detalles del formulario de contacto:\n\n";
$email_message .= "Nombre: " . $_POST['nombre'] . "\n";
$email_message .= "ocupacion: " . $_POST['ocupacion'] . "\n";
$email_message .= "email: " . $_POST['email'] . "\n";
$email_message .= "telefono: " . $_POST['telefono'] . "\n";
$email_message .= "fax: " . $_POST['fax'] . "\n";
$email_message .= "hospital: " . $_POST['hospital'] . "\n";
$email_message .= "domicilio: " . $_POST['domicilio'] . "\n";
$email_message .= "mensaje: " . $_POST['mensaje'] . "\n\n";


$headers = 'From: '.$email_from."Contacto Biograft".
'Reply-To: '.$email_from."\r\n" .
'X-Mailer: PHP/' . phpversion();
@mail($email_to, $email_subject, $email_message, $headers);

echo "";
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Contacto Biograft</title>
<meta http-equiv="Refresh" content="5;url=contacto.php">
</head>

<body>
<h3 style="font-family: 'Helvetica Neue', Helvetica, sans-serif; color: #333; text-align: center; ">
	¡El formulario se ha enviado con éxito!
	<small>Serás direccionado en un momento</small>
</h3>
</body>
</html>