<?php
session_start();

require_once './Config/config.php';
$db = new PDO(
    "mysql:host=" . Config::SERVEUR . ";dbname=" . Config::BASE . "",
    Config::USER,
    Config::MDP
);

$r = $db->prepare("SELECT * FROM TOPIC ORDER BY dateCreationTopic desc");
$r->execute();

$topics = $r->fetchAll();

$r1 = $db->prepare("SELECT * FROM personnes");
$r1->execute();

$users = $r1->fetchAll();
?>
<!DOCTYPE html>

<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="./css/allInitiative.css" type="text/css" media="screen">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

</head>

<body>
    <div id="menu"></div>
    <div id="container">

        <input id="barreRecherche" class="form-control mr-sm-2" type="search" placeholder="Rechercher un lieu" aria-label="Search">
        <br>
        <div id="filtrer">Filtrer par sujet</div>
        <div id="containerSujet">

            <div class="divSujet" style="background-color:#FFD166;">Transport</div>
            <div class="divSujet" style="background-color:#FFAA72;">Culture</div>
            <div class="divSujet" style="background-color:#FF837E;">Energie</div>


        </div>

        <div id="containerInitiative">
            <?php foreach ($topics as $topic) {
            ?>
                <div id="initiative">
                    <div id="contenu">
                        <div id="titre"><?php echo $topic['titreTopic'] ?></div>
                        <div id="lieu"><?php echo $topic['lieu'] ?></div>
                        <div id="text"><?php echo $topic['corpsTopic'] ?></div>
                        <div id="Personne">Posté par <?php foreach ($users as $user) {
                                                            if ($user["idPersonnes"] == $topic["idPersonnes"]) {
                                                                echo $user["prenomPersonnes"] . " " . $user["nomPersonnes"];
                                                            }
                                                        } ?></div>
                        <div id="date"><?php echo $topic['dateCreationTopic'] ?></div>
                        <div id="containerBoutton">
                            <a href="./Actions/likeTopic.php?id=<?php echo $topic["idTopic"] ?>"><?php echo $topic["compteurJaimeTopic"] ?> <img src="./Images/Illustrations/SVG/up-btn.svg"></a>
                            <a href="./selectionInitiative.php"><img src="./Images/Illustrations/SVG/comment-btn.svg"></a>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>



    </div>


</body>

</html>