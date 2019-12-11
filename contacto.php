<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style_contacto.css">
    <title>Contacto</title>
</head>
<body background="https://www.desktopbackground.org/p/2015/12/30/1065649_franco-feruci-sisal-twill-yaz-97139-designer-wallcoverings_1944x1281_h.jpg" title="Franco Feruci SISAL TWILL [YAZ 97139] : Designer Wallcoverings™ Desktop Background">
    
    <div class="contenedor">
        <form action="contacto.html" method="POST">
        
     <h1>Contactanos</h1>
     <p>
        <label for="labelNombre">Nombre</label>
        <br>    
        <input type="text" class="input" id="nombre"   placeholder="   Nombre">
       </p>
       
       <p>
        <label for="labelEmail">Dirección de correo electrónico</label>
        <br>    
        <input type="email" class="input" id="email"   placeholder="    E-mail">
        <br>
        <small id="email" >
         Nunca compartiremos su correo electrónico con nadie .</small>
        </p>
    
        <p>
        <label for="labelMensaje">Mensaje</label>
        <br>
        <textarea name="textarea" id="textarea" cols="30" rows="10" placeholder="Escribe tu mensaje aquí..." ></textarea>
        </p>
     
          <button class="button" type="reset">Borrar</button>
          <button class="button" type="submit">Enviar</button>
        
</form>
    </div>


</body>
</html>