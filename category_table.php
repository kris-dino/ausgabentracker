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
        <table>
            <th><h1>erstellte Kategorien</h1></th>
            <th><a href='create_category.php' class='btn'><i class='fa fa-plus'></i></a></th>


        <?php
        // Importiert die Navigation
        include "navigation.php";

        $action = isset($_GET['action']) ? $_GET['action'] : "";

        // Wenn delete_category.php ausgeführt wurde
        if($action=='deleted'){
            echo "<div class='alert alert-success'>Kategorie wurde gelöscht.</div>";
        }

        $query = "SELECT * FROM kategoriedb";
        $statement = $pdo->prepare($query);
        $statement->execute();

        $num = $statement->rowCount();

        if ($num >= 0) {
            while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
                extract($row);

                //Tabelle
                //neues Feld pro Eintrag
                echo "<tr>";
                echo "<td>{$name}</td>";
                echo "<td>";

            }
        }
        echo "</table>";
        ?>
    </main>
</div>
</html>

