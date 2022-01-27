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

    public function izmeniKnjigu($id, $naziv, $izdavac, $pisac_id, $biblioteka_id, $cena)
    {
        include 'conn.php';
        $upit = "update knjiga set naziv_knjige='" . $naziv . "', izdavac='" . $izdavac . "', pisac_id='" . $pisac_id . "', biblioteka_id='" . $biblioteka_id . "', cena='" . $cena . "' where id=" . $id;
        return $connection->query($upit);
    }
}
