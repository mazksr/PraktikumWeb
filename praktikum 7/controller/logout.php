<?php 

require "../config/Connection.php";

$_SESSION = [];

session_unset();
session_destroy();

header("Location: ../login.php");
exit;

?>