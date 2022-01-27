<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Knjige - Autori - Biblioteke</title>
</head>

<body>

    <?php
    require 'nav.php';
    ?>


    <div class="main">

        <div id="pocetna-div">
            <?php

            $upit = "select knjiga.naziv_knjige, knjiga.izdavac, knjiga.cena, pisac.ime, pisac.prezime, biblioteka.naziv from knjiga join pisac on knjiga.pisac_id=pisac.id join biblioteka on knjiga.biblioteka_id=biblioteka.id";
            require 'conn.php';
            $rez = $connection->query($upit);
            while ($knjiga = mysqli_fetch_array($rez)) {
            ?>

                <div class="card text-center" id="knjiga-pocetna">
                    <div class="card-body">
                        <h3 class="card-title"><?php echo $knjiga['naziv_knjige']; ?></h3>
                        <h6 class="card-subtitle mb-2 text-muted">Pisac: <?php echo $knjiga['ime'] . " " . $knjiga['prezime']; ?></h6>
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ0zazkmTg7YrGKuV63JK-UKIKVcsRpvAWceA&usqp=CAU" id="slika_knjige">
                        <p class="card-text text-muted">Biblioteka: <?php echo $knjiga['naziv'] ?></p>
                        <h4 class="card-subtitle mb-2">Cena: <?php echo $knjiga['cena'] ?> RSD</h4>
                        <div id="dugmici">
                            <a href="#" class="card-link"><button class="btn btn-warning dgm">Izmeni</button></a>
                            <a href="#" class="card-link"><button class="btn btn-success dgm">Obriši</button></a>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>

    </div>

</body>

</html>