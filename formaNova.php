<form method="post" id="formaNova" class="text-center">

    <div class="mb-3">
        <label class="form-label">Naziv knjige</label>
        <input type="text" class="form-control" name="naziv_knjige">
    </div>

    <div class="mb-3">
        <label class="form-label">Izdavač</label>
        <input type="text" class="form-control" name="izdavac">
    </div>


    <div class="form-group mb-3">
        <label class="form-label">Pisac</label>
        <select class="form-select" name="pisac">
            <?php
            require 'conn.php';
            $upit = "select * from pisac";

            $rez = $connection->query($upit);

            while ($pisac = mysqli_fetch_array($rez)) :
            ?>
                <option class="text-center" value="<?php echo $pisac['id']; ?>"><?php echo $pisac['ime'] . " " . $pisac['prezime']; ?></option>
            <?php endwhile; ?>
        </select>
    </div>

    <div class="form-group mb-3">
        <label class="form-label">Biblioteka</label>
        <select class="form-select" name="biblioteka">
            <?php
            $upit2 = "select * from biblioteka";
            $rezBiblioteka = $connection->query($upit2);

            while ($biblioteka = mysqli_fetch_array($rezBiblioteka)) :
            ?>
                <option class="text-center" value="<?php echo $biblioteka['id']; ?>"><?php echo $biblioteka['naziv'] ?></option>
            <?php endwhile; ?>
        </select>
    </div>

    <div class="mb-3">
        <label class="form-label">Cena</label>
        <input type="number" class="form-control" name="cena">
    </div>

    <button type="submit" name="dodajKnjigu" class="btn btn-primary">Sačuvaj</button>
</form>

<?php
require 'knjiga.php';

if (isset($_POST['dodajKnjigu'])) {
    $knjiga = new Knjiga();
    if ($knjiga->sacuvajKnjigu(null, $_POST['naziv_knjige'], $_POST['izdavac'], $_POST['pisac'], $_POST['biblioteka'], $_POST['cena'])) {
        echo "<script type='text/javascript'>alert('Knjiga je uspešno sačuvana u bazi!'); location='index.php'</script>";
    } else {
        echo "<script type='text/javascript'>alert('Došlo je do greške!');";
    }
}
?>