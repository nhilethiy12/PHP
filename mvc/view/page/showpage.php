<?php
$page=$data['page']
?>
<div class="content container">
  <h2><?php echo $page['title']?></h2>
  <div class="card">
      <div class="card-body">
      <?php echo nl2br($page['content'])?>
      </div>
  </div>
</div>