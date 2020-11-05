<?php
session_start();
require_once '../header.php';
require_once '../Config/config.php';
$db = new PDO("mysql:host=" . Config::SERVEUR . ";dbname=" . Config::BASE . ""
    , Config::USER, Config::MDP);

$r = $db->prepare("SELECT * FROM TOPIC ORDER BY dateCreationTopic desc");
$r->execute();

$topics = $r->fetchAll();

$r1 = $db->prepare("SELECT * FROM personnes");
$r1->execute();

$users = $r1->fetchAll();
?>

<div class="container">
    <div class=" mt-5s mx-auto">
        <?php foreach ($topics as $topic) {
            ?>
            <div class="row">
                <div class="col s12 m6">
                    <div style="border-radius: 50px; box-shadow: 1px 1px 12px #555;" class="card white darken-1">
                        <div class="card-content grey-text">
                            <span class="card-title green-text bold"><?php echo $topic['titreTopic'] ?></span>
                            <p><?php $topi = wordwrap($topic['corpsTopic'], 10, "***", true);
                                $text = explode("***", $topi);
                                if (count($text) > 15) {
                                    for ($i = 0; $i < 15; $i++) {
                                        echo $text[$i] . " ";
                                    }
                                    echo "...";
                                } else {
                                    foreach ($text as $word) {
                                        echo $word . " ";
                                    }
                                } ?>
                            </p>
                            <p style="color: #555555;">posté par <?php foreach ($users as $user) {
                                    if ($user["idPersonnes"] == $topic["idPersonnes"]){
                                        echo $user["prenomPersonnes"]." ".$user["nomPersonnes"];
                                    }
                                } ?>
                            </p>
                        </div>
                        <div class="card-action" style="border-radius: 50px;  box-shadow: 0px 5px 5px #555;">
                            <a href="../Actions/likeTopic.php?id=<?php echo $topic["idTopic"] ?>"><?php echo $topic["compteurJaimeTopic"] ?> <img src="../Images/Illustrations/SVG/up-btn.svg"></a>
                            <a href="#"><img src="../Images/Illustrations/SVG/comment-btn.svg"></a>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>