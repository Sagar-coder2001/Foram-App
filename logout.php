<?php
session_start();
session_destroy();
header("location: /MyPhp/Foram-app/login.php");
exit();
?>