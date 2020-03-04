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
        <style type="text/css">
    body {
		font-family: 'Varela Round', sans-serif;
	}
	.modal-login {
		width: 350px;
	}
	.modal-login .modal-content {
		padding: 20px;
		border-radius: 1px;
		border: none;
	}
	.modal-login .modal-header {
		border-bottom: none;
        position: relative;
		justify-content: center;
	}
	.modal-login h4 {
		text-align: center;
		font-size: 26px;
	}
	.modal-login .form-control, .modal-login .btn {
		min-height: 40px;
		border-radius: 1px; 
	}
	.modal-login .hint-text {
		text-align: center;
		padding-top: 10px;
	}
	.modal-login .close {
        position: absolute;
		top: -5px;
		right: -5px;
	}
	.modal-login .btn {
		background: #3498db;
		border: none;
		line-height: normal;
	}
	.modal-login .btn:hover, .modal-login .btn:focus {
		background: #248bd0;
	}
	.modal-login .hint-text a {
		color: #999;
	}
	.trigger-btn {
		display: inline-block;
		margin: 100px auto;
	}
</style>
    </head>
    <body style="background-color: #2B2B2B; color: white; margin-top: 25px">
    <!-- Modal Administración -->
<div id="sino" class="modal fade" style="color: black">
	<div class="modal-dialog modal-login">
		<div class="modal-content">
			<div class="modal-header">				
				<h4 class="modal-title">Confirmación</h4>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			</div>
			<div class="modal-body">
				<form action="index.php" method="post">
					<div class="form-group">
						<input type="submit" class="btn btn-danger btn-block btn-lg" style="background-color:red" value="Sí">
					</div>
                    <div class="form-group">
						<input type="submit" class="btn btn-danger btn-block btn-lg" style="background-color:red" value="No">
					</div>
				</form>			
			</div>
		</div>
	</div>
</div> 
<!-- Fin Modal Administración -->
        <div class="container">
        <div style="position: relative; float: left; width: 300px"> <h1>Proyecto IAW</h1></div>
        <div style="position: relative; float: left">
            <form method="post" action="index.php">
            <table>
            <tr>
                <td>
                    <?php
                    require_once './connection.php';
                    $sel = new connection();
                    $usu = "SELECT user FROM usuarios WHERE id IN (SELECT userid FROM imagenes WHERE ubication is not null)";
                    $selc = $sel->execSQL($usu);
                    echo "<select class='custom-select' name='usuario'>";
                    echo "<option value='0'>Mostrar todos</option>";
                    while ($select = $selc->fetch_assoc()) {
                                        
                        echo "<option value='".$select['user']."'>".$select['user']."</option>";
                        
                        
                    }
                    echo "</select>";
                    ?>
                </td>
                <td>
                    <button type="submit" class="btn btn-light" name="boton_cons"><img src="imagenes/lupa.png" style="width: 23px; height: 24px"></button>
                </td>
            </table>
            </form>
            </div>
        <?php
        if (isset($_POST['sessionoff'])) {
            session_destroy();
            header('Refresh: 0');
        }

        if (!empty($_SESSION['sesion'])) {
                echo "<div style='position: relative; float: right; padding-left: 15px'><p>Bienvenido, ". $_SESSION['sesion'] ."!</p></div>";
                echo "<form method='post' action='index.php'>
                        <div style='position: relative; float: right; padding-left: 10px'> 
                            <input type='submit' name='sessionoff' class='btn btn-danger' value='Cerrar Sesion'>
                        </div>
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
                . "<td><form method='post' action='index.php'><!-- Botón modal Administración -->
                <div style='position: relative; float: left; padding-left: 30px; padding-top: 15px; width: 150px'><a href='#sino' class='btn btn-danger btn-lg' data-toggle='modal'>Administración</a>
                </div>.</button></form></td></tr>";
                }
                echo "</table>";
            } else {
                echo "<form method='post' action='update.php'>
                        <div style='position: relative; float: right; padding-left: 10px'> 
                            <input type='submit' name='update' class='btn btn-danger' value='Editar datos'>
                        </div>
                </form>";

                echo "<form method='post' action='img_registro.php'>
                        <div style='position: relative; float: right; padding-left: 10px'> 
                            <input type='submit' name='uploadimg' class='btn btn-danger' value='Publicar foto'>
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
                               
                if (isset($_POST['usuario'])){
                    if ($_POST['usuario'] == '0') {
                        $sql = "SELECT u.user,i.name,i.description,i.fecha,i.ubication FROM imagenes i, usuarios u WHERE i.userid = u.id ORDER BY i.id DESC";
                        $result = $connect->execSQL($sql);
                    } else {
                        $usuario = $_POST['usuario'];
                        $sql2 = "SELECT u.user,i.name,i.description,i.fecha,i.ubication FROM imagenes i, usuarios u WHERE i.userid = u.id AND u.user = '".$usuario."'ORDER BY i.id DESC";
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
                        <input type='submit' name='update' class='btn btn-danger' value='Registrarse'>
                    </div>
                </form>";

            echo "<form method='post' action='login.php'>
                    <div style='position: relative; float: right'>
                        <input type='submit' name='update' class='btn btn-danger' value='Iniciar Sesion'>
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