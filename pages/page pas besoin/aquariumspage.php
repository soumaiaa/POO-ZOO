<?php
require_once('../config/autoload.php');
require_once('../config/db.php');
$animauxManager = new animauxManager($db);
$enclosManager = new enclosManager($db);
if ( $_SERVER['REQUEST_METHOD'] === 'POST'&&
    isset($_POST['espece']) && !empty($_POST['espece']) &&
    isset($_POST['poids']) && !empty($_POST['poids']) &&
    isset($_POST['age']) && !empty($_POST['age']) &&
    isset($_POST['id_enclos']) && !empty($_POST['id_enclos'])
) {


    // var_dump($_POST['espece']);
    // var_dump($_POST['poids']);
    // var_dump($_POST['id_enclos']);

    $myenclos = $enclosManager->find($_POST['id_enclos']);
 
    $class = $_POST['espece'];
    $animal = new $class([
        'espece' => $_POST['espece'],
        'poids' => $_POST['poids'],
        'age' => $_POST['age'],
        'id_enclos' => $_POST['id_enclos']
    ]);

  
    $clas = $myenclos['types'];
    // var_dump($myenclos['types']);
    $enclo = new $clas($myenclos);

    $enclo->addAnimal($animal);
    //  $_SESSION['id_enclos']=$_POST['id_enclos'];
    //  var_dump($_SESSION['id_enclos']);
    $enclo->setId($_POST['id_enclos']);
        $animauxManager->addDb($animal);
        
    $enclosManager->update($enclo);
    var_dump($enclo);
    $animaux = $animauxManager->findAllanimaux($_POST['id_enclos']);
    //  var_dump($animaux); 
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aquariums</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="./style.css">
</head>

<body class="aquari">
<form action="./votreZoo.php" method="post">
     
     <button class="mt-3 mb-5 in" type="submit">Retour ZOO</button>
  </form>
    <?php foreach ($animaux as $animal) { ?>
        <div class="d-flex">
            <div class="bg-dark text-center text-white">
            <h1><?= $animal['espece'] ?></h1>
            <h6>Poids:<?= $animal['poids'] ?></h6>
            <h6>Age:<?= $animal['age'] ?></h6>
            </div>
            <div>
            <img src="../image/<?= $animal['espece'] ?>.webp" alt="">
            </div>
        </div>
    <?php } ?>






   
    <!-- <img class="media_sticker__7KoTk media_gif__MBeQG" style="aspect-ratio:240/141 w-25" src="https://i.giphy.com/86ZaveoUagZAQ.webp" alt="">
    <img class="media_sticker__7KoTk media_gif__MBeQG" style="aspect-ratio:150/150 w-25" src="https://i.giphy.com/Il7kChdOLX7q0.webp" alt="">
    <img class="media_sticker__7KoTk media_gif__MBeQG" style="aspect-ratio:512/512 w-25" src="https://i.giphy.com/fdXpbfNuLriTwlRUhw.webp" alt="" >
    <img class="media_sticker__7KoTk media_gif__MBeQG" style="aspect-ratio:480/480 w-25" src="https://i.giphy.com/3ohhwBWtWoKxvRMtm8.webp" alt="" >
    <img class="media_sticker__7KoTk media_gif__MBeQG" style="aspect-ratio:480/480 w-25" src="https://i.giphy.com/KEfI0yPa1iCGa2dDwN.webp" alt="" >
    <img class="media_sticker__7KoTk media_gif__MBeQG" style="aspect-ratio:480/269 w-25" src="https://i.giphy.com/gIwirOIeB601JBQzS6.webp" alt="" > -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>