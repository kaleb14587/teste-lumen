<?php
/**
 * Created by PhpStorm.
 * User: kaleb
 * Date: 15/11/18
 * Time: 13:46
 */

if(!function_exists("request_var")){
    function request_var($index){
        if(isset($_GET[$index])){
            return htmlentities($_GET[$index]);
        }
        elseif(isset($_POST[$index])){
            return htmlentities($_POST[$index]);
        }
        return null;
    }
}

if(!function_exists("valida_data_yyyy_mm_dd")){
    function valida_data_yyyy_mm_dd($data){
        $arrayData = explode("-",$data);

        if(count($arrayData)< 3){
            return false;
        }
        $d = $arrayData[2];
        $m = $arrayData[1];
        $y = $arrayData[0];
        $res = checkdate($m,$d,$y);
        return  ($res==1) ;
    }
}