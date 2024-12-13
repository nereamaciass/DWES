<?php
    include('procesar.php');
    $con = connection();

    $id=$_GET['id'];

    $sql = "SELECT * FROM cliente WHERE id='$id'";
    $query = mysqli_query($con, $sql);
    $row = mysqli_fetch_array($query);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar</title>
</head>
<body>
        <form action="editarUsuario.php" method="POST">
            <h2>Editar Usuario</h2>
            
            <input type="hidden" name="id" value="<?= $row['id']?>">
            <div class="form-group">
            <label for="name">Nombre: </label>
                <input type="text" name="name" value="<?= $row['name']?>">
            </div>
            <div class="form-group">
            <label for="name">Apellido: </label>
                <input type="text" name="surname" value="<?= $row['surname']?>">
            </div>
            <div class="form-group">
                <label for="name">Teléfono</label>
                <input type="text" name="phone" value="<?= $row['phone']?>">
            </div>
            <button type="submit">Actualizar</button> 

        </form>
</body>
</html>