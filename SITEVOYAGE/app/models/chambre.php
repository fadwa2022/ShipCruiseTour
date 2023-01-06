<?php
class Chambre
{
    private $db;
    public function __construct()
    {
        $this->db = new Database;
    }
   
    public function getChambre()
    {
        $this->db->query('SELECT c.ID_user, c.ID_chambre, c.ID_navire ,c.ID_type,n.Nom_navire,t.Nom_type,t.prix_type FROM chambre c, navire n,type_chambre t WHERE c.ID_type =t.ID_type && c.ID_navire=n.ID_navire;');
        $results = $this->db->resultSet();
        return $results;
    }

  
    public function  addchambre($data)
    { 
        $this->db->query('INSERT INTO  chambre(ID_user,ID_navire,ID_type) VALUES (:ID_user,:ID_navire,:ID_type)');

        $this->db->bind(':ID_user', $data['ID_user']);
        $this->db->bind(':ID_navire', $data['ID_navire']);
        $this->db->bind(':ID_type', $data['ID_type']);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
 
   
    public function deletechambre($ID_chambre)
    {
        $this->db->query('DELETE FROM `chambre`  WHERE `ID_chambre`= :ID_chambre');
        $this->db->bind(':ID_chambre', $ID_chambre);
        //   execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
    
   
    public function getchambreById($ID_chambre)
    {
        $this->db->query('SELECT * FROM `chambre` WHERE ID_chambre = :ID_chambre');
        $this->db->bind(':ID_chambre', $ID_chambre);
        $row = $this->db->single();
        return $row;
    }
 
    public function updateChambre($data)
    {
        $this->db->query(' UPDATE `chambre` SET `ID_navire`= :ID_navire,`ID_type`= :ID_type  WHERE `ID_chambre`= :ID_chambre');
        $this->db->bind(':ID_chambre', $data['ID_chambre']);
        $this->db->bind(':ID_navire', $data['ID_navire']);
        $this->db->bind(':ID_type', $data['ID_type']);
       
      
        //   execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
  

}
