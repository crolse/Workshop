<?php
session_start();
$nom = filter_input(INPUT_POST, "nom");
$prenom = filter_input(INPUT_POST, "prenom");
$email = filter_input(INPUT_POST, "email");
$mdp = $mdp = sha1($_POST['mdp']); //filter_input(INPUT_POST, "mdp");
$role = 3;

require_once '../Config/config.php';
$db = new PDO(
    "mysql:host=" . Config::SERVEUR . ";dbname=" . Config::BASE . "",
    Config::USER,
    Config::MDP
);


$r = $db->prepare("insert into personnes (idPersonnes ,nomPersonnes,prenomPersonnes,emailPersonnes,mdpPersonnes,idRole)"
    . "values (:id,:nom,:prenom,:email,:mdp,:role)");

$r->bindParam(":id", $id);
$r->bindParam(":nom", $nom);
$r->bindParam(":prenom", $prenom);
$r->bindParam(":email", $email);
$r->bindParam(":mdp", $mdp);
$r->bindParam(":role", $role);


$r->execute();

header("Location: ../connexion.php");
