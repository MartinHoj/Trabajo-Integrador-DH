<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
   
    <link rel="stylesheet" href="css/style_formulario.css">
    <title>Document</title>
</head>
<body background="https://www.desktopbackground.org/p/2015/12/30/1065649_franco-feruci-sisal-twill-yaz-97139-designer-wallcoverings_1944x1281_h.jpg" title="Franco Feruci SISAL TWILL [YAZ 97139] : Designer Wallcoverings™ Desktop Background">
    <div class="contenedor">
    <form action="formulario.html" method="POST">
       
   <h1>Registrarme</h1>
        <p>
        <label for="nombre" >Nombre</label>
        <br>
        <input name="nombre" type="text" required>
        <br>
        <small >Obligatorio</small>
        </p>
        
        <p>
        <label for="apellido">Apellido</label>
        <br>
        <input name="apellido" type="text" required>
        <br>
        <small >Obligatorio</small>
        </p>
         
        <p>
        <label for="email">Email</label>
        <br>
        <input type="email" name="email" id="email" required>
        <br>
             <small  >
              Nunca compartiremos su correo electrónico con nadie .</small>
        </p>
        <p>
        <label for="tel">Numero de teléfono</label>
        <br>
        <input type="tel" name="tel" id="tel">
        </p>
    

       <br><br>
       <p>
       <label for="masculino">Sexo</label>
       <br>
        <p>
       <label class="masc" for="masculino">Masculino</label>
    
       <input name="sexo" type="radio" name="masculino" id="masculino">
       </p>
        <p>
    
       <label  class="feme" for="femenino">Femenino</label> 

       <input name="sexo" type="radio" name="femenino" id="femenino">
    </p>
 
       <br><br><br>
   
       <p class="pais">
           <label for="pais">País</label>
           <br>
       <select name="pais" id="pais">
           <option value="argentina">Argentina</option>
           <option value="brasil">Brasil</option>
           <option value="Uruguay">Uruguay</option>
           <option value="paraguay">Paraguay</option>
           <option value="chile">Chile</option>
           <option value="bolivia">Bolivia</option>
       </select>
       <br>
        </p>
       
        <p>
        <label for="nuevaContrasenia">Nueva contraseña</label>
        <br>
        <input type="password" name="nuevaContrasenia" id="nuevaContrasenia" class="contrasenia">
        </p>
        <p>
        <label for="confirmarcontrasenia">Confirmar Contraseña</label>
        <br>
        <input type="password" name="confirmarcontrasenia" id="confirmarcontrasenia" class="contrasenia">
        </p>

       
           <button class="button" type="reset">Borrar</button>
           <button class="button" type="submit">Registrarme!</button>
     
    </form>
        </div>
</body>
</html>