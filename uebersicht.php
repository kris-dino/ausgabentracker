<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Ausgabentracker</title>
    <link href="style.css" rel="stylesheet" type="text/css"/>
</head>
<body>
<?php
// Importiert die Navigation
include "navigation.php";

//Verbindung zur Datenbank
include "connect.inc.php";

//Tabelle abrufen
$sql = "SELECT * FROM moneydb";
foreach ($pdo->query($sql) as $row) {
    echo $row['datum']." ".$row['betrag']."<br />";
    echo "
     
     ".$row['email']."<br /><br />";
}


//Verbindung zur Datenbank fertig
$pdo = null;
?>