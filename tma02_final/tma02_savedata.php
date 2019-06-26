<?php
if(!defined('ISITSAFETORUN')) {
//http_response_code(404);
   die(''); // and issue a 404 page not found
}
?>
<div class="report">Saving the form data to the database table. In script tma02_savedata.php</div>
<?php
if (!empty($_POST))
{
	if (isset($webdata['editid'] )) {echo "<h2>editid is set</h2>";}
	if (!empty($webdata['editid'] )){echo "<h2>editid is not empty</h2>";}
	
	if (isset($webdata['editid'] ) && !empty($webdata['editid'] )){
		$sql = "UPDATE $mytable SET firstname = ? , lastname= ? , email = ? , notes = ?  WHERE id = ? "; //notes added 
		?>
		<div class="report">Using SQL to save form: <?php echo $sql ?></div>
		<?php
		$stmt = mysqli_prepare($dbhandle, $sql );
		mysqli_stmt_bind_param($stmt, 'sssss', $webdata['firstname'], $webdata['lastname'], $webdata['email'], $webdata['notes'], $webdata['editid']); //notes added 
		
	}else{
	$sql = "INSERT INTO $mytable (firstname, lastname, email, notes) VALUES (?,?,?,?)"; //notes added as well as an additional value '?'
	?>
		<div class="report">Using SQL to save form: <?php echo $sql ?></div>
		<?php
	$stmt = mysqli_prepare($dbhandle, $sql );
	mysqli_stmt_bind_param($stmt, 'ssss', $webdata['firstname'], $webdata['lastname'], $webdata['email'], $webdata['notes']); //notes added
	
} 
	/* execute prepared statement */
	mysqli_stmt_execute($stmt);
	printf("%d <h2>Data Saved</h2>\n", mysqli_stmt_affected_rows($stmt));
	/* close statement and connection */
	mysqli_stmt_close($stmt);
}
?>
<div class="report">Data has been saved. In script tma02_savedata.php</div>