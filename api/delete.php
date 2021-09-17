<?php
    include "../config.php";
    if(isset($_POST["id"]))
    {
        // sprawdza poprawność danych
        if(sprawdz_id($_POST['id']))
        {
            delete($_POST["id"]);
        }
        // w przypadku błędnych danych wysyła response 400
        else
        {
            echo "błędny format danych";
            http_response_code(400);
        }
    }

?>