<html>
    <head>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <meta charsert="utf-8">
    </head>
    <body>
        <p id="json"></p>
    </body>
    <script>

        // metoda insert
        function insert_api(login, haslo, email, miasto, kod_pocztowy, nr_telefonu)
        {
            $.ajax({ url: 'api/insert.php',
                data: {
                    login: login,
                    haslo: haslo,
                    email: email,
                    miasto: miasto,
                    kod_pocztowy: kod_pocztowy,
                    nr_telefonu: nr_telefonu
                },
                type: 'post',
                success: function(output){
                    console.log(output);
                    get_api();
                }
            });
        }

        // metoda delete wykorzystująca id jako parametr wyboru
        function delete_api(id)
        {
            $.ajax({ url: 'api/delete.php',
                data: {
                    id: id,
                },
                type: 'post',
                success: function(output){
                    console.log(output);
                    get_api();
                }
            });
        }

        //metoda update 
        function update_api(id, login, haslo, data_rejestracji, email, miasto, kod_pocztowy, nr_telefonu)
        {
            $.ajax({ url: 'api/update.php',
                data: {
                    id: id,
                    login: login,
                    haslo: haslo,
                    data_rejestracji: data_rejestracji,
                    email: email,
                    miasto: miasto,
                    kod_pocztowy: kod_pocztowy,
                    nr_telefonu: nr_telefonu
                },
                type: 'post',
                success: function(output){
                    console.log(output);
                    get_api();
                }
            });
        }

        // metoda get do wyświelania zawartosci bazy, wykorzystywana w każdej innej metodzie
        function get_api()
        {
            var get = "null";
            $.ajax({ url: 'api/get.php',
                data: {
                    get: "yes",
                },
                type: 'post',
                success: function(output){
                    $("#json").html(JSON.stringify(output, null, ' '));
                }
            });
            return get;
        }

        //insert_api("Adam", "12345", "Adam123@poczta.pl", "Warszawa", "00-001", "111222333");
        //delete_api(100);
        //update_api("35", "Adam", "12345", "2021-09-17", "Adam123@poczta.pl", "Katowice", "40-750", "111222333");


    </script>

</html>
