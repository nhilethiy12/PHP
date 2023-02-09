<?php
class Auth extends Controller{
    public function adminLogin()
    {
        //xử liệu dữ liệu gửi tới
        if(isset($_POST['login'])){
            $authmodel=new AuthModel;
            $authmodel->adminLogin();
        }
        $this->loadView('master3','auth/login',[]);
    }
    public function adminLogout()
    {
        if(isset($_SESSION['username']))
        {
            unset($_SESSION['username']);
            unset($_SESSION['level']);
            header('Location:'.BASE_URL.'auth/adminlogin');
            exit;
        }
    }
}
?>