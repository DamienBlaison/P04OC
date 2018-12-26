<?php
if(isset($_POST['config1']) && $_POST['config1'] == 'on')
{
      $update_config1 = new Config("","");
      $update_config1->update_config('1','on');
}
else
{
      $update_config1 = new Config("","");
      $update_config1->update_config('1','off');
}

if(isset($_POST['config2']) && $_POST['config2'] == 'on')
{
      $update_config2 = new Config("","");
      $update_config2->update_config('2','on');
}
else
{
      $update_config2 = new Config("","");
      $update_config2->update_config('2','off');
}

$state_config1 = new Config("","");
$state_config1 = $state_config1->read_config(1);
$state_config1 = $state_config1 ->fetch();
$state_config1 = $state_config1[1];

$state_config2 = new Config("","");
$state_config2 = $state_config2->read_config(2);
$state_config2 = $state_config2 ->fetch();
$state_config2 = $state_config2[1];

if ($state_config1 == "on")
{
      $config1 = "checked=checked";
}
else
{
      $config1 = "";
}

if ($state_config2 == "on")
{
      $config2 = "checked=checked";
}
else
{
      $config2 = "";
}
?>
