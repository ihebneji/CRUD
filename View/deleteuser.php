<?php
require_once '../Controller/UserController.php';

$userController = new UserController();

if (isset($_GET['id'])) {
    $userController->deleteUser($_GET['id']);

    // Solution 1 : Redirection correcte
    header("Location: ListUsers.php"); // Redirection vers la liste des utilisateurs après ajout
    exit();
} else {
    echo "ID utilisateur non valide.";
}
?>
