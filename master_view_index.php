<?php
require_once 'master.php';
require_once 'model.php';
?>


<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ja" lang="ja">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>TRANING01_a</title>
</head>
<body>    
    
<div id="waku">
    
<?php if (empty($master_action)){ ?>
    <form method="post" action="index.php">
    <input type="hidden" value="change2" name="master_action">
    <div style ="color:red">・背景色を変更出来ます。</div>
    <input type="submit" value="変更" name="submit" /></form>
<?php }else{ ?>
    <div style="padding: 10px; margin-bottom: 10px; border: 5px double #333333; width :450;">
        
    </div>
<?php } ?>    
<br/>





<h1>TRANING02</h1>
<form method="post" action="index.php">
<div style ="color:red">・掲示板名を変更出来ます。</div>
<input type="hidden" value="change1" name="master_action">
<input type="submit" value="変更" name="submit" /></form>
<br/><br/>    
<div class="sample-contents">
<h3>○○○としてログイン中です。</h3>

ログアウト<br />

<div style ="color:red">この画面からはコメントの登録、削除は出来ません。<br/>
                        コメント管理画面から下さい。</div>

<div style="padding: 10px; margin-bottom: 10px; border: 5px double #333333; width :450;">
<h2>管理者用コメントフォーム</h2>

        <form enctype="multipart/form-data" method="post" action="mastr_view_index.php" >
            <label for="comment">コメント:</label>
            <textarea id="comment" name="comment"  cols="30" rows="5"></textarea><br />    
            <label for="image_file">　画像　:</label>
            <input type="file" id="image_file" name="image_file" /><br />
            <input type="hidden" value="confirm" name="master_action">
            <input type="submit" value="送信" name="submit" />
        </form>
</div>

<?php
//掲示板部分の表示
require_once 'view_bbs2.php';

?>	
</div>
</div><!-- waku_END -->

</body>
</html>

