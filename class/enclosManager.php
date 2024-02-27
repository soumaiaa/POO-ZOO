<?php
class enclosManager
{
    private PDO $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }
    public function addDb(enclos $enclos): void
    {
       
        $request = $this->db->prepare("INSERT INTO enclos (nom, types, id_zoo) VALUES (:nom, :types, :id_zoo)");
        $request->execute([
            'nom' => $enclos->getNom(),
            'types' => $enclos->getTypes(),
            'id_zoo' => $enclos->getId_zoo()
        ]);
        $id = $this->db->lastInsertId();
        $enclos->setId($id);
    }
    public function find($id)
    {
        $request = $this->db->query('SELECT * FROM enclos WHERE  id=' . $id);
        $enclo = $request->fetch();
        $class = $enclo['types'];
        $new = new $class($enclo);
        $new->setId($enclo['id']);
        return $enclo;
        
    }
   
    public function findAllenclos($zooid)
    {
        $request = $this->db->query('SELECT * FROM enclos WHERE id_zoo=' .$zooid);
        $enclos = $request->fetchAll();
        // foreach ($enclos as $enclo) {
        //     $tabl = [];
        //     $class = $enclo['types'];
        //     $newenclos = new $class($enclo);
        //     $newenclos->setId($enclo['id']);
        //     $newenclos->setNom($enclo['nom']);
        //     $newenclos->setTypes($enclo['types']);
         
        //     $tabl[] = $newenclos;
        // }

        return $enclos;
    }



    public function update(enclos $enclos)
    {
        // $_SESSION['id']=$enclos->getId();
        $request = $this->db->prepare('UPDATE enclos SET nombre_des_animaux = :nombre_des_animaux WHERE id = :id');
        $request->execute([
            'nombre_des_animaux' => $enclos->getNombAnimaux(),
            ':id' => $enclos->getId()
        ]);
    }
    public function delete($id)
    {
        $deleteenclos =  $this->db->prepare('DELETE FROM enclos WHERE id = ?');
         $deleteenclos->execute([$id]);
    }
}
