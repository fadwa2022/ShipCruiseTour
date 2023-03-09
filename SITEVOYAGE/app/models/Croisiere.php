<?php
class Croisiere
{
    private $db;
    public function __construct()
    {
        $this->db = new Database;
    }
    // public function getCroisieres()
    // {
    //     $this->db->query('SELECT c.ID_croisiere, c.ID_navire, c.ID_user, c.prix_croisiere, c.Image, c.nbr_nuits,c.Port_dep,c.Port_Pause,c.Port_Finale,c.Date_dep,n.ID_navire,n.Nom_navire,n.nbr_chambre,n.nbr_place FROM  croisiere c ,navire n  WHERE c.ID_navire=n.ID_navire;');

    //     $results = $this->db->resultSet();
    //     return $results;
    // }
    public function getCroisieres()
    {
        $croisiere = array();
        $this->db->query('SELECT * FROM  croisiere c ,navire n  WHERE c.ID_navire=n.ID_navire;');
        $results = $this->db->resultSet();
        $this->db->query('SELECT COUNT(ID_croisiere) AS count  FROM croisiere;');
        $count=$this->db->single();
        for ($i = 0; $i < $count->count ; $i++) {
            $id=$results[$i]->ID_croisiere;
            $this->db->query("SELECT COUNT(ID_Reservation) AS reservationsp FROM reservation r WHERE r.ID_croisiere = $id ;");
           $reservations = $this->db->single();
            if ($results[$i]->nbr_chambre > $reservations->reservationsp) {
                $croisiere[]= $results[$i];
            }
        }
        return $croisiere;
    }
    public function getCroisiereByPort($Nom_port)
    {
        $this->db->query("SELECT * FROM trajetcts t , croisiere c,port p,navire n WHERE t.id_croisiere = c.ID_croisiere && t.id_port=p.ID_port && p.Nom_port LIKE '$Nom_port' && c.ID_navire=n.ID_navire");
        $results = $this->db->resultSet();
    // die(print_r($results));
        return $results;
    }
    public function getCroisiereBydate($Date_dep)
    {
        $this->db->query("SELECT c.ID_croisiere, c.ID_navire, c.ID_user, c.prix_croisiere, c.Image,c.nbr_nuits,c.Date_dep,n.ID_navire,n.Nom_navire,n.nbr_chambre,n.nbr_place FROM croisiere c ,navire n WHERE c.ID_navire=n.ID_navire && MONTH(Date_dep) = $Date_dep ");
        $results = $this->db->resultSet();

        return $results;
    }
    public function getCroisiereBynavire($nom_navire)
    {
        $this->db->query("SELECT c.ID_croisiere, c.ID_navire, c.ID_user, c.prix_croisiere, c.Image,c.nbr_nuits,c.Date_dep,n.ID_navire,n.Nom_navire,n.nbr_chambre,n.nbr_place FROM croisiere c ,navire n WHERE c.ID_navire=n.ID_navire && n.Nom_navire ='$nom_navire';");
        $results = $this->db->resultSet();

        return $results;
    }

    public function getCroisiereById($ID_croisiere)
    {
        $this->db->query('SELECT c.ID_croisiere, c.ID_navire, c.ID_user, c.prix_croisiere, c.Image, c.nbr_nuits,c.Date_dep,n.ID_navire,n.Nom_navire,n.nbr_chambre,n.nbr_place FROM croisiere c ,navire n WHERE  ID_croisiere = :ID_croisiere;');
        $this->db->bind(':ID_croisiere', $ID_croisiere);
        $row = $this->db->single();
        return $row;
    }

    public function  addCroisiere($data)
    {
        $this->db->query('INSERT INTO  croisiere(ID_user,ID_navire,prix_croisiere,Image,nbr_nuits,Date_dep) VALUES (:ID_user,:ID_navire,:prix_croisiere,:Image,:nbr_nuits,:Date_dep) ');

        $this->db->bind(':ID_user', $data['ID_user']);
        $this->db->bind(':ID_navire', $data['ID_navire']);
        $this->db->bind(':prix_croisiere', $data['prix_croisiere']);
        $this->db->bind(':Image', $data['Image']);
        $this->db->bind(':nbr_nuits', $data['nbr_nuits']);
        $this->db->bind(':Date_dep', $data['Date_dep']);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
    public function  addtrajetcts($data)
    {
        $this->db->query('INSERT INTO  trajetcts(id_croisiere,id_port) VALUES (:Croisiere,:port)');

        $this->db->bind(':Croisiere', $data['Croisiere']);
        $this->db->bind(':port', $data['port']);

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
    public function updateCroisiere($data)
    {
        $this->db->query(' UPDATE `croisiere` SET `ID_navire`= :ID_navire,`prix_croisiere`= :prix_croisiere,`Image`=:Image,`nbr_nuits`=:nbr_nuits,`Date_dep`=:Date_dep  WHERE `ID_croisiere`= :ID_croisiere');
        $this->db->bind(':ID_navire', $data['ID_navire']);
        $this->db->bind(':prix_croisiere', $data['prix_croisiere']);
        $this->db->bind(':Image', $data['Image']);
        $this->db->bind(':nbr_nuits', $data['nbr_nuits']);
        $this->db->bind(':Date_dep', $data['Date_dep']);



        //   execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
    public function getCroisierePaginated($offset, $croisierePerPage)
    {
        $this->db->query('SELECT c.ID_croisiere, c.ID_navire, c.ID_user, c.prix_croisiere, c.Image, c.nbr_nuits,c.Date_dep,n.ID_navire,n.Nom_navire,n.nbr_chambre,n.nbr_place FROM  croisiere c ,navire n  WHERE c.ID_navire=n.ID_navire ORDER BY ID_croisiere LIMIT :croisierePerPage OFFSET :offset;');

        $this->db->bind(':offset', $offset);
        $this->db->bind(':croisierePerPage', $croisierePerPage);
        $results = $this->db->resultSet();
        return $results;
    }
    public function numbercroisiere()
    {
        $this->db->query('SELECT COUNT(`ID_croisiere`) AS cnt FROM croisiere;');
        $row = $this->db->single();
        return $row;
    }
    public function numberusers()
    {
        $this->db->query('SELECT COUNT(Role) AS cnt FROM user WHERE Role = 0;');
        $row = $this->db->single();
        return $row;
    }
    public function numbeport()
    {
        $this->db->query('SELECT COUNT(`ID_port`) AS cnt FROM port;');
        $row = $this->db->single();
        return $row;
    }
    public function chiffre_affaire()
    {
        $this->db->query('SELECT SUM(Prix_reservation) AS cnt FROM reservation;');
        $row = $this->db->single();
        return $row;
    }
}
