<?php
session_start();
if($_SESSION['rule'] != 'admin')
{
    echo "You are not authorized to do this";
}
?>