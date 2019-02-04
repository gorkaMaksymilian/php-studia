<html>
<head>
<meta charset="utf-8">
<title>Usuń</title>
</head>


<body>
<?php
      require("./logowanie.php");
      echo $_POST["nazwa"];

      $sql = " select idKsiazki from Ksiazka where nazwa='".$_POST['nazwa']."'";
      $result = mysqli_query($conn, $sql);
      $row = mysqli_fetch_assoc($result);
      #$row['idKsiazki'];

      $sql = " delete from Ksiazka where nazwa='".$_POST['nazwa']."'";
      $result = $conn->query($sql);

      $sql = " delete from Autor where idAutora='".$row['idKsiazki']."'";
      $result = $conn->query($sql);

      $sql = " delete from Magazyn where idMagazynu='".$row['idKsiazki']."'";
      $result = $conn->query($sql);

      $conn->close();


?>





<div class="removeItem">
      <p>Usunięto wybrany przedmiot</p>
      <a href="admin.php">Powrot</a>

</div>
</body>
