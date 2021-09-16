<?php
    include "../Database.php";
    if(isset($_POST['login']))
    {
        insert($_POST['login'], $_POST['haslo'], $_POST['email'], $_POST['miasto'], $_POST['kod_pocztowy'], $_POST['nr_telefonu']);
    }
?>