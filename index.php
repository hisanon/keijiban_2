<?php 
session_start();
require_once 'model.php';

//掲示板情報の取得
list($color,$bbs_name) = layout($db);    
    
    require_once 'color.php';

		
	switch($action){
		//会員登録画面
		case "shingup":
			$user_name =$_POST['user_name'];
                        if (substr($_POST['user_name'] || $_POST['mail_b'] ||$_POST['user_pass_b'],0,10) == "javascript:") {
                            die("error!!");
                        }
                        else{
                        
			//会員情報のの入力確認
			if(!empty($user_name) && !empty($mail) && !empty($user_pass)){
				//入力値一致数のチェック
				$no ='o';
				$shingup = SHINGUP($db,$user_pass_b,$user_name,$no);
				if($shingup == True){
					//アドレスのチェック
					if ($ret) {
						$action ="shingup_complete";
						$_SESSION['user_name']=htmlspecialchars($user_name, ENT_QUOTES, 'UTF-8');
						$_SESSION['mail']=htmlspecialchars($mail_b, ENT_QUOTES, 'UTF-8');
						$_SESSION['user_pass']=htmlspecialchars($user_pass_b, ENT_QUOTES, 'UTF-8');

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
                    if (substr($_POST['user_name'] ||$_POST['user_pass'],0,10) == "javascript:") {
                     die("error!!");
                    }
                    else{
			$user_name =htmlspecialchars($_POST['user_name'], ENT_QUOTES, 'UTF-8');
			$user_pass =htmlspecialchars($_POST['user_pass'], ENT_QUOTES, 'UTF-8');
			
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
                            $comment =htmlspecialchars($_POST['comment'], ENT_QUOTES, 'UTF-8');
                            $pass =htmlspecialchars($_POST['pass'], ENT_QUOTES, 'UTF-8');
                                
                                if (substr($comment ||$user_pass,0,10) == "javascript:") {
                                     die("error!!");
                                }
                                else{
						//ファイルの処理
						if(!$_FILES['image_file']['error']){
							$image_size = $_FILES['image_file']['size'];
							$image_type = $_FILES['image_file']['type'];
							$image_name = $now_datetime.'_'.$user_id_s.(htmlspecialchars($_FILES['image_file']['name'], ENT_QUOTES, 'UTF-8'));
							$file_name = savedir.$image_name;
						}
						else{
							$image_size == 0;
							$upload_name = NULL;
						}

							// イメージファイルがあれば保存する
						if($image_size > 0 && $image_size < UPLOAD_IMAGE_MAX_SIZE &&
						   ($image_type == 'image/gif' || $image_type == 'image/jpeg' || $image_type == 'image/pjpeg' || $image_type == 'image/png')){
							   
						   if(is_uploaded_file($_FILES['image_file']['tmp_name'])){
								
								$upload_image_path = upload_image_path($image_name);
								@move_uploaded_file($_FILES['image_file']['tmp_name'], $file_name);

							}
							else{
								$error_msg ='画像が正常にアップロードされませんでした。';
								require_once 'view.php';
							}

						 }

						$_SESSION['comment']=$comment;
						$_SESSION['pass']=$pass;
						$_SESSION['image_name']=$image_name;
						require_once 'view_confirm.php';
										
				}
			}
                        
			else{
				$error_msg ='ログインの確認が取れません。<br/>もう一度ログインし直して下さい。';
				require_once 'view_login.php';
			}
                        
		break;
		
		
		//書き込みの実行
		case "complete":
			//ログイン確認
			$login=LOGIN();
			if($login == True){
				$comment_s =$_SESSION['comment'];
                                $upload_image_path_s =$_SESSION['upload_image_path'];
				$pass_s =$_SESSION['pass'];
				$user_id_s =$_SESSION['user_id'];
				$image_name_s =$_SESSION['image_name'];

				//登録の実行、完了画面の表示
				$sth= INSERTBBS($db,$user_id_s,$comment_s,$pass_s,$image_name_s);
				
				unset($_SESSION['comment']);
				unset($_SESSION['pass']);
				unset($_SESSION['image_name']);
				
				require_once 'view_complete.php';
			}
			else{
				$error_msg ='ログインの確認が取れません。<br/>もう一度ログインし直して下さい。';
				require_once 'view_login.php';
			}
		break;
		
                
                //削除画面
		case "delete":
			//ログイン確認
			$login=LOGIN();
                        $master =MASTER();
			if($login == True){
				$id =$_POST['id'];
				list($delete_comment,$delete_imge,$delete_pass,$delete_user_id) = GETDELETE($db,$id);
				//削除ユーザーとコメント記入ユーザーの一致確認
				if( $delete_user_id == $_SESSION['user_id']){
					$_SESSION['delete_user_id'] =$delete_user_id;
					$_SESSION['delete_comment'] =$delete_comment;
					$_SESSION['delete_imge'] =$delete_imge;
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
				$pass =htmlspecialchars($_POST['pass'], ENT_QUOTES, 'UTF-8');
                                $delete_user_id_s=$_SESSION['delete_user_id'];
                                $delete_pass_s=$_SESSION['delete_user_pass'];
				$delete_id_s=$_SESSION['delete_id'];
                                
                                if (substr($_POST['user_name'],0,10) == "javascript:") {
                                     die("error!!");
                                }
                                else{
                                        //削除の実行
                                        $sth = DELETEBBS($db,$delete_id_s);

                                        unset($_SESSION['delete_comment']);
                                        unset($_SESSION['delete_imge']);                                        
                                        unset($_SESSION['delete_user_id']);
                                        unset($_SESSION['delete_id']);                                
                                    
                                        //完了画面
                                        require_once 'view_delete_complete.php';                                       
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
