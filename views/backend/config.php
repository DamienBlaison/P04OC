<?php include('./././controller/backend/config.php') ?>

<div class="container-fluid titlesection">
      <div class="card-header row justify-content-between" id="headingOne">
            <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Accueil</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Configuration</li>
                  </ol>
            </nav>
      </div>
</div>
<div class="container-fluid margintb">
      <div class="col-md-12">
            <form  action="./index.php?action=config" method="POST">
                  <div class="container-fluid">
                        <div class="card-body row justify-content-between">
                              <div class="container-fluid">
                                    <div class="col-md-12 card-title mb-2 border border-secondary bg-dark text-white">
                                          <h1>Paramètres de l'application</h1>
                                    </div>
                              </div>
                              <div class="container-fluid">
                                    <div class="col-md-12 border-bottom border-secondary">
                                          <label class="col-md-10"for="config1">Connexion obligatoire pour signaler un commentaire ?</label>
                                          <input type="checkbox" name="config1" <?php echo $config1 ?>>
                                    </div>
                                    <div class="col-md-12 border-bottom border-secondary">
                                          <label class="col-md-10" for="config2">Connexion obligatoire pour commenter un chapitre ?</label>
                                          <input type="checkbox" name="config2" <?php echo $config2 ?>>
                                    </div>
                              </div>
                              <div class="mt20 col-md-12 d-flex justify-content-end">
                                    <input class="btn btn-outline-success" type="submit" name="submit" value="sauvegarder les paramètres">
                              </div>
                        </div>
                  </div>
            </form>
      </div>
</div>
