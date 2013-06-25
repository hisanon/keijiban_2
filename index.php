<?php 
session_start();
require_once 'model.php';

$form_g =INPOST($form_g['']);

		
	switch($action){
		//会員登録画面
		case "shingup":
			list($name,$mail,$user_id,$user_pass,$user_name) = INPOST($db,$form_g['name'],$form_g['mail'],$form_g['user_id'],$form_g['user_pass'],$form_g['user_name']);

			$name =$_SESSION['name'];
			$mail =$_SESSION['mail'];
			$user_pass =$_SESSION['user_pass'];
			//会員情報のの入力確認
			if(!empty($name) && !empty($mail) && !empty($user_pass)){
				//入力値一致数のチェック
				$no ='o';
				$shingup =SHINGUP($db,$user_pass,$name,$no);
				if($shingup == True){
					//アドレスのチェック
					if ($ret) {
						$action ="shingup_complete";
						require_once 'view_shingup_confirm.php';
					}
					elseif(!$ret) {
						$error_msg = 'アドレスを正しい形式で入力して下さい。';
						require_once 'view_shingup.php';
					}
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
		
		
		//登録完了
		case "shingup_complete":
			//会員登録の実行、完了画面の表示
				$sth= INSERTUSER($db,$name,$mail,$user_pass);
				$comp_msg='会員登録が完了しました。ログインを行って下さい';
				$action ="login";
				require_once 'view_login.php';
		break;
		

		//ログイン画面
		case "login":
			if(!empty($user_name) && !empty($user_pass)){
				$action ="login_complete";
				
				require_once 'index.php';
			}
			else{
				//入力されていなかったら戻る
				$ec ="action";
				require_once 'view_login.php';
	
			}
		break;


			//ログイン確認
		case "login_complete":
			//情報の一致数の確認
			$no ='1';
			$shingup =SHINGUP($db,$user_pass,$name,$no);
			//ログインの確認
			if($shingup == True){
				//ログイン画面確認
				$comp_msg='ログインが完了しました。';
		
				//セッショッンに保管する情報の取得
				list($form_g['user_id'],$form_g['user_name']) = GETID($db,$name,$user_pass);
			
				$_SESSION['user_id']=$form_g['user_id'];
				$_SESSION['user_name']=$form_g['user_name'];
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
			$ec ='ec';
			require_once 'view_login.php';
		break;
	
		//書き込みが行われた場合
		case "confirm":
			//ログイン確認
			$login=LOGIN($user_name,$user_id);
			if($login == True){
				//パス入力のチェック
				if(!empty($pass)) {
					$_SESSION['comment']=$form_g['comment'];
					$_SESSION['pass']=$form_g['pass'];
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
			//ログイン確認
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
			//ログイン確認
			$login=LOGIN($user_name,$user_id);
			if($login == True){
				list($comment,$pass,$delete_user_name) = GETDELETE($db,$id);
					$_SESSION['comment'] =$comment;
					$_SESSION['delete_user_pass'] =$delete_user_pass;

				//削除ユーザーとコメント記入ユーザーの一致確認
				if( $delete_user_name == $_SESSION['user_name']){
					//削除確認画面、pass入力
					
					$comment =$_SESSION['comment'];
					$delete_user_pass =$_SESSION['delete_user_pass'];
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
			//ログイン確認
			$login=LOGIN($user_name,$user_id);
			if($login == True){
				//入力passのチェック
				if ($pass == $delete_pass){
				//削除の実行
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
			//ログイン確認
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

$db =	null;
?>	
