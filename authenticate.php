<?php
if (!empty($_POST['username']) && !empty($_POST['password'])) {
    include "connect.inc.php";
    $username = $_POST['username'];

    $statement = $pdo->prepare('SELECT * FROM accountsdb WHERE username = ?');
    $statement->bindParam(1, $username);
    $statement->execute();
    $row = $statement->fetch(PDO::FETCH_ASSOC);
    $password = $row['password'];

    if ($_POST['password'] === $password) {
        session_start();
        $_SESSION['loggedin'] = TRUE;
        $_SESSION['name'] = $_POST['username'];
        $_SESSION['id'] = $userid;
        header('Location: index.php');
    } else {
        header('Location: relogin.php');
    }
} else {
    header('Location: login.php');
}
?>