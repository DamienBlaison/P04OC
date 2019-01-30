<!DOCTYPE html>
<html lang="fr" dir="ltr">
<head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title></title>
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
      <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
      <script>tinymce.init({ selector:'#mytextarea' });</script>
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
      <link rel="stylesheet" href="./css/perso.css" type="text/css">
</head>
<body>
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
