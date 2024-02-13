<?php
require_once('../config/autoload.php');
require_once('../config/db.php');

$zooManager = new zooManager($db);
$new = new employeManager($db);
// $_SESSION['nom'] = $_POST['nom'];

if (
    isset($_POST['nom']) && !empty($_POST['nom']) &&
    isset($_POST['age']) && !empty($_POST['age']) &&
    isset($_POST['sexe']) && !empty($_POST['sexe']) &&
    isset($_POST['nomzoo']) && !empty($_POST['nomzoo'])
) {
    // var_dump($_POST['nom']);
    // var_dump($_POST['age']);

    $employé = new employé([
        'nom' => $_POST['nom'],
        'age' => $_POST['age'],
        'sexe' => $_POST['sexe']
    ]);
    $new->addDb($employé);
    $idEmployé = $employé->getId();
    $zoo = new zoo([
        'nom' => $_POST['nomzoo'],
        // 'max_enclos'=>
        'id_employé' => $idEmployé

    ]);
    // var_dump($zoo);
    $zooManager->addDb($zoo);
    $idZoo = $zoo->getId();
    $_SESSION['id']=$zoo->getId();
    $enclosManager = new enclosManager($db);
    $enclos = $enclosManager->findAllenclos($idZoo);

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
    <main class="form">
        <div class="container-md">
            <div class="text-center">
                <img class="header" src="../image/unnamed (1).gif" alt="">
            </div>

        </div>
        <section class="container-md">
            <div class="row">
                <div class="col-2"></div>
                <div class="col-8">
                    <div class="row">
                        <div class="col-2"></div>
                        <div class="col-8 bg ">
                            <img src="" alt="">
                            <h1 class="text-center">Créer votre Zoo: <h1>
                            <form class="indexform text-center" action="./enclosconfig.php" method="post">
                                <div>
                                    <label class="mt-4" for="">Nom:</label><br>
                                    <input class="mt-2 in" type="text" name="nomEclos"><br>
                                    <input type="hidden" name="id_zoo" value="<?= $zoo->getId() ?>">

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
                                    <button class="mt-3 mb-5 in" type="submit">Entrer</button>
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


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>