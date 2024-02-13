<?php
require_once('../config/autoload.php');
require_once('../config/db.php');

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zoo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="./style.css">
</head>

<body>

    <header class="container-md">
        <div class="text-center">
            <img class="header" src="../image/299454-animaux-sauvages-et-signe-de-zoo-gratuit-vectoriel.jpg" alt="">
        </div>
        

    </header>


    <section class="container-md">
        <div class="row form">
            <!-- <div class="col-3"></div> -->
            <div class=" ">
                <div class="row">
                    <div class="col-2"></div>
                    <div class="col-8 bg">
                        <div class="d-flex justify-content-evenly  align-items-center ">
                    <img class="header1 media_sticker__7KoTk media_gif__MBeQG" style="aspect-ratio:480/480" src="https://i.giphy.com/bDcOLcjvJ1gLrtlZWy.webp" alt="" width="480">
                        <h1 class="">Créer votre compte: <h1>
                        </div>
                        <form class="indexform" action="./processEmployé.php" method="post">
                            <div class="d-flex justify-content-evenly">
                                <div class="">
                                    <label class="" for="">Nom:</label><br>
                                    <input class="mt-2 in" type="text" name="nom"><br>
                                    
                                    <label class="mt-2" for="">Age:</label><br>
                                    <input class="mt-2 in" type="text" name="age"><br>

                                    <label class="mt-3 " for="">Nom de Zoo:</label><br>
                                    <input class="mt-3 mb-3 in" type="text" name="nomzoo"><br>

                                </div>
                                <div class="">
                                    <label class="mt-5" for="">Sexe:</label><br>
                                    <select class="mt-2 in" name="sexe" id="inputGroupSelect02">
                                        <option>Femme</option>
                                        <option>Homme</option>
                                    </select>
                                </div>
                            </div>

                            <div class="text-center">
                                <button class="mt-3 mb-5 in" type="submit">Entrer</button>
                            </div>
                        </form>
                    </div>
                    <div class="col-2"></div>
                </div>
            </div>
            <!-- <div class="col-3"></div> -->
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>  
</body>

</html>