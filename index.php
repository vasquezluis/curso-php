<?php

const API_URL = "https://whenisthenextmcufilm.com/api";
# inicializar una nueva sesion de cURL; ch = cURL handler
$ch = curl_init(API_URL);
// indicar que queremos recibir el resultado de la peticion y no mostrarla en pantalla
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
/*
  Ejecutar la peticion
	y guardar el resultado
 */
$result = curl_exec($ch);
$data = json_decode($result, true);

// alternativa => file_get_contents
// $result = file_get_contents(API_URL) => para solo un GET a una API

curl_close($ch);


?>

<head>
	<title>La proxima pelicula de MCU</title>
	<meta charset="UTF-8">
	<meta name="description" content="La proxima pelicula que sacara marvel al mercado">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Centered viewport -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.classless.min.css" />
</head>

<main>
	<section>
		<img src="<?= $data["poster_url"]; ?>" alt="<?= $data["title"]; ?>" width="200" style="border-radius: 16px;">
	</section>
	<hgroup>
		<h3><?= $data["title"]; ?> Se estrena en <?= $data["days_until"]; ?> dias</h3>
		<p>Fecha de estreno: <?= $data["release_date"]; ?></p>
		<p>La siguiente es: <?= $data["following_production"]["title"]; ?></p>
	</hgroup>
</main>

<style>
	:root {
		color-scheme: dark light;
	}

	body {
		display: grid;
		place-content: center;
		background: #555c6a;
	}

	section {
		display: flex;
		justify-content: center;
		text-align: center;
	}

	hgroup {
		display: flex;
		flex-direction: column;
		justify-content: center;
		text-align: center;
	}

	hgroup h3,
	p {
		color: white;
	}

	img {
		margin: 0 auto;
	}
</style>