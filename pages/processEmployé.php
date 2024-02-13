<?php
require_once('../config/autoload.php');
require_once('../config/db.php');

$zooManager = new zooManager($db);
$new = new employeManager($db);

if (
    isset($_POST['nom']) && !empty($_POST['nom']) &&
    isset($_POST['age']) && !empty($_POST['age']) &&
    isset($_POST['sexe']) && !empty($_POST['sexe']) &&
    isset($_POST['nomzoo']) && !empty($_POST['nomzoo'])
) {
    $_SESSION['nom'] = $_POST['nom'];
    $employExiste=$new->checkemploye();
    
   
   
    if($employExiste) {

       echo'le nom existe';
     
       header("Location: ./addEmploye.php");
    }else{

        $_SESSION['nom'] = $_POST['nom'];

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
        'id_employe' => $idEmployé

    ]);
    $zooManager->addDb($zoo);
    $idZoo = $zoo->getId();
    
    $_SESSION['id'] = $idEmployé;
    var_dump($_SESSION['id']);
   

    header('Location: ./votreZoo.php');
}
}else{
    header('Location: ./addEmploye.php');
}
