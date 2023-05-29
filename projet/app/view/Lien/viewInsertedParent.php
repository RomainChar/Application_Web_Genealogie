
<!-- ----- début viewInsertedParent -->
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
    if ($SexeParent) {
     if ($SexeParent=='H'){
        echo ("<h3>Confirmation de la création du lien parent</h3>");
        echo("<ul>");
        echo ("<li>PèreID = " . $_GET['parent'] . "</li>");
     }
     elseif ($SexeParent =='F'){
         echo ("<h3>Confirmation de la création du lien parent</h3>");
         echo("<ul>");
         echo ("<li>MèreID = " . $_GET['parent'] . "</li>");
     }
     else{
         echo ("<h3>Problème d'insertion du lien Parent, le sexe du parent est inconnu</h3>");
     }
     echo ("<li>EnfantID = " . $_GET['enfant'] . "</li>");
     echo("</ul>");
    } else {
     echo ("<h3>Problème d'insertion du lien Parent</h3>");
    }

    echo("</div>");
    
    include $root . '/app/view/fragment/fragmentGenealogieFooter.html';
    ?>
    <!-- ----- fin viewInsertedParent -->    

    
    