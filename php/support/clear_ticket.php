<?php 
        session_start();

        include "../connect_DB.php";
        include "../user/load_dates.php";

        
        $id = $user_dates['account_id'];
        $query = "DELETE FROM support WHERE support_id = '$id'";
        $query_if = mysqli_query($mysql_escobear, $query);
        if($query_if) header("location: support.php");

?>