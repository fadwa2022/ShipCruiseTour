<?php
class Article
{
    private $db;
    public function __construct()
    {
        $this->db = new Database;
    }
    public function getCroisieres()
    {
        $this->db->query('SELECT c.ID_croisiere, c.ID_navire, c.ID_user, c.prix_croisiere, c.Image, c.nbr_nuits,c.Port_dep,c.Port_Pause,c.Port_Finale,c.Date_dep,n.ID_navire,n.Nom_navire,n.nbr_chambre,n.nbr_place FROM  croisiere c ,navire n  WHERE c.ID_navire=n.ID_navire;');

        $results = $this->db->resultSet();

        return $results;
    }
    public function getNavires()
    {
        $this->db->query('SELECT * FROM `navire`');
        $results = $this->db->resultSet();
        return $results;
    }
    public function getPorts()
    {
        $this->db->query('SELECT * FROM `port`');
        $results = $this->db->resultSet();
        return $results;
    }
    public function getChambre()
    {
        $this->db->query('SELECT c.ID_user, c.ID_chambre, c.ID_navire ,c.ID_type,n.Nom_navire,t.Nom_type,t.prix_type FROM chambre c, navire n,type_chambre t WHERE c.ID_type =t.ID_type && c.ID_navire=n.ID_navire;');
        $results = $this->db->resultSet();
        return $results;
    }

    public function gettype()
    {
        $this->db->query('SELECT * FROM `type_chambre`');
        $results = $this->db->resultSet();
        return $results;
    }
    public function getReservation()
    {
        $this->db->query('SELECT * FROM `reservation`');
        $results = $this->db->resultSet();
        return $results;
    }
    public function getCroisiereByPort($Nom_port)
    {
        $this->db->query("SELECT c.ID_croisiere, c.ID_navire, c.ID_user, c.prix_croisiere, c.Image, c.nbr_nuits,c.Port_dep,c.Port_Pause,c.Port_Finale,c.Date_dep,n.ID_navire,n.Nom_navire,n.nbr_chambre,n.nbr_place FROM  croisiere c ,navire n  WHERE c.ID_navire=n.ID_navire && `Port_dep` = '$Nom_port';");
        $results = $this->db->resultSet();

        return $results;
    }
    public function getCroisiereById($ID_croisiere)
    {
        $this->db->query('SELECT c.ID_croisiere, c.ID_navire, c.ID_user, c.prix_croisiere, c.Image, c.nbr_nuits,c.Port_dep,c.Port_Pause,c.Port_Finale,c.Date_dep,n.ID_navire,n.Nom_navire,n.nbr_chambre,n.nbr_place FROM croisiere c ,navire n WHERE  ID_croisiere = :ID_croisiere;');
        $this->db->bind(':ID_croisiere', $ID_croisiere);
        $row = $this->db->single();
        return $row;
    }
    public function getoneReservation($ID_user){       
        $this->db->query('SELECT c.nbr_nuits,c.Port_dep,c.Port_Pause,c.Port_Finale,c.Date_dep,r.ID_Reservation,r.date_reservation,r.Prix_reservation FROM croisiere c ,reservation r WHERE c.ID_croisiere = r.ID_croisiere && r.ID_user=:ID_user;');
        $this->db->bind(':ID_user', $ID_user);
        $results = $this->db->resultSet();

        return $results;
    }
  
