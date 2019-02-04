<html>
<head>
<meta charset="utf-8">
<title>Dodaj</title>
</head>


<body>

<?php
require("./logowanie.php");
$sql="SET NAMES 'utf8' COLLATE 'utf8_polish_ci'";
$result = $conn->query($sql);

$sql = "insert into Magazyn (ilosc)
values ('".$_POST["magazyn"]."')";
$result = $conn->query($sql);

$sql = "insert into Autor (imieNazwisko)
values ('".$_POST["autor"]."')";
$result = $conn->query($sql);

$sql = "insert into Ksiazka (nazwa,cena)
values ('".$_POST["nazwa"]."','".$_POST["cena"]."')";
$result = $conn->query($sql);

$sql = "update Ksiazka
join Magazyn
on Ksiazka.idKsiazki=Magazyn.idMagazynu
set Ksiazka.magazyn=Magazyn.idMagazynu
where Ksiazka.nazwa='".$_POST['nazwa']."'";
$result = $conn->query($sql);

$sql = "update Ksiazka
join Autor
on Ksiazka.idKsiazki=Autor.idAutora
set Ksiazka.autor=Autor.idAutora
where Ksiazka.nazwa='".$_POST['nazwa']."'";
$result = $conn->query($sql);

$conn->close();
?>

<div class="addItem">
      <p>Dodano nowy przedmiot</p>
      <a href="admin.php">Powrot</a>


</div>

<body>
