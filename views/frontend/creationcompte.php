<?php include('./views/frontend/menu.php')

/* focntion d'enregistrement à faire*/


?>


<form class="body compte d-flex align-items-center row" action="home.php" method="post">

      <div class="container col-md-3 modal-content">

        <div class="modal-header row ">
          <h1>Création de compte</h1>
        </div>

        <div class="modal-body row ">

          <label for="LoginNom">Nom</label>
          <input type="text" name="LoginNom" id="LoginNom" placeholder="Jean" class="col-md-12 border border-secondary rounded" required="required"></input>

          <label for="LoginPrenom">Prénom</label>
          <input type="text" name="LoginPrenom" id="LoginPrenom" placeholder="Forteroche" class="col-md-12 border border-secondary rounded" required="required"></input>

          <label for="email">Email address</label>
          <input type="email" name="email" class="col-md-12 border border-secondary rounded" id="email" placeholder="Entrer un email" rrequired="required"></input>

          <label for="login">Login</label>
          <input type="text" name="login"  id="login"  class="col-md-12 border border-secondary rounded" placeholder="Login"r equired="required"></input>

           <label for="password">Mot de passe</label>
          <input type="password" name="password" id="password"  class="col-md-12 border border-secondary rounded" placeholder="Mot de passe"required="required"></input>

        </div>
        <div class="modal-footer row justify-content-between">
          <a href="index.php?action=home"  class="btn btn-outline-secondary">Revenir à l'accueil</a>
          <button type="submit" id="saveComment"class="btn btn-primary">S'inscrire</button>
        </div>
      </div>
  </form>
