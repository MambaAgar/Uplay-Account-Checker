<?php
include("uAPI.php");
$uapi = new ubiapi($_GET['u'],$_GET['p'],null);
echo $uapi->login(1);
?>
