<?php
if(isset($_POST['email'])) {

// Debes editar las próximas dos líneas de código de acuerdo con tus preferencias
$email_to = "aline.calderon@gmail.com";
$email_subject = "Bolsa de Trabajo Biograft";

// Aquí se deberían validar los datos ingresados por el usuario
if(!isset($_POST['nombreb']) ||
!isset($_POST['emailb']) ||
!isset($_POST['mensajeb'])) {

echo "<b>Ocurrió un error y el formulario no ha sido enviado. </b><br />";
echo "Por favor, vuelva atrás y verifique la información ingresada<br />";
die();
}

$email_message = "Detalles del formulario de contacto:\n\n";
$email_message .= "Nombre: " . $_POST['nombreb'] . "\n";
$email_message .= "carrera: " . $_POST['carrera'] . "\n";
$email_message .= "email: " . $_POST['emailb'] . "\n";
$email_message .= "especializacion: " . $_POST['especializacion'] . "\n";
$email_message .= "experiencia: " . $_POST['experiencia'] . "\n";
$email_message .= "telefono: " . $_POST['telefonob'] . "\n";
$email_message .= "fax: " . $_POST['faxb'] . "\n";
$email_message .= "mensaje: " . $_POST['mensajeb'] . "\n\n";


// Ahora se envía el e-mail usando la función mail() de PHP
$headers = 'From: '.$email_from."Bolsa de Trabajo Biograft".
'Reply-To: '.$email_from."\r\n" .
'X-Mailer: PHP/' . phpversion();
@mail($email_to, $email_subject, $email_message, $headers);

echo "¡El formulario se ha enviado con éxito!";
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Bolsa de Trabajo Biograft</title>
<meta http-equiv="Refresh" content="5;url=contacto.php">
</head>

<body>
	<p style="font-family: 'Helvetica Neue', Helvetica, sans-serif; color: #666; text-align: center; ">
	¡Hemos recibido tus datos, gracias!. Pronto nos pondremos en contacto contigo. <br>
				En un momento seras redireccionado
	</p>
</body>
</html>