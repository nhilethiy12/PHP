<?php
$products=$data['products'];
$paging=$data['paging'];
$brand=$data['brand'];
?>
<div class="container">
          <div class="col alert alert-danger"><?php echo $brand['brandName']?></div>
        <div class="row">
          <?php foreach ($products as $product){?>
          <div class="col-md-4 col-sm-6">
                <div class="card">
                  <img src="<?php echo BASE_URL; ?>public/upload/<?php echo $product['image']?>" class="card-img-top" alt="hsp2">
                  <div class="card-body text-center alert alert-info">
                  <a href="<?php echo BASE_URL.'product/productDetail/'.$product['alias']?>" class='text-decoration-none'><?php echo $product['productName']?></a></p>
                    <?php 
                    if ($product['salePrice']!=''){?>
                    <p class="card-text"><span class = "text-decoration-line-through"><?php echo number_format($product['price'],2)?>$</span></br>
                    <span class = "text-danger"><?php echo number_format($product['salePrice'],2)?>$</span></span></p>
                    <?php }
                    else {
                      ?>
                    <span class ='fw-bold fs-5 text-danger'><?php echo number_format($product['price'],2)?>$</span>
                    <?php }?>
                    <a href="#" class="btn btn-primary">Add to cart</a>
                 </div>
                </div>
          </div>
          <?php }?>
        </div>
            <div class = row>
            <?php $paging -> createLinks(); ?>
            </div>
</div>