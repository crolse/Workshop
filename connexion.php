<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="./css/connexion.css" type="text/css" media="screen">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

</head>

<body>
    <div class="retour">
        <a href="#"><img src="./Images/Illustrations/SVG/Back.svg" /></a>
    </div>
    <div class="titre">
        Connexion
    </div>
    <div id="ecran">
        <div class="formulaire">
            <form action="./Actions/connexion.php" method="post">

                <div class="form-group">
                    <label for="exampleInputEmail1">Adresse mail</label>
                    <input name="email" type="email" class="form-control" id="">

                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Mot de passe</label>
                    <input name="mdp" type="password" class="form-control" id="">
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Rester Connecté</label>
                </div>
                <div id="bouttonDemarrer">
                    <button id="bouttonDemarrerBis" type="submit" name="action">
                        <div id="textBoutton">Connexion</div>
                    </button>
                </div>
                <br>
                <div class="lien">
                    <a id="lienPropre" href="./inscription.php">Je n'ai pas de compte</a>

                </div>
                <div class="lien">
                    <a id="lienMot" href="#">Mot de passe oublié</a>

                </div>

            </form>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>

</html>