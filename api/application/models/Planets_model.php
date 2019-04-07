<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
*
* Classe Planets_model
* Acesso ao banco de dados para consultar os dados dos planetas cadastrados
*
* @table_name = planets
*
* id = int
* nome = string
* clima = string
* terreno = string
* filmes = int
*
*/

class Planets_model extends CI_Model {

    public function getPlanet($id)
    {
        return $this->db->where('id', $id)->get('planets')->row_array();
    }

    public function getPlanetByName($name)
    {
        return $this->db->like('nome', $name, 'both')->get('planets')->result_array();
    }

    public function getAllPlanets()
    {
        return $this->db->get('planets')->result_array();
    }

    public function newPlanet($data)
    {
        $this->db->insert('planets', $data);
        $insertId = $this->db->insert_id();
        return $this->getPlanet($insertId);
    }

    public function updatePlanet($id, $data)
    {
        $this->db->where('id', $id)->update('planets', $data);
        return $this->getPlanet($id);
    }

    public function deletePlanet($id)
    {
        return $this->db->delete('planets', array('id' => $id));
    }

}