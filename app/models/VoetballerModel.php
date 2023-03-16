<?php

class VoetballerModel
{
    private $db;

    public function __construct()
    {
        $this ->db = new Database();
    }

    public function getVoetballer()
    {
        $sql = "SELECT id
                       ,Naam 
                       ,CLub
                       ,Leeftijd
                       ,Nationaliteit
                       ,Salaris
                FROM    voetballers";

        $this->db->query($sql);

        return $this->db->resultSet();
    }
}