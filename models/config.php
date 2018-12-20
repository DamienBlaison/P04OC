<?php
class Config

{
      public $id_config;
      public $param_config;

      function __construct($id,$param)
      {
            $this->id_config=$id;
            $this->param_config=$param;
      }

      function read_config($a){
            include('connexion.php');
            $result = $bdd-> query("SELECT * FROM config WHERE id='$a'");
            return $result;
      }

      function update_config($a,$b){
            include('connexion.php');
            $result = $bdd-> query("UPDATE config SET param_config='$b' WHERE id='$a'");
            return $result;

      }

      function read_configs(){
            include('connexion.php');
            $result = $bdd-> query("SELECT * FROM config ");
            return $result;
      }


}


?>
