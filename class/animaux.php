<?php 
abstract class animaux
{
    
    // abstract protected function getEspece();
    protected int $id;
    protected string $espece;
    protected int $poids;
    protected int $âge;
    protected bool $faim;
    protected bool $dort;
    protected bool $malade;
    // protected string $type;
    protected int $id_enclos;

    public function __construct(array $data)
   {
     
     $this->espece= $data[('espece')];
     $this->poids=$data[('poids')];
     $this->âge=$data[('age')];
     $this->id_enclos=$data[('id_enclos')];
    
   }

    public function getId()
    {
        return $this->id;
    }
    public function setId( $id)
    {
        $this->id = $id;
    }

    public function getEspece()
    {
        return $this->espece;
    }
    public function setEspece( $espece)
    {
        $this->espece = $espece;
    }


    public function getPoids()
    {
        return $this->poids;
    }
    public function setPoids( $poids)
    {
        $this->poids = $poids;
    }

    public function getAge()
    {
        return $this->âge;
    }
    public function setAge($âge): void
    {
        $this->âge = $âge;
    }

    public function getFaim()
    {
        return $this->faim;
    }
    public function setFaim(int $faim)
    {
        $this->faim = $faim;
    }

    public function getDort()
    {
        return $this->dort;
    }
    public function setDort( $dort)
    {
        $this->dort = $dort;
    }

    public function getMalade()
    {
        return $this->malade;
    }
    public function setMalade( $malade)
    {
        $this->malade = $malade;
    }

    // public function getType()
    // {
    //     return $this->type;
    // }
    // public function setType( $type)
    // {
    //     $this->type = $type;
    // }

    public function getIdenclos()
    {
        return $this->id_enclos;
    }
    public function setIdenclos( $id_enclos)
    {
        $this->id_enclos = $id_enclos;
    }



    public function manger()
    {  
        
        if ($this->getFaim()===true && $this->getDort()===false)
        {
            return $this->setFaim(false); 
        }
        
    }

    public function soigné() 
    {  
        if ($this->getMalade()===true)
        {
            return $this->setMalade(false);
        }
      
    }
    public function dormir()
    {
        if ($this->getDort()===false)
        {
         return $this->setDort(true);
        }
       
    }
    public function afficher()
    {
        $this->getEspece();
        $this->getPoids();
        $this->getAge();
        $this->getFaim();
        $this->getDort();
        $this->getMalade();
        // $this->getType();
    }

    abstract public function son(); 
    abstract public function mouvement();
    

}