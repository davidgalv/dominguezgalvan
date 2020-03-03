<?php session_start(); ?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Insertar imagen</title>
    </head>
    <body>
        <h2>Insertar imagenes</h2>
        <form method="post" action="img_registro.php" enctype="multipart/form-data">
            <label>Nombre:</label>
            <br>
            <input type="text" name="nombre">
            <br><br>
            <label>Descripción:</label>
            <br>
            <input type="text" name="dscr">
            <br><br>
            <label>Insertar imagen:</label>
            <br>
            <input type="file" name="img">
            <br><br>
            <input type="submit" name="boton" value="Enviar">
        </form>
        <?php
        // put your code here
        if (isset($_POST['boton'])) {
            require_once './connection.php';
            $conid = new connection();
            $connid = $conid->execSQL("SELECT id,name FROM usuarios WHERE user like '".$_SESSION['sesion']."'");
            $con = $connid->fetch_assoc();
            
            $user = $con['name'];
            $user_id = $con['id'];
            
            $tmp = $_FILES['img']['tmp_name'];
            $img_name = $_FILES['img']['name'];
            move_uploaded_file($tmp, './imagenes/'.$user.'/'.$_POST['nombre'].'.jpg');
            $direcc = './imagenes/'.$user.'/'.$_POST['nombre'].'.jpg';
            
            $connect = new connection();
            $sql = "INSERT INTO imagenes (name,fecha,description,ubication,userid) VALUES"
                    . " ('".$_POST['nombre']."','".date('Y-m-d')."','".$_POST['dscr']."','".$direcc."',".$user_id.")";
            $connect->execSQL($sql);            
        }
        ?>
    </body>
</html>
