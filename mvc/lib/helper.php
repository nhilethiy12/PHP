<?php
class Helper{
    public function to_alias($str){
        $str=trim(mb_strtolower($str));
        $str=preg_replace('/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/','a',$str);
        $str=preg_replace('/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/','e',$str);
        $str=preg_replace('/(ì|í|ị|ỉ|ĩ)/','i',$str);
        $str=preg_replace('/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/','o',$str);
        $str=preg_replace('/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/','u',$str);
        $str=preg_replace('/(ỳ|ý|ỵ|ỷ|ỹ)/','y',$str);
        $str=preg_replace('/(đ)/','d',$str);
        $str=preg_replace('/[^a-z0-9\s]/','',$str);
        $str=preg_replace('/([\s]+)/','-',$str);
        return $str;
    }

    public function doUpload($inputFileUpload){
        $_SESSION['msg']='';
        if($_FILES[$inputFileUpload]['error']!=0)
            $_SESSION['msg'].="Dữ liệu không đúng cấu trúc, Dữ liệu Upload bị lỗi hoặc chưa chọn file upload<br>";
        else{
            //da co du lieu upload, thuc hien xu ly fileupload
            //thu muc ban phai luu upload
            $target_dir="public/upload/";
            //vi tri luu tam trong server
            $target_file=$target_dir.basename($_FILES[$inputFileUpload]["name"]);
            $allowUpload=true;
            //lay phan tu mo rong cua file
            $imageFileType=pathinfo($target_file,PATHINFO_EXTENSION);
            //co lon nhat duoc upload
            $maxfilesize=800000;
            //nhung loai file duoc phep upload
            $allowtypes=array('jpg','png','jpeg','gif');
            if(isset($_POST["submit"])){
                $check=getimagesize($_FILES[$inputFileUpload]["tmp_name"]);
                if($check!==false){
                    $_SESSION['msg'].="Đây là file ảnh - ".$check["mime"].".<br>";
                    $allowUpload=true;
                }
                else{
                    $_SESSION['msg'].="Không phải file ảnh.<br>";
                    $allowUpload=false;
                }
            }
            //kiem tra neu file da ton tai thi khong cho ghi de
            if(file_exists($target_file)){
                $_SESSION['msg'].="Tên file đã tồn tại trên server, không được ghi đè<br>";
                $allowUpload=false;
            }
            //kiem tra kich thuoc file upload cho vuot qua cho phep
            if($_FILES[$inputFileUpload]["size"]>$maxfilesize){
                $_SESSION['msg'].="Không được upload ảnh lớn hơn $maxfilesize (bytes).<br>";
                $allowUpload=false;
            }
            //kiem tra kieu file
            if(!in_array($imageFileType,$allowtypes)){
                $_SESSION['msg'].="Chỉ được upload các định dạng JPG,PNG,JPEG,GIF<br>";
                $allowUpload=false;
            }

            if($allowUpload){
                //xu ly di chuyen file tam ra thu muc can luu tru, dung ham move_upload_file
                if(move_uploaded_file($_FILES[$inputFileUpload]["tmp_name"],$target_file)){
                    $_SESSION['msg'].="/public/upload/".basename($_FILES[$inputFileUpload]["name"])."Đã upload thành công.<br>";
                    $_SESSION['msg'].="File lưu tại ".$target_file.'<br>';
                    return true;
                }
                else{
                    $_SESSION['msg'].="Có lỗi xảy ra khi upload file.<br>";
                    return false;
                }
            }
            else{
                $_SESSION['msg'].="Không upload được file, có thể do file lớn, kiểu file không đúng...";
                    return false;
            }
        }
    }
}
?>