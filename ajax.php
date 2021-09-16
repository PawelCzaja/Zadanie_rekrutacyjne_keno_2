<html>
    <head>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    </head>
    <body>
        <button></button>
    </body>
    <script>

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
                    get_api()
                }
            });
        }

        function delete_api(id)
        {
            $.ajax({ url: 'api/delete.php',
                data: {
                    id: id,
                },
                type: 'post',
                success: function(output){
                    console.log(output);
                    get_api()
                }
            });
        }

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
                    get_api()
                }
            });
        }

        function get_api()
        {
            $.ajax({ url: 'api/get.php',
                data: {
                    get: "yes",
                },
                type: 'post',
                success: function(output){
                    document.write(JSON.stringify(output));
                }
            });
        }

        //delete_api(11);
        insert_api("Wiktoria", "wikusia", "wiki@gmail.com", "jastrzebie zdruj", "22-222", "444111444")

    </script>

</html>
