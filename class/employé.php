<?php 
class employé
{
    protected $id;
    protected $nom;
    protected $age;
    protected $sexe;

    
   public function __construct(array $data)
   {
     
     $this->nom= $data[('nom')];
     $this->age=$data[('age')];
     $this->sexe=$data[('sexe')];
    
   }

   public function getId()
   {
       return $this->id;
   }
   public function setId( $id)
   {
       $this->id = $id;
   }

   public function getNom()
   {
       return $this->nom;
   }
   public function setNom(int $nom)
   {
       $this->nom = $nom;
   }

   public function getAge()
   {
       return $this->age;
   }
   public function setAge($age): void
   {
       $this->age = $age;
   }

   public function getSexe()
   {
       return $this->sexe;
   }
   public function setSexe(int $sexe)
   {
       $this->sexe = $sexe;
   }

   public function examiner(enclos $enclos) 
   {
    $enclos->carracte();
   }
  
   public function nettoyer(enclos $enclos) 
   {
    $enclos->entretenir(); 
   
    echo $enclos->getNom()." est propre.";
   }

   public function nourrir(animaux $animaux)
   {
    if($animaux->getDort()===false)
    {
        $animaux->manger();
    }
    echo $animaux->getEspece()." est mangé";
   }

   public function add(animaux $animal,enclos $enclos):int
   { 
    $enclos->addAnimal($animal);
    return ($enclos->getNombAnimaux());
   }
   
   public function remove(animaux $animal,enclos $enclos):int
     {
        if ($enclos->getNombAnimaux() > 0)
        {
         return ($enclos->getNombAnimaux())-1;
        }
     }
   
    // public function transférer(animaux $animal,enclos $enclos1,enclos $enclos2)
    // {   
    //     if($enclos1->getTypes()===$enclos2->getTypes()&&$enclos2->getTypes()===$animal->getType() && $enclos2->getNombAnimaux() < enclos::MAX_ANIMALS)
    //     {
    //       $this->remove($animal,$enclos1);
    //       $this->add($animal,$enclos2);
         
    //     }

    // }



    
   
}