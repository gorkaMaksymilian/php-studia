<html>
<head>
<meta charset="utf-8">
<title>Dodaj</title>
</head>


<body>

      <?php
            require("./logowanie.php");
            $sql = "SET NAMES 'utf8' COLLATE 'utf8_polish_ci'";
            $result = $conn->query($sql);

            $sql = " select idKsiazki from Ksiazka where nazwa='".$_POST['nazwa']."'";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);
            $bookID=$row['idKsiazki'];

            $sql = " select Ksiazka.idKsiazki,Magazyn.ilosc
            from Ksiazka
            join Magazyn
            on Ksiazka.magazyn=Magazyn.idMagazynu
            where Ksiazka.idKsiazki=".$bookID."";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);
            $sub=$row['ilosc']+$_POST['ile'];

            $sql =  "update Magazyn
            join Ksiazka
            on Magazyn.idMagazynu=Ksiazka.idKsiazki
            set Magazyn.ilosc=".$sub."
            where Ksiazka.idKsiazki='".$bookID."'";
            $result = $conn->query($sql);

            $conn->close();
      ?>

<div class="addItem">
      <p>Dodano do magazynu</p>
      <a href="admin.php">Powrot</a>


</div>

<body>
