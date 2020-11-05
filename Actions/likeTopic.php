<?php
session_start();
$idTopic = filter_input(INPUT_GET, "id");



require_once '../Config/config.php';
$db = new PDO(
    "mysql:host=" . Config::SERVEUR . ";dbname=" . Config::BASE . "",
    Config::USER,
    Config::MDP
);

$r = $db->prepare("SELECT *
    FROM ecrire
    WHERE idTopic = :idTopic AND idPersonnes = :idPersonnes");

$r->bindParam(":idTopic", $idTopic);
$r->bindParam(":idPersonnes", $_SESSION['idPersonnes']);


$r->execute();



$userexist = $r->rowCount();

if ($userexist == 1) {

    $r = $db->prepare("Delete FROM ecrire
    WHERE idTopic = :idTopic AND idPersonnes = :idPersonnes");

    $r->bindParam(":idTopic", $idTopic);
    $r->bindParam(":idPersonnes", $_SESSION['idPersonnes']);


    $r->execute();

    $r = $db->prepare("update topic set compteurJaimeTopic = compteurJaimeTopic - 1 where idTopic = :idTopic ");
    $r->bindParam(":idTopic", $idTopic);
    $r->execute();
    header("Location: ../allInitiative.php");
} else {
    $r = $db->prepare("insert into ecrire (idPersonnes ,idTopic)"
        . "values (:idPersonnes , :idTopic)");
    $r->bindParam(":idPersonnes", $_SESSION['idPersonnes']);
    $r->bindParam(":idTopic", $idTopic);


    $r->execute();

    $r = $db->prepare("update topic set compteurJaimeTopic = compteurJaimeTopic + 1 where idTopic = :idTopic");
    $r->bindParam(":idTopic", $idTopic);
    $r->execute();

    header("Location: ../allInitiative.php");
}
