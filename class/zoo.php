<?php 
class zoo
{
    private $nom;
    private int $employé;
    private array $enclos; 
    private int $maxEnclos=6;
    private $id;
    public function __construct(array $data)
   {
    
     $this->nom= $data[('nom')];
     $this->employé=$data[('id_employe')];
    //  $this->maxEnclos=$data[('maxEnclos')]; 

   }
   
    /**
     * Get the value of nom
     */ 
    public function getNom()
    {
        return $this->nom;
    }
 
    public function setNom($nom)
    {
        $this->nom = $nom;

    }

    /**
     * Get the value of employé
     */ 
    public function getEmployé()
    {
        return $this->employé;
    }
 
    public function setEmployé($employé)
    {
        $this->employé = $employé;

    }

    /**
     * Get the value of maxEnclos
     */ 
    public function getMaxEnclos()
    {
        return $this->maxEnclos;
    }

    public function setMaxEnclos($maxEnclos)
    {
        $this->maxEnclos = $maxEnclos;
    }

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }
    public function setId($id)
    {
        $this->id = $id;
    }
    /**
     * Get the value of enclos
     */ 
    public function getEnclos()
    {
        return $this->enclos;
    }

 
    public function setEnclos($enclos)
    {
        $this->enclos = $enclos;

    }

     public function detectenclos(enclos $enclos)
    {
      if(count($this->enclos) === 6)
      {
        $this->enclos[] = $enclos;
         echo"vous pouvez pas ajouter inclos";
         return true;
      } 
    }
   
      
      public function affiche(enclos $enclos)
      {
        $this->$enclos[]=$enclos;
        foreach ($enclos as $enclo) 
        {
             $enclo->carracte();
        }
        return $enclos;
      }
   
      public function afficheNombreAnimaux(animaux $animal)
      {   
        $animaux=array($animal);
        return count($animaux);
      }

      public function main(animaux $animaux, enclos $enclo )
      {
        foreach($this->enclos as $enclo)
        { 
          foreach($enclo->getAllAnimals() as $animaux)
          {
           $animaux->setMalade(rand(0,1));
           $animaux->setDort(rand(0,1));
           $animaux->setMalade(rand(0,1));
          }
          $enclo->setSalinité(rand(0,100));
          $enclo->setPropreté(rand('bon','correct','mauvais'));
          $enclo->setHauteur(rand(10,20));
        }
      }
    

   


    
}