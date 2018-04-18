<?php
session_start();
session_unset();
session_destroy();
echo '<script type="text/javascript"> alert("LOGOUT");</script>';
header('Location: index.php');
?>