
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
        <input type="hidden" name='action' value='FamilleAdded'>        
        <label for="id">Nom : </label><input type="text" name='nom' size='75' value='Nom'>                           
      </div>
      <p/>
      <button class="btn btn-primary" type="submit">Go</button>
    </form>
    <p/>
  </div>
  <?php include $root . '/app/view/fragment/fragmentGenealogieFooter.html'; ?>

<!-- ----- fin viewInsert -->



