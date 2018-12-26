
<?php
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
