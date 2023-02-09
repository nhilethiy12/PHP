<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <title>Beautiful Shop</title>
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>public/css/bootstrap.min.css"> 
    <script src="<?php echo BASE_URL; ?>public/js/popper.min.js"></script> 
    <script src="<?php echo BASE_URL; ?>public/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/08fcf0a6cf.js" crossorigin="anonymous"></script>
  </head>
  <body>
   <hearder class = "container">
    <div class="row">
      <div class="col-md-4"><img src="<?php echo BASE_URL; ?>public/img/nhi_logo.jpg" alt="logo"></div>
      <div class="col-md-4"> <form class="d-flex" method = post action='<?php echo BASE_URL.'product/productSearch/'.LIMIT.'/0'?>'>
        <input name ='searchKey' class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form></div>
      <div class="col-md-4">
      <!--Button trigger model-->
      <span data-bs-toggle="modal" data-bs-target="#exampleModal">
              <i class="fas fa-shopping-cart fs-3" id=carticon></i>
              <?php
              $cart=new Cart;
              if($cart->getCount()!=0)echo '('.$cart->getCount().')'; 
              ?>
      </span>
              <a class ="btn btn-info" href ="<?php echo BASE_URL?>auth/adminLogin/">Đăng nhập</a>
      </div>
          <div class="row">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">
                  <a class="navbar-brand" href="http://nhi:81/">Beautiful Shop</a>
                  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                  </button>
                  <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                      <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="http://nhi:81/">Trang chủ</a>

                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="#">Link</a>
                      </li>
                      <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown1" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                          Sản phẩm
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown1">
                        <?php 
                            $catmodel=new   CategoryModel;
                            $cats=$catmodel->getAll(['trash'=>0,'status'=>1]);?>
                            <div class="card mt-2">
             
                                <ul class="list-group list-group-flush">
                                  <?php foreach($cats as $cat){?>
                                  <li class="list-group-item"><a  href="<?php echo BASE_URL.'product/productByCat/'.$cat['alias'].'/'.LIMIT.'/0';?>" class='text-decoration-none'><?php echo $cat['catName']?></a></li>
                                  <?php }?>
                                </ul>
                              </div>
                        </ul>
                      </li>
                      <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown2" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                          Thương hiệu
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown2">
                                <?php 
                              $brandmodel=new   BrandModel;
                              $brands=$brandmodel->getAll(['trash'=>0,'status'=>1]);?>
                              <div class="card mt-3">
                                  <ul class="list-group list-group-flush">
                                    <?php foreach($brands as $brand){?>
                                    <li class="list-group-item"><a class="text-decoration-none" href="<?php echo BASE_URL.'product/productByBrand/'.$brand['alias'].'/'.LIMIT.'/0';?>"><?php echo $brand['brandName']?></a></li>
                                    <?php }?>
                                  </ul>
                                </div>
                        </ul>
                      </li>
                    </ul>
            
                  </div>
                </div>
              </nav>
           </div>
    </div>
  
   </hearder>