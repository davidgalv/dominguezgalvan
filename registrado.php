<?php 
    session_start(); 
?>
<!-- Página que muestra cuando te has registrado -->
<!DOCTYPE html>
<html lang=es>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <h1>Usuario Registrado!</h1>
        <p>
            Usuario <?php echo $_SESSION['usuario'];?> registrado!
        </p>
        <p>
            <form action="index.php" method="post">
                <input type="submit" name="boton" value="Inicio">
            </form>
        </p>
    </body>
</html>
