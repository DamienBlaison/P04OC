<?php include('./views/frontend/menu.php')?>
<?php

if (isset($_POST['LoginNom'])&&isset($_POST['LoginPrenom'])&&isset($_POST['email'])&& isset($_POST['login'])&& isset($_POST['password']))
{

      $new_user = new User("",htmlentities(addslashes($_POST['LoginNom']),htmlentities(addslashes($_POST['LoginPrenom']),htmlentities(addslashes($_POST['email']),htmlentities(addslashes($_POST['login']),htmlentities(addslashes($_POST['password']),'reader');

      $b=$new_user->verif_user(htmlentities(addslashes($_POST['login']));
      $b=$b->fetch();

      if($b == false)
      {

            $new_user = $new_user->create_user();

            $_SESSION['login']=htmlentities(addslashes($_POST['login']);
            $_SESSION['password']=htmlentities(addslashes($_POST['login']);

            header("Location: http://localhost:8888");
      }

      else

      {
            header("Location: http://localhost:8888/index.php?action=creationcompteko");
      }
}
?>



<form class="body compte d-flex align-items-center row" action="index.php?action=creationcompteko" method="post">

      <div class="container col-md-3 modal-content">

        <div class="modal-header row ">
          <h1>Désolé</h1>
          <p>Un compte existe déjà avec ce login</p>
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
