<?php
class Reservation
{
    private $db;
    public function __construct()
    {
        $this->db = new Database;
    }
  
    public function getReservation()
    {
        $this->db->query('SELECT * FROM `reservation`');
        $results = $this->db->resultSet();
        return $results;
    }
   
    public function getoneReservation($ID_user){       
        $this->db->query('SELECT c.nbr_nuits,c.Port_dep,c.Port_Pause,c.Port_Finale,c.Date_dep,r.ID_Reservation,r.date_reservation,r.Prix_reservation FROM croisiere c ,reservation r WHERE c.ID_croisiere = r.ID_croisiere && r.ID_user=:ID_user;');
        $this->db->bind(':ID_user', $ID_user);
        $results = $this->db->resultSet();

        return $results;
    }
  
    public function  addreservation($data)
    {
        $this->db->query('INSERT INTO  reservation(ID_user,ID_croisiere,Prix_reservation) VALUES (:ID_user,:ID_croisiere,:Prix_reservation)');

        $this->db->bind(':ID_user', $data['ID_user']);
        $this->db->bind(':ID_croisiere', $data['ID_croisiere']);
        $this->db->bind(':Prix_reservation', $data['Prix_reservation']);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
  
   
 
     public function deleteReservation($ID_Reservation)
     {
         $this->db->query('DELETE FROM `reservation`  WHERE `ID_reservation`= :ID_Reservation');
         $this->db->bind(':ID_Reservation', $ID_Reservation);
         //   execute
         if ($this->db->execute()) {
             return true;
         } else {
             return false;
         }
     }
 
    public function getReserationById($ID_Reservation)
    {
        $this->db->query('SELECT c.ID_user,c.nbr_nuits,c.Port_dep,c.Port_Pause,c.Port_Finale,c.Date_dep,r.ID_Reservation,r.date_reservation,r.Prix_reservation FROM croisiere c ,reservation r  WHERE  `ID_reservation`=:ID_Reservation && r.ID_croisiere=c.ID_croisiere;');
        $this->db->bind(':ID_Reservation', $ID_Reservation);
        $row = $this->db->single();
        return $row;
    }
   
}
