<?php
session_start();
unset($_SESSION['adlogin']);
session_destroy();
header('Location:index.php');
?>