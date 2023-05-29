
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
        <input type="hidden" name='action' value='EvenementAdded'>
        <label for="individu">Sélectionnez un individu </label> <select class="form-control" id='individu' name='individu' style="width: 500px">
           <?php
            //resultsIndividus contient la liste des individus de la famille
            foreach ($resultsIndividus as $element) {
           printf("<option value=%d>%s : %s</option>", $element->getId(), $element->getNom(), 
             $element->getPrenom());
          }
          ?>
        </select>
        <label for="event_type">Sélectionnez un type d'évènement </label> <select class="form-control" id='event_type' name='event_type' style="width: 500px">
            <option>DECES</option>
            <option>NAISSANCE</option>
          ?>
        </select>
        <label for="date">Date (AAAA-MM-JJ) ? </label>
        <input type="text" class="form-control" id='date' name='date' style="width: 200px">
        <label for="lieu">Lieu ? </label>
        <input type="text" class="form-control" id='lieu' name='lieu' style="width: 200px">
      </div>
      <p/>
      <?php
      //Bouton d'envoi du formulaire inexistant si aucune famille n'est sélectionnée
      if ($_SESSION['FamilleSelected']['id']!='-1'){
      echo('<button class="btn btn-primary" type="submit">Envoyer</button>');
      }        
      ?>
    </form>
    <p/>
  </div>

  <?php include $root . '/app/view/fragment/fragmentGenealogieFooter.html'; ?>

  <!-- ----- fin viewInsert -->