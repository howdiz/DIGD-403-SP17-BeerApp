<?php

include 'dbConnection.php';

$brewery_id = $_GET['brewery_id'];

$sql = "DELETE FROM Breweries WHERE id=$brewery_id";

$result = $conn->query($sql);

include 'head.php'; 

if ($conn->query($sql) === TRUE) {
    echo "Brewery deleted successfully";
} else {
    echo "There was an issue deleting the Brewery: " . $conn->error;
}
$conn->close();

?>

        </div>
    </body>
</html>    