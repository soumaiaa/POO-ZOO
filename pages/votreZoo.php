<?php
require_once('../config/autoload.php');
require_once('../config/db.php');

$zooManager = new zooManager($db);
$enclosManager = new enclosManager($db);
$id = $_SESSION['id'];
// var_dump($_SESSION['id']);
$myzoo = $zooManager->find($id);
if( isset($_POST['id']) && !empty($_POST['id']))
{
    $enclosManager->delete($_POST['id']);
   
}
// $unenclos=$enclosManager->find($_POST['id']);

// var_dump($zoo['id']);
$newzoo = new zoo($myzoo);
$newzoo->setId($myzoo['id']);
$idZoo=$newzoo->getId();
$newzoo->getNom();
$newzoo->getEmployé();
// var_dump($newzoo);


// $newzoo->detectenclos();
$enclosManger = new enclosManager($db);
$enclos = $enclosManager->findAllenclos($idZoo);
// var_dump($enclos);
foreach($enclos as $enclo){
$class=$enclo['types'];
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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>zoo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="./style.css">
</head>

<body>
    <h1 class="text-center"><?=$newzoo->getNom()?></h1>
    <main class="form">


        <section class="container-md">
            <div class="row">
                <div class="col-2"></div>
                <div class="col-8">
                    <div class="row">
                        <div class="col-2"></div>
                        <div class="col-8 bg ">
                            <img src="" alt="">
                            <h1 class="text-center">Créer votre Enclos: <h1>
                                    <form class="indexform text-center" action="./enclosconfig.php" method="post">
                                        <div>
                                            <label class="mt-4" for="">Nom:</label><br>
                                            <input class="mt-2 in" type="text" name="nomEclos"><br>
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
                                            <button class="mt-3 mb-5 in" type="submit">Ajouter</button>
                                        </div>
                                    </form>
                        </div>
                        <div class="col-2"></div>
                    </div>
                </div>
                <div class="col-2"></div>
            </div>



        </section>
    </main>
    <div class="d-flex">
        <?php foreach ($enclos as $enclo) { ?>
            <div class="m-3 text-center ">
                <img class="w-50 h-50" src="../image/<?= $enclo['types'] ?>.gif" alt="">
                <h1>Nom d'Enclos:<?= $enclo['nom'] ?></h1>
                <div class="">
                    <h4 class="h1">Type d'Enclos:<?= $enclo['types'] ?></h4>
                    <p class="h1">Nombre des animaux: <?= $enclo['nombre_des_animaux'] ?> </p>
                    <form class="" action="./addAnimal.php" method="post">
                        <input type="hidden" name="id" value="<?= $enclo['id'] ?>"><br>
                        <button type="submit" class="bg-danger text-center button ">Ajouter Animal
                        </button>
                    </form>
                    <form class="" action="" method="post">
                        <input type="hidden" name="id" value="<?= $enclo['id'] ?>"><br>
                        <button type="submit" class="bg-danger text-center button ">DELETE
                        </button>
                    </form>
                </div>

            </div>
        <?php } ?>
    </div>





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>