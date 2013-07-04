<?php
require_once 'model.php';

$master_action =$_POST[master_action];
$order="";

echo $master_action;
echo $order;

switch($master_action){
    
    //ユーザーの削除
    case "delete_user":
        $id =$_POST['id'];
        list($delete_comment,$delete_pass,$delete_user_id) = GETDELETE($db,$id);
            //削除ユーザーとコメント記入ユーザーの一致確認
            
		$_SESSION['delete_user_id'] =$delete_user_id;
		$_SESSION['delete_comment'] =$delete_comment;
		$_SESSION['delete_user_pass'] =$delete_pass;
		$_SESSION['delete_id'] =$id;
          
                $order = 'confirm_users';
        
        require_once 'master_view_users.php';
    break;
    
    
    case "delete_user2":
        $order='confirm_users2';
         $delete_user_id_s=$_SESSION['delete_user_id'];
				$delete_comment_s=$_SESSION['delete_comment'];
                                $delete_pass_s=$_SESSION['delete_user_pass'];
				$delete_id_s=$_SESSION['delete_id'];
                                if (substr($_POST['user_name'],0,10) == "javascript:") {
                                     die("error!!");
                                }
                                else{
                                    //入力passのチェック
                                    if ($pass == $delete_pass_s){
                                        //削除の実行
                                        $sth = DELETEBBS($db,$delete_id_s);

                                        unset($_SESSION['delete_comment']);
                                        unset($_SESSION['delete_user_pass']);
                                        unset($_SESSION['delete_user_id']);
                                        unset($_SESSION['delete_id']);                                
                                    

        
        require_once 'master_view_users.php2';
    break;
    
    
    case "delete_bbs":
        $order='conrirm_bbs';
        
        require_once 'master_view_bbs.php';
    break;


    case "delete_bbs2":
        $order='conrirm_bbs';
        
        
        require_once 'master_view_users.php';
    break;
    

    default:
        require_once 'master.php';
    break;    
}
?>
