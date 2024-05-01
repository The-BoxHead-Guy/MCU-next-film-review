<?php

const API_URL = "https://whenisthenextmcufilm.com/api";

$ch = curl_init(API_URL);

curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

function getMovies()
{
  $response = file_get_contents(API_URL);
  $data = json_decode($response, true);
  return $data;
}

$movies = getMovies();

curl_close($ch);

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.classless.min.css" />
  <link rel="stylesheet" href="./assets/css/index.css">
  <title>Show next MCU film</title>
</head>

<body>
  <code>
    <?php var_dump($movies); ?>
  </code>
  <section class="poster">
    <img src="<?= $movies["poster_url"] ?>" alt="Poster de <?= $movies["title"]; ?>">
  </section>
  <header>
    <h1><?= $movies["title"]; ?></h1>
    <h2><?= "Release Date: " . $movies["release_date"]; ?></h2>
    <h3><?= "Overview of the movie: " . $movies["overview"]; ?></h3>
  </header>
</body>

</html>