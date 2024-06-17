<?php
require 'functions/auth.php';
logoutUser();
header('Location: login.php');
?>
