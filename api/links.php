<?php
header("Access-Control-Allow-Origin: *");
include('../config/link.php');
function newlinks($links){//将链接按照修改时间降序排列
$Arrzong=$links;
// 重新拍排序
if(count($Arrzong)){//获取当前数组长度
	$arrPX1 = array();
	//$arrPX2 = array();
	foreach ($Arrzong as $k => $v){
		//需要排序的列表,这里只拿id作为示例
		$arrPX1[$k] =  $v['time'];
		//$arrPX2[$k]  = $v['px'];
	}
	//执行排序
	array_multisort($arrPX1, SORT_DESC/* ,$arrPX2, SORT_ASC*/, $Arrzong);
}

//print_r($Arrzong);
//SORT_ASC - 默认。按升序排序 (A-Z)。
//SORT_DESC - 按降序排序 (Z-A)。
    
return $Arrzong;
}
//没有设置图标的使用api自动获取
for($i=0;$i<count($links);$i++){
if(empty($links[$i]['icon'])){
$links[$i]['icon']='https://zezeshe.com/api/ico/?url='.$links[$i]['site'];
}
}

$newlinks=$links;//没有任何参数时返回默认所有链接

if(!empty($_GET['num'])){//如果有num参数，我们就返回对应最新的num条链接信息
$newlinks=newlinks($links);
$newlinks=array_slice($newlinks,0,$_GET['num']);   
}

if(!empty($_GET['new'])){//按照修改时间排序并返回所有
$newlinks=newlinks($links);
}

if(!empty($_GET['mid'])){//通过分类mid获取链接(实际顺序)
foreach ($links as $key => $value) {
if($value['mid'] != $_GET['mid']){
unset($links[$key]);
}
}
$newlinks=$links;   
}










echo json_encode($newlinks);
?>
