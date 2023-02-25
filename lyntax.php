<?php

final class lyntax{
    
    public static function load($type,$content=null){
        if($type==1) {
            $content=$content;
        }elseif($type==2){
            $content=file_get_contents($content.'.lyntax');
        }else{
            return die('Please Enter Code For Lyntax!');
        }

        // Function
        $content=lyntax::syntax('func->','function',$content);
        $content=lyntax::syntax('pfunc','public function',$content);
        $content=lyntax::syntax('funcp','private function',$content);
        $content=lyntax::syntax('*|','return',$content);

        // Echo
        $content=lyntax::syntax('*=','echo ',$content);

        // OOP
        $content=lyntax::syntax('%->','$this',$content);
        $content=lyntax::syntax('%*','public $',$content);
        $content=lyntax::syntax('%-','private $',$content);
        $content=lyntax::syntax('%^','protected $',$content);

        // Const
        $content=lyntax::syntax('%=','define(',$content);
        $content=lyntax::syntax('=%',');',$content);

        // Check Const
        $content=lyntax::syntax('%=>','defined(',$content);


        // Mysqli
        $content=lyntax::syntax('$m=>','mysqli_',$content);

        // Const
        $content=lyntax::syntax('$ ','const ',$content);

        // For
        $content=lyntax::syntax('for=>','for(',$content);
        $content=lyntax::syntax('<=for',')',$content);

        // While
        $content=lyntax::syntax('while=>','while(',$content);
        $content=lyntax::syntax('<=while',')',$content);

        // Foreach
        $content=lyntax::syntax('foreach=>','foreach(',$content);
        $content=lyntax::syntax('<=foreach',')',$content);

        return eval($content);
    }

    public static function get($file){
        return file_get_contents($file.'.lyntax');
    }
    
    public static function syntax($syntax,$php,$code){
        return str_replace($syntax,$php,$code);
    }
    
}

?>
