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
        $this->db->query('SELECT * FROM `croisiere`');

        $results = $this->db->resultSet();

        return $results;
    }

    public function getnavirinfo(){
        $this->db->query('SELECT n.Nom_navire, n.nbr_chambre,n.nbr_voyageur FROM navire as n , croisiere as c where c.ID_navire=n.ID_navire;');
        $results = $this->db->resultSet();
        return $results;
    }
    // public function getnavirinfo(){
    //     $this->db->query('SELECT c.ID_navire,n.ID_navire,n.Nom_navire,n.nbr_chambre,n.nbr_voyageur,c.prix_croisiere,c.image,c.nbr_nuits,c.Port_Pause,c.Port_Finale,c.Date_dep, FROM croisiere c ,navire n WHERE n.ID_navire = c.ID_navire;');
    //     $results = $this->db->resultSet();
    //     return $results;
    // }
    public function getNavires()
    {
        $this->db->query('SELECT * FROM `navire`');
        $results = $this->db->resultSet();
        return $results;
    }
    // public function getifonav($id){

    //     $this->db->query("SELECT navire.Nom_navire,navire.nbr_chambre,navire.nbr_voyageur,croisiere.prix_croisiere,croisiere.Image,croisiere.nbr_nuits,croisiere.Port_dep,croisiere.Port_Pause,croisiere.Port_Finale,croisiere.Date_dep FROM croisiere INNER JOIN navire WHERE $id = navire.ID_navire;");
    //     $results = $this->db->resultSet();
    //     return $results;
    // }
    public function getOneNavires($id)
    {
        $this->db->query("SELECT `Nom_navire` , `nbr_chambre`, `nbr_voyageur`FROM `navire` WHERE ID_navire = $id");

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
        $this->db->query('SELECT * FROM `chambre`');
        $results = $this->db->resultSet();
        return $results;
    }
    public function getReservation()
    {
        $this->db->query('SELECT * FROM `reservation`');
        $results = $this->db->resultSet();
        return $results;
    }
    
    // add
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


   

        //   execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
    public function updateArticle($data)
    {
        $this->db->query(' UPDATE `produits` SET `name_prod`= :name_prod,`quantite`= :quantite,`prix`=:prix,`image`=:imge WHERE `id_prod`= :id_prod');
        $this->db->bind(':id_prod', $data['id_prod']);
        $this->db->bind(':name_prod', $data['name_prod']);
        $this->db->bind(':quantite', $data['quantite']);
        $this->db->bind(':prix', $data['prix']);
        $this->db->bind(':imge', $data['image']);

        //   execute
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
    public function getCroisiereById($ID_croisiere)
    {
        $this->db->query('SELECT * FROM `croisiere` WHERE ID_croisiere = :ID_croisiere');
        $this->db->bind(':ID_croisiere', $ID_croisiere);
        $row = $this->db->single();
        return $row;
    }


    // navire
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
    public function getNavireById($ID_navire)
    {
        $this->db->query('SELECT * FROM `navire` WHERE ID_navire = :ID_navire');
        $this->db->bind(':ID_navire', $ID_navire);
        $row = $this->db->single();
        return $row;
    }


    // port
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
    public function getPortById($ID_port)
    {
        $this->db->query('SELECT * FROM `port` WHERE ID_port = :ID_port');
        $this->db->bind(':ID_port', $ID_port);
        $row = $this->db->single();
        return $row;
    }
     // Reservation
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
     public function getReservationById($ID_Reservation)
     {
         $this->db->query('SELECT * FROM `reservation` WHERE ID_reservation = :ID_Reservation');
         $this->db->bind(':ID_Reservation', $ID_Reservation);
         $row = $this->db->single();
         return $row;
     }
}
