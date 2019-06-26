<?php define('ISITSAFETORUN', TRUE); ?>
<!doctype html>
<head>
</head>
<body>
<h1>tma02_connect to database.php</h1> 
<?php 
echo"Confirm that PHP is running on this server";
?>
<p>Now connect to the database - insert your own details in the file tma02_mydatabase.php. These details are on the welcome page of your server</p>
<?php
require "tma02_mydatabase.php";
//connect to this host
$dbhandle = mysqli_connect( $hostname, $username, $password ) or die( "Unable to connect to MySQL");
echo "<p>Connected to MySQL</p>"
?>
<?php
//select a database to work with
$selected = mysqli_select_db(  $dbhandle, $mydatabase ) or die("Unable to connect to " . $mydatabase );
echo "<p>Connected to MySQL database " . $mydatabase . "</p>"
?>
</body>
</html>


