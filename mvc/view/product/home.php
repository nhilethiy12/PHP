<?php
$products=$data['products'];
$paging=$data['paging'];
?>
<div class ="container">

      <div class="row">
          <div class = "col-md-6">
              <img src="<?php echo BASE_URL; ?>public/img/nhi_imgsale.jpg" alt="" class = img-fluid>
          </div>
           <?php foreach($products as $product){?>
          <div class = "col-md-3  text-center card">
                <div>
                  <img src="<?php echo BASE_URL; ?>public/upload/<?php echo $product['image']?>" class="card-img-top" alt="hsp2">
                </div>
                <div class="card-body text-center alert alert-info ">
                  <a href="<?php echo BASE_URL.'product/productDetail/'.$product['alias']?>" class='text-decoration-none'><?php echo $product['productName']?></a></p>          
                  <p class="card-text"><span class = "text-decoration-line-through"><?php echo number_format($product['price'],2)?></span></br>
                  <span class = "text-danger"><?php echo number_format($product['salePrice'],2)?>$</span></p>
                  <a class="btn btn-primary"href='<?php echo BASE_URL?>cart/add/<?php echo $product['productId']?>/<?php echo $product['productName']?>/<?php if($product['salePrice']<>0) echo $product['salePrice'];else echo $product['price']?>'>Add to cart</a>
                </div>
          </div>
                <?php }?>
      </div>
      <div class = row>
      <?php $paging->createLinks();?>
      </div>

</div>
       