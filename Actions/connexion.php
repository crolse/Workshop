<?php
session_start();
$email = filter_input(INPUT_POST, "email");
$mdp = filter_input(INPUT_POST, "mdp");


require_once '../Config/config.php';
$db = new PDO(
    "mysql:host=" . Config::SERVEUR . ";dbname=" . Config::BASE . "",
    Config::USER,
    Config::MDP
);

$r = $db->prepare("SELECT *
    FROM personnes
    WHERE emailPersonnes = :email AND mdpPersonnes = :mdp");

$r->bindParam(":email", $email);
$r->bindParam(":mdp", $mdp);


$r->execute();



$userexist = $r->rowCount();

if ($userexist == 1) {
    $userinfo = $r->fetch();
    $_SESSION['idPersonnes'] = $userinfo['idPersonnes'];
    $_SESSION['nom'] = $userinfo['nomPersonnes'];
    $_SESSION['prenom'] = $userinfo['prenomPersonnes'];
    $_SESSION['idRole'] = $userinfo['idRole'];
    $_SESSION['email'] = $userinfo['emailPersonnes'];
    if ($userinfo['idRole'] == 1) {

        header("Location: ../vues/admin.php");
    } elseif ($userinfo['idRole'] == 2) {
        header("Location: ../vues/moderateur.php");
    } elseif ($userinfo['idRole'] == 3) {
        header("Location: ../vues/testcopy.php");
    }
} else {
    header("Location: ../connexion.php");
}
