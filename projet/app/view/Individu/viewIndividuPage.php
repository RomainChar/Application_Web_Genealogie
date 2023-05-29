
<!-- ----- début viewIndividuPage -->
<?php
require ($root . '/app/view/fragment/fragmentGenealogieHeader.html');
?>

<body>
  <div class="container">
    <?php
    include $root . '/app/view/fragment/fragmentGenealogieMenu.html';
    include $root . '/app/view/fragment/fragmentGenealogieJumbotron.php';
    ?>
    <!-- ===================================================== -->
    <?php
    if ($results) {
     //$results contient les informations directes de l'individu
     echo ("<h1>".$results['nom']." ".$results['prenom']."</h1>");
     echo("<ul>");
     //$event contient les informations sur la naissance et le décès de l'individu
     echo ("<li>Né le ".$event['naissance']['event_date']." à ".$event['naissance']['event_lieu']."</li>");
     echo ("<li>Décès le ".$event['deces']['event_date']." à ".$event['deces']['event_lieu']."</li>");
     echo ("</ul>");
     echo ("<h4>Parents</h4>");
     echo("<ul>");
     //$Pere contient les informations directes sur le père de l'individu
     if ($Pere['id']!=0){
        echo ("<li>Père <a href='router1.php?action=IndividuSelected&individuid=".$Pere['id']."'>".$Pere['nom']." ".$Pere['prenom']."</a></li>");
     }
     else{
         echo("<li>Père ?");
     } 
     //$Mere contient les informations directes sur la mère de l'individu
     if ($Mere['id']!=0){
     echo ("<li>Mère <a href='router1.php?action=IndividuSelected&individuid=".$Mere['id']."'>".$Mere['nom']." ".$Mere['prenom']."</a></li>");
     }
     else{
         echo("<li>Mère ?");
     }
     echo("</ul>");
     echo ("<h4>Unions et enfants</h4>");
     echo("<ul>");
     //$Unions contient les ids des individus avec lesquels l'individu sélectionné a eu une union
     foreach ($Unions as $IndividuUnionId){
         //$InfosUnions contient les infos directes de chaque individus avec lesquels l'individu sélectionné a eu une union
         echo("<li> Union avec <a href='router1.php?action=IndividuSelected&individuid=".$IndividuUnionId[0]."'>".$InfosUnions[$IndividuUnionId[0]]["nom"]. " ".$InfosUnions[$IndividuUnionId[0]]["prenom"]."</a></li>");
         echo("<ol>");
         //$InfosUnions contient les infos directes des enfants de l'individu sélectionné
         foreach($InfosEnfants[$IndividuUnionId[0]] as $Enfant){
             echo("<li> Enfant <a href='router1.php?action=IndividuSelected&individuid=".$Enfant['id']."'>".$Enfant["nom"]. " ".$Enfant["prenom"]."</a></li>");
         }
         echo("</ol>");
     }
     echo("</ul>");
    } else {
     echo ("<h3>Problème de sélection de l'individu</h3>");
    }

    echo("</div>");
    
    include $root . '/app/view/fragment/fragmentGenealogieFooter.html';
    ?>
    <!-- ----- fin viewIndividuPage -->    

    
    