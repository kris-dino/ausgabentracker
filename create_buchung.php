<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
    header('Location: login.php');
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Ausgabentracker</title>
    <link href="style.css" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<?php
// Importiert die Navigation
include "navigation.php";
?>
<header>
    <h2><a href="logout.php" class="btn logout-btn">Abmelden</a></h2>
</header>
<div class="wrapper">
    <main>
        <h1>Buchung hinzufügen</h1>
        <?php
        //Verbindung zur Datenbank
        include "connect.inc.php";

        if (isset($_POST['submit'])) {
            $datum = date('YYYY-MM-DD', strtotime($_POST['datum']));
            $betrag = $_POST['betrag'];
            $katid = $_POST['katid'];
            $verwendung = $_POST['verwendung'];


            $query = "INSERT INTO moneydb (datum, betrag, katid, verwendung)
	                        VALUES ('$datum', '$betrag', '$katid';'$verwendung')";

            $statement = $pdo->prepare($query);
            if ($statement->execute()) {
                echo "<div class='alert alert-success'>Neue Buchung erstellt.</div>";
            } else {
                echo "<div class='alert alert-danger'>Buchung konnte nicht erstellt werden.</div>";
            }

            $pdo = null;
        }
        ?>
        <form action="create_buchung.php" method="post">
            <fieldset>
                <ul>
                    <li>
                        <label for="datum">Datum</label>
                        <input type="date" name="datum" id="datum" placeholder="datum">
                    </li>
                    <li>
                        <label for="betrag">Betrag in €</label>
                        <input type="text" name="betrag" id="betrag" placeholder="€">
                    </li>
                    <li>
                        <label for="katid">Kategorie</label>

                        <select name="kategorie" id="kategorie">
                            <option>Kategorie auswählen</option>
                            <?php
                            include "connect.inc.php";
                            $query = "SELECT name FROM kategoriedb";
                            $statement = $pdo->prepare($query);
                            $statement->execute();

                            $row = $statement->fetchAll(PDO::FETCH_COLUMN);

                            foreach ($row as $name){
                                echo "<option value=$name>$name</option>";
                            }
                            ?>
                        </select>
                    </li>
                    <li>
                        <label for="verwendung">Verwendungszweck</label>
                        <textarea name="verwendung" id="verwendung" placeholder="Verwendungszweck" required></textarea>
                    </li>
                    <input type="submit" name="submit" value="submit" class="btn submit-btn">
                </ul>
            </fieldset>

    </main>

</div>
</body>
</html>