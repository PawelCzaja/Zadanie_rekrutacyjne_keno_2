<?php
    include "../config.php";
    if(isset($_POST['login']))
    {
        // sprawdza poprawność danych
        if(
            preg_match('/^(.{1,40})@(.{1,20})\\.(pl|gr|com|edu)$/', $_POST['email']) && 
            preg_match('/^([0-9]{2}-[0-9]{3})$/', $_POST['kod_pocztowy']) && 
            preg_match('/^([0-9]{9})$/', $_POST['nr_telefonu']) && 
            preg_match('/^([A-Z|a-z|ą|Ą|ć|Ć|ł|Ł|ń|Ń|ó|Ó|ś|Ś|ź|Ź|ż|Ż]{3,100})$/', $_POST['miasto']) &&
            preg_match('/^(.{4,100})$/', $_POST['haslo']) &&
            preg_match('/^([A-Z|a-z|0-9]{3,100})$/', $_POST['login']))
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