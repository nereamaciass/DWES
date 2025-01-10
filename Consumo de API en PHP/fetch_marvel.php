<?php
require_once 'config.php';

//Generar el hash para la autenticación
$ts = time();
$hash = md5($ts . $privateKey . $publicKey);

//URL base de la API y endpoint para personajes
$baseUrl="https://gateway.marvel.com/v1/public/characters";
$url="$baseUrl?ts=$ts&apikey=$publicKey&hash=$hash&limit=10";

//Realizar la solicitud a la API
$response=file_get_contents($url);
$data=json_decode($response, true);

//Verificar si hay datos disponibles
if(isset($data['data']['results'])){
    $characters = $data['data']['results'];
}else{
    echo "No se pudieron obtener los datos de la API.";
    exit;
}
?>