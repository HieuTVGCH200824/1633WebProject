<?php 
$mysqli = new mysqli('localhost','root','root','project') or die (mysqli_error($mysqli));
// SQl running function
function querySQL ($qry) {
	global $mysqli;
	$result = $mysqli->query($qry);
	if (!$result) {
		die(mysqli_error($mysqli));
	}
	return $result;
}

//encryp password to md5
function encryptPassword ($password) {
	return md5($password);
}
