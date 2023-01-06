<?php
class Navire
{
    private $db;
    public function __construct()
    {
        $this->db = new Database;
    }
   
    public function getNavires()
    {
        $this->db->query('SELECT * FROM `navire`');
        $results = $this->db->resultSet();
        return $results;
    }
  
    public function  addNavire($data)
    {
        $this->db->query('INSERT INTO  navire(ID_user,Nom_navire,nbr_chambre,nbr_place) VALUES (:ID_user,:Nom_navire,:nbr_chambre,:nbr_place) ');

        $this->db->bind(':ID_user', $data['ID_user']);
        $this->db->bind(':Nom_navire', $data['Nom_navire']);
        $this->db->bind(':nbr_chambre', $data['nbr_chambre']);
        $this->db->bind(':nbr_place', $data['nbr_place']);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
   
    public function deleteNavire($ID_navire)
    {
        $this->db->query('DELETE FROM `navire`  WHERE `ID_navire`= :ID_navire');
        $this->db->bind(':ID_navire', $ID_navire);
        //   execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function updateNavire($data)
    {
        $this->db->query(' UPDATE `navire` SET `Nom_navire`= :Nom_navire,`nbr_chambre`= :nbr_chambre,`nbr_place`= :nbr_place  WHERE `ID_navire`= :ID_navire');
        $this->db->bind(':ID_navire', $data['ID_navire']);
        $this->db->bind(':Nom_navire', $data['Nom_navire']);
        $this->db->bind(':nbr_chambre', $data['nbr_chambre']);
        $this->db->bind(':nbr_place', $data['nbr_place']);
      
        //   execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

}
