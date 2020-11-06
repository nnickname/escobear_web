<?php
    include "../connect_DB.php";
    
    session_start();
    if(isset($_SESSION['usser']))
    {
        header("location: news/news.php");
    }else session_destroy();

    session_start();

    $login_email = $_POST['input_lg_email'];
    $login_password = $_POST['input_lg_password'];
    $var_type_error = 0;

    $validate_email = mysqli_query($mysql_escobear, "SELECT * FROM master WHERE account_email ='$login_email'");
    $validate_mysql_password = mysqli_query($mysql_escobear, "SELECT account_password FROM master WHERE account_email ='$login_email'");
    if(mysqli_num_rows($validate_email) > 0)
    {
        if(strlen($login_email) < 11) $var_type_error = 3;
        if(strlen($login_password) < 7) $var_type_error = 4;
        while($rowData = mysqli_fetch_assoc($validate_mysql_password)){
        $password_mysql = $rowData["account_password"];     
        }
        if(password_verify($login_password, $password_mysql))
        {
            $_SESSION['usser'] = $login_email;
        }else $var_type_error = 2;
    } else $var_type_error = 1;
?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title> Inicio - escobear</title>
    <link rel="icon" href="../images/logo.png"/>
    <link rel="stylesheet" href="../../styles/main.css">
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
            <form action="login_account.php" method="POST" class="form-login">
                <h2> Iniciar sesion</h2>
                <p id="error_register"></p>
                <input type="email" placeholder="Correo electronico" name="input_lg_email">
                <input type="password" placeholder="Contraseña" name = "input_lg_password" >
                <button> Entrar
                    <span class="spinner-border spinner-border-sm" role="" aria-hidden="true" id="spinner_register"></span>
                </button> 
            </form>

            <form action="register_account.php" method="POST" class="form-register">
                <h2> Registrarse</h2>
                <input type="email"  placeholder="Correo electronico" name="input_email">
                <input type="text"  placeholder="Nombre de usuario" name="input_user_name"> 
                <input class=""type="password"  placeholder="Contraseña" name="input_password">
                <button> 
                    Registrarse
                </button>
            </form>


        </div>
    </div>

    <div class="modal fade" id="succesfulBackDrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
        <div class="modal-header">
            <img src="../../images/logo.png" class="minimalist_logo"> <h5 class="modal-title" id="staticBackdropLabel">  Escobear</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <ion-icon name="shuffle-outline"></ion-icon> Iniciaste sesion, redirigiendote al panel de usuario
        </div>
        </div>
    </div>
    </div>

    <!-- JS, Popper.js, and jQuery -->
    <script src="../js/main.js"></script>
    <script src="https://unpkg.com/ionicons@5.2.3/dist/ionicons.js "></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js " integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj " crossorigin="anonymous "></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js " integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN " crossorigin="anonymous "></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js " integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV " crossorigin="anonymous "></script>
</body>


<?php
    echo '
    <script> setTimeout(() => {
        document.getElementById("spinner_register").style.visibility = "hidden";
    }, 700);
    
    </script>
    ';

    if($var_type_error != 0)
    {
        if($var_type_error == 1) echo '<script> document.getElementById("error_register").innerHTML = "* El correo electronico no se encuentra registrado"; </script>';
        else if($var_type_error == 2)  echo '<script> document.getElementById("error_register").innerHTML = "* La contraseña es incorrecta" ; </script>';
        else if($var_type_error == 3)  echo '<script> document.getElementById("error_register").innerHTML = "* Ingresa un correo electronico" ; </script>';
        else if($var_type_error == 4)  echo '<script> document.getElementById("error_register").innerHTML = "* Ingresa una contraseña" ; </script>';
    }else
    {
        echo '
        <script>
        $("#succesfulBackDrop").modal("show");

        setTimeout(() => {
            window.location = "../news/news.php";
        }, 2000);
        </script>
        ';

        
    }
?>