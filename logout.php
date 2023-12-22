<?php
setcookie('dataUser', '', time() - 100);
header("location: index.php");
exit;
?>