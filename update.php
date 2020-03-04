<?php session_start(); ?>
<?php
if (!empty($_SESSION['sesion'])) {
    require_once './connection.php';
    $connect = new connection();
    $sql = "SELECT id,user,name,mail FROM usuarios WHERE user = '".$_SESSION['sesion']."'";
    $result = $connect->execSQL($sql);
    $lane = $result->fetch_assoc();
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Actualizar datos</title>
    </head>
    <body>
        <h2>Actualizar datos</h2>
        <form method="post" action="update.php">
            <label>Usuario:</label>
            <br>
            <input type="text" name="usuario" value="<?php echo $lane['user'] ?>">
            <br><br>
            <label>Nombre:</label>
            <br>
            <input type="text" name="nombre" value="<?php echo $lane['name'] ?>">
            <br><br>
            <label>Contraseña:</label>
            <br>
            <input type="password" name="passwd" value="">
            <br><br>
            <label>Correo:</label>
            <br>
            <input type="text" name="mail" value="<?php echo $lane['mail'] ?>">
            <br>
            <input type="submit" name="enviar" value="Actualizar">
        </form>
        <a href="index.php"><button type="button">Volver</button></a>
<?php
// put your code here
?>
    </body>
</html>
