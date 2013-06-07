<?php
require_once 'db.php';

	$query_s ="SELECT * FROM comments ORDER by id desc" ;
	$result_s =mysqli_query($db,$query_s) or die('ERROR!2');

?>