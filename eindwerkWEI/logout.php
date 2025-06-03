<?php
session_start();
session_destroy();
header("Location: indexSTART.php?melding=Je bent uitgelogd");
exit();
?>