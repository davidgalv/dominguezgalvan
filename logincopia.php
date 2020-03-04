<!doctype html>
<html lang="es">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Inicio de sesión</title>
  </head>
  <body style="background-color: #2B2B2B; color: white">
    <div class="container" style="margin-top: 25px">
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
        <h2>Proyecto PHP</h2>
        <form action="index.php" method="post">
            <table>
                <tr>
                    <td><input type="text" name="user" placeholder="Usuario"></td>
                </tr>
                <tr>
                    <td><input type="password" name="pass" placeholder="Contraseña"></td>
                </tr>
                <tr>
                        <td style=""><input type="submit" name="boton" class='btn btn-primary' value="Iniciar sesión"></td>
                </tr>
            </table>
        </form>
        </div>
    </body>
</html>