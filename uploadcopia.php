<?php
    session_start();
    $usuario = $_SESSION['usuario'];
    $nombre = trim(htmlspecialchars($_REQUEST["nombre"], ENT_QUOTES, "UTF-8"));
    $fecha = date('Y-m-d');
    $conexion = mysqli_connect("localhost", "root", "", "dominguezgalvan")
    or die("Problemas en la conexion");

    //$consulta = "SELECT nombre FROM fotos WHERE usuario='$usuario'";

    $inserfoto = "INSERT INTO fotos (nombre, fecha, usuario) VALUES ('$nombre', '$fecha', '$usuario')";
    move_uploaded_file($_FILES["foto"]["tmp_name"], "usuarios\\".$usuario."\\".$nombre.".jpg");
    mysqli_query($conexion, $inserfoto) or die(mysqli_error($conexion));
    header('location: usulogued.php');
?>