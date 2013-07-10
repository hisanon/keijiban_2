<?php 
require_once 'model.php';

//掲示板情報の取得
list($color,$bbs_name) = layout($db);    


    switch($color){
        case "blue":
            
            $css ='style_b.css';
            
        break;
            

        case "red":
            
            $css ='style_r.css';
            
        break;
        
        
        
        case "gray":
            
            $css ='style_g.css';
            
        break;
        
        
        
        default :
           
            $css ='style.css';

        break;
    }
?>