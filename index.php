<?php
require_once 'model.php';

	switch($action){		
		case "confirm":
			if(!empty($pass)) {
			require_once 'view_confirm.php';
			}
			else{
			require_once 'view.php';
			}
		break;

		case "complete":
			$insert= INSERTBBS($db,$name,$comment,$pass);
			require_once 'view_complete.php';
		break;
		
		case "delete":
			require_once 'view_delete.php';
		break;
		
		case "delete2":
			if ($pass == $delete_pass){
			$delete = DELETEBBS($db,$name,$comment,$pass,$id);
			require_once 'view_delete_complete.php';
			}
			else{
			require_once 'view_delete.php';			
			}
		break;
		
		default:
			require_once 'view.php';
}
$cuting =	cutting($db);

?>	
