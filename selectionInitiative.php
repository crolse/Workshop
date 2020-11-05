<?php
session_start();
$idTopic = filter_input(INPUT_GET, "id");
$_SESSION['idTopics'] = $idTopic;
require_once './Config/config.php';
$db = new PDO(
    "mysql:host=" . Config::SERVEUR . ";dbname=" . Config::BASE . "",
    Config::USER,
    Config::MDP
);

$r = $db->prepare("SELECT * FROM TOPIC where idTopic = :idTopic");
$r->bindParam(":idTopic", $idTopic);
$r->execute();

$topics = $r->fetchAll();

$r1 = $db->prepare("SELECT * FROM personnes");
$r1->execute();

$users = $r1->fetchAll();

$r2 = $db->prepare("SELECT * FROM commentaires ORDER BY dateCommentaires desc");
$r2->execute();

$commentaires = $r2->fetchAll();
?>
<!DOCTYPE html>

<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="./css/selectionInitiative.css" type="text/css" media="screen">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

</head>

<body>




    <!-- Button trigger modal -->


    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div id="modal" class="modal-content">
                <div class="modal-header">
                    <form action="./Actions/creationCommentaire.php" method="post">
                        <h5 id="titreModal" class="modal-title " id="exampleModalLongTitle">Ajouter un commentaire</h5>

                </div>
                <div class="form-group">
                    <label for="message-text" class="col-form-label"></label>
                    <textarea name="coprsCommentaire" class="form-control" id="message-text"></textarea>
                </div>
                <div id="modalCommentaire" class="modal-footer">
                    <button id="bouttonPublier" type="submit" name="action" class="btn btn-primary">Commenter</button>
                </div>
                </form>
            </div>
        </div>
    </div>




    <div id="menu">
        <a href="menu.php"><img src="./Images/Illustrations/SVG/menu-btn.svg" /></a>
        <a href="#"><img src="./Images/Illustrations/SVG/pin-btn.svg" /></a>
        <a href="#"><img src="./Images/Illustrations/SVG/profile-btn.svg" /></a>


    </div>
    <div id="container">
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
                        <a data-toggle="modal" data-target="#myModal"><img src="./Images/Illustrations/SVG/comment-btn.svg"></a>

                    </div>
                </div>
            </div>
        <?php } ?>

        <div id="containerCommentaire">
            <?php foreach ($commentaires as $commentaire) {
            ?>
                <div id="initiative">
                    <div id="contenu">

                        <div id="text"><?php echo $commentaire['corpsCommentaires'] ?></div>
                        <div id="Personne">Posté par <?php foreach ($users as $user) {
                                                            if ($user["idPersonnes"] == $commentaire["idPersonnes"]) {
                                                                echo $user["prenomPersonnes"] . " " . $user["nomPersonnes"];
                                                            }
                                                        } ?></div>
                        <div id="date"><?php echo $commentaire['dateCommentaires'] ?></div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
    <script type="text/javascript">
        $('#myModal').modal(options)
    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>

</html>