<?php
require_once('../config/autoload.php');
require_once('../config/db.php');
$animauxManager = new animauxManager($db);
$enclosManager = new enclosManager($db);

// var_dump($_SESSION['id']);
$enclosnew = new enclosManager($db);
if (isset($_POST['id']) && !empty($_POST['id'])) {
    $_SESSION['id_enclos'] = $_POST['id'];
    // var_dump($_POST['id']);
    // var_dump($_SESSION['id_enclos']);
    $enclos = $enclosnew->find($_SESSION['id_enclos']);
    // var_dump($enclos);
    // var_dump($enclos['types']);
    $class = $enclos['types'];
    $enclosfind = new $class($enclos);

    $enclosfind->setId($enclos['id']);
    // var_dump($enclosfind);
    $enclosfind->getTypes();

    $idenc = $enclosfind->getId();
    $animaux = $animauxManager->findAllanimaux($_POST['id']);
    // var_dump($animaux);

    // if (isset($_POST['id_animal']) && !empty($_POST['id_animal'])) {
    //     $animauxManager->delete($_POST['id_animal']);
    // }
} else if (!isset($_POST['id']) && $_SESSION['id_enclos']) {


    $enclos = $enclosnew->find($_SESSION['id_enclos']);

    $class = $enclos['types'];
    $enclosfind = new $class($enclos);

    $enclosfind->setId($enclos['id']);

    $enclosfind->getTypes();

    $idenc = $enclosfind->getId();
    $animaux = $animauxManager->findAllanimaux($_SESSION['id_enclos']);
    // var_dump($animaux);

}




?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Animaux-Enclos</title>
    <link rel="icon" type="image/x-icon" href="../image/logopage.gif">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="./style.css">

</head>

<body>
    <main class="form">
        <div class="row align-items-center ">
            <div class="col-md-3 text-center">
                <a class="a"  href="./votreZoo.php">
                    <h6>Retour au ZOO</h6>
                    <img class="w-75" src="../image/logo.gif" alt="">
                </a>
            </div>
            <div class="col-md-6 text-center">
                <h1 class="mt-3 mb-5">ENCLOS:"<span class="text-success"><?= $enclos['types'] ?></span>"</h1>
            </div>
            <div class="col-md-3"></div>
        </div>



        <form action="./animalconfig.php" method="post">
            <section class="container-md">
                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                        <div class="row">
                            <div class="col-md-2"></div>
                            <div class="col-md-8 in mt-2 text-center mb-3">
                                <h1>Ajouter Animal:(Nombre Max 6)</h1>
                                <div class="">
                                    <label class="mt-2" for="">Espece:</label>
                                    <select class="mt-2 in" name="espece" id="inputGroupSelect02">
                                        <option>ours</option>
                                        <option>tigres</option>
                                        <option>poissons</option>
                                        <option>aigles</option>
                                    </select>
                                </div>
                                <input type="hidden" name="id" value="<?= $_SESSION['id_enclos'] ?>">

                                <label class="mt-4" for="">Poids:</label><br>
                                <input class="mt-2 w-75 in" type="text" name="age"><br>
                                <label class="mt-4" for="">Age:</label><br>
                                <input class="mt-2 w-75 in" type="text" name="poids"><br>
                                <div class="text-center">
                                    <button class="mt-3 mb-5 bg-danger mb-3 text-center button" type="submit">Entrer</button>
                                </div>
                            </div>
                            <div class="col-md-2"></div>
                        </div>
                    </div>
                    <div class="col-md-2"></div>
                </div>
            </section>
        </form>

        <div class="container-md">
            <div class="row text-center">
                <?php foreach ($animaux as $animal) { ?>
                    <div class="col-md-4 mx-auto my-3 text-center enclosss">

                        <img class="w-75 mt-2" src="../image/<?= $animal['espece'] ?>.webp" alt="">
                        <h1><?= $animal['espece'] ?></h1>
                        <h6>Poids:<?= $animal['poids'] ?></h6>
                        <h6>Age:<?= $animal['age'] ?></h6>
                        <form action="./delete.php" method="post">
                            <input type="hidden" name="id_animal" value="<?= $animal['id'] ?>">
                            <input type="hidden" name="id" value="<?= $animal['id_enclos'] ?>">
                            <button type="submit" class="mb-3 bg-danger text-center button "> DELETE </button>

                        </form>

                    </div>
                <?php } ?>
            </div>
        </div>
        <a href="#">
            <img class="to" src="../image/homme.gif" alt="">
        </a>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>