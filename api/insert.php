<?php
    include "../config.php";
    if(isset($_POST['login']))
    {
        // sprawdza poprawność danych
        if(
            sprawdz_email($_POST['email']) && 
            sprawdz_kod_pocztowy($_POST['kod_pocztowy']) && 
            sprawdz_nr_telefonu($_POST['nr_telefonu']) && 
            sprawdz_miasto($_POST['miasto']) &&
            sprawdz_miasto($_POST['haslo']) &&
            sprawdz_miasto($_POST['login']))
        {
            insert(
                $_POST['login'], 
                $_POST['haslo'], 
                $_POST['email'], 
                $_POST['miasto'], 
                $_POST['kod_pocztowy'], 
                $_POST['nr_telefonu']
            );
        }
        // w przypadku błędnych danych wysyła response 400
        else
        {
            echo "błędny format danych";
            http_response_code(400);
        }
    }
?>