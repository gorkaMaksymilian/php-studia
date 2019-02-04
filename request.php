<!doctype html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="mystyle.css">
<title>Klient</title>
</head>


<body>
     <?php
            require("./logowanie.php");
            $sql="SET NAMES 'utf8' COLLATE 'utf8_polish_ci'";
            $result = $conn->query($sql);

            $sql = "insert into Klient (imie,nazwisko,adres,telefon)
            values ('".$_POST["imie"]."','".$_POST['nazwisko']."','".$_POST['adres']."','"
            .$_POST['telefon']."')";
            $result = $conn->query($sql);

            $sql = "insert into Zamowienie (ksiazka,ile)
            values ('".$_POST["idKsiazki"]."','".$_POST['ile']."')";
            $result = $conn->query($sql);

            $sql = "update Zamowienie
            join Klient
            on Zamowienie.idZamowienia=Klient.idKlienta
            set Zamowienie.klient=Klient.idKlienta
            where Zamowienie.ksiazka='".$_POST['idKsiazki']."'";
            $result = $conn->query($sql);

            $sql = "update Zamowienie
            set Zamowienie.realizacja='Oczekiwanie na przyjecie'
            where realizacja is null";
            $result = $conn->query($sql);

            $sql = " select Ksiazka.idKsiazki,Magazyn.ilosc
            from Ksiazka
            join Magazyn
            on Ksiazka.magazyn=Magazyn.idMagazynu
            where Ksiazka.idKsiazki=".$_POST['idKsiazki']."";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);
            $sub=$row['ilosc']-$_POST['ile'];

            $sql =  "update Magazyn
            join Ksiazka
            on Magazyn.idMagazynu=Ksiazka.idKsiazki
            set Magazyn.ilosc=".$sub."
            where Ksiazka.idKsiazki='".$_POST['idKsiazki']."'";
            $result = $conn->query($sql);




            $conn->close();
      ?>

      <div class="show">
            <p>Dziękujemy za zlozenie zamowienia</p>
            <a href="klient.php">Powrot</a>
      </div>

</body>
