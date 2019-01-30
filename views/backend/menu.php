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
<nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-dark">
      <a class="navbar-brand" href="index.php?action=backoffice/log_out">Administration du blog</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                  <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              Gestion du contenu
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                              <a class="dropdown-item" href="index.php?action=backoffice/create_article">Créer un article</a>
                              <a class="dropdown-item" href="index.php?action=backoffice/list_article&plage=1">Liste des articles</a>
                        </div>
                  </li>

                  <li class="nav-item">
                        <a class="nav-link" href="index.php?action=backoffice/list_users&plage=1">Gestion des utilisateurs</a>
                  </li>
                  <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="navbarDropdown3" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              Commentaires
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown3">
                              <a class="dropdown-item" href="index.php?action=backoffice/unread_comments&plage=1">Les derniers commentaires</a>
                              <a class="dropdown-item" href="index.php?action=backoffice/read_comments&plage=1">Historique</a>
                        </div>
                  </li>



                  <li class="nav-item">
                        <a class="nav-link" href="index.php?action=backoffice/moderation&statut=2">Signalements</a>
                  </li>
                  <li class="nav-item">
                        <a class="nav-link" href="index.php?action=backoffice/config">
                              Configuration
                        </a>
                  </li>
            </ul>
      </div>

            <a class="navbar-brand btn btn-outline-secondary" href="index.php?action=backoffice/log_out">Déconnexion</a>

</nav>
