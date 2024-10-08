<?php
const API_URL = "https://whenisthenextmcufilm.com/api";

// Iniciar una nueva sesión de cURL
$ch = curl_init(API_URL);

// Indicar que queremos recibir el resultado de la petición y no mostrarla en pantalla
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// Ejecutar la petición y guardar el resultado
$result = curl_exec($ch);

// Verificar si cURL devuelve algún error
if (curl_errno($ch)) {
    echo 'Error en cURL: ' . curl_error($ch);
} else {
    // Decodificar el resultado JSON
    $data = json_decode($result, true);

    // Cerrar la sesión de cURL
    curl_close($ch);

    // Mostrar el contenido de la respuesta
    
}
?>
<head>
    <title>La proxima pelicula de Marvel</title>
    <link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.classless.min.css">
</head>
<main>
    <section>
        <img src="<?=$data["poster_url"]; ?>" width="300" alt="Poster de <?= $data["title"];?>">
    </section>
    <hgroup>
        <h3><?= $data["title"];?> Se estrena en <?= $data["days_until"];?> dias</h3>
        <p>Fecha de estreno: <?= $data["release_date"];?></p>
        <p>La siguiente pelicula es: <?= $data["following_production"]["title"];?></p>
    </hgroup> 
</main>
<style>
    :root{
        color-scheme: light dark;
    }
    body{
        display: grid;
        place-content: center;
    }
    section{
        display: flex;
        justify-content: center;
        text-align: center;
    }
    hgroup{
        display: flex;
        flex-direction: column;
        justify-content: center;
        text-align: center;
    }
    img{
        margin: 0 auto;
    }
</style>