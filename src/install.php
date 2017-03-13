<?php
//Remove old modificator
$this->load->model("extension/modification");
$old_mod = $this->model_extension_modification->getModificationByCode("ycms.mws");
if (isset($old_mod['modification_id']))$this->model_extension_modification->deleteModification($old_mod['modification_id']);
//
if (version_compare(VERSION, "2.3.0", '>=')){
    $uploadDir = DIR_UPLOAD . $this->request->post['path']."/upload/";
    $filesAdmin = array(
        "/controller/feed"=> "/controller/extension/feed",
        "/controller/payment" => "/controller/extension/payment",
        "admin/language/english/feed"=> "admin/language/en-gb/extension/feed",
        "admin/language/russian/feed"=> "admin/language/ru-ru/extension/feed",
        "/language/english/payment"=> "/language/en-gb/extension/payment",
        "/language/russian/payment"=> "/language/ru-ru/extension/payment",
        "admin/model/yamodule" => "admin/model/extension/yamodule",
        "catalog/model/payment" => "catalog/model/extension/payment",
        "catalog/model/yamodel" => "catalog/model/extension/yamodel",
        "admin/view/template/feed" => "admin/view/template/extension/feed",
        "admin/view/template/yamodule" => "admin/view/template/extension/yamodule",
        "catalog/view/theme/default/template/payment" => "catalog/view/theme/default/template/extension/payment"
    );
    $makeDir = array(
        "/controller/extension",
        "/language/en-gb",
        "/language/en-gb/extension",
        "/language/ru-ru",
        "/language/ru-ru/extension",
        "/model/extension",
        "admin/view/template/extension",
        "catalog/view/theme/default/template/extension",
    );
    $removeFiles = array(
        DIR_APPLICATION."controller/feed/yamodule.php",
        DIR_APPLICATION."controller/payment/yamodule.php",
        DIR_APPLICATION."language/english/feed/yamodule.php",
        DIR_APPLICATION."language/english/payment/yamodule.php",
        DIR_APPLICATION."language/russian/feed/yamodule.php",
        DIR_APPLICATION."language/russian/payment/yamodule.php",
        DIR_APPLICATION."view/template/feed/yamodule.php",
        DIR_CATALOG."model/payment/yamodule.php",
        DIR_CATALOG."language/english/payment/yamodule.php",
        DIR_CATALOG."language/english/yandexbuy/order.php",
        DIR_CATALOG."language/russian/payment/yamodule.php",
        DIR_CATALOG."language/russian/yandexbuy/order.php",
        DIR_CATALOG."controller/feed/yamarket.php",
        DIR_CATALOG."controller/payment/yamodule.php"
    );
    $removeDirs = array(
        DIR_APPLICATION."model/yamodule",
        DIR_APPLICATION."view/template/yamodule",
        DIR_CATALOG."model/yamodel"
    );
    foreach ($makeDir as $newDir) {
        if (substr($newDir, 0, 1)=='/'){
            mkdir ($uploadDir."admin".$newDir);
            mkdir ($uploadDir."catalog".$newDir);
        }else{
            mkdir ($uploadDir.$newDir);
        }
    }
    foreach ($filesAdmin as $oldPath => $newPath){
        if (substr($oldPath, 0, 1)=='/'){
            rename($uploadDir."admin".$oldPath, $uploadDir."admin".$newPath);
            rename($uploadDir."catalog".$oldPath, $uploadDir."catalog".$newPath);
        }else{
            rename($uploadDir.$oldPath, $uploadDir.$newPath);
        }
    }
    $reload = $this->load->controller("extension/installer/ftp");
    //
    $connection = ftp_connect($this->config->get('config_ftp_hostname'), $this->config->get('config_ftp_port'));
    if ($connection) {
        $login = ftp_login($connection, $this->config->get('config_ftp_username'), $this->config->get('config_ftp_password'));
        if ($login) {
            if ($this->config->get('config_ftp_root')) {
                $root = ftp_chdir($connection, $this->config->get('config_ftp_root'));
            } else {
                $root = ftp_chdir($connection, '/');
            }
            if ($root) {
                foreach ($removeFiles as $delPath) {
                    if (file_exists($delPath)){
                        ftp_delete($connection, $delPath);
                    }else{
                        $this->log->write($delPath);
                    }
                }
                //foreach ($removeDirs as $delDPath)ftp_rmdir($connection, $delDPath);
            }
        }
    }

}else{
}
?>