<?php
$config='../config/config.php';
include($config); 
define('__GRAVATAR__', 'https://cravatar.cn/avatar/');
define('screenName', $profile['screenName']);
define('mail', $profile['mail']);
define('tx', 'https://cravatar.cn/avatar/'.md5(mail).'?s=200');

define('sitename', $setting['sitename']);
define('sitedis', $setting['sitedis']);
define('siteurl', $setting['siteurl']);

if(isset($_GET['logout'])){
setcookie("zt", "","-1","/");
reurl(siteurl.'/admin/index.php');
}


function avatar($mail){
    return 'https://cravatar.cn/avatar/'.md5($mail).'?s=200';
}

function reurl($url){
header("Location: ".$url); 
//确保重定向后，后续代码不会被执行 
exit;
}

function haslogin(){
$config='../config/config.php';
include($config); 
$username=$config['username'];
$password = $config['password'];
$cookielock=md5($username.$password);
if(!isset($_COOKIE["zt"])||$_COOKIE["zt"]!==$cookielock){
    return false;
}else{
    return true;
}
    
}



function addmid(){//新建分类时获取最新mid
$path='../config/cate.php';
include($path);  
$Arrzong=$fenlei;
if(count($Arrzong)>0){
// 重新拍排序
if(count($Arrzong)){//获取当前数组长度
	$arrPX1 = array();
	//$arrPX2 = array();
	foreach ($Arrzong as $k => $v){
		//需要排序的列表,这里只拿id作为示例
		$arrPX1[$k] =  $v['mid'];
		//$arrPX2[$k]  = $v['px'];
	}
	//执行排序
	array_multisort($arrPX1, SORT_DESC/* ,$arrPX2, SORT_ASC*/, $Arrzong);
}

//print_r($Arrzong);
//SORT_ASC - 默认。按升序排序 (A-Z)。
//SORT_DESC - 按降序排序 (Z-A)。
    
return intval($Arrzong[0]['mid'])+1;
}else{
return 1;
}

}


function newlinks($links){//根据time排序最新链接
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

function countif($shuzu,$a,$b,$hulue=array()){//判断分类或链接是否存在重复
foreach ($shuzu as $key => $value) {
if(!empty($hulue)&&$value[$hulue[0]]==$hulue[1]){continue;}//修改链接或分类时跳过自身
if(strcasecmp($value[$b], $a) == 0){return true;break;}
}
return false;
}

function alerts($type='Success',$text='',$url=''){
$color='bg-blue-500';
$icon='<svg viewBox="0 0 40 40" class="w-6 h-6 fill-current">
                    <path d="M20 3.33331C10.8 3.33331 3.33337 10.8 3.33337 20C3.33337 29.2 10.8 36.6666 20 36.6666C29.2 36.6666 36.6667 29.2 36.6667 20C36.6667 10.8 29.2 3.33331 20 3.33331ZM21.6667 28.3333H18.3334V25H21.6667V28.3333ZM21.6667 21.6666H18.3334V11.6666H21.6667V21.6666Z"></path>
                </svg>';  
    
if(strcasecmp($type, 'Success') == 0){
$color='bg-emerald-500';
$icon='<svg viewBox="0 0 40 40" class="w-6 h-6 fill-current"><path d="M20 3.33331C10.8 3.33331 3.33337 10.8 3.33337 20C3.33337 29.2 10.8 36.6666 20 36.6666C29.2 36.6666 36.6667 29.2 36.6667 20C36.6667 10.8 29.2 3.33331 20 3.33331ZM16.6667 28.3333L8.33337 20L10.6834 17.65L16.6667 23.6166L29.3167 10.9666L31.6667 13.3333L16.6667 28.3333Z"></path></svg>';
}
elseif(strcasecmp($type, 'Error') == 0){
$color='bg-red-500';
$icon='<svg viewBox="0 0 40 40" class="w-6 h-6 fill-current">
                    <path d="M20 3.36667C10.8167 3.36667 3.3667 10.8167 3.3667 20C3.3667 29.1833 10.8167 36.6333 20 36.6333C29.1834 36.6333 36.6334 29.1833 36.6334 20C36.6334 10.8167 29.1834 3.36667 20 3.36667ZM19.1334 33.3333V22.9H13.3334L21.6667 6.66667V17.1H27.25L19.1334 33.3333Z"></path>
</svg>';
}

if(!empty($url)){
    $url='<script language="JavaScript">window.setTimeout("location=\''.$url.'\'", 2500);</script>';
}

if(!empty($text)){
return '
    <div class="w-full text-white '.$color.'" x-ref="alert">
        <div class="container flex items-center justify-between px-6 py-4 mx-auto">
            <div class="flex">'.$icon.'
                <p class="mx-3">'.$text.'</p>
            </div>
        </div>
    </div>
    '.$url;
}
}

?>