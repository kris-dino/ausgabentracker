<?php
// Verbindung zur Datenbank
include 'connect.inc.php';

try{
    // ID holen
    $katnr=isset($_GET['id']) ? $_GET['id'] : die('ERROR: Record ID not found.');

    // Löschen
    $query = "DELETE FROM kategoriedb WHERE katnr = ?";
    $statement = $pdo->prepare($query);
    $statement->bindParam(1, $katnr);
    $statement->execute();

    if($statement->execute()){
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }else{
        die('Löschen nicht möglich.');
    }

}catch(PDOException $exception){
    die('ERROR: ' . $exception->getMessage());
}

?>
