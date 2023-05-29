
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
     echo ("<h3>Confirmation de la sélection d'une famille</h3>");
     echo("<ul>");
     echo ("<li>la famille " . $results['nom'] ."(".$results['id'].") a été sélectionnée </li>");
     echo("</ul>");
    } else {
     echo ("<h3>Problème de sélection de la famille</h3>");
    }

    echo("</div>");
    
    include $root . '/app/view/fragment/fragmentGenealogieFooter.html';
    ?>
    <!-- ----- fin viewInserted -->    

    
    