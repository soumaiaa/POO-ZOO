<?php
abstract class enclos
{
    protected int $id;
    protected string $nom;
    protected string $propreté;
    protected int $nombAnimaux=0;
    protected string $types;
    protected array $allAnimals = [];
    protected int $id_zoo;
    const MAX_ANIMALS = 6;
    const CLEAN = 'bon';
    const CORRECT = 'correct';
    const DIRTY = 'mauvais';
    public function __construct(array $data)
    {
        $this->nom = $data[('nom')];
        $this->types = $data[('types')];
        $this->id_zoo = $data[('id_zoo')];
        if(isset($data['nombre_des_animaux'])) {
            $this->nombAnimaux = $data['nombre_des_animaux'];
        }
    }

    public function getNom()
    {
        return $this->nom;
    }
    public function setNom(int $nom)
    {
        $this->nom = $nom;
    }

    public function getPropreté()
    {
        return $this->propreté;
    }
    public function setPropreté($propreté): void
    {
        $this->propreté = $propreté;
    }

    public function getNombAnimaux()
    {
        return $this->nombAnimaux;
    }
    public function setNombAnimaux(int $nombAnimaux)
    {
        $this->nombAnimaux = $nombAnimaux;
    }

    public function getAllAnimals()
    {
        return $this->allAnimals;
    }
    public function setAllAnimals(int $allAnimals)
    {
        $this->allAnimals = $allAnimals;
    }

    public function getTypes()
    {
        return $this->types;
    }
    public function setTypes(int $types)
    {
        $this->types = $types;
    }

  
    public function getId_zoo()
    {
        return $this->id_zoo;
    }
    public function setId_zoo($id_zoo)
    {
        $this->id_zoo = $id_zoo;
    }

   
    public function getId()
    {
        return $this->id;
    }


    public function setId($id)
    {
        $this->id = $id;
    }
    
    public function count()
    {
        return count($this->allAnimals);
    }

    abstract public function addAnimal(animaux $animal);


    abstract public function carracte();


    public function carAnimaux()
    {
        $arrayAnimals = [];
        foreach ($this->allAnimals as $animal) {
            $animal->getEspece();
            $animal->getPoids();
            $animal->getAge();
            $animal->getFaim();
            $animal->getDort();
            $animal->getMalade();
           
        }
        return $arrayAnimals;
    }
     abstract public function entretenir();  

   
}
