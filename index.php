<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Health Center!</title>
    <style>
    a{
        text-decoration: none;
        color:black;
    }
    button{
        margin-top: 4px;
    }
    </style>
</head>
<body>
    <h1>
        This is the home
    </h1>
    <?php if(!isset($_SESSION['email'])): ?>
    <button value="register">
    <a href="administrations/Register.php">Register</a>
    </button>
    <button>
        <a href="administrations/Login.php">Log in</a>
    </button>
    <br>
    <?php endif; ?>
    <?php if(isset($_SESSION['email']) && $_SESSION['rule']=='user'): ?>
    <button>
        <a href="administrations/Dashboard.php">Dashoard</a>
    </button>
    <button>
        <a href="administrations/Logout.php">Log out</a>
    </button>
    <?php endif ?>
    
    <?php if(isset($_SESSION['email']) && $_SESSION['rule']=='admin'): ?>
    <button>
        <a href="administrations/Delete.php">Delete</a>
    </button>    
    <button>
        <a href="administrations/Dashboard.php">Dashoard</a>
    </button>
    <button>
        <a href="administrations/Logout.php">Log out</a>
    </button>
    <button>
        <a href="administrations/Promote.php">Promote a user</a>
    </button>
    <?php endif ?>
</body>
</html>