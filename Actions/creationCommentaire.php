<?php
session_start();
/*$id_topic=filter_input(INPUT_POST,"id_post");*/
$coprsCommentaires = filter_input(INPUT_POST, "coprsCommentaire");
$dateCom = date("Y-m-d H:i:s");

require_once '../Config/config.php';
$db = new PDO(
    "mysql:host=" . Config::SERVEUR . ";dbname=" . Config::BASE . "",
    Config::USER,
    Config::MDP
);
$r = $db->prepare("INSERT INTO COMMENTAIRES (corpsCommentaires, dateCommentaires, idTopic, idPersonnes) values " .
    "(:coprsCommentaires, :dateCom, :idTopic, :idPersonnes)");

$r->bindParam(":coprsCommentaires", $coprsCommentaires);
$r->bindParam(":dateCom", $dateCom);
$r->bindParam(":idTopic", $_SESSION['idTopics']);
$r->bindParam(":idPersonnes", $_SESSION['idPersonnes']);


$r->execute();
header("Location: ../selectionInitiative.php?id=" . $_SESSION['idTopics'] . "");
//todo ajouter le chemin de retour
