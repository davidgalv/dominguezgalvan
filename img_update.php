<?php session_start(); ?>
<?php
        // put your code here
        if (isset($_POST['boton'])) {
            require_once './connection.php';
            $connect = new connection();
            $sql = "UPDATE imagenes SET name = '".$_POST['nombre']."' WHERE id = ".$_POST['id'];
            $sql2 = "UPDATE imagenes SET description = '".$_POST['dscr']."' WHERE id = ".$_POST['id'];
                    
            $connect->execSQL($sql);     
            $connect->execSQL($sql2);     
            header('location: index.php');     
        }
        ?>
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
        <h2>Actualizar registro</h2>
        
        <?php 
        require_once './connection.php';
        $up = new connection();
        $upd = $up->execSQL("SELECT id,name,ubication,description FROM imagenes WHERE id = ".$_POST['edit_img']);
        $update = $upd->fetch_assoc();
        ?>
        
        <form action="img_update.php" method="post" enctype="multipart/form-data">
            <table>
                <tr>
                    <td>Identificador:</td>
                </tr>
                <tr>
                    <td><input type="text" name="id" value="<?php echo $update['id']; ?>" readonly="readonly"></td>
                </tr>
                <tr>
                    <td>Nombre:</td>
                </tr>
                <tr>
                    <td><input type="text" name="nombre" value="<?php echo $update['name']; ?>"></td>
                </tr>
                <tr>
                    <td>Descripción:</td>
                </tr>
                <tr>
                    <td><input type="text" name="dscr" value="<?php echo $update['description']; ?>"></td>
                </tr>
                <tr>
                    <td style="padding-top: 10px; padding-bottom: 10px"><input type="submit" name="boton" class="btn btn-primary" value="Actualizar registro"></td>
                </tr>
            </table>
        </form>
        
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    </body>
</html>
