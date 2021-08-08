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
        <?php
        $katnr = isset($_GET['id']) ? $_GET['id'] : die('ERROR: Record ID not found.');

        //Verbindung zur Datenbank
        include 'connect.inc.php';

        // Aktuelle Daten auslesen
        try {
            $query = "SELECT katnr, name FROM kategoriedb WHERE katnr = ? LIMIT 0,1";
            $statement = $pdo->prepare($query);

            $statement->bindParam(1, $nr);

            $statement->execute();

            $row = $statement->fetch(PDO::FETCH_ASSOC);

            $katnr = $row['katnr'];
            $name = $row['name'];
        } catch (PDOException $exception) {
            die('ERROR: ' . $exception->getMessage());
        }
        ?>
        <?php
        // Überprüfen, ob das Formular gespeichert wurde
        if ($_POST) {
            try {
                $query = "UPDATE kategoriedb
                    SET katnr=:katnr, name=:name, 
                    WHERE katnr = :id";

                $statement = $pdo->prepare($query);

                $katnr = htmlspecialchars(strip_tags($_POST['katnr']));
                $name = htmlspecialchars(strip_tags($_POST['name']));

                $statement->bindParam(':katnr', $katnr);
                $statement->bindParam(':name', $name);
                //$statement->bindParam(':id', $nr);

                if ($statement->execute()) {
                    echo "<div class='alert alert-success'>Update erfolgreich</div>";
                } else {
                    echo "<div class='alert alert-danger'>Etwas ist schief gelaufen. Bitte versuche es noch einmal.</div>";
                }
            } catch (PDOException $exception) {
                die('ERROR: ' . $exception->getMessage());
            }
        }
        ?>

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"] . "?id={$nr}"); ?>" method="post">
            <fieldset>
                <ul>
                    <li>
                        <label for="name">Name</label>
                        <input type='text' name='name'
                               value="<?php echo htmlspecialchars($nname, ENT_QUOTES); ?>"/>
                    </li>
                    <input type="submit" name="submit" value="submit" class="btn submit-btn">
                </ul>
            </fieldset>
        </form>
    </main>
</div>
</body>