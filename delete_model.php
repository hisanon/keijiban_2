<?php
require_once 'db.php';

	$query ="DELETE FROM comments WHERE id = $id";
	$result =mysqli_query($db,$query) or die('ERROR:削除出来ませんでした。');


?>