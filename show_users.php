<?php session_start();
              
        if (isset($_POST['delete_usu'])) {
            require_once './connection.php';
            $delete = new connection();
            $del = "DELETE FROM usuarios WHERE id = ".$_POST['delete_usu'];
            $delete->execSQL($del);
            header('Refresh: 0');
        }

?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Mostrar Usuarios</title>
    </head>
    <body>
        <?php
        // put your code here
        require_once './connection.php';
        $connect = new connection();
        $sql = "SELECT * FROM usuarios";
        $result = $connect->execSQL($sql);
        
        echo "<table>";
        echo "<tr>";
        echo "<th>Id</th><th>Usuario</th><th>Nombre</th><th>Mail</th><th>Editar</th><th>Borrar</th>";
        echo "</tr>";
        while ($lane = $result->fetch_assoc()) {
            if ($lane['user'] != 'admin') {
                echo "<tr><td>".$lane['id']."</td><td>".$lane['user']."</td><td>".$lane['name']."</td>"
                . "<td>".$lane['mail']."</td>"
                . "<td><form method='post' action='admin_update.php'><button type='submit' value='".$lane['id']."' name='edit_usu'>·</button></form></td>"
                . "<td><form method='post' action='show_users.php'><button type='submit' value='".$lane['id']."' name='delete_usu'>·</button></form></td></tr>";
            }
        }
        echo "</table>";
           
        
        ?>
        <a href="index.php"><button type="button" class="btn btn-danger">Volver</button></a>
        </body>
</html>
