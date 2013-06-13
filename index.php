<?php session_start();
require_once 'model.php';
$t_idname ="";

	switch($action){		
		//書き込みが行われた場合
		case "confirm":
			//パス入力のチェック
			if(!empty($pass)) {
			require_once 'view_confirm.php';
			}
			else{
			//入力されていなかったら戻る
			require_once 'view.php';
			}
		break;

		case "complete":
			//登録の実行、完了画面の表示
			$sth= INSERTBBS($db,$name,$comment,$pass);
			require_once 'view_complete.php';
		break;
		
		case "delete":
			//削除確認画面、pass入力
			require_once 'view_delete.php';
		break;
		
		case "delete2":
			//入力passのチェック
			if ($pass == $delete_pass){
			$sth = DELETEBBS($db,$id);
			//完了画面
			require_once 'view_delete_complete.php';
			}
			else{
			//エラーの場合戻る
			require_once 'view_delete.php';			
			}
		break;
		
		default:
			//初期値
			require_once 'view.php';
}

//$cuting =	cutting($db);
?>	
