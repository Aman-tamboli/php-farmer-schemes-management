<?php
session_start();

require 'navbar.php';
echo "You logged in under name: ".$_SESSION['username'];

?>