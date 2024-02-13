<?php
class animauxManager
{
    private PDO $db;
    
    public function __construct(PDO $db)
    {
        $this->db = $db;
    }
    public function addDb(animaux $animal): void
    {   
        $request = $this->db->prepare("INSERT INTO animaux (espece, poids, age, id_enclos) VALUES (:espece, :poids, :age, :id_enclos)");
            $request->execute([
                
                'espece' => $animal->getEspece(),
                'poids' => $animal->getPoids(),
                'age'=>$animal->getAge(),
                'id_enclos' =>$animal->getIdenclos()

            ]);
            $id = $this->db->lastInsertId();
            $animal->setId($id);

    }
    public function findAllanimaux($encloid)
    {
        $request = $this->db->query('SELECT * FROM animaux WHERE id_enclos='.$encloid);
        $animal = $request->fetchAll();
        return $animal;
    }
    public function delete($id)
    {
        $deleteannimal =  $this->db->prepare('DELETE FROM animaux WHERE id = ?');
         $deleteannimal->execute([$id]);
    }
   

}