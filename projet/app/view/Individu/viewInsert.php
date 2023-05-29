
<!-- ----- début viewInsert -->
<?php 
require ($root . '/app/view/fragment/fragmentGenealogieHeader.html');
?>

<body>
  <div class="container">
      <?php
      include $root . '/app/view/fragment/fragmentGenealogieMenu.html';
      include $root . '/app/view/fragment/fragmentGenealogieJumbotron.php';
      ?>
      
    <form role="form" method='get' action='router1.php'>
      <div class="form-group">
        <input type="hidden" name='action' value='IndividuAdded'>
        <label for="nom">Nom ? </label>
        <input type="text" class="form-control" id='nom' name='nom' style="width: 200px">
        <label for="prenom">Prénom ?</label>
        <input type="text" class="form-control" id='prenom' name='prenom' style="width: 200px">
        <input type="hidden" name='sexe' value=''>
        <label for="sexe">Sexe ?</label><br>
        <input type="radio" id="sexe" name="sexe" value="H"/> Homme
        <input type="radio" id="sexe" name="sexe" value="F" /> Femme
      </div>
      <p/>
      <?php
      // Le bouton d'envoi du formulaire n'est pas disponible si aucune famille n'est sélectionnée
      if ($_SESSION['FamilleSelected']['id']!='-1'){
      echo('<button class="btn btn-primary" type="submit">Envoyer</button>');
      }        
      ?>
    </form>
    <p/>
  </div>

  <?php include $root . '/app/view/fragment/fragmentGenealogieFooter.html'; ?>

  <!-- ----- fin viewInsert -->