<?php
    if(isset($_SESSION['usser']))
    {
        $session = $_SESSION['usser'];
        $query = "SELECT * FROM master WHERE account_email = '$session' LIMIT 1";
        $dates = mysqli_query($mysql_escobear, $query);
        $user_dates = mysqli_fetch_array($dates);
    }

?>