<?php
    include('procesar.php');
    $con = connection();

    $buscar = isset($_GET['buscar']) ? $_GET['buscar'] : ''; //Filtrado por nombre
    $query = "SELECT * FROM cliente WHERE name LIKE '%$buscar%'";  //Se filtra por nombre
    $result = mysqli_query($con, $query);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: center;
        }
    </style>
</head>
<body>
    <h2>Usuarios Registrados</h2>
    <p><a href="formulario.html">Registrar nuevo usuario</a></p>

    <form method="GET" action="listado.php"> <!--Formulario de búsqueda -->
        <input type="text" name="buscar" placeholder="Buscar por nombre" value="<?= $buscar ?>">
        <button type="submit">Buscar</button>
    </form>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Teléfono</th>
                <th>Editar</th>
                <th>Eliminar</th>
            </tr>
        </thead>
        <tbody>
            <?php while($row = mysqli_fetch_array($result)): ?>
                <tr>
                    <td> <?= $row['id'] ?> </td>
                    <td> <?= $row['name'] ?> </td>
                    <td> <?= $row['surname'] ?> </td>
                    <td> <?= $row['phone'] ?> </td>
                    <td> <a href="editar.php?id=<?= $row['id'] ?>">Editar</a></td>
                    <td> <a href="borrar.php?id=<?= $row['id'] ?>">Eliminar</a></td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</body>
</html>
