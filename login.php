<!DOCTYPE html>
<?php 
    session_start(); 
?>
<!-- Formulario para iniciar sesión -->
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Inicio de sesión</title>
    </head>
    <body>
        <h2>Inicio de sesión</h2>
        <form action="logeado.php" method="post">
            <table>
                <tr>
                    <td>Nickmane</td>
                </tr>
                <tr>
                    <td><input type="text" name="user"></td>
                </tr>
                <tr>
                    <td>Contraseña</td>
                </tr>
                <tr>
                    <td><input type="password" name="pass"></td>
                </tr>
                <tr>
                    <td><input type="submit" name="boton" value="Iniciar sesión"></td>
                </tr>
            </table>
        </form>
        <?php
        // put your code here
        ?>
    </body>
</html>