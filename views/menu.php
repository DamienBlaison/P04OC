<nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="index.php?">Administration du blog</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Gestion du contenu
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="index.php?action=createArticle">Créer un article</a>
          <a class="dropdown-item" href="index.php?action=listArticle&plage=1">Liste des articles</a>
        </div>
        </li>

        <li class="nav-item">
        <a class="nav-link" href="index.php?action=listUsers&plage=1">Gestion des utilisateurs</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown3" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Commentaires
        </a>
      <div class="dropdown-menu" aria-labelledby="navbarDropdown3">
            <a class="dropdown-item" href="index.php?action=unread_comments&plage=1">Les derniers commentaires</a>
            <a class="dropdown-item" href="index.php?action=chapter_comments&plage=1">Commentaires par chapitres</a>
            <a class="dropdown-item" href="index.php?action=user_comments&plage=1">Commentaires par utilisateurs</a>
            <a class="dropdown-item" href="index.php?action=all_comments&plage=1">Historique</a>
      </div>
    </li>


      <li class="nav-item">
       <a class="nav-link" href="index.php?action=moderation&statut=2">Signalements</a>
     </li>
    </ul>
  </div>
</nav>
