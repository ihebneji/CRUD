<?php   
require '../Config.php';

class UserController{

public function getUsers(){
 $db= config::getConnexion(); 
 $sql = "SELECT * FROM user";
  try {

$query = $db->prepare($sql);
$query ->execute();
return $query->fetchAll();


  } catch (Exception $e) {
    die('Erreur: ' . $e->getMessage());
  }
}

function addUser($user){
$db= config::getConnexion();
$req = "INSERT INTO user(email,pwd) VALUES(:email,:pwd)"    ;
try {
    $query = $db->prepare($req);
    $query ->execute ([
'email'=> $user['email'],
'pwd'=> $user['pwd']
    ]);
    
}
catch (Exception $e) {
  die('Erreur: ' . $e->getMessage());
}
}

function updateUser($id, $user) {
  $db = config::getConnexion();
  $req = "UPDATE user SET email = :email, pwd = :pwd WHERE id = :id";
  
  try {
      $query = $db->prepare($req);
      $query->execute([
          'email' => $user['email'],
          'pwd' => $user['pwd'],
          'id' => $id
      ]);
  } catch (Exception $e) {
      die('Erreur: ' . $e->getMessage());
  }
}

function deleteUser($id) {
  $db = config::getConnexion();
  $req = "DELETE FROM user WHERE id = :id";
  
  try {
      $query = $db->prepare($req);
      $query->execute(['id' => $id]);
  } catch (Exception $e) {
      die('Erreur: ' . $e->getMessage());
  }
}


}







?>