<?php
session_start();
$nom = filter_input(INPUT_POST, "nom");
$prenom = filter_input(INPUT_POST, "prenom");
$email = filter_input(INPUT_POST, "statut");
$mdp = filter_input(INPUT_POST, "operateur");
$role = 3 ;

require_once '../Config/config.php';
$db = new PDO("mysql:host=".Config::SERVEUR.";dbname=".Config::BASE.""
        , Config::USER, Config::MDP);


$r = $db->prepare("insert into personnes (idPersonnes ,nomPersonnes,prenomPersonnes,emailPersonnes,mdpPersonnes,idRole)"
        . "values (:id,:nom,:prenom,:email,:mdp,:role)");

$r->bindParam(":id",$id);
$r->bindParam(":nom",$nom);
$r->bindParam(":prenom",$prenom);
$r->bindParam(":email",$email);
$r->bindParam(":mdp",$mdp);
$r->bindParam(":role",$role);


$r->execute();


echo $nom ;
echo $prenom ;
echo $email ; 
echo $mdp ;
echo $role ;







 
