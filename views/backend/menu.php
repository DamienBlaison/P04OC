<nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-dark">
      <a class="navbar-brand" href="index.php?">Administration du blog</a>
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
