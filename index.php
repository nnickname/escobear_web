<?php
    session_start();
    if(isset($_SESSION['usser']))
    {
        header("location: php/news/news.php");
    }else session_destroy();
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title> Inicio - escobear</title>
    <link rel="icon" href="../images/logo.png"/>
    <link rel="stylesheet" href="styles/main.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>

<body>

    <div class="general-container">
        <div class="back-box">
            <div class="back-box_login">
                <h3>¿Ya tienes una cuenta?</h3>
                <p> Inicia sesion para entrar en la pagina</p>
                <button id="btn_login" onclick="changeMovementBox(2)"> Iniciar sesion</button>
            </div>
            <div class="back-box_register">
                <h3>¿Aun no posees una cuenta?</h3>
                <p> Registrate para entrar en la pagina</p>
                <button id="btn_register" onclick="changeMovementBox(1)"> Registrarse</button>
            </div>

            
        </div>

        <div class="form-login_register">
            <form action="php/user/login_account.php" method="POST" class="form-login">
                <h2> Iniciar sesion</h2>
                <input type="email" placeholder="Correo electronico" name="input_lg_email">
                <input type="password" placeholder="Contraseña" name = "input_lg_password" >
                <button> Entrar</button> 
            </form>

            <form action="php/user/register_account.php" method="POST" class="form-register">
                <h2> Registrarse</h2>
                <input type="email" placeholder="Correo electronico" name="input_email">
                <input type="text"  placeholder="Nombre de usuario" name="input_user_name"> 
                <input class=""type="password" placeholder="Contraseña" name="input_password">
                <button> Registrarse</button>
            </form>


        </div>
    </div>

    <!-- JS, Popper.js, and jQuery -->
    <script src="js/main.js"></script>
    <script src="https://unpkg.com/ionicons@5.2.3/dist/ionicons.js "></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js " integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj " crossorigin="anonymous "></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js " integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN " crossorigin="anonymous "></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js " integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV " crossorigin="anonymous "></script>
</body>