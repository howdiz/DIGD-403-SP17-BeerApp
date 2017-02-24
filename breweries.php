<?php

include 'dbConnection.php';

$sql = "SELECT
        id, name, city, state, country
        FROM Breweries;";

$result = $conn->query($sql);

include 'head.php'; 

?>
<h1>Breweries</h1>

<li><a href="breweryForm.php">Add Brewery</a></li>

<table class = "table table-striped">
   <thead>
      <tr>
         <th>Name</th>
         <th>City</th>
         <th>State</th>
         <th>Country</th>
         <th></th>
         <th></th>
      </tr>
   </thead>
   <tbody>

<?php
 while($row = $result->fetch_assoc()) {
      echo 
      "</td><td>" . $row['name'] . "</td><td>" . $row['city'] . "</td><td>" . $row['state'] .
      "</td><td>" . $row['country'] . 
      "</td><td> <a href=deleteBrewery.php?brewery_id=" . $row['id']  ."> delete brewery</a>" . 
      "</td><td> <a href=breweryForm.php?brewery_id=" . $row['id']  . "> update brewery</a>". "</td></tr>";
      }
        ?>
               </tbody>
            </table>
        </div>
    </body>
</html>            
