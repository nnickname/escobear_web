<?php
    include "../connect_DB.php";
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") 
    {

        $new_header = $_POST['inputHeader'];
        $new_title = $_POST['inputTitle'];
        $new_text = $_POST['inputText'];
        $new_type = $_POST['inputType'];
        $new_date = date("Y/m/d");
        if(strlen($new_header) > 6 && strlen($new_title) > 8 && strlen($new_text))
        {
            $query = "INSERT INTO news (new_header, new_title, new_info, new_date, new_type) VALUES ('$new_header','$new_title', '$new_text', '$new_date', '$new_type')";
            $mysql_query = mysqli_query($mysql_escobear, $query);
            if($mysql_query)
            {
                header("location: news.php");
            }
        }else header("location: news.php");
    }


?>