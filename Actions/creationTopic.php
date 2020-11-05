<?php
session_start();
$titreTopic = filter_input(INPUT_POST, "titreTopic");
$corpsTopic = filter_input(INPUT_POST, "corpsTopic");
$lieu = filter_input(INPUT_POST, "lieu");
$dateCreationTopic = date("Y-m-d H:i:s");
$compteurJaimeTopic = 0;



require_once '../Config/config.php';
$db = new PDO(
    "mysql:host=" . Config::SERVEUR . ";dbname=" . Config::BASE . "",
    Config::USER,
    Config::MDP
);


$r = $db->prepare("insert into topic (titreTopic ,corpsTopic,dateCreationTopic,compteurJaimeTopic,idPersonnes,lieu)"
    . "values (:titreTopic,:corpsTopic,:dateCreationTopic,:compteurJaimeTopic,:idPersonnes,:lieu)");

$r->bindParam(":titreTopic", $titreTopic);
$r->bindParam(":corpsTopic", $corpsTopic);
$r->bindParam(":dateCreationTopic", $dateCreationTopic);
$r->bindParam(":compteurJaimeTopic", $compteurJaimeTopic);
$r->bindParam(":idPersonnes", $_SESSION['idPersonnes']);
$r->bindParam(":lieu", $lieu);



$r->execute();

header("Location: ../allInitiative.php");
