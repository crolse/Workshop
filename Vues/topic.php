<?php
//session_start();
require_once '../header.php';
require_once '../Config/config.php';
$db = new PDO("mysql:host=".Config::SERVEUR.";dbname=".Config::BASE.""
    , Config::USER, Config::MDP);

$r = $db->prepare("SELECT * FROM TOPIC ORDER BY compteurJaimeTopic desc");
$r->execute();

$topics=$r->fetchAll();
?>

<div class="container">
    <div class="w-25 mt-5 mx-auto">
            <?php foreach ($topics as $topic) {
                ?>
                <div class="row">
                    <div class="col s12 m6">
                        <div class="card green darken-1">
                            <div class="card-content white-text">
                                <span class="card-title"><?php echo $topic['titreTopic']?></span>
                                <p><?php echo $topic['corpsTopic']?></p>
                                <p style="color: #555555">posté par creatorName</p>
                            </div>
                            <div class="card-action">
                                <a href="#"><img src="../Images/Illustrations/SVG/up-btn.svg"></a>
                                <a href="#"><img src="../Images/Illustrations/SVG/comment-btn.svg"></a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php } ?>
    </div>
</div>
