<?php

include 'dbConnection.php';

$beer_id = $_GET['beer_id'];

$sql = "DELETE FROM Beers WHERE id=$beer_id";

$result = $conn->query($sql);

include 'head.php'; 

if ($conn->query($sql) === TRUE) {
    echo "Beer deleted successfully";
} else {
    echo "There was an issue deleting the beer: " . $conn->error;
}
$conn->close();

?>

        </div>
    </body>
</html>    