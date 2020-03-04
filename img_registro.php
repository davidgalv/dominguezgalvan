<?php session_start(); ?>
<html>
    <head>
         <!-- Required meta tags -->
         <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

        <title>Insertar imagen</title>
    </head>
    <body style="background-color: #2B2B2B; color: white; margin-top: 25px">
    <div class="container">
        <h2>Insertar imagenes</h2>
        <form action="img_registro.php" method="post" enctype="multipart/form-data">
            <table>
                <tr>
                    <td>Nombre:</td>
                </tr>
                <tr>
                    <td><input type="text" name="nombre"></td>
                </tr>
                <tr>
                    <td>Descripción:</td>
                </tr>
                <tr>
                    <td><input type="text" name="dscr"></td>
                </tr>
                <tr>
                    <td>Insertar imagen:</td>
                </tr>
                <tr>
                    <td><input type="file" name="img"></td>
                </tr>
                <tr>
                    <td style="padding-top: 10px; padding-bottom: 10px"><input type="submit" name="boton" class="btn btn-primary" value="Insertar imagen"></td>
                </tr>
            </table>
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
            header('location: index.php');     
        }
        ?>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    </body>
</html>
