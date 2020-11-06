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
    <link rel="stylesheet" href="../../styles/user_menu.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>

<body>
    
    <input type="checkbox" class="toggle-check" id="toggle" hidden>
    <label class="toggle" for="toggle"> <ion-icon name="ellipsis-vertical-sharp"></ion-icon></label>
    <div class="container-menu"> 
        <nav class="menu">
            <a href="news.php" class="menu-items"> <ion-icon name="notifications-outline"></ion-icon> Novedades</a>
            <a href="#" class="menu-items"><ion-icon name="pricetags-outline"></ion-icon>  Tienda </a>
            <a href="../support/support.php" class="menu-items"> Soporte </a>
            <a href="#" class="menu-items"> <ion-icon name="bar-chart-outline"></ion-icon>  Estadisticas</a>
            <a href="../table.php" class="menu-items"> Tablero</a>
            <br><br><br><br><br><br><br><br><br>

            <div class="dropdown-divider"></div>

            <nav class="navbar bg-dark">
            <a class="navbar-brand " href="#" id="name-menu">
                <img src="http://logonoid.com/images/freya-logo.png" width="30" height="30" class="d-inline-block align-top" alt="" id="image-menu">
                <?php echo $user_dates['account_name'];?>
            </a>
            <div class="btn-group dropleft">
                <button type="button" class="btn btn-secondary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="sr-only"></span>
                </button>
                <div class="dropdown-menu">
    
                    <button class="dropdown-item disabled" type="button">Cuenta Master</button>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" type="button" href="../user/config.php">Configuracion</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" type="button" href="../user/close_session.php">Cerrar Sesion</a>
                </div>
            </div>
            </nav>
        </nav>
    </div> 
    <div class="container">

        <div class="card-header bg-dark " style="color:white; margin-top: 4px;">Novedades 
            <?php 
            if($user_dates['account_admin'] > 2) {
            ?> <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo" style="left: 5px;"><ion-icon name="add-circle" style="width: 20px; height: 20px;"></ion-icon></button> 
            <?php } ?>
        </div>
        <?php 
        $query_news = mysqli_query($mysql_escobear, "SELECT * FROM news ORDER BY new_id DESC LIMIT 15");
        while($row = mysqli_fetch_array($query_news))
        {
            $int = $row['new_id'];
            $string = $int;

        ?>

        <div class="new-item" id="idItem<?php echo $string ?>">
            <?php 
            if($row['new_type'] == 1)
            { ?>
                <style> 
                    #idItem<?php echo $string ?>{
                        border-left-color: rgb(87, 24, 24);
                    }
                </style>
                <ion-icon name="extension-puzzle"></ion-icon>

            <?php }
            else if($row['new_type'] == 2)
            { ?>
                    <style>
                        #idItem<?php echo $string ?>{
                            border-left-color: rgb(143, 141, 40);
                     }
                    </style>
                    <ion-icon name="construct"></ion-icon>
            <?php }
            else if($row['new_type'] == 3)
            { ?>
                    <style>
                        #idItem<?php echo $string ?>{
                            border-left-color: rgb(34, 63, 126);
                        }
                    </style>
                    <ion-icon name="chatbubble"></ion-icon>
            <?php }

            ?> <h3> <?php echo $row['new_header']?></h3>
            <h6><?php echo $row['new_title']; ?> </h6>
            <p> <?php echo $row['new_info']; ?></p>
            <small class="text-muted"><?php echo $row['new_date']?> </small>
        </div>
        <?php } ?>

    </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Subir</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form action="validate_new.php" method="POST">
                <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Header:</label>
                    <input type="text" class="form-control" id="recipient-name" name="inputHeader">
                </div>
                <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Titulo:</label>
                    <input type="text" class="form-control" id="recipient-name" name="inputTitle">
                </div>
                <div class="form-group">
                    <label for="message-text" class="col-form-label">Informacion:</label>
                    <textarea class="form-control" id="message-text" name="inputText"></textarea>
                </div>

                <select class="form-control form-control-sm" name="inputType">
                <option value=1>Administracion</option>
                <option value=3>Mensaje</option>
                <option value=2>Desarrollo</option>
                </select>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-dark">Subir</button>
                </div>
            </form>
        </div>
        </div>
    </div>
</div>

    <div class="credits">
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

