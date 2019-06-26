<?php
if(!defined('ISITSAFETORUN')) {
//http_response_code(404);
   die(''); // and issue a 404 page not found
}
?>
<p> </p>
<label for="sectiond" class="showhide">Show Hide: Data in Table</label>
<input type="checkbox" id="sectiond" value="button" style="display:none;"/>
<section id="dsection">
<h3>The data from the database table</h3>
<table>
<?php
$sql = "SELECT id, firstname, lastname, email, notes FROM $mytable"; // no user input. Notes variable added to table 
$result = mysqli_query($dbhandle, $sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>id: " . $row["id"]. "</td><td>Firstname: " . htmlspecialchars($row["firstname"]). "</td><td>Lastname: " . htmlspecialchars($row["lastname"]). "</td><td> email= " . htmlspecialchars($row["email"]). "</td><td>notes: " . htmlspecialchars($row["notes"]). "</td></tr>"; //notes row added to table
    }
} else {
    echo "0 results";
}

?>
</table>
</section>

