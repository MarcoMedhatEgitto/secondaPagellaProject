<?php
session_start();
if($_SESSION['rule'] != 'user')
{
    echo "You are not authorized to do this";
    exit();
}
?>