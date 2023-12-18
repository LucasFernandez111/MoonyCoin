<?php
setcookie('dataUser', '', time() - 100);
header("location: login.php");
exit;
?>