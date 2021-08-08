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
        <h1>Kategorie hinzufügen</h1>
        <?php
        //Verbindung zur Datenbank
        include 'connect.inc.php';

        if (isset($_POST['submit']))
        {
            $name = $_POST['name'];

            $query = "INSERT INTO kategoriedb (name) VALUES ('$name')";

            $statement = $pdo->prepare($query);
            if($statement->execute()) {
                echo "<div class='alert alert-success'>Kategorie wurde erstellt.</div>" ;
            } else {
                echo "<div class='alert alert-danger'>Kategorie konnte nicht erstellt werden.</div>";
            }

            $pdo = null;
        }
        ?>
        <form action="create_category.php" method="post">
            <fieldset>
                <ul>
                    <li>
                        <label for="name"><h2>Name</h2></label>
                        <input type=""text" name="name" id="kategorie" placeholder="Name der Kategorie" required>
                    </li>
                    <input type="submit" name="submit" value='Speichern' class="btn submit-btn">
                </ul>
            </fieldset>
        </form>
    </main>
</div>
</body>
</html>
