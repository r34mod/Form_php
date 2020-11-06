<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Gestión de usuarios</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="../css/style.css">
    </head>
    <body>
        <header>
            <div class="user"><?php 
                if(!isset($_SESSION)) 
                { 
                    session_start(); 
                } 
                if(isset($_GET['logout']))
                {
                    session_destroy();
                    header("location:index.php");
                }

            ?></div>
        </header>
