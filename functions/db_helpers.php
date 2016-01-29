<?php 

function db_insert($table) {

	global $con;
	$query = $con->prepare("
		INSERT INTO :table");

}


function fetch_all($table) {
	
	global $con;
	$query = $con->prepare("
	SELECT * FROM :table
	");


	// $query->execute([
	// 'table' => '$table'
	// ]);

	$query =  $query->execute([
	'table' => '$table'
	]);

	return $query->rowCount();

	//$query->fetchAll(PDO::FETCH_ASSOC);
}


?>