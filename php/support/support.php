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


        $id = $user_dates['account_id']; $query = "SELECT * FROM support WHERE support_id='$id'";
        $query_send = mysqli_query($mysql_escobear, $query);
        $support_date = mysqli_fetch_array($query_send);
        $var_error = "";

        if(isset($_REQUEST['submit_support']))
        { 
            $text = $_REQUEST['input_support'];
            if(strlen($text) >  40)
            {
                $tick = rand(2000, 999920);
                $query = "INSERT INTO support(support_id, support_ticket, support_text) VALUES ('$id', '$tick', '$text')";
                mysqli_query($mysql_escobear, $query);
                header("location: support.php");
            } else $var_error = "* El minimo es de 40 caracteres";
        }
        
    }
?>




<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title> Panel de usuario - Escobear</title>
    <link rel="icon" href="../../images/logo.png"/>
    <link rel="stylesheet" href="../../styles/user_menu.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>

<body>

    <input type="checkbox" class="toggle-check" id="toggle" hidden>
    <label class="toggle" for="toggle"> <ion-icon name="ellipsis-vertical-sharp"></ion-icon></label>
    <div class="container-menu"> 
        <nav class="menu">
            <a href="../news/news.php" class="menu-items"> <ion-icon name="notifications-outline"></ion-icon> Novedades</a>
            <a href="#" class="menu-items"><ion-icon name="pricetags-outline"></ion-icon>  Tienda </a>
            <a href="#" class="menu-items"> Soporte </a>
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
                    <a class="dropdown-item" type="button" href="../user/configuration.php"> Configuracion</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" type="button" href="../user/close_session.php">Cerrar Sesion</a>
                </div>
            </div>
            </nav>
        </nav>
    </div> 
    <div class="container">
        <div class="card-header bg-dark " style="color:white; margin-top: 4px;">Soporte</div>
        <?php 
        if(mysqli_num_rows($query_send) == 0) 
        { ?>
        <div class="row">
            <div class="col-1"> </div>
            <div class="col-10">
                <div class="card text-white bg-danger" style="padding: 5px; color:white; margin-top: 13px; border-radius:0;">Envia tu duda, error o problema que tengas</div>
                <form class="form-inline" style="background-color: white;padding: 10px; border-radius:2px;">

                    <div class="form-group mx-sm-1 mb-2" style="width: 100%;">
                    
                        <form action="" method="POST">
                            <input type="text" class="form-control" placeholder="maximo 120 caracteres" name="input_support" id="input_support" style="width: 85%;">
                            <input type="submit" value="Enviar" class="btn btn-success mb-2" style="margin-left: 4px;" name="submit_support"></input>
                        </form>
                        <p id="error_support"> <?php echo $var_error ?>  </p>
                    </div>
                </form>
            </div>
        </div> <?php } else {
            

        $query_if = "SELECT * FROM support WHERE support_id = '$id'";
        $if_query = mysqli_query($mysql_escobear, $query_if);
        $ticket_create = mysqli_fetch_array($if_query);
            ?>
        <div class="row">
            <div class="col">
                <div class="alert alert-success" role="alert">
                    <h4 class="alert-heading"> Tienes un ticket creado #<?php echo $support_date['support_ticket']?> </h4>
                    <p style="color:rgb(20, 92, 30); font-size:18px; font-height: 600;"> Lo sentimos pero ya se encontro un ticket creado por esta cuenta, espera que un administrador lo responda</p>
                    <hr>
                    <p class="mb-0" style="color:black;"> De cualquier forma, nuestro sistema eliminara su ticket si fue pasado por alto</p>
                </div>
            </div>
        </div>

        <div class="col">  
            <div class="card" style="width: 100%;">
                <div class="card-body">
                    <h5 class="card-title"> <?php echo $user_dates['account_name']?></h5>
                    <h6 class="card-subtitle mb-2 text-muted"> Cuenta ID: <?php echo $id ?> <br> Ticket ID: <?php echo $ticket_create['support_ticket'] ?></h6>
                    <p class="card-text" style="color:grey;"><?php echo $ticket_create['support_text']?></p>
                    <a href="#" class="card-link">Ver respuesta</a>
                    <a class="card-link" type="button" href="clear_ticket.php">Eliminar</a>
                </div>
            </div>
        </div>
        
            <?php }?>
        
        <div class="dropdown-divider" style="margin-top: 10px;"></div>



        <div class="row" style="margin-top: 30px;">
        <?php 
        if($user_dates['account_admin'] > 3) {
            $query_reports = mysqli_query($mysql_escobear, "SELECT * FROM support LIMIT 25");
            while($row = mysqli_fetch_array($query_reports))
            {
                $row_id = $row['support_id'];
                $query_row = "SELECT * FROM master WHERE account_id='$row_id'";
                $support_account = mysqli_query($mysql_escobear, $query_row);
                if(mysqli_num_rows($support_account) > 0)
                {
                    $support_account_dates = mysqli_fetch_array($support_account);
        ?> 
           <div class="col-4" style="margin-top: 6px;">  
            <div class="card" style="width: 100%;">
                <div class="card-body">
                    <h5 class="card-title"> <?php echo $support_account_dates['account_name']?></h5>
                    <h6 class="card-subtitle mb-2 text-muted"> Cuenta ID:<?php echo $support_account_dates['account_id']?> <br> Ticket ID: <?php echo $row['support_ticket']?></h6>
                    <p class="card-text" style="color:grey;"><?php echo $row['support_text']?></p>
                    <a href="#" class="card-link">Responder</a>
                    <a href="#" class="card-link">Eliminar</a>
                </div>
            </div>
            </div>

            <?php  }
            } 
        }?>
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

