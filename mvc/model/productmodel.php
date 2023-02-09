<?php
class ProductModel extends BaseModel{
    protected $table=DB_PREFIX.'product';
    public function home($limit,$offset)
    {
        //lay san pham khuyen mai,limit san pham,vi tri offset
        $sql=" select * from " .$this->table. " where trash ='0' and status = '1' and salePrice <> '' limit $offset, $limit";

        $data['products']=$this->queryAll($sql);
    
        //chuan bi du  lieu de phan trang
        $sql=" select * from " .$this->table." where trash= '0' and status = '1' and salePrice <> ''  ";
        $totalRecords=count($this->queryAll($sql));
        $data['paging'] = new Paging('product/home/', $totalRecords, $limit, $offset);
        return $data;
    }
    public function productByCat($catAlias,$limit,$offset){
        //nhom co san pham catAlias la $catAlias
        $catmodel = new CategoryModel;
        $cat =$catmodel->get(['alias'=>$catAlias]);
        $data['cat']=$cat;
        //lay cac san pham thuoc nhom catId la $cat['catId']
        $data['products']=$this->getAllLimit(['trash'=>0,'status'=>1,'catId'=>$cat['catId']],$limit,$offset);
        //chuan bi du lieu phan trang
        $totalRecords=count($this->getAll(['trash'=>0,'status'=>1,'catId'=>$cat['catId']]));
        $data['paging'] = new Paging('product/productByCat/'.$catAlias.'/',$totalRecords,$limit,$offset);
        return $data;
    
    }
    public function productByBrand($brandAlias,$limit,$offset){
        //nhom co san pham brandAlias la $brandAlias
        $brandmodel = new BrandModel;
        $brand =$brandmodel->get(['alias'=>$brandAlias]);
        $data['brand']=$brand;
        //lay cac san pham thuoc nhom brandId la $brand['brandId']
        $data['products']=$this->getAllLimit(['trash'=>0,'status'=>1,'brandId'=>$brand['brandId']],$limit,$offset);
        //chuan bi du lieu phan trang
        $totalRecords=count($this->getAll(['trash'=>0,'status'=>1,'brandId'=>$brand['brandId']]));
        $data['paging'] = new Paging('product/productByBrand/'.$brandAlias.'/',$totalRecords,$limit,$offset);
        return $data;
    
    }
    public function productSearch($searchKey,$limit,$offset)
    {
        //lay ra cac san pham thoa yeu cau tim kiem, $limit, $offset
        $sql=" select * from $this->table where trash='0' and status = '1' and productName like '%$searchKey%' limit $offset,$limit";
        //thuc thi cau lenh
        $data['product']=$this->queryAll($sql);
        $sql=" select * from $this->table where trash='0' and status = '1' and productName like '%$searchKey%'";
        $totalRecords=count($this->queryAll($sql));
        $data['totalRecords']=$totalRecords;
        $data['paging'] = new Paging('product/productSearch/',$totalRecords,$limit,$offset);
        return $data;
    }
    public function productDetail($productAlias)
    {
        //lay 1 sp co alias nhu vay
        $data['currentproduct']=$this->get(['alias'=>$productAlias]);
        //lay sap pham cung nhom
        $data['sameProducts']=$this->getAll(['trash'=>0, 'status'=>1, 'catId'=>$data['currentproduct']['catId']]);
        return $data;
    }
}
?>