<?php 
session_start();
require_once 'model.php';
		
echo $_SESSION['user_name'].'/'.$_SESSION['user_id'].'/'.$user_id.'/'.$name.'<br/.>';

 echo $action; 

	switch($action){
		//会員登録画面
		case "shingup":
			//会員情報のの入力確認
			if(!empty($name) && !empty($mail) && !empty($user_pass)){
				$no ='o';
				$shingup =SHINGUP($db,$user_pass,$mail,$no);
				if($shingup == True){
					$action ="shingup_complete";
					require_once 'view_shingup_confirm.php';
				}
				else{
					$error_msg ='このユーザー名は既に登録されています。';
					require_once 'view_shingup.php';
				}
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
				$comp_msg='会員登録が完了しました。ログインを行って下さい';
				$action ="login";
				require_once 'view_login.php';
		break;

		case "login":
			//ログイン画面
			if(!empty($user_name) && !empty($mail) && !empty($user_pass)){
				$action ="login_complete";
				
				$user_id = GETID($db,$name,$user_pass);
				$_SESSION['user_name']=$user_name;
				require_once 'index.php';
			}
			else{
				//入力されていなかったら戻る
				$ec ="action";
				require_once 'view_login.php';
			}
		break;

		case "login_complete":
		//ログイン確認
		$no ='1';
		$shingup =SHINGUP($db,$user_pass,$mail,$no);
		if($shingup == True){
			//ログイン画面確認
			
			$comp_msg='ログインが完了しました。';
		
		$user_id = GETID($db,$name,$user_pass);
			$_SESSION['user_id']=$user_id;
//			$_SESSION['user_name']=$user_name;
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
			$_SESSION = array();
			$action ="login";
			require_once 'view_login.php';
		break;
	
		//書き込みが行われた場合
		case "confirm":
			$login=LOGIN($user_name,$user_id);
			if($login == True){
				//パス入力のチェック
				if(!empty($pass)) {
				require_once 'view_confirm.php';
				}
				else{
				//入力されていなかったら戻る
				$ec = 'ec';
				require_once 'view.php';
				}
			}
			else{
				$error_msg ='ログインの確認が取れません。<br/>もう一度ログインし直して下さい。';
				require_once 'view_login.php';
			}
		break;

		case "complete":
			$login=LOGIN($user_name,$user_id);
			if($login == True){
				//登録の実行、完了画面の表示
				$sth= INSERTBBS($db,$user_id,$comment,$pass);
				require_once 'view_complete.php';
			}
			else{
				$error_msg ='ログインの確認が取れません。<br/>もう一度ログインし直して下さい。';
				require_once 'view_login.php';
			}
		break;
		
		case "delete":
			$login=LOGIN($user_name,$user_id);
			if($login == True){
				if($delete_user_name == $_SESSION['user_name']){
					//削除確認画面、pass入力
					require_once 'view_delete.php';
				}
				else{
					$error_msg ='登録者以外は削除出来ません。';
					$action ="";
					require_once 'view.php';
				}
			}
			else{
				$error_msg ='ログインの確認が取れません。<br/>もう一度ログインし直して下さい。';
				require_once 'view_login.php';
			}				
		break;
		
		case "delete2":
			$login=LOGIN($user_name,$user_id);
			if($login == True){
				//入力passのチェック
				if ($pass == $delete_pass){
				$sth = DELETEBBS($db,$id);
				//完了画面
				require_once 'view_delete_complete.php';
				}
				else{
				//エラーの場合戻る
				$error_msg ='削除パスが間違っています。';
				require_once 'view_delete.php';			
				}
			}
			else{
				$error_msg ='ログインの確認が取れません。<br/>もう一度ログインし直して下さい。';
				require_once 'view_login.php';
			}				
		break;
		
		default:
			$login=LOGIN($user_name,$user_id);
			if($login == True){
				//初期値
				require_once 'view.php';	
				}
			else{
				$error_msg ='ログインの確認が取れません。<br/>もう一度ログインし直して下さい。';
				require_once 'view_login.php';
			}				
			
		break;
}

//$cuting =	cutting($db);
?>	
