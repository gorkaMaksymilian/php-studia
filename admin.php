<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="mystyle.css">
<title>Admin</title>
</head>


<body>
<div class="listItems">
      <p>Dostępne pozycje</p>
      <table>
            <tbody>
                  <tr>
                        <th>ID</th>
                        <th>Tytul</th>
                        <th>Autor</th>
                        <th>Cena</th>
                        <th>Dostępna ilość</th>
                  </tr>
                  <?php
                        require("./logowanie.php");

                        $sql = " select Ksiazka.idKsiazki,Ksiazka.nazwa,Autor.imieNazwisko,Ksiazka.cena, Magazyn.ilosc
                        from Ksiazka
                        join Autor
                        on Ksiazka.autor=Autor.idAutora
                        join Magazyn
                        on Ksiazka.magazyn=Magazyn.idMagazynu;
                        ";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                                echo "<tr><td>".$row["idKsiazki"]."</td><td>" .$row["nazwa"]."</td>"."<td>" .$row["imieNazwisko"]."</td>"."<td>" .$row["cena"]."</td>"."<td>" .$row["ilosc"]."</td></tr>";
                            }
                        } else {
                            echo "0 results";
                        }
                        $conn->close();
                  ?>
            </tbody>
      </table>
</div>


<div class="addItemToStore">
      <p>Dodaj do magazynu</p>
      <form action="addStore.php" method="post">
            <select name="nazwa">
      <?php
      require("./logowanie.php");

      $sql = " select nazwa from Ksiazka;";
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          while($row = $result->fetch_assoc()) {
              echo "<option>".$row["nazwa"]."</option>";
           }
      } else {
          echo "0 results";
      }
      $conn->close();
      ?>
            </select>
            <input type="text" name="ile" required min="1" placeholder="Podaj ilosc ktora ma trafic do magazynu">
            <input type="submit">
      </form>
</div>

<div class="addItem">
      <p>Dodaj nową pozycję</p>
      <form action="dodaj.php" method="post">
            <input type="text" name="nazwa" placeholder="Podaj tytul dziela" required>
            <input type="text" name="autor" placeholder="Podaj autora" required>
            <input type="number" name="cena" placeholder="Podaj cene" required min="1">
            <input type="number" name="magazyn" placeholder="Podaj ilosc jaka dodac" required min="0">
            <input type="submit">
      </form>
</div>

<div class="removeItem">
      <p>Usuń pozycję</p>
      <form action="usun.php" method="post">
            <select name="nazwa">
      <?php
      require("./logowanie.php");

      $sql = " select nazwa from Ksiazka;";
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          while($row = $result->fetch_assoc()) {
              echo "<option>".$row["nazwa"]."</option>";
           }
      } else {
          echo "0 results";
      }
      $conn->close();
      ?>
            </select>
            <input type="submit">
      </form>
</div>

<div class="listItems">
      <p>Dane klientow</p>
      <table>
            <tbody>
                  <tr>
                        <th>ID</th>
                        <th>Imie</th>
                        <th>Nazwisko</th>
                        <th>Adres</th>
                        <th>Telefon</th>
                  </tr>
                  <?php
                        require("./logowanie.php");

                        $sql = " select * from Klient";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                                echo "<tr><td>".$row["idKlienta"]."</td><td>" .$row["imie"]."</td>"."<td>" .$row["nazwisko"]."</td>"."<td>" .$row["adres"]."</td>"."<td>" .$row["telefon"]."</td></tr>";
                            }
                        } else {
                            echo "0 results";
                        }
                        $conn->close();
                  ?>
            </tbody>
      </table>
</div>

<div class="listItems">
      <p>Oczekujące zamowienia</p>
      <table>
            <tbody>
                  <tr>
                        <th>ID</th>
                        <th>Zamawiana pozycja</th>
                        <th>Imie klienta</th>
                        <th>Nazwisko klienta</th>
                        <th>Ilosc towaru</th>
                        <th>Status zamowienia</th>
                  </tr>
                  <?php
                        require("./logowanie.php");

                        $sql = " select Zamowienie.idZamowienia, Ksiazka.nazwa, Klient.imie, Klient.nazwisko, Zamowienie.ile, Zamowienie.realizacja
                        from Zamowienie
                        join Ksiazka
                        on Zamowienie.ksiazka=Ksiazka.idKsiazki
                        join Klient
                        on Zamowienie.klient=Klient.idKlienta;
                        ";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                                echo "<tr><td>".$row["idZamowienia"]."</td><td>" .$row["nazwa"]."</td>"."<td>" .$row["imie"].
                                "</td>"."<td>" .$row["nazwisko"]."</td>"."<td>" .$row["ile"]."</td>"."<td>" .$row["realizacja"]."</td></tr>";
                            }
                        } else {
                            echo "0 results";
                        }
                        $conn->close();
                  ?>
            </tbody>
      </table>
</div>

<div class="removeItem">
      <p>Zmien status zamowienia</p>
      <form action="changeStatus.php" method="post">
            <select name="idZamowienia">
            <?php
                  require("./logowanie.php");

                  $sql = " select idZamowienia from Zamowienie;";
                  $result = $conn->query($sql);

                  if ($result->num_rows > 0) {
                      while($row = $result->fetch_assoc()) {
                          echo "<option>".$row["idZamowienia"]."</option>";
                       }
                  } else {
                      echo "0 results";
                  }
                  $conn->close();
            ?>
            </select>
            <select name="someText">
                  <option>Oczekiwanie na przyjecie</option>
                  <option>Anulowane</option>
                  <option>Oplacone</option>
                  <option>Wyslane</option>
            </select>
            <input type="submit">
      </form>
</div>

<body>
