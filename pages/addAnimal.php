<?php
require_once('../config/autoload.php');
require_once('../config/db.php');
$animauxManager = new animauxManager ($db);
$enclosManager= new enclosManager($db);
var_dump($_SESSION['id']);
$enclosnew = new enclosManager($db);
if( isset($_POST['id']) && !empty($_POST['id']))
{ 
     
   
    $enclos=$enclosnew->find($_POST['id']);
    var_dump($enclos);
    $class=$enclos['types'];
    $enclosfind= new $class($enclos);
   
    $enclosfind->setId($enclos['id']);
    var_dump($enclosfind);
    $enclosfind->getTypes();
    
    $idenc=$enclosfind->getId();
    $animaux = $animauxManager->findAllanimaux($_POST['id']);

    var_dump($animaux);
    if(isset($_POST['id_animal']) && !empty($_POST['id_animal']))
     
    {
        $animauxManager->delete($_POST['id_animal']);
    
    }
}



// if (
//    isset($_POST['espece']) && !empty($_POST['espece']) &&
//    isset($_POST['poids']) && !empty($_POST['poids'])&&
//    isset($_POST['age']) && !empty($_POST['age']) &&
//    isset($_POST['id_enclos']) && !empty($_POST['id_enclos'])) 
// {
//     // var_dump($_POST['espece']);
//     // var_dump($_POST['poids']);
//     // var_dump($_POST['id_enclos']);


//     $myenclos = $enclosManager->find($_POST['id_enclos']);
//     // var_dump($myenclos); 
//     $class = $_POST['espece'];
//     $animal = new $class([
//         'espece' => $_POST['espece'],
//         'poids' => $_POST['poids'],
//         'age' => $_POST['age'],
//         'id_enclos' => $_POST['id_enclos']
//     ]);

//     $clas = $myenclos['types'];
//     var_dump($myenclos['types']);
//     $enclo = new $clas($myenclos);

//     $newanimal = $enclo->addAnimal($animal);
//     //  $_SESSION['id']=$_POST['id_enclos'];
//     //  var_dump($_SESSION['id']);
//     $enclo->setId($_POST['id_enclos']);
//     if ($newanimal) {
//         $animauxManager->addDb($animal);
        
//     }
//     $enclosManager->update($enclo);
//     $animaux = $animauxManager->findAllanimaux($_POST['id_enclos']);
//      var_dump($animaux); 
   

//    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>enclos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="./style.css">

</head>

<body>
  <form action="./votreZoo.php" method="post">
     
     <button class="mt-3 mb-5 in" type="submit">Retour ZOO</button>
  </form>

   
    <form class="form" action="./animalconfig.php" method="post">
        <section class="container-md">
            <div class="row">
                <div class="col-2"></div>
                <div class="col-8">
                    <div class="row">
                        <div class="col-2"></div>
                        <div class="col-8 bg text-center">
                            <h1>Ajouter Animal:</h1>
                            <div class="">
                                <label class="mt-2" for="">Espece:</label>
                                <select class="mt-2 in" name="espece" id="inputGroupSelect02">
                                    <option>ours</option>
                                    <option>tigres</option>
                                    <option>poissons</option>
                                    <option>aigles</option>
                                </select>
                            </div>
                            <input type="hidden" name="id_enclos" value="<?= $_POST['id']?>">
                            
                            <label class="mt-4" for="">Poids:</label><br>
                            <input class="mt-2 in" type="text" name="age"><br>
                            <label class="mt-4" for="">Age:</label><br>
                            <input class="mt-2 in" type="text" name="poids"><br>
                            <div class="text-center">
                                <button class="mt-3 mb-5 in" type="submit">Entrer</button>
                            </div>
                        </div>
                        <div class="col-2"></div>
                    </div>
                </div>
                <div class="col-2"></div>
            </div>
        </section>
    </form>

    <body class="" >
<div class="d-flex">
    <?php foreach ($animaux as $animal) { ?>
        <div class="d-flex">
            <div class="bg-dark text-center text-white">
            <h1><?= $animal['espece'] ?></h1>
            <h6>Poids:<?= $animal['poids'] ?></h6>
            <h6>Age:<?= $animal['age'] ?></h6>
            <form class="" action="" method="post">
                        <input type="hidden" name="id_animal" value="<?=$animal['id']?>"><br>
                        <input type="hidden" name="id" value="<?=$animal['id_enclos']?>"><br>
                        <button type="submit" class="bg-danger text-center button ">DELETE
                        </button>
                    </form>
            </div>

            <div>
            <img class="w-50 h-75" src="../image/<?= $animal['espece'] ?>.webp" alt="">
            </div>
        </div>
    <?php } ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>