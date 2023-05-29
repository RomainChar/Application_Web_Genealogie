
<!-- ----- debut fragmentGenealogieJumbotron -->

<div class="jumbotron">
  
  <?php
  //Si aucune famille n'est sélectionnée, la session existe quand même avec l'id -1
 if ($_SESSION['FamilleSelected']['id']!='-1'){
    echo("<h1> FAMILLE ". $_SESSION['FamilleSelected']['nom']."</h1>");
    }  
 else{
    echo('<h1>Pas de Famille Sélectionnée </h1>'); 
    }
  
  ?>
</div>
<p/>
<!-- ----- fin fragmentGenealogieJumbotron -->