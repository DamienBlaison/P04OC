<?php
class Config

{
      function read_config($id_config){
            include('connexion.php');
            $result = $bdd->query("SELECT * FROM config WHERE id='$id_config'");
            return $result;
      }
      function update_config($id_config,$param_config){
            include('connexion.php');
            $result = $bdd->exec("UPDATE config SET param_config='$param_config' WHERE id='$id_config'");
            return $result;

      }
      function read_configs(){
            include('connexion.php');
            $result = $bdd->query("SELECT * FROM config ");
            return $result;
      }
}
