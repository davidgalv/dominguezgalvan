<?php
session_start();
?>

<!-- Página principal, donde se muestran las fotos -->
<html lang="es">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

        <title>Página principal</title>
    </head>
    <body style="background-color: #2B2B2B; color: white; margin-top: 25px">
        <div class="container">
        <div style="position: relative; float: left; width: 300px"> <h1>Proyecto IAW</h1></div>
        <form method="post" action="index.php">
            <?php
            require_once './connection.php';
            $sel = new connection();
            $usu = "SELECT user FROM usuarios WHERE id IN (SELECT userid FROM imagenes WHERE ubication is not null)";
            $selc = $sel->execSQL($usu);
            echo "<select name='usuario'>";
            echo "<option value='0'>Mostrar todos</option>";
            while ($select = $selc->fetch_assoc()) {
                                  
                echo "<option value='".$select['user']."'>".$select['user']."</option>";
                
                
            }
            echo "</select>";
            ?>
            <button type="submit" name="boton_cons">·</button>
        </form>
        <?php
        if (isset($_POST['sessionoff'])) {
            session_destroy();
            header('Refresh: 0');
        }

        if (!empty($_SESSION['sesion'])) {
            
                echo "<form method='post' action='index.php'>
                <input type='submit' name='sessionoff' value='Cerrar Sesion'>
                </form>";
            
            if ($_SESSION['sesion'] == 'admin') {
                echo "<div style='clear: both; padding-top: 20px'>";
                echo "<table class='table' style='color: white'>";
                echo "<tr>";
                echo "<th>Usuario</th><th>Título</th><th>Imagen</th><th>Pie de foto</th><th>Fecha</th><th>Editar</th><th>Borrar</th>";
                echo "</tr>";
                echo "<tr>";
                require_once './connection.php';
                $connect = new connection();
                $sql = "SELECT u.user,i.name,i.description,i.fecha,i.ubication,i.id FROM imagenes i, usuarios u WHERE i.userid = u.id ORDER BY i.id DESC";
                
                if (isset($_POST['usuario'])){
                    if ($_POST['usuario'] == '0') {
                        $sql = "SELECT u.user,i.name,i.description,i.fecha,i.ubication,i.id FROM imagenes i, usuarios u WHERE i.userid = u.id ORDER BY i.id DESC";
                        $result = $connect->execSQL($sql);
                    } else {
                        $usuario = $_POST['usuario'];
                        $sql2 = "SELECT u.user,i.name,i.description,i.fecha,i.ubication,i.id FROM imagenes i, usuarios u WHERE i.userid = u.id AND u.user = '".$usuario."'ORDER BY i.id DESC";;
                        $result = $connect->execSQL($sql2);  
                    }
                                       
                } else {
                    $result = $connect->execSQL($sql);
                }
                               
                while ($lane = $result->fetch_assoc()) {
                echo "<tr><td>" . $lane['user'] . "</td><td>" . $lane['name'] . "</td><td><img height='100px' width='100px' src='" . $lane['ubication'] . "'></td>"
                . "<td>" . $lane['description'] . "</td><td>" . $lane['fecha'] . "</td>"
                . "<td><form method='post' action='img_update.php'><button type='submit' name='edit_img' value='".$lane['id']."'>·</button></form></td>"
                . "<td><form method='post' action='img_delete.php'><button type='submit' name='del_img' value='".$lane['id']."'>·</button></form></td></tr>";
                }
                echo "</table>";
            } else {
                echo "<form method='post' action='update.php'>
                <input type='submit' name='update' value='Editar datos'>
                </form>";

                echo "<form method='post' action='index.php'>
                <input type='submit' name='sessionoff' value='Cerrar Sesion'>
                </form>";

                echo "<form method='post' action='img_registro.php'>
                <input type='submit' name='uploadimg' value='Publicar foto'>
                </form>";
                echo "<table>";
                echo "<tr>";
                echo "<th>Usuario</th><th>Título</th><th>Imagen</th><th>Pie de foto</th><th>Fecha</th>";
                echo "</tr>";
                echo "<tr>";
                require_once './connection.php';
                $connect = new connection();
                               
                if (isset($_POST['usuario'])){
                    if ($_POST['usuario'] == '0') {
                        $sql = "SELECT u.user,i.name,i.description,i.fecha,i.ubication FROM imagenes i, usuarios u WHERE i.userid = u.id ORDER BY i.id DESC";
                        $result = $connect->execSQL($sql);
                    } else {
                        $usuario = $_POST['usuario'];
                        $sql2 = "SELECT u.user,i.name,i.description,i.fecha,i.ubication FROM imagenes i, usuarios u WHERE i.userid = u.id AND u.user = '".$usuario."'ORDER BY i.id DESC";;
                        $result = $connect->execSQL($sql2);  
                    }
                                       
                } else {
                    $sql = "SELECT u.user,i.name,i.description,i.fecha,i.ubication FROM imagenes i, usuarios u WHERE i.userid = u.id ORDER BY i.id DESC";
                    $result = $connect->execSQL($sql);
                }
                   

                while ($lane = $result->fetch_assoc()) {
                    
                echo "<tr><td>" . $lane['user'] . "</td><td>" . $lane['name'] . "</td><td><img height='100px' width='100px' src='" . $lane['ubication'] . "'></td>"
                . "<td>" . $lane['description'] . "</td><td>" . $lane['fecha'] . "</td></tr>";
                }
                echo "</table>";
                
                }
        } else {

            echo "<form method='post' action='registro.php'>
                    <div style='position: relative; float: right; padding-left: 10px'>
                        <input type='submit' name='update' class='btn btn-primary' value='Registrarse'>
                    </div>
                </form>";

            echo "<form method='post' action='login.php'>
                    <div style='position: relative; float: right'>
                        <input type='submit' name='update' class='btn btn-primary' value='Iniciar Sesion'>
                    </div>
                </form>";

            echo "<div style='clear: both; padding-top: 20px'>";
            echo "<table class='table' style='color: white'>";
            echo "<tr>";
            echo "<th>Usuario</th><th>Título</th><th>Imagen</th><th>Pie de foto</th><th>Fecha</th>";
            echo "</tr>";
            echo "<tr>";
            require_once './connection.php';
            $connect = new connection();
            $sql = "SELECT u.user,i.name,i.description,i.fecha,i.ubication FROM imagenes i, usuarios u WHERE i.userid = u.id ORDER BY i.id DESC";
            
                if (isset($_POST['usuario'])){
                    if ($_POST['usuario'] == '0') {
                        $sql = "SELECT u.user,i.name,i.description,i.fecha,i.ubication FROM imagenes i, usuarios u WHERE i.userid = u.id ORDER BY i.id DESC";
                        $result = $connect->execSQL($sql);
                    } else {
                        $usuario = $_POST['usuario'];
                        $sql2 = "SELECT u.user,i.name,i.description,i.fecha,i.ubication FROM imagenes i, usuarios u WHERE i.userid = u.id AND u.user = '".$usuario."'ORDER BY i.id DESC";;
                        $result = $connect->execSQL($sql2);  
                    }
                                       
                } else {
                    $result = $connect->execSQL($sql);
                }
                   

            while ($lane = $result->fetch_assoc()) {
            echo "<tr><td>" . $lane['user'] . "</td><td>" . $lane['name'] . "</td><td><img height='100px' width='100px' src='" . $lane['ubication'] . "'></td>"
            . "<td>" . $lane['description'] . "</td><td>" . $lane['fecha'] . "</td></tr>";
            }
            echo "</table>";
            echo "</div>";
        }
        ?>
        </div>
        <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    </body>
</html>