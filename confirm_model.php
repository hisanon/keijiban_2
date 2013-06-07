<?php
require_once 'db.php';

$query ="INSERT INTO comments(name,comment,pass) VALUES('$name','$comment','$pass')";
$result =mysqli_query($db,$query) or die('ERROR!1');

?>	
