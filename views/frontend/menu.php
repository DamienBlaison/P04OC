
<nav class="navbar navbar-dark bg-dark sticky-top opacity">
      <a class="navbar-brand" href="index.php"> <h1 class="Title">Un billet Simple pour l'Alaska</h1></a>
      <ul>
            <?php
            if( !isset($_SESSION['login']))
            {
                  ?>
                        <a class="btn btn-sm btn-outline-secondary" href="index.php?action=log_in"> Connexion</a>
                  <?php

            } else {
                  ?>
                        <button type="button" class="btn btn-sm btn-outline-secondary">Bienvenue <?php echo $_SESSION['login']?></button>
                  <?php
            }
            ?>

      </ul>
</nav>
