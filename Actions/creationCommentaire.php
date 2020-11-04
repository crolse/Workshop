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
$r = $db->prepare("INSERT INTO COMMENTAIRES (corpsCommentaires, dateCommentaires, idTopic, idPersonnes) values ".
    "(:coprsCommentaires, :dateCom, :idTopic, :idPersonnes)");

$r->bindParam(":coprsCommentaires", $coprsCommentaires);
$r->bindParam(":dateCom", date("Y-m-d H:i:s"));
$r->bindParam(":idTopic", $id_topic);
$r->bindParam(":idPersonnes", $_SESSION['idPersonnes']);


$r->execute();

//todo ajouter le chemin de retour