<?php
require_once('../config/autoload.php');
require_once('../config/db.php');
$animauxManager = new animauxManager ($db);
$enclosManager= new enclosManager($db);
// if (
//    isset($_POST['espece']) && !empty($_POST['espece']) &&
//    isset($_POST['poids']) && !empty($_POST['poids'])&&
//    isset($_POST['age']) && !empty($_POST['age']) &&
//    isset($_POST['id_enclos']) && !empty($_POST['id_enclos'])) 
// {
    
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
//     $enclo->
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
 if (
   isset($_POST['espece']) && !empty($_POST['espece']) &&
   isset($_POST['poids']) && !empty($_POST['poids'])&&
   isset($_POST['age']) && !empty($_POST['age']) &&
   isset($_POST['id_enclos']) && !empty($_POST['id_enclos'])) 
{
    // var_dump($_POST['espece']);
    // var_dump($_POST['poids']);
    // var_dump($_POST['id_enclos']);


    $myenclos = $enclosManager->find($_POST['id_enclos']);
    // var_dump($myenclos); 
    $class = $_POST['espece'];
    $animal = new $class([
        'espece' => $_POST['espece'],
        'poids' => $_POST['poids'],
        'age' => $_POST['age'],
        'id_enclos' => $_POST['id_enclos']
    ]);

    $clas = $myenclos['types'];
    var_dump($myenclos['types']);
    $enclo = new $clas($myenclos);

    $newanimal = $enclo->addAnimal($animal);
    
    $enclo->setId($_POST['id_enclos']);
    if ($newanimal) {
        $animauxManager->addDb($animal);
        
    }
    $enclosManager->update($enclo);
    $animaux = $animauxManager->findAllanimaux($_POST['id_enclos']);
     var_dump($animaux); 
     $_SESSION['id']=$_POST['id_enclos'];
    //  var_dump($_SESSION['id']);
     
     header('Location:./addAnimal.php');
   }
    
    
   
    

?>