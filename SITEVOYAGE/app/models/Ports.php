<?php
class Ports
{
    private $db;
    public function __construct()
    {
        $this->db = new Database;
    }
    public function getPorts()
    {
        $this->db->query('SELECT * FROM `port`');
        $results = $this->db->resultSet();
        return $results;
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

    public function getPortsPaginated($offset, $portPerPage){
        $this->db->query('SELECT * FROM `port` ORDER BY ID_port LIMIT :portPerPage OFFSET :offset');
        $this->db->bind(':offset', $offset);
        $this->db->bind(':portPerPage', $portPerPage);
        $results = $this->db->resultSet();
        return $results;
    }
}
