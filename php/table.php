<?php
    session_start();
    if(!isset($_SESSION['usser']))
    {
        header("location: ../index.php");
        session_destroy();
        die();
    }
    else{
        include "connect_DB.php";
        include "user/load_dates.php";
    }
?>




<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title> Panel de usuario - Escobear</title>
    <link rel="icon" href="../images/logo.png"/>
    <link rel="stylesheet" href="../styles/user_menu.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>

<body>

    <input type="checkbox" class="toggle-check" id="toggle" hidden>
    <label class="toggle" for="toggle"> <ion-icon name="ellipsis-vertical-sharp"></ion-icon></label>
    <div class="container-menu"> 
        <nav class="menu">
            <a href="news/news.php" class="menu-items"> <ion-icon name="notifications-outline"></ion-icon> Novedades</a>
            <a href="#" class="menu-items"><ion-icon name="pricetags-outline"></ion-icon>  Tienda </a>
            <a href="#" class="menu-items"> Soporte </a>
            <a href="#" class="menu-items"> <ion-icon name="bar-chart-outline"></ion-icon>  Estadisticas</a>
            <a href="table.php" class="menu-items"> Tablero</a>
            <div class="dropdown-divider"></div>
            <br><br><br><br><br><br><br><br><br>

            <nav class="navbar bg-dark">
            <a class="navbar-brand " href="#" id="name-menu">
                <img src="http://logonoid.com/images/freya-logo.png" width="30" height="30" class="d-inline-block align-top" alt="" id="image-menu">
                <?php echo $user_dates[1];?>
            </a>
            <div class="btn-group dropleft">
                <button type="button" class="btn btn-secondary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="sr-only"></span>
                </button>
                <div class="dropdown-menu">
    
                    <button class="dropdown-item disabled" type="button">Cuenta Master</button>
                    <div class="dropdown-divider"></div>
                    <button class="dropdown-item" type="button">Nombre de usuario</button>
                    <button class="dropdown-item" type="button">Correo electronico</button>
                    <button class="dropdown-item" type="button">Modificar imagen</button>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" type="button" href="user/close_session.php">Cerrar Sesion</a>
                </div>
            </div>
            </nav>
        </nav>
    </div> 




    <div class="box-container">
        <p> hola</p>
    </div>

    <div class="credits">
        <div class="back-box-credits">
            <h1> Escobear</h1>
            <p> Sitio web desarrollado por xylospeed @2020</p>
            <div>
                <img src="../images/iconos/youtube.png">
                <img src="../images/iconos/discord.png">
                <img src="../images/iconos/facebook.png">
                <img src="../images/iconos/github.png">
            </div>
        </div>

    </div>

    
    <!-- JS, Popper.js, and jQuery -->
    <script src="../js/user_menu.js"></script>
    <script src="https://unpkg.com/ionicons@5.2.3/dist/ionicons.js "></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js " integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj " crossorigin="anonymous "></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js " integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN " crossorigin="anonymous "></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js " integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV " crossorigin="anonymous "></script>
</body>