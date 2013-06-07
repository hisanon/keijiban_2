<?php
require_once 'db.php';

	$query ="SELECT * FROM comments ORDER by id desc" ;
	$result =mysqli_query($db,$query) or die('ERROR!2');

?>