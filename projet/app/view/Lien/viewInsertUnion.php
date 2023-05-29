
<!-- ----- début viewInsertUnion -->
<?php 
require ($root . '/app/view/fragment/fragmentGenealogieHeader.html');
?>

<body>
  <div class="container">
      <?php
      include $root . '/app/view/fragment/fragmentGenealogieMenu.html';
      include $root . '/app/view/fragment/fragmentGenealogieJumbotron.php';
      ?>
    <h3>Ajout d'une Union</h3>  
    <form role="form" method='get' action='router1.php'>
      <div class="form-group">
        <input type="hidden" name='action' value='LienAddedUnion'>
        <label for="homme">Sélectionnez un homme </label> <select class="form-control" id='homme' name='homme' style="width: 500px">
           <?php
            //$resultsHomme contient la liste des individus de sexe Masculin
            foreach ($resultsHomme as $element) {
           printf("<option value=%d>%s : %s</option>", $element->getId(), $element->getNom(), 
             $element->getPrenom());
          }
          ?>
        </select>
        <label for="femme">Sélectionnez une femme </label> <select class="form-control" id='femme' name='femme' style="width: 500px">
           <?php
            //$resultsFemme contient la liste des individus de sexe Feminin
            foreach ($resultsFemme as $element) {
           printf("<option value=%d>%s : %s</option>", $element->getId(), $element->getNom(), 
             $element->getPrenom());
          }
          ?>
        </select>
        <label for="type">Sélectionnez un type d'union </label> <select class="form-control" id='type' name='type' style="width: 500px">
            <option>COUPLE</option>
            <option>SEPARATION</option>
            <option>PACS</option>
            <option>MARIAGE</option>
            <option>DIVORCE</option>
          ?>
        </select>
        <label for="date">Date (AAAA-MM-JJ) ? </label>
        <input type="text" class="form-control" id='date' name='date' style="width: 200px">
        <label for="lieu">Lieu ? </label>
        <input type="text" class="form-control" id='lieu' name='lieu' style="width: 200px">
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

  <!-- ----- fin viewInsertUnion -->