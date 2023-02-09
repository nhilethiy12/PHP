<?php 
class Page extends UserController{
   private $pagemodel;
    function __construct()
    {
        $this->$pagemodel=new PageModel;;
    }
  public function showPage($pageTitle){
   $data=$this->pagemodel->showPage($pageTitle);
   $this->loadView('master1','page/showPage',$data);
   }  
}
?>
