<?php 
session_start();
require_once 'model.php';

		
	switch($action){
		//会員登録画面
		case "shingup":
			$user_name =$_POST['user_name'];
			//会員情報のの入力確認
			if(!empty($user_name) && !empty($mail) && !empty($user_pass)){
				//入力値一致数のチェック
				$no ='o';
				$shingup =SHINGUP($db,$user_pass_b,$user_name,$no);
				if($shingup == True){
					//アドレスのチェック
					if ($ret) {
						$action ="shingup_complete";
						$_SESSION['user_name']=$user_name;
						$_SESSION['mail']=$mail_b;
						$_SESSION['user_pass']=$user_pass_b;

						require_once 'view_shingup_confirm.php';
					}
					elseif(!$ret) {
						$error_mail = 'アドレスを正しい形式で入力して下さい。';
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
			$user_name_s=$_SESSION['user_name'];
			$mail_s=$_SESSION['mail'];
			$user_pass_s=$_SESSION['user_pass'];
			//会員登録の実行、完了画面の表示
				$sth= INSERTUSERS($db,$user_name_s,$mail_s,$user_pass_s);
				$comp_msg='会員登録が完了しました。ログインを行って下さい';
				$action ="login";

				unset($_SESSION['user_name']);
				unset($_SESSION['mail']);
				unset($_SESSION['user_pass']);

				require_once 'view_login.php';
		break;
		

		//ログイン画面
		case "login":
			$user_name =$_POST['user_name'];
			$user_pass =$_POST['user_pass'];
			
			if(!empty($user_name) && !empty($user_pass)){
				//情報の一致数の確認
				$no ='1';
				$shingup =SHINGUP($db,$user_pass,$user_name,$no);
				//ログインの確認
				if($shingup == True){
					//ログイン画面確認
					$comp_msg='ログインが完了しました。';
						$_SESSION['user_name']=$user_name;
					//セッショッンに保管する情報の取得と保存
					$user_id= GETID($db,$user_name,$user_pass);
					$_SESSION['user_id']=$user_id;
					$action ="";
					require_once 'view.php';
				}
				else{
					$error_msg ='入力情報が正しくありません。';
					require_once 'view_login.php';
				}
			}
			else{
				//入力されていなかったら戻る
				$ec ="action";
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
			$login=LOGIN();
			if($login == True){
				$comment =$_POST['comment'];
				$pass =$_POST['pass'];			
				//パス入力のチェック
				if(!empty($pass)) {
					$_SESSION['comment']=$comment;
					$_SESSION['pass']=$pass;
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
			$login=LOGIN();
			if($login == True){
				$comment_s =$_SESSION['comment'];
				$pass_s =$_SESSION['pass'];
				$user_id_s =$_SESSION['user_id'];
										
				//登録の実行、完了画面の表示
				$sth= INSERTBBS($db,$user_id_s,$comment_s,$pass_s);
				
				unset($_SESSION['comment']);
				unset($_SESSION['pass']);
				
				require_once 'view_complete.php';
			}
			else{
				$error_msg ='ログインの確認が取れません。<br/>もう一度ログインし直して下さい。';
				require_once 'view_login.php';
			}
		break;
		
		case "delete":
			//ログイン確認
			$login=LOGIN();
			if($login == True){
				$id =$_POST['id'];
				list($delete_comment,$delete_pass,$delete_user_id) = GETDELETE($db,$id);
				//削除ユーザーとコメント記入ユーザーの一致確認
				if( $delete_user_id == $_SESSION['user_id']){
					$_SESSION['delete_user_id'] =$delete_user_id;
					$_SESSION['delete_comment'] =$delete_comment;
					$_SESSION['delete_user_pass'] =$delete_pass;
					$_SESSION['delete_id'] =$id;
					
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
			$login=LOGIN();
			if($login == True){
				$pass =$_POST['pass'];
				$delete_user_id_s=$_SESSION['delete_user_id'];
				$delete_comment_s=$_SESSION['delete_comment'];
				$delete_pass_s=$_SESSION['delete_user_pass'];
				$delete_id_s=$_SESSION['delete_id'];
				//入力passのチェック
				if ($pass == $delete_pass_s){
				//削除の実行
				$sth = DELETEBBS($db,$delete_id_s);
				
				unset($_SESSION['delete_comment']);
				unset($_SESSION['delete_user_pass']);
				unset($_SESSION['delete_user_id']);
				unset($_SESSION['delete_id']);
				
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
			$login=LOGIN();
			if($login == True){
				//初期値
				require_once 'view.php';	
				}
			elseif($login == False){
				$error_msg ='ログインの確認が取れません。<br/>もう一度ログインし直して下さい。';
				require_once 'view_login.php';
			}				
			
		break;
}

$db =	null;
?>	
