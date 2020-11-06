<?php 
    session_start();
    if(!isset($_SESSION['usser']))
    {
        header("location: ../../index.php");
        session_destroy();
        die();
    }
    else{
        include "../connect_DB.php";
        include "../user/load_dates.php";
    }
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title> Panel de usuario - Escobear</title>
    <link rel="icon" href="../images/logo.png"/>
    <link rel="stylesheet" href="../../styles/page-config.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>

<body>

    <div class="container" style="margin-top:80px;">

        <div class="row">

            <div class="col-3">
                <div class="container-card" style="border-radius:3px; background-color: rgb(48, 48, 48); width:100%">
                    <div>
                          <img src="https://www.w3schools.com/howto/img_avatar2.png">  
                            <h3> <?php echo $user_dates['account_name']?> </h3>
                    </div>  
                </div>
            </div>


        </div>


    </div>
    <div class="credits" style="margin-top:400px;">
        <div class="back-box-credits">
            <h1> Escobear</h1>
            <p> Sitio web desarrollado por xylospeed @2020</p>
            <div>
                <img src="../../images/iconos/youtube.png">
                <img src="../../images/iconos/discord.png">
                <img src="../../images/iconos/facebook.png">
                <img src="../../images/iconos/github.png">
            </div>
        </div>

    </div>

    
    <!-- JS, Popper.js, and jQuery -->
    <script src="https://unpkg.com/ionicons@5.2.3/dist/ionicons.js "></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js " integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj " crossorigin="anonymous "></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js " integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN " crossorigin="anonymous "></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js " integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV " crossorigin="anonymous "></script>
</body>

