<?php
class Type
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

}
