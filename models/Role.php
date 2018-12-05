
<?php

class Role
{
  public $id_role;
  public $name_role;

function __construct($id,$name)
  {
    $this->id_role=$id;
    $this->name_role=$name;

  }

function create_role()
  {
		include('connexion.php');
    $result = $bdd-> exec("INSERT INTO roles (name) VALUES ('$this->name_role')");
    return $result;
  }

function read_roles()
  {
		include('connexion.php');
    $result = $bdd-> query("SELECT * FROM  roles");

    while ($data = $result->fetch())
    {
      echo $data['id_role'];
      echo $data['name'];
    }
    return $result;
  }

function read_role()
  {
		include('connexion.php');
    $result = $bdd-> query("SELECT * FROM  roles WHERE id_role='$this->id_role'");

    while ($data = $result->fetch())
    {

      echo $data['id_role'];
      echo $data['name'];

    }
    return $result;
  }

function update_role()
  {
    include('connexion.php');
    $result = $bdd-> query("UPDATE roles SET name='$this->name_role'");
    return $result;
  }


function delete_role()
  {
    include('connexion.php');
    $result = $bdd-> query("DELETE FROM roles WHERE id_role='$this->id_role'");
    return $result;
  }

}

?>
