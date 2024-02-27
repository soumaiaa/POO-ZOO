<?php
require_once('../config/autoload.php');
require_once('../config/db.php');
$new = new employeManager($db);
if (isset($_POST['nom']) && !empty($_POST['nom']))
{   
    $_SESSION['nom']=$_POST['nom'];
    // var_dump($_SESSION['nom']);
   $employExiste=$new->checkemploye();
  
   if($employExiste)
   {  $_SESSION['id']=$employExiste['id'];
    header('Location: ./votreZoo.php');
   }else{
    echo "vous avez pas un compte créer votre compte";
    header('Location: ./addEmploye.php');
   }

}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connection</title>
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
            
            <div class=" ">
                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-8 in">
                        <div class="row align-items-center">
                            <div class="col-md-4 text-center">
                                <img class="w-75   media_sticker__7KoTk media_gif__MBeQG" style="aspect-ratio:480/480" src="https://i.giphy.com/bDcOLcjvJ1gLrtlZWy.webp" alt="" width="480">
                            </div>
                            <div class="col-md-8 text-center">
                                <h1 class="">Connecter à votre compte: <h1>
                            </div>
                        </div>
                        <div>
                            <form class="indexform text-center" action="" method="post">
                                <div class="">
                                    <label class="" for="">Nom:</label><br>
                                    <input class="mt-2 w-75 in" type="text" name="nom"><br>

                                </div>
                                <div class="">
                                    <button class="mt-3 mb-4 in" type="submit">Entrer</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-2"></div>
                </div>
            </div>
           
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>