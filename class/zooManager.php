<?php 
class zooManager
{
    private PDO $db;
    
    public function __construct(PDO $db)
    {
        $this->db = $db;
    }
    public function addDb(zoo $zoo): void
    {
        $request = $this->db->prepare("INSERT INTO zoo (nom, id_employe) VALUES (:nom, :id_employe)");
            $request->execute([
                'nom' => $zoo->getNom(),
                'id_employe'=>$zoo->getEmployé()
            ]);
            $id = $this->db->lastInsertId();
            $zoo->setId($id);
    }
   
    public function find($id)
    {
     
        $request = $this->db->query('SELECT * FROM zoo WHERE id_employe='.$id);
        $myzoo = $request->fetch();
        
       return $myzoo;
        
    }
    

}
?>