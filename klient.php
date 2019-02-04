<!doctype html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="mystyle.css">
<title>Klient</title>
</head>


<body>

<div>
      <p>Nasza oferta:</p>
      <table>
            <tbody>
                  <tr>
                        <th>Tytul</th>
                        <th>Autor</th>
                        <th>Cena</th>
                        <th>Dostępna ilość</th>
                  </tr>
<?php
require("./logowanie.php");

$sql = " select Ksiazka.idKsiazki,Ksiazka.nazwa,Autor.imieNazwisko,Ksiazka.cena, Magazyn.ilosc from Ksiazka join Autor on Ksiazka.autor=Autor.idAutora join Magazyn on Ksiazka.magazyn=Magazyn.idMagazynu where Magazyn.ilosc>0;
";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" .$row["nazwa"]."</td>"."<td>" .$row["imieNazwisko"]."</td>"."<td>" .$row["cena"]."</td>"."<td>" .$row["ilosc"]."</td></tr>";
    }
} else {
    echo "0 results";
}
$conn->close();
?>
            </tbody>
      </table>
</div>


<div class="request">
      <p>Wybierz interesująca cię pozycje:</p>
      <form action="zamowienie.php" method="post">
            <select name="nazwa">
<?php
require("./logowanie.php");

$sql = " select Ksiazka.nazwa from Ksiazka join Magazyn on Ksiazka.magazyn=Magazyn.idMagazynu where Magazyn.ilosc>0;";
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



</body>
</html>
