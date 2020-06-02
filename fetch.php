<?php
        $servername = "sql9.freemysqlhosting.net";
        $username = "sql9345016";
        $password = "Ysr9sGuNra";
        $dbname = "sql9345016";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        } 
        $string = file_get_contents("http://geodata.grid.unep.ch/api/countries/KE/variables/331");
        $json = json_decode($string, true);


        foreach($json['rates'] as $date =>$conversion){
            $sql = "INSERT INTO iso (iso, year, value)
                    VALUES ( '$iso-2', $year,'$value')";

            if ($conn->query($sql) === TRUE) {
                echo "New record created successfully"."<br>";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error."<br>";
            }

        }
        $conn->close();
        ?>
