<?php

function lyntax($type,$content=null){
    if($type==1) {
        $content=$content;
    }elseif($type==2){
        $content=file_get_contents($content.'.lyntax');
    }else{
        return die('Please Enter Code For Lyntax!');
    }

    // Function
    $content=str_replace('func->','function',$content);
    $content=str_replace('pfunc','public function',$content);
    $content=str_replace('funcp','private function',$content);
    $content=str_replace('*|','return',$content);

    // Echo
    $content=str_replace('*=','echo ',$content);

    // OOP
    $content=str_replace('%->','$this',$content);
    $content=str_replace('%*','public $',$content);
    $content=str_replace('%-','private $',$content);
    $content=str_replace('%^','protected $',$content);

    // Const
    $content=str_replace('%=','define(',$content);
    $content=str_replace('=%',');',$content);

    // Check Const
    $content=str_replace('%=>','defined(',$content);

    return eval($content);
}
