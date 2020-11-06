<?php 
require_once('conexion.php');
session_start();
    if(isset($_SESSION['nombre'])){
        return;
    }else {
        header('location: login.php');
    }
    if(isset($_POST['Enviar']))
    {
       if(empty($_POST['login']) || empty($_POST['password']))
       {
            header("location:index.php?Empty= Please Fill in the Blanks");
       }
       else
       {
            $query="SELECT usuario, contra FROM usr_pwd WHERE usuario='$nombre'
            AND contra='$pwd_cifrada'";

            $result=mysqli_query($con,$query);

            if(mysqli_fetch_assoc($result))
            {
                $_SESSION['User']=$_POST['UName'];
                header("location:wellcome.php");
            }
            else
            {
                header("location:index.php?Invalid= Please Enter Correct User Name and Password ");
            }
       }
    }
    else
    {
        echo 'Not Working Now Guys';
    }

?>