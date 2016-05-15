<?php

include 'conexion.php';

//ini_set("SMTP","localhost");
ini_set("sendmail_from","algibealgibe@gmail.com");

if(isset($_POST['email'])) {
        
    
$cuerpo = ' 

<html> 
<head> 
   <title>Prueba de correo</title> 
</head> 
<body> 
<h1>Mail de soporte</h1> 
<p> 

Detalles del formulario de contacto:<br><br>
Nombre:  '. $_POST['first_name'] .' <br>
E-mail:  '. $_POST['email'] .' <br>
Comentarios: '. $_POST['comments'] .' <br><br>

</body> 
</html> 
'; 

    
//para el envío en formato HTML 
$headers = "MIME-Version: 1.0\r\n"; 
$headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 

//dirección del remitente 
$headers .= "From: Equipo de fastwer <fastwer.com>\r\n"; // Primer titulo correo

//dirección de respuesta, si queremos que sea distinta que la del remitente 
//$headers .= "Reply-To: hola@fastewr.com\r\n"; 

//ruta del mensaje desde origen a destino 
//$headers .= "Return-path: holahola@desarrolloweb.com\r\n"; 

//direcciones que recibián copia 
//$headers .= "Cc: albertgb@hotmail.es\r\n"; 

//direcciones que recibirán copia oculta 
//$headers .= "Bcc: pepe@pepe.com,juan@juan.com\r\n";     
  
$email_to = "barrichello@hotmail.es"; //Segundo titulo correo
    
$email_subject = "Contacto desde el sitio web";

// Aquí se deberían validar los datos ingresados por el usuario
if(!isset($_POST['first_name']) ||
!isset($_POST['email']) ||
!isset($_POST['comments'])) {

echo "<b>Ocurrió un error y el formulario no ha sido enviado. </b><br />";
echo "Por favor, vuelva atrás y verifique la información ingresada<br />";
die();
}

$email_message = "Detalles del formulario de contacto:\n\n";
$email_message .= "Nombre: " . $_POST['first_name'] . "\n";
$email_message .= "E-mail: " . $_POST['email'] . "\n";
$email_message .= "Comentarios: " . $_POST['comments'] . "\n\n";

mail($email_to, $email_subject,$cuerpo, $headers);
//mail("barrichello@hotmail.es","Probando mercury","Probando mercury", $headers);

echo "¡El formulario se ha enviado con éxito!";
}
?>