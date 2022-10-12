<?php
include('config/config.php');//载入主题配置
if(empty($setting['siteurl'])){
include('install.php');//进入安装引导   
}else{
include('theme/index1.php');//进入前台
}
?>
