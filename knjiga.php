<?php

class Knjiga
{
    public $id;
    public $naziv_knjige;
    public $izdavac;
    public $pisac_id;
    public $biblioteka_id;
    public $cena;

    public function sacuvajKnjigu($id, $naziv, $izdavac, $pisac_id, $biblioteka_id, $cena)
    {
        require 'conn.php';
        $upit = "insert into knjiga values (NULL, '$naziv', '$izdavac', '$pisac_id', '$biblioteka_id', '$cena')";
        return $connection->query($upit);
    }
}
