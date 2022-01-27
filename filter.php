  <div id="pocetna-div">
      <?php

        $kolona_za_sortiranje = $_POST['keyNazivCena'];
        $sortiranje = $_POST['keySortiranje'];

        require 'conn.php';

        $upit = "select knjiga.id, knjiga.naziv_knjige, knjiga.izdavac, knjiga.cena, pisac.ime, pisac.prezime, biblioteka.naziv from knjiga join pisac on knjiga.pisac_id=pisac.id join biblioteka on knjiga.biblioteka_id=biblioteka.id order by " . $kolona_za_sortiranje . " " . $sortiranje;
        $rezultat = $connection->query($upit);

        while ($knjiga = mysqli_fetch_array($rezultat)) {
        ?>

          <div class="card text-center" id="knjiga-pocetna">
              <div class="card-body">
                  <h3 class="card-title"><?php echo $knjiga['naziv_knjige']; ?></h3>
                  <h6 class="card-subtitle mb-2 text-muted">Pisac: <?php echo $knjiga['ime'] . " " . $knjiga['prezime']; ?></h6>
                  <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ0zazkmTg7YrGKuV63JK-UKIKVcsRpvAWceA&usqp=CAU" id="slika_knjige">
                  <p class="card-text text-muted">Biblioteka: <?php echo $knjiga['naziv'] ?></p>
                  <h4 class="card-subtitle mb-2">Cena: <?php echo $knjiga['cena'] ?> RSD</h4>
                  <div id="dugmici">
                      <a href="formaIzmena.php?id=<?php echo $knjiga['id']; ?>" class="card-link"><button class="btn btn-warning dgm">Izmeni</button></a>
                      <a href="obrisiKnjigu.php?id=<?php echo $knjiga['id']; ?>" class="card-link"><button class="btn btn-success dgm">Obriši</button></a>
                  </div>
              </div>
          </div>
      <?php } ?>
  </div>