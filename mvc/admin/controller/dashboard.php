<?php
class DashBoard extends AdminController{
    public function home()
    {
        $this->loadAdminView('adminmaster1','dashboard/home',[]);
    }
}
?>