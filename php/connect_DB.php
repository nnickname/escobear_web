<?php

    $mysql_host = "localhost";
    $mysql_user = "root";
    $mysql_password = "";
    $mysql_database = "escobear_db";


    $mysql_escobear = mysqli_connect($mysql_host, $mysql_user, $mysql_password, $mysql_database);

    $table_user = mysqli_query($mysql_escobear, "CREATE TABLE IF NOT EXISTS `master` (account_id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, account_name VARCHAR(20) NOT NULL,
        account_email VARCHAR(41) NOT NULL, account_password VARCHAR(61) NOT NULL,
        account_cash int(45) NOT NULL, account_admin int(2) NOT NULL)");


    $table_news = mysqli_query($mysql_escobear, "CREATE TABLE IF NOT EXISTS `news` (new_id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, new_header VARCHAR(120) NOT NULL, new_title VARCHAR(60) NOT NULL,
     new_info VARCHAR(400) NOT NULL,
    new_date VARCHAR(40) NOT NULL, new_type int(4) NOT NULL)");

    $table_support = mysqli_query($mysql_escobear, "CREATE TABLE IF NOT EXISTS `support` (support_id INT(6) PRIMARY KEY , support_ticket INT(6) NOT NULL, support_text VARCHAR(120) NOT NULL, support_resp VARCHAR(120) NOT NULL,
    support_appeal int(8) NOT NULL)");
?>
