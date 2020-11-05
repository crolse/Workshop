<!DOCTYPE html>
<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./css/404.css" type="text/css" media="screen">
</head>

<body>
  <div class="buttonRetour">
    <a href="./menu.php"><img src="./Images/Illustrations/SVG/back-arrow-green.svg" /></a>
  </div>
  <div class="titre">
    Ajouter une initiative
  </div>
  <div class="divSection">
    <form action="./Actions/creationTopic.php" method="post">
      <div class="divTextSection">
        Titre
      </div>
      <div class="divInputSection">
        <input name="titreTopic" type="text" placeholder="Entrez le titre de votre initiative">
      </div>
      <div class="divTextSection">
        Lieu
      </div>
      <div class="divInputSection">
        <input class="checkbox" type="checkbox" checked />
        <label>Ma position actuelle</label>
      </div>
      <div class="divTextSection">
        Ou
      </div>
      <div class="divInputSection">
        <input name="lieu" type="text" placeholder="Rechercher un lieu">
      </div>
      <div class="divTextSection">
        Description
      </div>
      <div class="divInputSection">
        <textarea name="corpsTopic" type="text" placeholder="Ecrivez votre initiative"></textarea>
      </div>
      <div class="divTextSection">
        Sujet
      </div>
      <div class="divTextSujet">
        Choissez le sujet qui décrit le mieux votre initiative.
      </div>
      <div class="divDesSujets">
        <table>
          <tr>
            <td class="divSujet" style="background-color:#66D197;">
              <div>
                <div>Espaces Verts & Nature</div>
              </div>
            </td>
            <td class="divSujet" style="background-color:#FFD166;">
              <div>
                <div>Transport</div>
              </div>
            </td>
            <td class="divSujet" style="background-color:#FFAA72;">
              <div>
                <div>Culture</div>
              </div>
            </td>
          </tr>
          <tr>
            <td class="divSujet" style="background-color:#FF837E;">
              <div>
                <div>Energie</div>
              </div>
            </td>
            <td class="divSujet" style="background-color:#9768D1;">
              <div>
                <div>Services publiques</div>
              </div>
            </td>
            <td class="divSujet" style="background-color:#49AFCD;">
              <div>
                <div>Gestions des déchêts</div>
              </div>
            </td>
        </table>
        <div class="buttonEnvoyer">
          <button id="bouttonDemarrerBis" type="submit" name="action">
            <div id="textBoutton">Publier</div>
        </div>
      </div>
    </form>
  </div>


  <div class="logo">
    localize
  </div>
</body>

</html>