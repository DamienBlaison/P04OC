
<form class="" action="" method="post">
      <div class="" id="LoginForm" tabindex="-1" role="dialog" aria-labelledby="Login">
            <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content container-fluid">
                        <div class="modal-header row ">
                              <h2>Informations de connexion</h2>

                        </div>
                        <div class="modal-body row ">
                              <?php echo $result ?>
                              <label for="login">Login</label>
                              <input type="text" name="login"  id="login"  class="col-md-12 border border-secondary" placeholder="Login" required="required"></input>
                              <label for="password">Mot de passe</label>
                              <input type="password" name="password" id="password"  class="col-md-12 border border-secondary" placeholder="Mot de passe"required="required"></input>

                        </div>
                        <div class="modal-footer row justify-content-between">
                              <a href="index.php?action=create_account"  class="btn btn-outline-primary">Créer son compte</a>
                              <div class="">
                                    <a href="index.php" class=" btn btn-outline-danger">Quitter</a>
                                    <button type="submit" id="connexion"class="btn btn-outline-success">Se connecter</button>
                              </div>
                        </div>
                  </div>
            </div>
      </div>
</form>
