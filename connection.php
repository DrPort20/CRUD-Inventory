<?php 

$host = 'localhost';
$db_name = 'datapenyimpanan';
$user = 'root';
$pwd = '';
 
$conn = new mysqli($host, $user, $pwd, $db_name); 

function query($query) {
	global $conn;
	$result = mysqli_query($conn, $query);
	$rows = [];
	while( $row = mysqli_fetch_assoc($result) ) {
		$rows[] = $row;
	}
	return $rows;
}
?>