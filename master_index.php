<?php
require_once 'model.php';
$order = "";

$master_action =$_POST[master_action];
$order="";

$_SESSION['user_name'] = master;
$_SESSION['user_id'] = 1;


switch($master_action){
    
    //ユーザーの削除
    case "delete_user":
        //削除情報の取得
        $id =$_POST['id'];
        list($delete_name,$delete_mail,$delete_id) = GETDELETE_USER($db,$id);
          
        $_SESSION['delete_id'] =$delete_id;
        
                $order = 'confirm_users';
        require_once 'master_view_users.php';
    break;
    
    
    //ユーザー削除実行
    case "delete_user2":
        $order='confirm_users2';
	$delete_id_s=$_SESSION['delete_id'];
        
            //削除の実行
            $sth = DELETEUSER($db,$delete_id_s);
                
            unset($_SESSION['delete_id']);                                
        
        require_once 'master_view_users.php';
            
    break;
 

    //書き込みの確認
    case "master_confirm":
        //書き込み情報の取得
        $comment =$_POST['comment'];
        $image_file =$_POST['image_file'];
        
        //ファイルの処理
	if(!$_FILES['image_file']['error']){
            $image_size = $_FILES['image_file']['size'];
            $image_type = $_FILES['image_file']['type'];
            $image_name = $now_datetime.'_'.'master'.(htmlspecialchars($_FILES['image_file']['name'], ENT_QUOTES, 'UTF-8'));
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
            }
         }
        
        $_SESSION['comment'] =$comment;
        $_SESSION['image_name'] =$image_name;
        $_SESSION['upload_image_path'] =$upload_image_path;
        
        
        $order = 'comment';

        require_once 'master_view_bbs.php';
    break;


    //書き込みの実行
    case "master_complete":
        
        $comment_s =$_SESSION['comment'];
        $upload_image_path_s =$_SESSION['upload_image_path'];
	$image_name_s =$_SESSION['image_name'];
        $user_id="1";
        $pass="1234";
        
        $order = 'comment2';
        
	//登録の実行、完了画面の表示
	$sth= INSERTBBS($db,$user_id,$comment_s,$pass,$image_name_s);
				
	unset($_SESSION['comment']);
        unset($_SESSION['image_name']);
        unset($_SESSION['upload_image_path']);

        require_once 'master_view_bbs.php';
    break;

    
    //掲示板管理
    case "delete_bbs":
        //削除情報の取得
        $order='conrirm_bbs';
        $id =$_POST['id'];
        
        list($delete_comment,$delete_imge,$delete_pass,$delete_user_id) = GETDELETE($db,$id);
            $_SESSION['delete_comment'] =$delete_comment;
            $_SESSION['delete_imge'] =$delete_imge;
            $_SESSION['delete_user_id'] =$delete_user_id;
            $_SESSION['delete_id'] =$id;
            
            $sth2 = NAMEDATA($db,$delete_user_id);
            $row =$sth2->fetch(PDO::FETCH_ASSOC);
	
            $delete_user_name =$row['user_name'];
            
            $_SESSION['delete_user_name'] =$delete_user_name;
                        
        require_once 'master_view_bbs.php';
    break;


    //掲示板削除実行
    case "delete_bbs2":
        $order='conrirm_bbs2';
        $delete_id_s=$_SESSION['delete_id'];

            //削除の実行
            $sth = DELETEBBS($db,$delete_id_s);

            unset($_SESSION['delete_comment']);
            unset($_SESSION['delete_imge']);
            unset($_SESSION['delete_user_name']);
            unset($_SESSION['delete_user_id']);
            unset($_SESSION['delete_id']);
        
            require_once 'master_view_bbs.php';
    break;


    //コメントの編集
    case "change_comment":
        $change_comment= $_POST['change_comment'];
        $_SESSION['change_comment']= $change_comment; 

        $change_imge_s =$_SESSION['delete_imge'];
        
        $order = "bbs_comment";
       
        require_once 'master_view_index.php';
    break;


    case "change_comment2":
        $change_comment_s =$_SESSION['change_comment'];
        $change_user_id_s =$_SESSION['delete_user_id'];
        $change_id_s =$_SESSION['delete_id'];        
        
        $sth =CHANGEBBS($db,$change_id_s,$change_comment_s,$change_user_id_s);
        
        $order = "bbs_comment2";
        require_once 'master_view_index.php';
    break;



    //掲示板の色変更
    case "change_color":
        $order= 'color';
        require_once 'master_view_index.php';
    break;



    //掲示板の色変更
    case "change_color2":
        $c_color = $_POST['color'];
        
         switch($c_color){
            case "blue":
                $css ='style_b.css';
                $a='青';
            break;
            
            case "red":      
                $css ='style_r.css';
                $a='赤';
            break;
        
            case "gray":
                $css ='style_g.css';
                $a='黒';
            break;
        
            default :
                $css ='style.css';
                $a='ノーマル';
            break;
        }
        
        $_SESSION['color']=$c_color;
        $order='color2';
        require_once 'master_view_index.php';
    break;


    case "change_color3":
        $c_color_s=$_SESSION['color'];
        
        $sth=CHANGE_LAYOUT($db,$c_color_s,$bbs_name);
        
        $order='color3';
        require_once 'master_view_index.php';
    break;


    //掲示板名の変更
    case "change_name":
        $order = "bbs_name";
        require_once 'master_view_index.php';
    break;


    case "change_name2":
        $c_name = $_POST['bbs_name'];
        $_SESSION['bbs_name']=$c_name;
        $order = "bbs_name2";
        require_once 'master_view_index.php';
    break;


    case "change_name3":
        $c_name_s =$_SESSION['bbs_name'];
        
        $sth=CHANGENAME($db,$c_name_s);
        
        $order="bbs_name3";
        require_once 'master_view_index.php';
    break;
        
        
    default:
        require_once 'master.php';
    break;    
}
?>
