<!doctype html>
<html lang="es">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Página principal</title>
  </head>
  <body style="background-color: #2B2B2B; color: white">
    <div class="container" style="margin-top: 25px">
        <div style="position: relative; float: left; width: 300px"> <h1>Proyecto IAW</h1></div>
    <?php
        if (isset($_POST['sessionoff'])) {
            session_destroy();
            header('Refresh: 0');
        }

        if (!empty($_SESSION['sesion'])) {
            ?>
            <form method='post' action='update.php'>
                <input type='submit' name='update' value='Editar datos'>
                </form>

            <form method='post' action='index.php'>
                <input type='submit' name='sessionoff' value='Cerrar Sesion'>
                </form>

            <form method='post' action='img_registro.php'>
                <input type='submit' name='uploadimg' value='Publicar foto'>
                </form>
        <?php
        } else {
        ?>
            <form method='post' action='registro.php'>
                <div style="position: relative; float: right; padding-top: 15px; padding-left: 15px">
                    <input type='submit' name='update' class='btn btn-primary' value='Registrarse'>
                </div>
            </form>
            <form method='post' action='login.php'>
                <div style="position: relative; float: right; padding-top: 15px">
                    <input type='submit' name='update' class='btn btn-primary' value='Iniciar Sesion'>
                </div>
            </form>
        <?php
        }
        

        if (!$_SESSION['sesion'] == 'admin') {
        
        
        echo "<table class='table' style='color: white'>";
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
        echo "</table>";
        }
        } else {
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
            . "<td>" . $lane['description'] . "</td><td>" . $lane['fecha'] . "</td></tr>"
            . "<td><form method='post' action='img_update.php'><button type='submit' name='edit' value='#'></button></form></td>"
            . "<td><form method='post' action='img_delete.php'><button type='submit' name='delete' value='#'></button></form></td>";
        echo "</table>";
        }
        }
        ?>
<button type="button" class="btn btn-primary">Primary</button>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>
<body>