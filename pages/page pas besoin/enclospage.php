<?php
require_once('../config/autoload.php');
require_once('../config/db.php');
// $enclosManager = new enclosManager($db);
// if (
//    isset($_POST['nomEclos']) && !empty($_POST['nomEclos']) &&
//    isset($_POST['types']) && !empty($_POST['types']) &&
//    isset($_POST['id_zoo']) && !empty($_POST['id_zoo'])
// ) {
//    var_dump($_POST['nomEclos']);
//    var_dump($_POST['types']);
//    var_dump($_POST['id_zoo']);
  

//    $class = $_POST['types'];
//    $enclos = new $class([
//       'nom' => $_POST['nomEclos'],
//       'types' => $_POST['types'],
//       'id_zoo' => $_POST['id_zoo']
//    ]);
//    $enclosManager->addDb($enclos);
//    $enclos->getId();
   
   // if($_POST['types']==='terrestre')
   // {
   //    header('Location: ./terrestrepage.php');   
   // }
   // else if($_POST['types']==='volière')
   // {
   //    header('Location:./volièrepage.php');
   // }
   // else if ($_POST['types']==='aquariums')
   // {
   //    header('Location:./aquariumspage.php');
   // }
   

// }
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
   <form action="./enclosconfig.php" method="post">
      <div>
         <div class="">
            <label class="mt-2" for="">Espece:</label><br>
            <select class="mt-2 in" name="espece" id="inputGroupSelect02">
               <option>ours</option>
               <option>tigres</option>
               <option>poissons</option>
               <option>aigles</option>
            </select>
         </div>
         <label class="mt-4" for="">Poids:</label><br>
         <input class="mt-2 in" type="text" name="age"><br>
         <label class="mt-4" for="">Age:</label><br>
         <input class="mt-2 in" type="text" name="poids"><br>
         <input type="hidden" name="id_enclos" value="<?= $enclos->getId() ?>">

      </div>



      <div class="text-center">
         <button class="mt-3 mb-5 in" type="submit">Entrer</button>
      </div>
   </form>

   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>