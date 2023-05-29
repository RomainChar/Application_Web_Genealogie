
<!-- ----- début viewInserted -->
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
     echo ("<h3>Confirmation de la création d'un évènement</h3>");
     echo("<ul>");
     echo ("<li>famille_id = " . $_SESSION['FamilleSelected']['id'] . "</li>");
     echo ("<li>individu_id = " . $_GET['individu'] . "</li>");
     echo ("<li>event_id = " . $results . "</li>");
     echo ("<li>event_type = " . $_GET['event_type'] . "</li>");
     echo ("<li>event_date = " . $_GET['date'] . "</li>");
     echo ("<li>event_lieu = " . $_GET['lieu'] . "</li>");
     echo("</ul>");
    } else {
     echo ("<h3>Problème d'insertion de l'évènement</h3>");
    }

    echo("</div>");
    
    include $root . '/app/view/fragment/fragmentGenealogieFooter.html';
    ?>
    <!-- ----- fin viewInserted -->    

    
    