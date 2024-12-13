<?php
    function connection(){
        $servername = "localhost";
        $username = "root";
        $password = ""; 
        $dbname = "test";
    
        $conn = new mysqli($servername, $username, $password);
    
        mysqli_select_db($conn, $dbname);
    
        return $conn;
    }
    $con = connection();

    if (isset($_FILES['csv'])) { //Carga masiva desde CSV
        $file = $_FILES['csv']['tmp_name'];

        if (($handle = fopen($file, 'r')) !== FALSE) {
            $procesados = 0;
            $insertados = 0;
            $rechazados = 0;
            $errores = [];

            while (($data = fgetcsv($handle, 1000, ',')) !== FALSE) {
                $procesados++;
                $name = $data[0];
                $surname = $data[1];
                $phone = $data[2];

                if (empty($name) || empty($surname) || empty($phone)) { //Validar datos
                    $rechazados++;
                    $errores[] = "Error en fila $procesados: Datos inválidos.";
                    continue;
                }

                $sql = "INSERT INTO cliente (name, surname, phone) VALUES ('$name', '$surname', '$phone')";//Insertar en la base de datos
                $query = mysqli_query($con, $sql);
                if ($query) {
                    $insertados++;
                } else {
                    $rechazados++;
                    $errores[] = "Error en fila $procesados: Fallo en la inserción.";
                }
            }

            fclose($handle);

            echo "<p>Registros procesados: $procesados</p>"; //Resumen de la carga
            echo "<p>Registros insertados correctamente: $insertados</p>";
            echo "<p>Registros rechazados: $rechazados</p>";
            if ($rechazados > 0) {
                echo "<ul>";
                foreach ($errores as $error) {
                    echo "<li>$error</li>";
                }
                echo "</ul>";
            }
        } else {
            echo "No se pudo abrir el archivo.";
        }
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if ($id != 0) {
            $id = null;
            $name = $_POST['name'];
            $surname = $_POST['surname'];
            $phone = $_POST['phone'];

            $sql = "INSERT INTO cliente VALUES ('$id', '$name', '$surname', '$phone')";
            $query = mysqli_query($con, $sql);
        } else {
            $id = $_POST['id'];
            $name = $_POST['name'];
            $surname = $_POST['surname'];
            $phone = $_POST['phone'];

            $sql = "UPDATE cliente SET name='$name', surname='$surname', phone='$phone' WHERE id='$id'";
            $query = mysqli_query($con, $sql);
        }
        if ($query) {
            Header("Location: listado.php");
        }
    } else {
        $sql = "SELECT * FROM cliente"; 
        $query = mysqli_query($con, $sql);
    }
?>
