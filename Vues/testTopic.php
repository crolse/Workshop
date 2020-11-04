<?php require_once '../header.php'; ?>

<?php
require_once '../Config/config.php';
$db = new PDO("mysql:host=" . Config::SERVEUR . ";dbname=" . Config::BASE . "", Config::USER, Config::MDP);
$r = $db->prepare("select idTopic, titreTopic, corpsTopic from topic");
$r->execute();

//récupération des résultats du select
$lignes = $r->fetchAll(); //retourne le tableau
//attention au pluriel/singulier
?>
<h1>Ajout d'opérateurs</h1>


<table>
    <thead>
        <tr>
            <th>Titre</th>
            <th>Voir</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($lignes as $ligne) { ?>
            <tr>
                <td><?php echo $ligne["titreTopic"] ?></td>
                <td>
                    <a href="voircategorie.php?id=<?php echo $ligne["id"] ?>" class="btn blue">
                        Voir <i class="material-icons right">photo_camera</i>
                    </a>
                </td>
                <td>
                    <a href="modifier_categorie.php?id=<?php echo $ligne["id"] ?>" class="btn-floating">
                        <i class="material-icons">edit</i>
                    </a>
                    <a href="../Actions/likeTopic.php?id=<?php echo $ligne["idTopic"] ?>" class="btn-floating red">
                        <i class="material-icons">delete</i>
                    </a>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>


<br />



<?php include_once '../footer.php'; ?>