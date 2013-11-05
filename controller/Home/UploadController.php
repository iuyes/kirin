<?php
class Home_UploadController extends BaseController {

    public function uploadAction() {
        $_file = $_FILES["Filedata"]; 
        $tmp_file_path = $_file['tmp_name']; 
        $dist = 'upload/'.date("Ymd", time());
        if(!is_dir($dist)) {
            mkdir($dist);
        }
        $file_name = $_file['name'];
        $tmp = explode('.', $file_name);
        $fix = end($tmp);
        $dist_name = time() . '-' . rand(1000, 9999) . '.' . $fix;
        $dist_full_path = $dist . '/' . $dist_name;
        move_uploaded_file($tmp_file_path, $dist_full_path);

        echo $dist_full_path;
    }
}
