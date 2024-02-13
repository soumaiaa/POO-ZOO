<?php
class employeManager
{
    private PDO $db;
    
    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    public function addDb(employé $employé): void
    {
        $request = $this->db->prepare("INSERT INTO employé (nom, age, sexe) VALUES (:nom, :age, :sexe)");
            $request->execute([
                
                'nom' => $employé->getNom(),
                'age'=>$employé->getAge(),
                'sexe' => $employé->getSexe(),

            ]);
            $id = $this->db->lastInsertId();
            $employé->setId($id);

    }
    public function checkemploye()
    {
       
        $findUser = $this->db->prepare('SELECT * FROM  employé WHERE nom = :nom');
        $findUser->execute([
           ':nom' =>$_SESSION['nom'] 
        ]);
        $existingUser = $findUser->fetch();
    //     if ($existingUser){
    //     $new= new employé([
    //         $existingUser['nom'],
    //         $existingUser['age'],
    //         $existingUser['sexe']
    //     ]);
    //    return $new;
    // }else {
    //     header('Location: ../pages/addEmploye.php');
    // }
    return $existingUser;
    }
  
        public function find($id)
    {
        $request = $this->db->query('SELECT * FROM employé WHERE  id=' . $id);
        $employé = $request->fetch();
        $newemployé = new employé($employé);
        $newemployé->setId($employé['id']);
        return $newemployé;
    }
    
    
}