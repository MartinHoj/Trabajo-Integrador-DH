<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style_contacto.css">
    <title>Contacto</title>
</head>

<body
    background="https://www.desktopbackground.org/p/2015/12/30/1065649_franco-feruci-sisal-twill-yaz-97139-designer-wallcoverings_1944x1281_h.jpg"
    title="Franco Feruci SISAL TWILL [YAZ 97139] : Designer Wallcoverings™ Desktop Background">

    <div class="contenedor">
        <form action="contacto.php" method="POST">

            <h1>Contactanos</h1>
            <p>
                <label for="labelNombre">Nombre</label>
                <br>
                <input type="text" class="input" id="nombre" placeholder="   Nombre">
            </p>

            <p>
                <label for="labelEmail">Dirección de correo electrónico</label>
                <br>
                <input type="email" class="input" id="email" placeholder="    E-mail">
                <br>
                <small id="email">
                    Nunca compartiremos su correo electrónico con nadie .</small>
            </p>

            <p>
                <label for="labelMensaje">Mensaje</label>
                <br>
                <textarea name="textarea" id="textarea" cols="30" rows="10"
                    placeholder="Escribe tu mensaje aquí..."></textarea>
            </p>

            <button class="button" type="reset">Borrar</button>
            <button class="button" type="submit">Enviar</button>

        </form>
    </div>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>