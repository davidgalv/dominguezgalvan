<!DOCTYPE html>
<!-- Página principal, donde se muestran las fotos -->
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Página de Inicio</title>
    </head>
    <body>
        <!-- Si no has iniciado sesión se muestra esto -->
        <form action="login.php" method="post">
            <input type="submit" name="boton" value="Iniciar sesión">
        </form>
        <form action="registro.php" method="post">
            <input type="submit" name="boton" value="Registrar">
        </form>
        

        <!-- Si la sesión está iniciada se muestra esto -->
        <?php
            session_start();
            if (isset($_SESSION['user']))
            {
                echo "Esto solo se ve si estas logeado y no eres admin";
                echo "El usuario actual es: " . $_SESSION['user'];
            }
        ?>
        <form action="form.php" method="post">
        </form>

        <!-- Si el usuario es el administrador se muestra esto -->
        <?php
            session_start();
            if (isset($_SESSION['user']) == 'admin')
            {
                echo "Esto solo se ve si estas logeado y eres admin";
                echo "El usuario actual es: " . $_SESSION['user'];
            }
        ?>
        
    </body>
</html>