
<!-- ----- début viewInsertParent -->
<?php 
require ($root . '/app/view/fragment/fragmentGenealogieHeader.html');
?>

<body>
  <div class="container">
      <?php
      include $root . '/app/view/fragment/fragmentGenealogieMenu.html';
      include $root . '/app/view/fragment/fragmentGenealogieJumbotron.php';
      ?>
    <h3>Ajout d'un lien parental</h3>  
    <form role="form" method='get' action='router1.php'>
      <div class="form-group">
        <input type="hidden" name='action' value='LienAddedParent'>
        <label for="enfant">Sélectionnez un enfant </label> <select class="form-control" id='enfant' name='enfant' style="width: 500px">
           <?php
            //resultsIndividus contient la liste des individus
            foreach ($resultsIndividus as $element) {
           printf("<option value=%d>%s : %s</option>", $element->getId(), $element->getNom(), 
             $element->getPrenom());
          }
          ?>
        </select>
        <label for="parent">Sélectionnez un parent </label> <select class="form-control" id='parent' name='parent' style="width: 500px">
           <?php
            
            foreach ($resultsIndividus as $element) {
           printf("<option value=%d>%s : %s</option>", $element->getId(), $element->getNom(), 
             $element->getPrenom());
          }
          ?>
        </select>
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

  <!-- ----- fin viewInsertParent -->