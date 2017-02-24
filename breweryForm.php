<?php 
include 'dbConnection.php';

if (isset($_GET['brewery_id'])) {
  
    
    $brewery_id = $_GET['brewery_id'];
    
    //Query DB for details on that beer
    $brewerySQL = "SELECT * FROM Breweries where id = $brewery_id";
    $brewery =  $conn->query($brewerySQL)->fetch_assoc();
    
}

include 'head.php'; ?>

      <form action="addBrewery.php" method="post" class="form-signin">
        
        <?php if(isset($brewery_id)) echo "<input type='hidden' name='brewery_id' value=" . $brewery_id ." >"; ?>
        
        <h1 class="form-signin-heading">Enter Brewery</h1>

        <label for="name">Name:</label>
        <input type="text" name="name" class="form-control" <?php if (isset($brewery['name'])) echo "value='" . $brewery['name'] . "'"; ?> />

        <label for="city">City:</label>
        <input type="text" name="city" class="form-control" <?php if (isset($brewery['city'])) echo "value='" . $brewery['city'] . "'"; ?>/>

        <label for="state">State:</label>
        <input type="text" name="state" class="form-control" <?php if (isset($brewery['state'])) echo "value='" . $brewery['state'] . "'"; ?>/>

        <label for="country">Country:</label>
        <input type="text" name="country" class="form-control" <?php if (isset($brewery['country'])) echo "value='" . $brewery['country'] . "'"; ?>/>

        <button type="submit" class="btn btn-lg btn-primary btn-block">Submit</button>

      </form>
    </div>
  </body>
</html>