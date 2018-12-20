



<form class="" action="index.php" method="post">
  <div class="modal fade" id="LoginForm" tabindex="-1" role="dialog" aria-labelledby="Login" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">

      <div class="modal-content container-fluid">
        <div class="modal-header row ">
          <h1>Identification</h1>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <div class="modal-body row ">

          <label for="login">Login</label>
          <input type="text" name="login"  id="login"  class="col-md-12 border border-secondary" placeholder="Login"r equired="required"></input>

           <label for="password">Mot de passe</label>
          <input type="password" name="password" id="password"  class="col-md-12 border border-secondary" placeholder="Mot de passe"required="required"></input>

        </div>
        <div class="modal-footer row justify-content-between">

          <a href="index.php?action=creationcompte"  class="btn btn-primary">Créer son compte</a>
          <div class="">
              <button type="submit" id="connexion"class="btn btn-outline-secondary">Se connecter</button>
          </div>

        </div>
      </div>

    </div>
  </div>

</form>
