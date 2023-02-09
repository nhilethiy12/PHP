<?php
$cats=$data['cats'];
$brands=$data['brands'];
?>
<div class = 'col-md-9'>
<h2>ADD PRODUCT</h2>
<div class ="row btn-success">
<?php if(isset($_SESSION['msg'])){echo $_SESSION['msg']; unset($_SESSION['msg']);}?>
</div>
<form method= post action=''enctype='multipart/form-data'>

<table>
<tr>
<td class='col-md-3'><lable>Product Name</lable></td>
<td><input type ='text' name= 'inputProductName' required></td>
</tr>

<tr>
<td class='col-md-3'><lable>Alias</lable></td>
<td><input type ='text' name='inputAlias'></td>
</tr>

<tr>
<td class='col-md-3'><lable>Category Name</lable></td>
<td>
<select name='inputCatId'>
<?php foreach($cats as $cat){?>
<option value="<?php  echo $cat['catId']?>">
<?php echo $cat['catName']?>
</option>
<?php }?>
</select>
</td>
</tr>

<tr>
<td class='col-md-3'><lable>Brand Name</lable></td>
<td>
<select name='inputBrandId'>
<?php foreach($brands as $brand){?>
<option value="<?php echo $brand['brandId']?>">
<?php echo $brand['brandName']?>
</option>
<?php }?>
</select>
</td>
</tr>

<tr>
<td class='col-md-3'><lable>Chi tiết sản phẩm</lable></td>
<td><textarea name = 'inputDetail' required cols=50 rows=10></textarea></td>
</tr>

<tr>
<td class='col-md-3'><lable>Price</lable></td>
<td><input type ='number' name= 'inputPrice' max = 3000 min =1 step='0.01'></td>
</tr>

<tr>
<td class='col-md-3'><lable>SalePrice</lable></td>
<td><input type ='number' name= 'inputSalePrice' max = 3000 min =1 step='0.01'></td>
</tr>

<tr>
<td class='col-md-3'><lable>Image</lable></td>
<td><input type =file name=inputFileUpload></td>
</tr>

<tr>
<td class='col-md-3'><lable>Status</lable></td>
<td>
<select name =inputStatus>
<option value = 0>Ẩn</option>
<option value = 1>Hiện</option>
</select>
</td>
</tr>

<tr>
<td class='col-md-3'><lable></lable></td>
<td><input type=submit name=submit value=Submit>
<input type=reset name=reset value=Reset></td>
</tr>


</table>
</form> 
</div>
</div>