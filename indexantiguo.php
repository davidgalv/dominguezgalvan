<?php
session_start();
?>

<!-- Página principal, donde se muestran las fotos -->
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Página de Inicio</title>
    </head>
    <body>
        <?php
        if (isset($_POST['sessionoff'])) {
            session_destroy();
            header('Refresh: 0');
        }

        if (!empty($_SESSION['sesion'])) {

            echo "<form method='post' action='update.php'>
                <input type='submit' name='update' value='Editar datos'>
                </form>";

            echo "<form method='post' action='index.php'>
                <input type='submit' name='sessionoff' value='Cerrar Sesion'>
                </form>";

            echo "<form method='post' action='img_registro.php'>
                <input type='submit' name='uploadimg' value='Publicar foto'>
                </form>";

            if ($_SESSION['sesion'] == 'admin') {
                echo "<table>";
                echo "<tr>";
                echo "<th>Usuario</th><th>Título</th><th></th><th>Pie de foto</th><th>Fecha</th><th>Editar</th><th>Borrar</th>";
                echo "</tr>";
                echo "<tr>";
                require_once './connection.php';
                $connect = new connection();
                $sql = "SELECT u.user,i.name,i.description,i.fecha,i.ubication FROM imagenes i, usuarios u WHERE i.userid = u.id ORDER BY i.id DESC";
                $result = $connect->execSQL($sql);
               
                while ($lane = $result->fetch_assoc()) {
                echo "<tr><td>" . $lane['user'] . "</td><td>" . $lane['name'] . "</td><td><img height='100px' width='100px' src='" . $lane['ubication'] . "'></td>"
                . "<td>" . $lane['description'] . "</td><td>" . $lane['fecha'] . "</td>"
                . "<td><form method='post' action='img_update.php'><button type='submit' name='edit_img'>·</button></form></td>"
                . "<td><form method='post' action='img_delete.php'><button type='submit' name='del_img'>·</button></form></td></tr>";
                }
                echo "</table>";
            } else {
                echo "<table>";
                echo "<tr>";
                echo "<th>Usuario</th><th>Título</th><th></th><th>Pie de foto</th><th>Fecha</th>";
                echo "</tr>";
                echo "<tr>";
                require_once './connection.php';
                $connect = new connection();
                $sql = "SELECT u.user,i.name,i.description,i.fecha,i.ubication FROM imagenes i, usuarios u WHERE i.userid = u.id ORDER BY i.id DESC";
                $result = $connect->execSQL($sql);

                while ($lane = $result->fetch_assoc()) {
                echo "<tr><td>" . $lane['user'] . "</td><td>" . $lane['name'] . "</td><td><img height='100px' width='100px' src='" . $lane['ubication'] . "'></td>"
                . "<td>" . $lane['description'] . "</td><td>" . $lane['fecha'] . "</td></tr>";
                }
                echo "</table>";
                
                }
        } else {

            echo "<form method='post' action='login.php'>
                <input type='submit' name='update' value='Iniciar Sesion'>
                </form>";

            echo "<form method='post' action='registro.php'>
                <input type='submit' name='update' value='Registrarse'>
                </form>";

            echo "<table>";
            echo "<tr>";
            echo "<th>Usuario</th><th>Título</th><th></th><th>Pie de foto</th><th>Fecha</th>";
            echo "</tr>";
            echo "<tr>";
            require_once './connection.php';
            $connect = new connection();
            $sql = "SELECT u.user,i.name,i.description,i.fecha,i.ubication FROM imagenes i, usuarios u WHERE i.userid = u.id ORDER BY i.id DESC";
            $result = $connect->execSQL($sql);

            while ($lane = $result->fetch_assoc()) {
            echo "<tr><td>" . $lane['user'] . "</td><td>" . $lane['name'] . "</td><td><img height='100px' width='100px' src='" . $lane['ubication'] . "'></td>"
            . "<td>" . $lane['description'] . "</td><td>" . $lane['fecha'] . "</td></tr>";
            }
            echo "</table>";
        }
        ?>

    </body>
</html>