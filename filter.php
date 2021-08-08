<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Ausgabentracker</title>
    <link href="style.css" rel="stylesheet"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <?php
    include "connect.inc.php";
    ?>
</head>
<body>
<header>
    <h2><a href="logout.php" class="btn logout-btn">Abmelden</a></h2>
</header>
<div class="wrapper">
    <main>
        <?php
        //Verbindung zur Datenbank
        include "connect.inc.php";

        include"navigation.php";

        if (isset($_GET['name'])) {

            $name = $_GET['name'];

            $query = "SELECT * FROM kategoriedb (name) VALUES ('$name')";

            $statement = $pdo->prepare($query);
            $statement->execute();

            $num = $statement->rowCount();

            if ($num >= 0) {
                //Kopfzeile
                echo"<table>";
                echo "<tr>";
                echo "<th><a href='create_buchung.php' class='btn'><i class='fa fa-plus'></i></a></th>";
                echo "<th>Datum</th>";
                echo "<th>Betrag</th>";
                echo "<th>Kategorie</th>";
                echo "<th>Verwendung</th>";
                echo "</tr>";

                //Buchungen
                while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
                    extract($row);

                    //neues Feld pro Eintrag
                    echo "<tr>";
                    echo "<td>{$datum}</td>";
                    echo "<td>{$betrag}</td>";
                    echo "<td>{$katid}</td>";
                    echo "<td>{$verwendung}</td>";
                    echo "</tr>";
                }
            }
            echo "</table>";

            $pdo = null;
        }
        ?>
       <h1>Buchungen filtern</h1>
        <h2>nach Datum</h2>

        <h2>nach Kategorie</h2>
        <form action="filter.php" method="get">
            <fieldset>
                <ul>
                    <label for="katid">Kategorie</label>
                    <li>
                    <select name="kategorie" id="kategorie">
                        <option>Kategorie eingeben</option>
                        <?php
                        include "connect.inc.php";
                        $query = "SELECT name FROM kategoriedb";
                        $statement = $pdo->prepare($query);
                        $statement->execute();

                        $row = $statement->fetchAll(PDO::FETCH_COLUMN);

                        foreach ($row as $kategoriename){
                            echo "<option value=$kategoriename>$kategoriename</option>";
                        }
                        ?>
                        </li>
                    <input type="submit" name="submit" value="submit" class="btn submit-btn">
                </ul>
            </fieldset>
            <label for=""></label>
    </main>
</div>
</html>
