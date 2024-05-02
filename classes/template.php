
<?php 

function obtenerCorreoTemplate($nombre){
    return '     
    
<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>¡Bienvenido!</title>
    
        <style>
            *{
                font-size: 15px;
            }
            tr{
                width: 100%;
            }
    
            div{
                background-color: #004AAD;
                padding: 10px;
            }
            .footer{
                border-collapse:collapse;
                padding:10px;
                margin:0;
                width:100%;
                height:30px;
            }
            .footer-icono{
                width:50%;
            }
            .icono{
                padding: 5px;
                border: none;
                border-radius: 10px;
                background-color:#9b9b9b;
                display:flex;
                align-items:center;
                justify-content:space-between !important;
                color:white;
                font-weight:700;
            }
            table{
                width: fit-content;
                padding: 10px 0 0 0;
                background-color:white;
                border-radius:10px;
                min-height: 500px;
                margin: 0 auto;
                max-width: 310px;
                color: black;
            }
            a{
                display:flex;
                border:none;
                width:fit-content;
                margin:0 auto;
                padding:10px;
                border-radius:10px;
                height:30px;
                align-items:center;
            }
            p{
                text-align: center;
            }
            
        </style>
    </head>
    <body>
    
        <table class="tabla-bienvenida" style="box-shadow: 0 0 10px 0 rgba(0,0,0,.18);">
            <tr style="width:100%; text-align:center">
                <td>
                    <img src="https://i.postimg.cc/9XntRbcP/footer2.png" alt="logo" width="200px" height="auto">
                </td>
            </tr>
            <tr style="width:100%">
                <td>
                    <p style="width: fit-content;margin: 0 auto;">Muchas gracias por contactarnos</p> 
                </td>
            </tr>
            <tr >
                <td>
                    <h2 style="width: fit-content;margin: 0 auto;">¡Hola '.$nombre.'!</h2>
                    <p style="width: fit-content;margin: 0 auto;">Tu Registro fue recibido</p>
                </td>
            </tr>
            <tr style="width:100%">
                <td >
                    <p style="width: fit-content;margin: 0 auto;">Muchas gracias por unirte a nuestra comunidad</p>
                </td>
            </tr>
            <tr style="width:100%">
                <td>
                    <p style="width: fit-content;margin: 0 auto;">En breve nos pondremos en contacto contigo para brindarte mas informacion de tu consulta</p>
                </td>
    
            </tr>
            <tr style="width:100%; text-align:center;">
                <a href="https://pribyte.com">
                    Explora nuestro sitio
                </a>
            </tr>
            <tr style="width:100%" class="footer">
                <td class="footer-icono">
                    <div class="icono">
                        <p>Desarrollo Web</p>
                        <p class="correo-nombre">servicios@pribyte.com</p>
                    </div>
                </td>
            </tr>
        </table>
        
    </body>
    </html>

    ';

}

?>



