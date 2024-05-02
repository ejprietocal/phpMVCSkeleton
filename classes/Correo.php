<?php

namespace Classes;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once __DIR__ . '/template.php';

class Correo{

    public $email;
    public $nombre;
    public $apellidos;
    public $telefono;
    public $empresa;
    public $cuentanos;
    
    public function __construct($email, $nombre,$apellidos, $telefono,$empresa,$cuentanos)
    {
        $this->email = $email;
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
        $this->telefono = $telefono;
        $this->empresa = $empresa;
        $this->cuentanos = $cuentanos;
    }

    public function enviarConfirmacion(){
        //cfrear el objeto de email
        

        $mail = new PHPMailer;
        
        try{
            
            $mail->isSMTP();
            $mail->SMTPDebug = 0;
            $mail->Host = $_ENV['EMAIL_HOST'];
            $mail->SMTPAuth = true;
            $mail->Port = $_ENV['EMAIL_PORT'];
            $mail->Username = $_ENV['EMAIL_USER'];
            $mail->Password = $_ENV['EMAIL_PASSWORD'];
            $mail->SMTPSecure = 'tls';
            
            // configuracion de correo
            $mail->setFrom('servicios@pribyte.com', 'Pribytes');
            $mail->addReplyTo('servicios@pribyte.com', 'Pribytes');
            
            //primer destinatario
            $mail->addAddress($this->email, $this->nombre);
            $mail->Subject = '¡Registro Recibido!';
            $mail->isHTML(true);
            $mail->CharSet = 'UTF-8';
            $mail->Body = obtenerCorreoTemplate($this->nombre);
            // $mail->Body = 'texto';

            
            $mail->send();
    
            //restaurando original
            $mail->clearAddresses();
            $mail->clearReplyTos();
            $mail->Subject = '';  // Restablecer el asunto
            $mail->Body = '';  // Restablecer el cuerpo del mensaje
            
            
            //Segundo Destinatario (replica a correo coporativo)
            $mail->addAddress('servicios@pribyte.com', 'Pribytes');
            $mail->Subject = 'Nuevo Registro';
            $mail->isHTML(true);
            $mail->CharSet = 'UTF-8';
            
            $contenido = '<html>';
            $contenido .= '<body style="font-size:15px">';
            $contenido .= '<p>Se ha ingresado un nuevo registro por:<br></p>';
            $contenido .= '<strong>Nombre:</strong> '.$this->nombre.' '.$this->apellidos.'<br>';
            $contenido .= '<strong>Empresa:</strong> '.$this->empresa . '<br>';
            $contenido .= '<strong>Correo:</strong> '. $this->email. '<br>';
            $contenido .= '<strong>Telefono:</strong> '.$this->telefono.'<br><br>';
            $contenido .= '<strong>Descripcion:</strong>';
            $contenido .= '<p>'.$this->cuentanos.'</p>';
            $contenido .= '</body>';
            $contenido .= '</html>';
            
            $mail->Body = $contenido;
            
       
            $mail->send();
        }  
        catch(Exception $e){
            
        }
   
    }

}