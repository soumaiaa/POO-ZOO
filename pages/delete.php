<?php
require_once('../config/autoload.php');
require_once('../config/db.php');
$enclosManager = new enclosManager($db);
$animauxManager = new animauxManager($db);
if (isset($_POST['id_animal']) && !empty($_POST['id_animal'])&&
isset($_POST['id']) && !empty($_POST['id'])
) {
   
    $animalId=$animauxManager->find($_POST['id_animal']);
    $class = $animalId['espece'];
    $new = new $class($animalId);
    $new->setId($animalId['id']);
  
    $myenclos = $enclosManager->find($_POST['id']);
    $clas = $myenclos['types'];
    // var_dump($myenclos['types']);
    $enclo = new $clas($myenclos);
    $enclo->setId($myenclos['id']);
    $effacer=$enclo->remove($new);
    if ($effacer){
        $animauxManager->delete($_POST['id_animal']);
    }
    $enclosManager->update($enclo);

    header('Location:./addAnimal.php');
}