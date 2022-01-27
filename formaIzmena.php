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
    include 'conn.php';
    require 'knjiga.php';
    require 'nav.php';

    $upit = "select * from knjiga where id=" . $_GET['id'];

    $rez = $connection->query($upit);
    $knjiga = mysqli_fetch_array($rez);

    ?>

    <form method="post" id="formaIzmena" class="text-center">

        <div class="mb-3">
            <label class="form-label">Naziv knjige</label>
            <input type="text" class="form-control" name="naziv_knjige" value="<?php echo $knjiga['naziv_knjige']; ?>">
        </div>

        <div class="mb-3">
            <label class="form-label">Izdavač</label>
            <input type="text" class="form-control" name="izdavac" value="<?php echo $knjiga['izdavac']; ?>">
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
            <input type="number" class="form-control" name="cena" value="<?php echo $knjiga['cena']; ?>">
        </div>

        <button type="submit" name="izmeniKnjigu" class="btn btn-primary">Sačuvaj</button>
    </form>

    <?php
    if (isset($_POST['izmeniKnjigu'])) {

        $knjiga = new Knjiga();
        if ($knjiga->izmeniKnjigu($_GET['id'], $_POST['naziv_knjige'], $_POST['izdavac'], $_POST['pisac'], $_POST['biblioteka'], $_POST['cena'])) {
            echo "<script type='text/javascript'>alert('Knjiga je uspešno izmenjena!'); location='index.php'</script>";
        } else {
            echo "<script type='text/javascript'>alert('Došlo je do greške!');'</script>";
        }
    }

    ?>


</body>

</html>