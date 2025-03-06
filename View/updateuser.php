<?php
require_once '../Controller/UserController.php';

if (!isset($_GET['id']) || empty($_GET['id'])) {
    die("ID utilisateur non valide.");
}

$id = $_GET['id'];
var_dump($id); 

$userController = new UserController();


$user = $userController->getUserById($id);


if (!$user) {
    die("Utilisateur introuvable.");
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $updatedUser = [
        'email' => $_POST['email'],
        'pwd' => $_POST['pwd']
    ];

    $userController->updateUser($id, $updatedUser);
    
   
    header("Location: ListUsers.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier Utilisateur</title>
</head>
<body>
    <h2>Modifier l'utilisateur</h2>

    <!-- Formulaire de modification -->
    <form method="POST" action="updateuser.php?id=<?php echo $id; ?>">
        <label>Email:</label>
        <input type="email" name="email" value="<?php echo htmlspecialchars($user['email']); ?>" required>
        <br>
        <label>Mot de passe:</label>
        <input type="password" name="pwd" value="<?php echo htmlspecialchars($user['pwd']); ?>" required>
        <br>
        <button type="submit">Modifier</button>
    </form>

    <!-- Lien pour annuler -->
    <a href="listuser.php">Annuler</a>
</body>
</html>
