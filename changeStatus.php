<head>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="mystyle.css">
<title>Admin</title>
</head>


<body>
      <?php
            require("./logowanie.php");
            $sql="SET NAMES 'utf8' COLLATE 'utf8_polish_ci'";
            $result = $conn->query($sql);
            $sql = "update Zamowienie set realizacja='".$_POST['someText']."' where idZamowienia='".$_POST['idZamowienia']."'";
            $result = $conn->query($sql);




      ?>

      <div class="return">
            <p>Zmieniono status pomyślnie</p>
            <a href="admin.php">Powrot</a>


      </div>

</body>
