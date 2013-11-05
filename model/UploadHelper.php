<?php 
require_once "common/img2thumb.php";
class UploadHelper {
    public static function rawupload($_file) {
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
        $re = move_uploaded_file($tmp_file_path, $dist_full_path);

        return $dist_full_path;
    }

    /**
     * upload 
     * 上传文件，$_files和$_FILES同理, $dist为目标路径 $dist_name为目标文件名称
     * @param mixed $_files 
     * @param mixed $dist 
     * @static
     * @access public
     * @return void
     */
    public static function upload($_file) {
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
        $re = move_uploaded_file($tmp_file_path, $dist_full_path);

        $thum60x60_name = time() . '-' . rand(10000, 11000) . '.' . $fix;
        $thum60x60_full_path = $dist . '/' . $thum60x60_name;
        img2thumb($dist_full_path, $thum60x60_full_path, 60, 60, 1);
        
        $thum220x220_name = time() . '-' . rand(11001, 12000) . '.' . $fix;
        $thum220x220_full_path = $dist . '/' . $thum220x220_name;
        img2thumb($dist_full_path, $thum220x220_full_path, 220, 220, 1);
        
        $thum300x300_name = time() . '-' . rand(11001, 12000) . '.' . $fix;
        $thum300x300_full_path = $dist . '/' . $thum300x300_name;
        img2thumb($dist_full_path, $thum300x300_full_path, 300, 300, 1);
        
        if($re == false) {
            return false;
        } else {
            return array(
                'img_60x60' => $thum60x60_full_path,
                'img_220x220' => $thum220x220_full_path,
                'img_300x300' => $thum300x300_full_path,
                'img' => $dist_full_path,
            );
        }
    }
}
