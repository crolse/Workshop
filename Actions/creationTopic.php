<?php
session_start();
$titreTopic = filter_input(INPUT_POST, "titreTopic");
$corpsTopic = filter_input(INPUT_POST, "corpsTopic");
$dateCreationTopic = date("Y-m-d H:i:s");
$compteurJaimeTopic = 0;



require_once '../Config/config.php';
$db = new PDO(
    "mysql:host=" . Config::SERVEUR . ";dbname=" . Config::BASE . "",
    Config::USER,
    Config::MDP
);


$r = $db->prepare("insert into topic (titreTopic ,corpsTopic,dateCreationTopic,compteurJaimeTopic,idPersonnes)"
    . "values (:titreTopic,:corpsTopic,:dateCreationTopic,:compteurJaimeTopic,:idPersonnes)");

$r->bindParam(":titreTopic", $titreTopic);
$r->bindParam(":corpsTopic", $corpsTopic);
$r->bindParam(":dateCreationTopic", $dateCreationTopic);
$r->bindParam(":compteurJaimeTopic", $compteurJaimeTopic);
$r->bindParam(":idPersonnes", $_SESSION['idPersonnes']);



$r->execute();
