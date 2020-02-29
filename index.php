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
        

        <!-- Si la sesión está iniciada con un usuario diferente a administrador se muestra esto -->
        <form action="form.php" method="post">
        </form>

        <!-- Si el usuario es el administrador se muestra esto -->
        
    </body>
</html>