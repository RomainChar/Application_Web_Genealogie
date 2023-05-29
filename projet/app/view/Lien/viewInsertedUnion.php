
<!-- ----- début viewInsertedUnion -->
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
     echo ("<h3>Confirmation de la création d'un lien</h3>");
     echo("<ul>");
     echo ("<li>famille_id = " . $_SESSION['FamilleSelected']['id'] . "</li>");
     echo ("<li>homme_id = " . $_GET['homme'] . "</li>");
     echo ("<li>femme_id = " . $_GET['femme']. "</li>");
     echo ("<li>lien_type = " . $_GET['type'] . "</li>");
     echo ("<li>lien_date = " . $_GET['date'] . "</li>");
     echo ("<li>lien_lieu = " . $_GET['lieu'] . "</li>");
     echo("</ul>");
    } else {
     echo ("<h3>Problème d'insertion du lien</h3>");
    }

    echo("</div>");
    
    include $root . '/app/view/fragment/fragmentGenealogieFooter.html';
    ?>
    <!-- ----- fin viewInsertedUnion -->    

    
    