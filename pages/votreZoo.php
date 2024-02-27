<?php
require_once('../config/autoload.php');
require_once('../config/db.php');

$zooManager = new zooManager($db);
$enclosManager = new enclosManager($db);
$id = $_SESSION['id'];
// var_dump($_SESSION['id']);
$myzoo = $zooManager->find($id);
if (isset($_POST['id']) && !empty($_POST['id'])) {
    $enclosManager->delete($_POST['id']);
}
// $unenclos=$enclosManager->find($_POST['id']);

// var_dump($zoo['id']);
$newzoo = new zoo($myzoo);
$newzoo->setId($myzoo['id']);
$idZoo = $newzoo->getId();
$newzoo->getNom();
$newzoo->getEmployé();
// var_dump($newzoo);


// $newzoo->detectenclos();
$enclosManger = new enclosManager($db);
$enclos = $enclosManager->findAllenclos($idZoo);
// var_dump($enclos);
foreach ($enclos as $enclo) {
    $class = $enclo['types'];
    $newenclos = new $class($enclo);
    $newenclos->setId($enclo['id']);
    $newenclos->getNom();
    $newenclos->getTypes();
    $newenclos->getId();
    $newenclos->getNombAnimaux();
    $newenclos->count();
    // var_dump($newenclos);

    // var_dump($enclo['id']);

}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VOTRE-ZOO</title>
    <link rel="icon" type="image/x-icon" href="../image/logopage.gif">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="./style.css">
</head>

<body>
<main class="form">
    <div class="row align-items-center ">
        <div class="col-md-3 text-center">
            <a class="a" href="./index.php">
                <h6>déconecter</h6>
            <img class="w-75" src="../image/logo.gif" alt="">
            </a>
        </div>
        <div class="col-md-7 text-center">
            <h1 class="mt-4 mb-5">BIENVENUE dans:"<span class="text-success"><?= $newzoo->getNom() ?></span>"</h1>
        </div>
        <div class="col-md-2"></div>
    </div>

    


        <section class="container-md">
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <div class="row">
                        <div class="col-md-2"></div>
                        <div class="col-md-8 in mt-2 ">
                            <img src="" alt="">
                            <h1 class="text-center">Créer votre Enclos:(Nombre Max 6) <h1>
                                    <form class="indexform text-center" action="./enclosconfig.php" method="post">
                                        <div>
                                            <label class="mt-4" for="">Nom:</label><br>
                                            <input class="mt-2 w-75 in" type="text" name="nomEclos"><br>
                                            <input type="hidden" name="id_zoo" value="<?= $newzoo->getId() ?>">
                                            <input type="hidden" name="id_employe" value="<?= $_SESSION['id'] ?>">

                                        </div>
                                        <div class="">
                                            <label class="mt-2" for="">Types:</label><br>
                                            <select class="mt-2 in" name="types" id="inputGroupSelect02">
                                                <option>terrestre</option>
                                                <option>volière</option>
                                                <option>aquariums</option>

                                            </select>
                                        </div>
                                        <div class="text-center">
                                            <button class="mt-3 mb-5 bg-danger mb-3 text-center button" type="submit">Ajouter</button>
                                        </div>
                                    </form>
                        </div>
                        <div class="col-md-2"></div>
                    </div>

                </div>
                <div class="col-md-2"></div>
            </div>



        </section>

    
    <div class="container-md">
        <div class="row text-center">
            <?php foreach ($enclos as $enclo) { ?>
                <div class="col-md-4 mx-auto text-center ">
                    <div class="mx-auto text-center mt-2 enclosss">
                        
                            <img class="mt-4 imag " src="../image/<?= $enclo['types'] ?>.gif" alt="">
                       
                        <h1><?= $enclo['nom'] ?></h1>
                        <div class="">
                            <h4 class="h1"><?= $enclo['types'] ?></h4>
                            <p class="h1">Nombre des animaux: <?= $enclo['nombre_des_animaux'] ?> </p>
                            <form class="" action="./addAnimal.php" method="post">
                                <input type="hidden" name="id" value="<?= $enclo['id'] ?>"><br>
                                <button type="submit" class="bg-danger text-center button ">Ajouter Animal
                                </button>
                            </form>
                            <form class="" action="" method="post">
                                <input type="hidden" name="id" value="<?= $enclo['id'] ?>"><br>
                                <button type="submit" class="bg-danger mb-3 text-center button ">DELETE
                                </button>
                            </form>
                        </div>

                    </div>
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