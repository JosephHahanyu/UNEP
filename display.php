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


        $sql = "SELECT id_iso, year, value FROM iso";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  echo "<table><tr><th>ID</th><th>ISO</th><th>Year</th><th>Value</th></tr>";
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "<tr><td>".$row["id_iso"]."</td><td>".$row["year"]."</td><td>".$row["value"]."</td></tr>";
  }
  echo "</table>";
} else {
  echo "0 results";
}
$conn->close();

        $conn->close();
        ?>
