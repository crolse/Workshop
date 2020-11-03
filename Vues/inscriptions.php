
<?php require_once '../header.php'; ?>


<h1>Ajout d'opérateurs</h1>


<form action="../Actions/inscription.php" method="post" >
    <div class="row">
        <div class="input-field col s6">
            <input name="nom"  type="text" class="validate">
            <label for="nom">Nom</label>
        </div>
        <div class="input-field col s6">
            <input name="prenom"  type="text" class="validate">
            <label for="last_name">Prenom</label>
        </div>
    </div> 
    <div class="row">
        <div class="input-field col s6">
            <input name="email"  type="text" class="validate">
            <label for="email">email</label>
        </div>
        <div class="input-field col s6">
            <input name="mdp"  type="text" class="validate">
            <label for="mdp">mdp</label>
        </div>
    </div>       

    
 
    <button class="btn waves-effect waves-light light-blue right" type="submit" name="action">Valider</button>

</form>


<br/>



<?php include_once '../footer.php'; ?>
 