<?php

include 'dbConnection.php';

$brewery_id = $_POST['brewery_id'];

$name = $conn->real_escape_string($_POST['name']);
$style = $conn->real_escape_string($_POST['style']);
$abv = $conn->real_escape_string($_POST['abv']);
$rating = $conn->real_escape_string($_POST['rating']);
$notes = $conn->real_escape_string($_POST['notes']);

if (isset($_POST['beer_id'])) {
    $beer_id = $_POST['beer_id'];
    $sql =  "UPDATE Beers SET name='$name', style='$style', abv = '$abv', 
             rating='$rating', notes = '$notes'
             WHERE id = $beer_id";
}             
else {
    $sql = "INSERT INTO Beers (name, brewery_id, style, abv, rating, notes)
            VALUES ('$name', '$brewery_id', '$style', '$abv', '$rating', '$notes')";

}  


include 'head.php';

      if ($conn->query($sql) === TRUE) {
          echo "<h2 class='form-signin-heading''>New record created successfully</h2> <br>";
      } else {
          echo "Error: " . $sql . "<br>" . $conn->error;
      }
      $conn->close();
       ?>

      Beer: <?php echo $name ?><br>
      Style: <?php echo $style ?><br>
      abv: <?php echo $abv ?><br>
      rating: <?php echo $rating ?><br>
      notes: <?php echo $notes ?><br>
      </div>
    </div>
  </body>
</html>