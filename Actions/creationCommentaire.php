<?php
session_start();
$id_topic=filter_input(INPUT_POST,"id_post");
$coprsCommentaires=filter_input(INPUT_POST,"coprsCommentaire");

require_once '../Config/config.php';
$db = new PDO(
    "mysql:host=" . Config::SERVEUR . ";dbname=" . Config::BASE . "",
    Config::USER,
    Config::MDP
);
$r = $db->prepare("INSERT INTO COMMENTAIRE(corpsCommentaires, dateCommentaires, idTopic, idPersonnes) values ".
    "(:coprsCommentaires, NOW(), :idTopic, :idPersonnes)");

$r->bindParam(":coprsCommentaires", $coprsCommentaires);
$r->bindParam(":idTopic", $id_topic);
$r->bindParam(":idPersonnes", $_SESSION['idPersonnes']);


$r->execute();

//todo ajouter le chemin de retour