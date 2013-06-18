<?php 
session_start();
require_once 'model.php';
//$action ="shingup";

// echo $action; 

$login = SHINGUP ($user_name,$mail,$user_pass,$login);

	switch($action){
		//会員登録画面
		default:
			//ログイン画面確認
			if($login == false){
				//パス入力のチェック
				if(!empty($user_pass)) {
					$action ="";
					$action ='shingup_coufirm';
					require_once 'view_shingup_confirm.php';
				}
				else{
				//入力されていなかったら戻る
				require_once 'view_shingup.php';
				}
			}
			else{
				$error_msg = $_SESSION['user_name'].'としてログイン中です。<br />ログアウトしてから登録して下さい。';
				require_once 'view_shingup.php';
			}

		break;
		
		case "shingup_complete":
			//会員登録の実行、完了画面の表示
			$sth= INSERTUSER($db,$user_name,$mail,$user_pass);
			$comp_msg='会員登録が完了しました。ログインを行って下さい';
			$user_name ="";
			$user_pass ="";
			$action ="login";
			require_once 'view_login.php';
		break;

		case "login":
			//ログイン画面
			$action ="login";
			require_once 'view_login.php';
		break;

		case "login_complete":
			$login = SHINGUP ($user_name,$user_pass,$login);
			//ログイン画面確認
			if($login == true){
				$comp_msg='ログインが完了しました。';
				$pass ="";
				$name ="";
				$action ="";
				require_once 'view.php';
			}
			else{
				$error_msg ='入力情報が正しくありません。';
				require_once 'view_login.php';
			}
		break;

		case "logout":
			//ログアウトの確認
			require_once 'view_logout.php';
		break;

		case "logout_complete":
			//ログアウトの実行
				//unset($_SESSION['user_name']);
				$_SESSION = array();
			$action ="login";
			require_once 'view_login.php';
		break;
	
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
			$sth= INSERTBBS($db,$user_name,$comment,$pass);
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
		
		case "":
			//初期値
			require_once 'view.php';				
		break;
}

//$cuting =	cutting($db);
?>	
