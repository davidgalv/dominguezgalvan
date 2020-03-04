<?php
    session_start();
    if (isset($_POST['boton'])) {
        $user = $_POST['user'];
        $passwd = $_POST['pass'];
        if ((empty($user)) || (empty($passwd))) {
            $error = 'Introduce usuario y contraseña!';
        } else {
            require_once './loguear.php';
            $log = new loguear();
            $login = $log->log($user, $passwd);
            $_SESSION['sesion'] = $login;
            header('Location: ./index.php');
        }
    }
?>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Inicio de sesión</title>
    </head>
    <body>
        <h2>Proyecto PHP</h2>
        <form action="login.php" method="post">
            <label>Nickname:</label>
            <br>
            <input type="text" name="user">
            <br>
            <input type="password" name="pass" placeholder="* Contraseña">
            <br>
            <input type="submit" name="boton" value="Continuar">
        </form>
        
        </body>
</html>