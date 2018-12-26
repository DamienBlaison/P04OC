<?php

$config=new Config("","");
$config=$config->read_configs();
$array_config=[];

while ($data=$config->fetch()) {
      array_push($array_config,$data);
}

if (isset($_SESSION['login']))
{
      $_SESSION['login']=$_SESSION['login'];
}
else if(isset($_POST['login']) && isset($_POST['password']))
{
      $_SESSION['login']=$_POST['login'];
      $_SESSION['password']=$_POST['password'];
}
else
{
      $_SESSION['login']= NULL;
      $_SESSION['password']= NULL;
};
?>
