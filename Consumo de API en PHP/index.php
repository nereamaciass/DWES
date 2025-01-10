<?php
require_once 'fetch_marvel.php'; //Incluir datos de la API
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Personajes de Marvel</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f4f4f4;
        }
        img {
            width: 100px;
            height: auto;
        }
    </style>
</head>

<body>
    <h1>Lista de Personajes de Marvel</h1>
    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Imagen</th>
            </tr>
        </thead>

        <tbody>
            <?php foreach ($characters as $character): ?> <!--Incluir datos de los personajes desde el archivo anterior-->
                <tr>
                    <td><?php echo htmlspecialchars($character['name']); ?></td>

                    <td>
                        <?php 
                        echo htmlspecialchars(
                            !empty($character['description']) ? $character['description'] : "No hay descripción disponible."
                        );
                        ?>
                    </td>

                    <td>
                        <?php
                        $thumbnail = $character['thumbnail'];
                        $imageUrl = $thumbnail['path'] . "/standard_medium." . $thumbnail['extension'];
                        ?>
                        <img src="<?php echo $imageUrl; ?>" alt="Imagen de <?php echo htmlspecialchars($character['name']); ?>">
                    </td>
                    
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
