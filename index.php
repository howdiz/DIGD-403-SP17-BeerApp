<?php

include 'dbConnection.php';

$sql = "SELECT
        Beers.id as beer_id, Beers.name as beerName, style, abv, rating, notes,
        Breweries.name as BreweryName, city, state, country
        FROM Beers JOIN Breweries ON Breweries.id = Beers.brewery_id";

$result = $conn->query($sql);

include 'head.php'; 

?>
<h1>Beers</h1>

<table class = "table table-striped">
   <thead>
      <tr>
         <th>Name</th>
         <th>Style</th>
         <th>ABV</th>
         <th>Brewery</th>
         <th>City</th>
         <th>State</th>
         <th>Country</th>
         <th></th>
         <th></th>
      </tr>
   </thead>
   <tbody>

        <?php
              // output data of each row
              while($row = $result->fetch_assoc()) {
              echo "<tr><td>" . $row['beerName'] . "</td><td>" . $row['style'] . "</td><td>" . $row['abv'] .
              "</td><td>" . $row['BreweryName'] . "</td><td>" . $row['city'] . "</td><td>" . $row['state'] .
              "</td><td>" . $row['country'] . 
              "</td><td> <a href=deleteBeer.php?beer_id=" . $row['beer_id']  ."> delete beer</a>" . 
              "</td><td> <a href=beerForm.php?beer_id=" . $row['beer_id']  . "> update beer</a>". "</td></tr>";
              }
        ?>
               </tbody>
            </table>
        </div>
    </body>
</html>    