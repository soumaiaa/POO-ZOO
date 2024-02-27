<?php
require_once('../config/autoload.php');
require_once('../config/db.php');



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <link rel="icon" type="image/x-icon" href="../image/logopage.gif">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="./style.css">
</head>

<body>

    <header class="container-md">
        <div class="text-center">
            <img class="w-75" src="../image/299454-animaux-sauvages-et-signe-de-zoo-gratuit-vectoriel.jpg" alt="">
        </div>


    </header>


    <section class="container-md">
        <div class="row form">
            <!-- <div class="col-3"></div> -->
            <div class=" ">
                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-8 in">
                        <div class="row align-items-center ">
                            <div class="col-md-4 text-center">
                                <img class="w-75 media_sticker__7KoTk media_gif__MBeQG" style="aspect-ratio:480/480" src="https://i.giphy.com/bDcOLcjvJ1gLrtlZWy.webp" alt="" width="480">
                            </div>
                            <div class="col-md-8 text-center">
                                <h1 class="">Créer votre compte: <h1>
                            </div>
                        </div>
                        <div>
                        <form class="indexform" action="./processEmployé.php" method="post">
                            <div class="row">
                                <div class="col-md-8">
                                    <label class="" for="">Nom:</label><br>
                                    <input class="mt-2 w-75 in" type="text" name="nom"><br>

                                    <label class="mt-2" for="">Age:</label><br>
                                    <input class="mt-2 w-75  in" type="text" name="age"><br>

                                    <label class="mt-3 " for="">Nom de Zoo:</label><br>
                                    <input class="mt-3 mb-3 w-75  in" type="text" name="nomzoo"><br>

                                </div>
                                <div class="col-md-4">
                                    <label class="mt-5" for="">Sexe:</label><br>
                                    <select class="mt-2 in" name="sexe" id="inputGroupSelect02">
                                        <option>Femme</option>
                                        <option>Homme</option>
                                    </select>
                                </div>
                            </div>

                            <div class="text-center">
                                <button class="mt-5 mb-5 in" type="submit">Entrer</button>
                            </div>
                        </form>
                        </div>
                    </div>
                    <div class="col-md-2"></div>
                </div>
            </div>
            <!-- <div class="col-3"></div> -->
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>