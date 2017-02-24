<?php

include 'dbConnection.php';

$name = $_POST['name'];
$city = $_POST['city'];
$state = $_POST['state'];
$country = $_POST['country'];

if (isset($_POST['brewery_id'])) {
    $brewery_id = $_POST['brewery_id'];
    $sql =  "UPDATE Breweries SET name='$name', city='$city', state = '$state', 
             country='$country'
             WHERE id = $brewery_id";
}else {
    $sql = "INSERT INTO Breweries (name, city, state, country)
            VALUES ('$name', '$city', '$state', '$country')";
}             

include 'head.php';

?>
      <div class="starter-template">
      <?php
        if ($conn->query($sql) === TRUE) {
            echo "<h1>New record created successfully</h1> <br>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        $conn->close();
      ?>


      Brewery: <?php echo $name ?><br>
      City: <?php echo $city ?><br>
      State: <?php echo $state ?><br>
      Country: <?php echo $country ?><br>

    </div>
  </body>
</html>