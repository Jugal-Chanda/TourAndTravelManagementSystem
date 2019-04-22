<?php
setcookie("admin", "", time() - 3600 ,"/");
header("Location: index.php");
?>
