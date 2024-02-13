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
    header('Location: ./addEmploye.php');
   }

}


?>
