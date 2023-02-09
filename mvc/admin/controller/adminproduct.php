<?php
class AdminProduct extends AdminController{
    public function productList($limit=LIMIT,$offset=0)
    {
        //Yêu cầu model thực hiện
        $adminproductmodel=new AdminProductModel;
        $data=$adminproductmodel->productList($limit,$offset);
        //Gửi dữ liệu cho view
        $this->loadAdminView('adminmaster1','adminproduct/productlist', $data);
    }

    public function productListInTrash($limit=LIMIT,$offset=0)
    {
        //Yêu cầu model thực hiện
        $adminproductmodel=new AdminProductModel;
        $data=$adminproductmodel->productListInTrash($limit,$offset);
        //Gửi dữ liệu cho view
        $this->loadAdminView('adminmaster1','adminproduct/productlistintrash', $data);
    }

    public function productToggleTrash($productId)
    {
        //Yêu cầu model thực hiện
        $adminproductmodel= new AdminProductModel;
        $data=$adminproductmodel->toggleTrash($productId);
    }

    public function productToggleStatus($productId)
    {
        //Yêu cầu model thực hiện
        $adminproductmodel= new AdminProductModel;
        $data=$adminproductmodel->toggleStatus($productId);
    }

    public function addProduct()
    {
        //xử lý dữ liệu nhận được
        if(isset($_POST['submit']))
        {
            $adminproductmodel= new AdminProductModel;
            $adminproductmodel->doAddProduct();
        }

        //Hiển thị form Add
        $catmodel=new AdminCategoryModel;
        $data['cats']=$catmodel->getAll(['trash'=>0, 'status'=>1]);
        $brandmodel=new AdminBrandModel;
        $data['brands']=$brandmodel->getAll(['trash'=>0, 'status'=>1]);
        $this->loadAdminView('adminmaster1','adminproduct/addProduct',$data);
    }

    public function UpdateProduct($productId)
    {
        //XỬ LÝ DỮ LIỆU NHẬN ĐƯỢC
        $adminproductmodel=new AdminProductModel;
        if(isset($_POST['submit']))
        {
            $adminproductmodel->doUpdateProduct($productId);
        }
        //Hiển thị form Update
        $catmodel=new AdminCategoryModel;
        $data['cats']=$catmodel->getAll(['trash'=>0, 'status'=>1]);
        $brandmodel=new AdminBrandModel;
        $data['brands']=$brandmodel->getAll(['trash'=>0, 'status'=>1]);
        $data['oldproduct']=$adminproductmodel->get(['productId'=>$productId]);
        $this->loadAdminView('adminmaster1','adminproduct/updateproduct',$data);
    }
    public function productDelete($productId)
    {
        $adminproductmodel = new AdminProductModel;
        $adminproductmodel->productDelete($productId);
    }
}
?>