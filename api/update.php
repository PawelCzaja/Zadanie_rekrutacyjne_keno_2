<?php
    include "../Database.php";
    if(isset($_POST['login']))
    {
        update($_POST['id'], $_POST['login'], $_POST['haslo'], $_POST['data_rejestracji'],  $_POST['email'], $_POST['miasto'], $_POST['kod_pocztowy'], $_POST['nr_telefonu']);
    }
?>