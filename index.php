<?php 
session_start();
require_once 'model.php';

		$login = SHINGUP($db,$name,$user_pass,$mail);
		
 echo $action; 

	switch($action){
		//会員登録画面
		case "shingup":
			//会員情報のの入力確認
			if(!empty($name) && !empty($mail) && !empty($user_pass)){
				$action ="shingup_complete";
			require_once 'view_shingup_confirm.php';
			}
			else{
				//入力されていなかったら戻る
				$ec ="ec";
				require_once 'view_shingup.php';
			}
		break;
		
		case "shingup_complete":
			//会員登録の実行、完了画面の表示
			$sth= INSERTUSER($db,$name,$mail,$user_pass);
			$comp_msg=$user_name.'会員登録が完了しました。ログインを行って下さい';
			$action ="login";
			require_once 'view_login.php';
		break;

		case "login":
			//ログイン画面
			if(!empty($user_name) && !empty($mail) && !empty($user_pass)){
				$action ="login_complete";
				$user_name=$_SESSION['user_name'];
				require_once 'index.php';
			}
			else{
				//入力されていなかったら戻る
				$ec ="action";
				require_once 'view_login.php';
			}
		break;

		case "login_complete":
		//ログイン画面確認
		$login = SHINGUP($db,$name,$user_pass,$mail);
		if($login == True){
			//ログイン画面確認
			$comp_msg='ログインが完了しました。';
			
			$user_id = GETID($db,$name,$user_pass);
			
			require_once 'view.php';
		}
		elseif($login == False){
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
			$sth= INSERTBBS($db,$user_id,$comment,$pass);
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
		break;
}

//$cuting =	cutting($db);
?>	
