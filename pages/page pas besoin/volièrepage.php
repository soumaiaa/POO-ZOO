<?php
require_once('../config/autoload.php');
require_once('../config/db.php');
$animauxManager = new animauxManager($db);
$enclosManager = new enclosManager($db);
if (
    $_SERVER['REQUEST_METHOD'] === 'POST' &&
    isset($_POST['espece']) && !empty($_POST['espece']) &&
    isset($_POST['poids']) && !empty($_POST['poids']) &&
    isset($_POST['age']) && !empty($_POST['age']) &&
    isset($_POST['id_enclos']) && !empty($_POST['id_enclos'])
) {
    // var_dump($_POST['espece']);
    // var_dump($_POST['poids']);
    // var_dump($_POST['id_enclos']);

    $myenclos = $enclosManager->find($_POST['id_enclos']);
    // var_dump($myenclos); 
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

    $newanimal = $enclo->addAnimal($animal);
   //  $_SESSION['id'] = $_POST['id_enclos'];
    //  var_dump($_SESSION['id']);
    $enclo->setId($_POST['id_enclos']);
    if ($newanimal) {
        $animauxManager->addDb($animal);
    } else {
        echo "l'animal n'a pas pu être ajoutée";
    }
    var_dump($animal);
    $enclosManager->update($enclo);
    $animaux = $animauxManager->findAllanimaux($_POST['id_enclos']);
    //  var_dump($animaux); 
   
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Volière</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="./style.css">
</head>

<body class="body2">
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>