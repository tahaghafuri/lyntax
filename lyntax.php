<?php

final class lyntax{

    public static function info($get){
	return self::load(2,$get);
    }
    
    public static function load($type,$content=null){
        if($type==1) {
            $content=$content;
        }elseif($type==2){
            $content=file_get_contents($content.'.lyntax');
        }else{
            return die('Please Enter Code For Lyntax!');
        }

        // Function
        $content=self::syntax('func->','function',$content);
        $content=self::syntax('pfunc','public function',$content);
        $content=self::syntax('funcp','private function',$content);
        $content=self::syntax('*|','return',$content);

        // Echo
        $content=self::syntax('*=','echo ',$content);

        // OOP
        $content=self::syntax('%->','$this',$content);
        $content=self::syntax('%*','public $',$content);
        $content=self::syntax('%-','private $',$content);
        $content=self::syntax('%^','protected $',$content);

        // Const
        $content=self::syntax('%=','define(',$content);
        $content=self::syntax('=%',');',$content);

        // Check Const
        $content=self::syntax('%=>','defined(',$content);

        // Mysqli
        $content=self::syntax('$m=>','mysqli_',$content);

        // Const
        $content=self::yntax('$ ','const ',$content);

        // For
        $content=self::syntax('for=>','for(',$content);
        $content=self::syntax('<=for',')',$content);

        // While
        $content=self::syntax('while=>','while(',$content);
        $content=self::syntax('<=while',')',$content);

        // Foreach
        $content=self::syntax('foreach=>','foreach(',$content);
        $content=self::syntax('<=foreach',')',$content);

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
