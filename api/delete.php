<?php
    include "../Database.php";
    if(isset($_POST["id"]))
    {
        delete($_POST["id"]);
        wypisz();
    }

?>