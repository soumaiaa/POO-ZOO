<?php
require_once('../config/autoload.php');
require_once('../config/db.php');
$enclosManager = new enclosManager($db);
$zooManager = new zooManager($db);
// var_dump($_SESSION['id']);
// die;
if (
   isset($_POST['nomEclos']) && !empty($_POST['nomEclos']) &&
   isset($_POST['types']) && !empty($_POST['types']) &&
   isset($_POST['id_zoo']) && !empty($_POST['id_zoo'])&&
   isset($_POST['id_employe']) && !empty($_POST['id_employe'])
) {
   // var_dump($_POST['nomEclos']);
   // var_dump($_POST['types']);
   // var_dump($_POST['id_zoo']);
   // var_dump($_POST['id_employe']);
  
  
   $class = $_POST['types'];
   $enclos = new $class([
      'nom' => $_POST['nomEclos'],
      'types' => $_POST['types'],
      'id_zoo' => $_POST['id_zoo']
   ]);
   $myzoo = $zooManager->find($_POST['id_employe']);
   // var_dump($myzoo);

   $newzoo = new zoo($myzoo);
   $newzoo->setId($myzoo['id']);
   // $detec = $newzoo->detectenclos($enclos);
   $encloscount=$enclosManager->findAllenclos($myzoo['id']);
   // var_dump(count($encloscount));
   
   
   
   if(count($encloscount)<6){
   $enclosManager->addDb($enclos);
   }
   // $_SESSION['id']=($_POST['id_employe']);
   // var_dump( $_SESSION['id']);
   header('Location: ./votreZoo.php'); 

  
}
   ?>