<?php
session_start();
if($_SESSION['rule'] != 'doctor')
{
    echo "You are not authorized to do this";
    exit();
}
?>