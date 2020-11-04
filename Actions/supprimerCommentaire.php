<?php
$id = filter_input(INPUT_GET, "id");

//Enregistrement dans la BDD
require_once '../Config/config.php';
$db = new PDO(
    "mysql:host=" . Config::SERVEUR . ";dbname=" . Config::BASE . "",
    Config::USER,
    Config::MDP
);

//préparer une requete
$r = $db->prepare("delete from COMMENTAIRES where idCommentaires=:id");

$r->bindParam(":id", $id);


$r->execute();

//je reviens  l'accueil
//header('Location: ../');
echo $id;