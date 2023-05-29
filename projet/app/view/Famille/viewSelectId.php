
<!-- ----- début viewId -->
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
        <input type="hidden" name='action' value='FamilleSelected'>
        <label for="id">id : </label> <select class="form-control" id='id' name='id' style="width: 300px">
            <?php
            //results contient la liste des familles (id et nom)
            foreach ($results as $row) {
             echo ("<option value=".$row['id'].">".$row['nom']."</option>");
            }
            ?>
        </select>
      </div>
      <p/>
      <button class="btn btn-primary" type="submit">Submit form</button>
    </form>
    <p/>
  </div>

  <?php include $root . '/app/view/fragment/fragmentGenealogieFooter.html'; ?>

  <!-- ----- fin viewId -->