<?php
class App{
    function __construct()
    {
        $this->autoload();  
        $reqs=$this->reqToArray();
        //Xác định trên controller  
    if(isset($reqs[0])&&(file_exists(PATH_TO_CONTROLLER.$reqs[0].'.php')||file_exists(PATH_TO_ADMINCONTROLLER.$reqs[0].'.php')))
    {$controllername=$reqs[0];unset($reqs[0]); }
    else
    $controllername='Product';
  //Tạo controller
    $controller=new $controllername;
    //Xác định tên action
    if(isset($reqs[1])&&method_exists($controller,$reqs[1]))
    {$methodname=$reqs[1];unset($reqs[1]);
    }
    else
    $methodname='home';
    if(empty($reqs))$reqs=[];
    //gọi method và truyền tham số
    call_user_func_array([$controller,$methodname],$reqs);
    }
    private function reqToArray(){
        if(isset($_GET['req'])) return explode('/',$_GET['req']);
        else return null;
    }
    private function autoload(){
        $loadClass = function($classname){
            $filename = PATH_TO_CONTROLLER. strtolower($classname).'.php';
            if(file_exists($filename)) include_once($filename);

            $filename = PATH_TO_CORE. strtolower($classname).'.php';
            if(file_exists($filename)) include_once($filename);

            $filename = PATH_TO_CORE. strtolower($classname).'.php';
            if(file_exists($filename)) include_once($filename);

            $filename = PATH_TO_MODEL. strtolower($classname).'.php';
            if(file_exists($filename)) include_once($filename);
            $filename = PATH_TO_ADMINMODEL. strtolower($classname).'.php';
            if(file_exists($filename)) include_once($filename);
          

            $filename = PATH_TO_LIB. strtolower($classname).'.php';
            if(file_exists($filename)) include_once($filename);

            $filename = PATH_TO_ADMINCONTROLLER. strtolower($classname).'.php';
            if(file_exists($filename)) include_once($filename);

        };
        spl_autoload_register($loadClass);
    }

}
?>