    public function  addCroisiere($data)
    {
        $this->db->query('INSERT INTO  croisiere(ID_user,ID_navire,prix_croisiere,Image,nbr_nuits,Port_dep,Port_Pause,Port_Finale,Date_dep) VALUES (:ID_user,:ID_navire,:prix_croisiere,:Image,:nbr_nuits,:Port_dep,:Port_Pause,:Port_Finale,:Date_dep) ');

        $this->db->bind(':ID_user', $data['ID_user']);
        $this->db->bind(':ID_navire', $data['ID_navire']);
        $this->db->bind(':prix_croisiere', $data['prix_croisiere']);
        $this->db->bind(':Image', $data['Image']);
        $this->db->bind(':nbr_nuits', $data['nbr_nuits']);
        $this->db->bind(':Port_dep', $data['Port_dep']);
        $this->db->bind(':Port_Pause', $data['Port_Pause']);
        $this->db->bind(':Port_Finale', $data['Port_Finale']);
        $this->db->bind(':Date_dep', $data['Date_dep']);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
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
    public function  addport($data)
    { 
        $this->db->query('INSERT INTO  port(ID_user,Nom_port,Pays,image) VALUES (:ID_user,:Nom_port,:Pays,:image) ');

        $this->db->bind(':ID_user', $data['ID_user']);
        $this->db->bind(':Nom_port', $data['Nom_port']);
        $this->db->bind(':Pays', $data['pays']);
        $this->db->bind(':image', $data['image']);



        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
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
 

    public function deleteCroisiere($ID_croisiere)
    {
        $this->db->query('DELETE FROM `croisiere`  WHERE `ID_croisiere`= :ID_croisiere');
        $this->db->bind(':ID_croisiere', $ID_croisiere);
        //   execute
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
  public function deletePort($ID_port)
    {
        $this->db->query('DELETE FROM `port`  WHERE `ID_port`= :ID_port');
        $this->db->bind(':ID_port', $ID_port);
        //   execute
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
    public function getNavireById($ID_navire)
    {
        $this->db->query('SELECT * FROM `navire` WHERE ID_navire=:ID_navire;');
        $this->db->bind(':ID_navire', $ID_navire);
        $row = $this->db->single();
        return $row;
    }
  public function getPortById($ID_port)
    {
        $this->db->query('SELECT * FROM `port` WHERE ID_port = :ID_port');
        $this->db->bind(':ID_port', $ID_port);
        $row = $this->db->single();
        return $row;
    }
    public function getchambreById($ID_chambre)
    {
        $this->db->query('SELECT * FROM `chambre` WHERE ID_chambre = :ID_chambre');
        $this->db->bind(':ID_chambre', $ID_chambre);
        $row = $this->db->single();
        return $row;
    }
    public function getReserationById($ID_Reservation)
    {
        $this->db->query('SELECT c.ID_user,c.nbr_nuits,c.Port_dep,c.Port_Pause,c.Port_Finale,c.Date_dep,r.ID_Reservation,r.date_reservation,r.Prix_reservation FROM croisiere c ,reservation r  WHERE  `ID_reservation`=:ID_Reservation && r.ID_croisiere=c.ID_croisiere;');
        $this->db->bind(':ID_Reservation', $ID_Reservation);
        $row = $this->db->single();
        return $row;
    }
   
    public function updateCroisiere($data)
    {
        $this->db->query(' UPDATE `croisiere` SET `ID_navire`= :ID_navire,`prix_croisiere`= :prix_croisiere,`Image`=:Image,`nbr_nuits`=:nbr_nuits,`Port_dep`=:Port_dep ,`Port_Finale`=:Port_Finale,`Port_Pause`=:Port_Pause,`Date_dep`=:Date_dep  WHERE `ID_croisiere`= :ID_croisiere');
        $this->db->bind(':ID_navire', $data['ID_navire']);
        $this->db->bind(':prix_croisiere', $data['prix_croisiere']);
        $this->db->bind(':Image', $data['Image']);
        $this->db->bind(':nbr_nuits', $data['nbr_nuits']);
        $this->db->bind(':Port_dep', $data['Port_dep']);
        $this->db->bind(':Port_Finale', $data['Port_Finale']);
        $this->db->bind(':Port_Pause', $data['Port_Pause']);
        $this->db->bind(':Date_dep', $data['Date_dep']);



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
    public function updatePorts($data)
    {
        $this->db->query(' UPDATE `port` SET `Nom_port`= :Nom_port,`Pays`= :Pays,`image`= :image  WHERE `ID_port`= :ID_port');
        $this->db->bind(':Nom_port', $data['Nom_port']);
        $this->db->bind(':Pays', $data['Pays']);
        $this->db->bind(':image', $data['image']);
      
        //   execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
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
  

    //  // Reservation

    //  public function getReservationById($ID_Reservation)
    //  {
    //      $this->db->query('SELECT * FROM `reservation` WHERE ID_reservation = :ID_Reservation');
    //      $this->db->bind(':ID_Reservation', $ID_Reservation);
    //      $row = $this->db->single();
    //      return $row;
    //  }
}
