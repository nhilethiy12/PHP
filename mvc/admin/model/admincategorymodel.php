<?php   
class AdminCategoryModel extends CategoryModel{
    protected $field = ['catName','alias','parentId','trash','status'];
    protected $key = 'catId';
}
?>