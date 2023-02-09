<?php
class PageModel extends BaseModel{
    protected $table=DB_PREFIX.'page';
    protected $key='pageId';
    public function showPage($pageTitle)
    {
        $data['currentPage']=$this->get(['title'=>$pageTitle]);
        $data['samePage']=$this->getAllLimit(['status'=>1,'trash'=>0,'title'=>$pageTitle]);
        return $data;
    }
    }
?>
