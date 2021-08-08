<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Ausgabentracker</title>
    <link href="style.css" rel="stylesheet"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <?php
    include "connect.inc.php";
    ?>
</head>
<body>
<?php
// Importiert die Navigation
include "navigation.php";

include "connect.inc.php";
?>
<header>
    <h2><a href="logout.php" class="btn logout-btn">Abmelden</a></h2>
</header>
<div class="wrapper">
    <main>
        <h1>hinzugefügte Buchungen</h1>
        <?php
            $query = "SELECT moneydb.userid, moneydb.buchungid, moneydb.datum, moneydb.betrag, moneydb.katid, moneydb.verwendung, kategoriedb.katnr, kategoriedb.name 
FROM moneydb, kategoriedb 
WHERE moneydb.katid = kategoriedb.katnr
ORDER BY moneydb.buchungid";
            $statement = $pdo->prepare($query);
            $statement->execute();

            $num = $statement->rowCount();

            if ($num >= 0) {
                //Kopfzeile
                echo"<table>";
                echo "<tr>";
                echo "<th><a href='create_buchung.php' class='btn'><i class='fa fa-plus'></i></a></th>";
                echo "<th>Datum</th>";
                echo "<th>Betrag in €</th>";
                echo "<th>Kategorie</th>";
                echo "<th>Verwendung</th>";
                echo "</tr>";

                //Buchungen
                while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
                extract($row);

                //neues Feld pro Eintrag
                echo "<tr>";
                echo "<td></td>";
                echo "<td>{$datum}</td>";
                echo "<td>{$betrag}</td>";
                echo "<td>{$name}</td>";
                echo "<td>{$verwendung}</td>";
                echo "</tr>";
                }
            }
            echo "</table>";
            ?>
    </main>
</div>
</html>


