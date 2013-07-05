<?php
session_start();
require_once 'model.php';
$order = '';

$master_action =$_POST[master_action];
$order="";

echo $master_action;
echo $order;

switch($master_action){
    
    //ユーザーの削除
    case "delete_user":
        //削除情報の取得
        $id =$_POST['id'];
        list($delete_name,$delete_mail,$delete_id) = GETDELETE_USER($db,$id);
          
        $_SESSION['delete_id'] =$delete_id;
        
                $order = 'confirm_users';
        echo $_SESSION['delete_id'];
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
    
    
    case "delete_bbs":
        //削除情報の取得
        $order='conrirm_bbs';
        $id =$_POST['id'];
        $_SESSION['delete_id'] =$id;
        
        list($delete_comment,$delete_pass,$delete_user_id) = GETDELETE($db,$id);
            $_SESSION['delete_comment'] =$delete_comment;

            echo $delete_user_id;
            
        $sth2 = NAMEDATA($db,$delete_user_id);
            $row =$sth2->fetch(PDO::FETCH_ASSOC);
	
            $delete_user_name =$row['user_name'];
            
            $_SESSION['delete_user_name'] =$delete_user_name;
            
        require_once 'master_view_bbs.php';
    break;


    case "delete_bbs2":
        $order='conrirm_bbs2';
        $delete_id_s=$_SESSION['delete_id'];
	$delete_comment_s=$_SESSION['delete_comment'];
        $delete_name_s=$_SESSION['delete_user_name'];

            //削除の実行
            $sth = DELETEBBS($db,$delete_id_s);

            unset($_SESSION['delete_comment']);
            unset($_SESSION['delete_user_name']);
            unset($_SESSION['delete_id']);
        
            require_once 'master_view_bbs.php';
    break;


    case "delete_bbs":
        $color = $_POST['color'];
        
        
        
    break;


    default:
        require_once 'master.php';
    break;    
}
?>
