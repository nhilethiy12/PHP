<?php
// require 'mvc/lib/helper.php';
// $h=new Helper;
// echo $h->to_alias('SON MÔI');
?>


<?php
require_once "config.php";
require_once "mvc/core/db.php";
require_once "mvc/core/basemodel.php";
require_once "mvc/core/adminmodel.php";
require_once "mvc/admin/model/adminproductmodel.php";
$mp=new AdminProductModel;
$data=['ehbveb','Bitis-Hunter-X-Army-Green','3','3','bt10.jpg','0','1','❤️ Mỗi đôi Bitis Hunter X Army Green hoàn thiện là tất cả những “chăm chút” từ bàn tay người thợ Việt. Bởi không một máy móc nào có thể chuyển tải trọn vẹn và tinh tế những thái cực văn hoá Hà Nội lên từng bước chân đi. Không chỉ là một đôi giày, mỗi sản phẩm Biti’s Hunter còn mang sứ mệnh làm nên những hành trình trải nghiệm muôn màu. Với Hanoi Culture Patchwork, đó là bước chân mang theo cảm hứng bất tận từ đường phố, từ nét đẹp văn hoá Việt Nam.','240','225'];
$mp->insert($data);//chen sp 
?>
