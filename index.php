<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require 'config.php';

if (!empty($_SESSION['user'])) {
    header('Location: dashboard.php');
    exit;
}
header('Location: login.php');
exit;
