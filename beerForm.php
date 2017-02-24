<?php
include 'dbConnection.php';

//Brewery Query for Related data dropdown
$sql = "SELECT id, name FROM Breweries";

$breweries = $conn->query($sql);

//Check if a beer_id was supplied in the URL Query Parameter
if (isset($_GET['beer_id'])) {
    
    $beer_id = $_GET['beer_id'];
    
    //Query DB for details on that beer
    $beerSQL = "SELECT * FROM Beers where id = $beer_id";
    $beer =  $conn->query($beerSQL)->fetch_assoc();
    
}


include 'head.php';
?>

            <form action="addBeer.php" method="post" class="form-signin">
                
                <?php if(isset($beer_id)) echo "<input type='hidden' name='beer_id' value=" . $beer_id ." >"; ?>
                
                <label for="brewery_id">Brewery:</label>
                <select name="brewery_id">
                <?php
                if ($breweries->num_rows > 0) {
                    // output data of each row
                    while($brewery = $breweries->fetch_assoc()) {
                        echo "<option value='" . $brewery["id"] ."'";
                        if (isset($beer['brewery_id']) and  $beer['brewery_id'] == $brewery["id"]) echo "selected";
                        echo ">" . $brewery["name"] . "</option>";
                    }
                }
                ?>
                </select>
                <div>
              <label for="name">Name:</label>
              <input type="text" name="name" class="form-control" <?php if (isset($beer['name'])) echo "value='" . $beer['name'] . "'"; ?> />
              </div>
              <div>
                  <label for="style">Style:</label>
                  <input type="text" name="style" class="form-control" <?php if (isset($beer['style'])) echo "value='" . $beer['style'] . "'"; ?>  />
              </div>
              <div>
                  <label for="abv">ABV:</label>
                  <input type="text" name="abv" class="form-control" <?php if (isset($beer['abv'])) echo "value='" . $beer['abv'] . "'"; ?>  />
              </div>
              <div>
                  <label for="rating">Rating:</label>
                  <input type="text" name="rating" class="form-control" <?php if (isset($beer['rating'])) echo "value='" . $beer['rating'] . "'"; ?>  />
              </div>
              <div>
                <label for="notes">Notes:</label>
                <textarea name="notes" class="form-control"><?php if (isset($beer['notes'])) echo $beer['notes']; ?></textarea>
              </div>
              <div class="button">
                  <button type="submit" class="btn btn-lg btn-primary btn-block">Submit</button>
              </div>
                
            </form>    
        </div>    
    </body>
</html>