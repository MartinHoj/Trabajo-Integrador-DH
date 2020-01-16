<?php 

require_once('controladores/funciones.php');
require_once('controladores/helpers.php');

$base = file_get_contents("usuarios.json");
//Abro la base de datos
$baseDeDatos = json_decode($base,true);
// Seteo el array de errores que se va a utilizar para después imprimirlos en caso de ser necesarios
$errores = [];

$recordarme =[]; // array para cuardar lo que se guarda para las cookies



$usuario;

if (($_POST)) {
  //Validación

  $recordarme = recordarUsuario($_POST);



  if (empty($_POST["email"])) {
    $errores["email"] = "El campo email es obligatorio";
  } else {
    if (!$_POST["password"] == "") {
    foreach ($baseDeDatos as $usuario) {
      if ($_POST["email"] == $usuario["email"]) {
        if (password_verify($_POST["password"],$usuario["password"])) {
          session_start();
          $_SESSION = $_POST;
          $_SESSION["password"] = NULL;
         

         //pre($recordarme["recordarme"]);

          // creo las coockies 
         if($recordarme["recordarme"]=='on'){
           
          setcookie("usuario", $_POST["email"], time()+3600);  /* expira en 2 min */
          
              setcookie("contraseña",  $_POST["password"], time()+3600);  /* expira en 2 min */
                   
                
         }else 

         {
          setcookie("usuario","",-1);
          setcookie("contraseña","",-1);
         }
        



        // pre($recordarme);
       
         
        //pre($_COOKIE["contraseña"]);

        
         
          header('Location: home.php'); exit;
        }
      }
    }
    $errores = "El email o contraseña son incorrectos";
    } else {
      $errores ["password"] = "El campo contraseña es obligatorio";
    }
  }
}


// persistencia con la base de datos al campo de usuario

$base = file_get_contents("usuarios.json");
//Abro la base de datos
$baseDeDatos = json_decode($base,true);

$erroresBaseDeDatos;
$persitenciaUsuario;

if($_POST){
  $errores = validarlog($_POST);
  // var_dump($errores);exit;
   if (!$errores) {
    $erroresBaseDeDatos =validarUsuario($baseDeDatos);
   
   // pre($erroresBaseDeDatos);
   }

    // persiste el uusuario correcto
   $persitenciaUsuario = persistenciaLog($baseDeDatos);
   //pre($persitenciaUsuario);
}











?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="stylesheet" href="css/style_login.css">
  <title>Document</title>
</head>

<body background="img\background.jpg">







  <form action="index.php" method="post">
    <div class="contenedor" >
      
    <h1>Ingresar</h1>
      <p>
        <label for="labelEmail">Dirección de correo electrónico</label>
        <br>

         <!-- class="input" -->
        <input type="email" class="form-control" name="email" id="email"  value="<?= (!isset($_COOKIE["usuario"]))? "" :$_COOKIE["usuario"]?>" placeholder="    E-mail">
        <br>
        <small id="email">
          Nunca compartiremos su correo electrónico con nadie .</small> <br>
          <?php if (isset($errores["email"])) :?>
          <small style="color:red"> <?= $errores["email"]; ?> </small>
          <?php endif ?>
           
           <!-- leyenda al comparar con la base de datos -->
           <?php if(isset($erroresBaseDeDatos['email'])): ?>
           <small style="color:red;"> <?= $erroresBaseDeDatos['email']; ?> </small>
            <?php endif; ?>
      
       </p>
      <p>
        <label for="labelPassword">Password</label>
        <br>
    
      
       
        <!-- class="input" -->
        <input type="password" class="form-control" name= "password" id="password" placeholder="Password"    value="<?= (!isset($_COOKIE["contraseña"]))?"": $_COOKIE["contraseña"] ?>" > 
     
        
         <br>
        <?php if (isset($errores["password"])) :?>
          <small style="color:red"> <?= $errores["password"]; ?> </small>
          <?php endif ?>
          <!-- leyenda al comparar con la base de datos -->
          <?php if(isset($erroresBaseDeDatos['password'])): ?>
    <small style="color:red;"> <?= $erroresBaseDeDatos['password']; ?> </small>
    <?php endif; ?>


      </p>

   

      <p>
        <input type="checkBox"  class="checkBox"  name="recordarme" value="recordarme" checked>
        <label class="recordarme" name="recordarme" for="recordarme" >Recordarme</label> <br>
      </p>
      <?php if ($errores == "El email o contraseña son incorrectos") :?>
          <small style="color:red"> <?= $errores; ?> </small>
          <?php endif ?>


<div>
          <!-- class="button -->
      <button type="submit" class="btn btn-primary">Ingresar</button>
      </div>
      <p>
      <a href="formulario.php" class="text-white">Registrarme</a>
      </p>

      <p>
      <br>
      <a href="contacto.php" class="text-white">Contactanos</a>
      </p>

    </div>
  </form>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</body>

</html>