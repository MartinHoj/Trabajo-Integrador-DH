<?php 
$base = file_get_contents("usuarios.json");
//Abro la base de datos
$baseDeDatos = json_decode($base,true);
// Seteo el array de errores que se va a utilizar para después imprimirlos en caso de ser necesarios
$errores = [];
if (($_POST)) {
  //Validación
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
          header('Location: index.php'); exit;
        }
      }
    }
    $errores = "El email o contraseña son incorrectos";
    } else {
      $errores ["password"] = "El campo contraseña es obligatorio";
    }
  }
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

<body
  background="https://www.desktopbackground.org/p/2015/12/30/1065649_franco-feruci-sisal-twill-yaz-97139-designer-wallcoverings_1944x1281_h.jpg"
  title="Franco Feruci SISAL TWILL [YAZ 97139] : Designer Wallcoverings™ Desktop Background">


  <form action="login.php" method="post">
    <div class="contenedor">
      <h1>Ingresar</h1>
      <p>
        <label for="labelEmail">Dirección de correo electrónico</label>
        <br>
        <input type="email" class="input" name="email" id="email" value=" <?= (isset($_POST["email"]))?$_POST["email"]:"" ?> " placeholder="    E-mail">
        <br>
        <small id="email">
          Nunca compartiremos su correo electrónico con nadie .</small> <br>
          <?php if (isset($errores["email"])) :?>
          <small style="color:red"> <?= $errores["email"]; ?> </small>
          <?php endif ?>
      </p>
      <p>
        <label for="labelPassword">Password</label>
        <br>
        <input type="password" class="input" name= "password" id="password" placeholder="Password"> <br>
        <?php if (isset($errores["password"])) :?>
          <small style="color:red"> <?= $errores["password"]; ?> </small>
          <?php endif ?>
      </p>
      <p>
        <input type="checkBox" class="checkBox" name="recordarme" value="recordarme">
        <label class="recordarme" name="recordarme" for="recordarme">Recordarme</label> <br>
      </p>
      <?php if ($errores == "El email o contraseña son incorrectos") :?>
          <small style="color:red"> <?= $errores; ?> </small>
          <?php endif ?>
      <button type="submit" class="button">Ingresar</button>
    </div>
  </form>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</body>

</html>