<?php 
  $currentproduct=$data['currentproduct'];
  $sameProducts=$data['sameProducts'];
?>
<div class="row">
        <div class="card mb-3">
          <div class="row g-0">
            <div class="col-md-4">
              <img src="<?php echo BASE_URL; ?>public/upload/<?php echo $currentproduct['image'];?>" class =img-fluid alt="hsp">
            </div>
            <div class="col-md-8">
              
                <h5 class="card-title"><?php echo $currentproduct['productName'] ?></h5>
                <p class ="card-text"><?php echo $currentproduct['detail'] ?></p>
                <p>
                <?php 
                    if ($currentproduct['salePrice']!=''){?>
                    <p class="card-text"><span class = "text-decoration-line-through"><?php echo number_format($currentproduct['price'],2)?>$</span></br>
                    <span class = "text-danger"><?php echo number_format($currentproduct['salePrice'],2)?>$</span></span></p>
                    <?php }
                    else {
                      ?>
                   <span class ='fw-bold fs-5 text-danger'><?php echo number_format($currentproduct['price'],2)?>$</span>
                    <?php }?></p>
                <a href="#" class="btn btn-primary">Add to cart</a>
              </div>
            </div>
          </div>
        </div>
       <div class="row">
        <div class="col-md-12 alert alert-danger">SẢN PHẨM TƯƠNG TỰ</div>
        <?php foreach ($sameProducts as $sameProduct){?>
          <div class="col-md-4">
                <div class="card">
                  <img src="<?php echo BASE_URL; ?>public/upload/<?php echo $sameProduct['image']?>" class="card-img-top" alt="hsp2">
                  <div class="card-body text-center alert alert-info">
                  <a href="<?php echo BASE_URL.'product/productDetail/'.$sameProduct['alias']?>" class='text-decoration-none'><?php echo $sameProduct['productName']?></a></p>
                    <?php 
                    if ($sameProduct['salePrice']!=''){?>
                    <p class="card-text"><span class = "text-decoration-line-through"><?php echo number_format($sameProduct['price'],2)?>$</span></br>
                    <span class = "text-danger"><?php echo number_format($sameProduct['salePrice'],2)?>$</span></span></p>
                    <?php }
                    else {
                      ?>
                    <span class ='fw-bold fs-5 text-danger'><?php echo number_format($sameProduct['price'],2)?>$</span>
                    <?php }?>
                    <a href="#" class="btn btn-primary">Add to cart</a>
                 </div>
                </div>
          </div>
          <?php }?>
      </div>
</div>


  
      
      
    
   