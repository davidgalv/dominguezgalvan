<!DOCTYPE html>
<?php 
    session_start(); 
?>
<!-- Formulario para registrarte -->
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>SIGN UP</title>
    </head>
    <body>
        <h2>Registrar usuario</h2>
        <form action="registro.php" method="post">
            <table>
                <tr>
                    <td>Nickname</td>
                </tr>
                <tr>
                    <td><input type="text" name="user"></td>
                </tr>
                <tr>
                    <td>Nombre de usuario</td>
                </tr>
                <tr>
                    <td><input type="text" name="name"></td>
                </tr>
                <tr>
                    <td>Contraseña</td>
                </tr>
                <tr>
                    <td><input type="password" name="pass"></td>
                </tr>
                <tr>
                    <td>Correo</td>
                </tr>
                <tr>
                    <td><input type="email" name="mail"></td>
                </tr>
                <tr>
                    <td><input type="submit" name="boton" value="Registrar Usuario"></td>
                </tr>
            </table>
        </form>
        <?php
        // put your code here
        if ((isset($_POST['boton'])) && (isset($_POST['pass']))) {
            $_SESSION['usuario']=$_POST['user'];
            require_once './connection.php';
            $connect = new connection();
            $sql = "INSERT INTO usuarios (user,name,passwd,mail,admin) VALUES ('".$_POST['user']."','".$_POST['name']."',MD5('".$_POST['pass']."'),'".$_POST['mail']."',false)";
            $connect->execSQL($sql);
            $crearcarpeta = "./imagenes/".$_POST['name']."/"; 
            if (!file_exists($crearcarpeta)) { 
                mkdir($crearcarpeta, 0777, true);
            }
            header('Location: ./registrado.php');       
        }
        ?>
    </body>
</html>
