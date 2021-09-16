<?php
    
    function laczenia_z_baza()
    {
        $host = "localhost";
        $user = "root";
        $passwd = "";
        $db = "restapi";

        $con = mysqli_connect($host, $user, $passwd, $db);
        if (mysqli_connect_errno()) 
        {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
            exit();
        }
        else
        {
            return $con;
        }
    }


    function wypisz()
    {
        $con = laczenia_z_baza();
        $sql = "
        SELECT login, haslo, data_rejestracji, adres_email, miasto, kod_pocztowy, nr_telefonu 
        FROM dane_uzytkownikow 
        LEFT JOIN ustawienia_uzytkownikow 
        ON dane_uzytkownikow.id = ustawienia_uzytkownikow.id_uzytkownika 
        ORDER BY login;";

        $result = mysqli_query($con, $sql);

        $users = [];

        while ($row = mysqli_fetch_row($result))
        {
            $user = array(

                'login' => $row[0],
                'haslo' => $row[1],
                'data_rejestracji' => $row[2],
                'adres_email' => $row[3],
                'miasto' => $row[4],
                'kod_pocztowy' => $row[5],
                'nr_telefonu ' => $row[6]
        
            );
            array_push($users, $user);
        }
        header('Content-Type: application/json');
        echo json_encode($users, JSON_PRETTY_PRINT);
    }


    function insert($login, $haslo, $email, $miasto, $kod_pocztowy, $nr_telefonu)
    {
        $con = laczenia_z_baza();
        $sql1 = "
        INSERT INTO `ustawienia_uzytkownikow`
        (`adres_email`, `miasto`, `kod_pocztowy`, `nr_telefonu`) 
        VALUES 
        ('".$email."','".$miasto."','".$kod_pocztowy."','".$nr_telefonu."')";

        $sql2 = "
        INSERT INTO `dane_uzytkownikow`
        (`login`, `haslo`) 
        VALUES 
        ('".$login."','".$haslo."')";

        mysqli_query($con, $sql1);
        mysqli_query($con, $sql2);
    }

    function delete($id)
    {
        $con = laczenia_z_baza();
        $sql1 = "DELETE FROM `ustawienia_uzytkownikow` WHERE id_uzytkownika = ".$id."";
        $sql2 = "DELETE FROM `dane_uzytkownikow` WHERE id = ".$id."";

        mysqli_query($con, $sql1);
        mysqli_query($con, $sql2);
    }

    function update($id, $login, $haslo, $data_rejestracji, $email, $miasto, $kod_pocztowy, $nr_telefonu)
    {
        $con = laczenia_z_baza();
        $sql1 = "UPDATE `dane_uzytkownikow` SET `id`='".$id."',`login`='".$login."',`haslo`='".$haslo."' WHERE id = ".$id;
        $sql2 = "
        UPDATE `ustawienia_uzytkownikow` 
        SET `id_uzytkownika`='".$id."',
        `data_rejestracji`='".$data_rejestracji."',
        `adres_email`='".$email."',
        `miasto`='".$miasto."',
        `kod_pocztowy`='".$kod_pocztowy."',
        `nr_telefonu`='".$nr_telefonu."' 
        WHERE id_uzytkownika = ".$id;

        mysqli_query($con, $sql1);
        mysqli_query($con, $sql2);
    }

    wypisz()

?>