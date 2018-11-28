
<?php

class User
{
  public $id_user;
  public $firstName_user;
  public $lastName_user;
  public $email_user;
  public $login_user;
  public $password_user;
  public $role_user;

function __construct($id,$firstName,$lastName,$email,$login,$password,$role)
  {
    $this->id_user=$id;
    $this->firstName_user=$firstName;
    $this->lastName_user=$lastName;
    $this->email_user=$email;
    $this->login_user=$login;
    $this->password_user=$password;
    $this->role_user=$role;
  }

function create_user()
  {
		$bdd = new PDO('mysql:host=localhost;dbname=P4OC;charset=utf8', 'root', 'root');
    $result = $bdd-> exec("INSERT INTO users (firstName,lastName,email,login,password,role) VALUES ('$this->firstName_user','$this->lastName_user','$this->email_user','$this->login_user','$this->password_user','$this->role_user')");
    return $result;
  }

  function read_users()
  {
    if (isset($_GET['plage'])){

      $pagination = ($_GET['plage']-1)*12;
      $bdd = new PDO('mysql:host=localhost;dbname=P4OC;charset=utf8', 'root', 'root');
      $result = $bdd-> query("SELECT * FROM  Users ORDER BY id_user DESC LIMIT $pagination,12");
      return $result;

    } else {
      $pagination=0;
      $bdd = new PDO('mysql:host=localhost;dbname=P4OC;charset=utf8', 'root', 'root');
      $result = $bdd-> query("SELECT * FROM  Users ORDER BY id_user DESC LIMIT $pagination,12");
      return $result;
    }

  }


function read_user($a)
  {
		$bdd = new PDO('mysql:host=localhost;dbname=P4OC;charset=utf8', 'root', 'root');
    $result = $bdd-> query("SELECT * FROM  users WHERE id_user='$a'");
    return $result;
  }

function updata_user()
  {
    $bdd = new PDO('mysql:host=localhost;dbname=P4OC;charset=utf8', 'root', 'root');
    $result = $bdd-> query("UPDATE users SET user='$this->lastName_user',firstName='$this->firstName_user',email='$this->email_user',login='$this->login_user',password='$this->password_user',role='$this->role_user' WHERE id_user='$this->id_user'");
    return $result;
  }


function delete_user()
  {
    $bdd = new PDO('mysql:host=localhost;dbname=P4OC;charset=utf8', 'root', 'root');
    $result = $bdd-> query("DELETE FROM users WHERE id_user='$this->id_user'");
    return $result;
  }

function count_users()
  {
    $bdd = new PDO('mysql:host=localhost;dbname=P4OC;charset=utf8', 'root', 'root');
    $result= $bdd->query("SELECT COUNT(id_user) FROM users");
    return $result;

  }

function verif_user()
  {
    $bdd = new PDO('mysql:host=localhost;dbname=P4OC;charset=utf8', 'root', 'root');
    $result= $bdd->query("SELECT * FROM users WHERE login='$this->login_user' AND password='$this->password_user'");
    return $result;
  }


}

?>
