<?php 
header("Access-Control-Allow-Origin: *");
$json='参数不正确！';
include('../config/config.php');
include('../config/cate.php');
include('../config/link.php');
include('../admin/function.php');

if(!empty($_GET['type'])){
$type=$_GET['type'];

if($type=='all'){//当请求all时，返回所有分类信息以及网站设置信息
$all['setting']=$setting;
$all['cate']=$fenlei;
$json=$all;
}

elseif($type=='cate'){//当请求cate时，返回所有分类信息
$json=$fenlei;
}

elseif($type=='setting'){//当请求setting时，返回网站设置信息
$json=$setting;
}

elseif($type=='profile'){//当请求profile时，返回个人设置信息
$profile['avatar']=avatar($profile['mail']);
$json=$profile;
}

}

echo json_encode($json);
?>
