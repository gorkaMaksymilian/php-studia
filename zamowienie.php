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
      echo "<p>Wybrales pozycje o nazwie: ".$_POST["nazwa"]."</p>";


      $conn->close();


?>

<div class="sendRequest">
      <form action="request.php" method="post">
            <?php
                  require("./logowanie.php");
                  echo '<input type="hidden" name="nazwa" value="'.$_POST['nazwa'].'">';
                  $sql = " select idKsiazki from Ksiazka where nazwa='".$_POST['nazwa']."'";
                  $result = mysqli_query($conn, $sql);
                  $row = mysqli_fetch_assoc($result);
                  echo '<input type="hidden" name="idKsiazki" value="'.$row['idKsiazki'].'">';


                  $sql = " select ilosc from Magazyn where idMagazynu=".$row['idKsiazki']."";
                  $result = mysqli_query($conn, $sql);
                  $number = mysqli_fetch_assoc($result);

                  echo '<input type="number" name="ile" placeholder="Podaj ile sztuk chcesz zamowic" required min="1" max="'.$number['ilosc'].'">';

                  $conn->close();


            ?>

            <input type="text" name="imie" placeholder="Podaj swoje imie" required>
            <input type="text" name="nazwisko" placeholder="Podaj swoje nazwisko" required>
            <input type="text" name="adres" placeholder="Podaj swoj adres" required>
            <input type="text" name="telefon" placeholder="Podaj swoj telefon" required>
            <input type="submit">
      </form>
</div>

</body>
