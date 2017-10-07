<?php
require 'db.php';

$car_model    = htmlspecialchars($_POST['car_model']);
$weight   = htmlspecialchars($_POST['weight']);
$manufacture_year = htmlspecialchars($_POST['manufacture_year']);

// Required field names
$required = array('car_model', 'weight', 'manufacture_year');

// Loop over field names, make sure each one exists and is not empty
$error = false;
foreach($required as $field) {
  if (empty($_POST[$field])) {
    $error = true;
  }
}

if (!$error) {
    $sql="INSERT INTO tbl_automobiles (car_model, weight, manufacture_year)
    VALUES
    ('$car_model','$weight','$manufacture_year')";

    // run SQL command to update table of automobiles
    if ($conn->query($sql) === TRUE) {
        echo "One record has been added";
      } else {
        echo "Error updating table: " . $conn->error;
    }

    echo "
      <table>
        <thead style = 'font-weight: bold'>
          <td> Car Model </td>
          <td> Weight </td>
          <td> Manufacture Year </td>
        </thead>
        <tr>
          <td>" . $car_model . "</td>
          <td>" . $weight . "</td>
          <td>" . $manufacture_year . "</td>
        </tr>
      </table>
      <a href='index.php'>Go Back to Home Page</a>";
  } else {
    echo "
      Please enter all fields
      <p><a href='index.php'>Go Back</a><p>";
};


$conn->close();

?>