<?php

require 'conn.php';

$id_knjige_delete = $_GET['id'];
$upit = "delete from knjiga where id=" . $id_knjige_delete;
$connection->query($upit);

echo "<script type='text/javascript'>alert('Knjiga je uspešno obrisana!'); location='index.php'</script>";
