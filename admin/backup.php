<?php include('function.php') ?>
<?php if(!haslogin()){reurl(siteurl.'/admin/login.php');} ?>
<?php 
$tishi='';
$post=$_REQUEST;
//导入处理
if(isset($post['up'])){
    
//创建上传目录
$path = './import/';
if (!is_dir($path)) {
    mkdir($path, 0777, true);
}
$file = $_FILES['up'];
$mimes = array('application/json','text/json');
if(in_array($file["type"],$mimes)){
  $name = $path.'/backup.json';  
if(move_uploaded_file($file["tmp_name"], $name)){
    
$shuzu=file_get_contents($name);//读取json
$shuzu=json_decode($shuzu,true);//转为数组
//print_r($shuzu);
$fenlei=$shuzu['cate'];
$links=$shuzu['links'];
$catepath='../config/cate.php';
$linkpath='../config/link.php';
if (file_put_contents($catepath, "<?php\n \$fenlei= ".var_export($fenlei, true).";\n?>")
&&file_put_contents($linkpath, "<?php\n \$links= ".var_export($links, true).";\n?>")
){
$tishi=alerts('Success','恢复完成，请等待页面跳转！', siteurl.'/admin/backup.php');
}else{
$tishi=alerts('Error','恢复写入失败！');
}


unlink($name);

}else{$tishi = alerts('Error','上传失败，请检查文件权限！');}

}else{$tishi = alerts('info','文件格式不正确，请重新选择！');}



    
}



?>



<?php $title="备份与恢复"; include('header.php') ?>
<?php include('menu.php') ?>

<div class="container mx-auto px-2 sm:px-6">


<?php echo $tishi;?>

<!--备份-->
<div class="bg-white dark:bg-black p-2 sm:p-6 mt-9"> 
<h2 class="flex items-center text-xl font-medium text-gray-800 capitalize dark:text-white md:text-2xl"><svg class="w-6 h-6 inline text-blue-700 mr-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>备份</h2>
<p class="mt-2 text-gray-800 dark:text-gray-200"> 点击备份后将自动下载backup.json文件，文件内包含分类信息与链接信息！ </p>

<div class="mt-4">

<a href="<?php echo siteurl; ?>/admin/api.php?backup=true.json" class="px-6 py-2 leading-5 text-white transition-colors duration-200 transform bg-gray-700 rounded-md hover:bg-gray-600 focus:outline-none focus:bg-gray-600" download="backup.json">备份</a>

            </div>
</div>






<!--恢复-->
<div class="bg-white dark:bg-black p-2 sm:p-6 mt-9"> 
<h2 class="flex items-center text-xl font-medium text-gray-800 capitalize dark:text-white md:text-2xl"><svg class="w-6 h-6 inline text-blue-700 mr-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>恢复</h2>
<p class="mt-2 text-gray-800 dark:text-gray-200">选择之前备份好的json文件，然后点击下方按钮进行恢复。【注：恢复数据会覆盖掉当前网站上的分类与链接】</p>

<div class="mt-4">
<form action="<?php echo siteurl; ?>/admin/backup.php?up" method="post" enctype="multipart/form-data">
<input type="file" name="up"  accept="text/json" class="w-full text-gray-700 px-3 py-2 border rounded">
<button type="submit" class="mt-4 px-6 py-2 leading-5 text-white transition-colors duration-200 transform bg-gray-700 rounded-md hover:bg-gray-600 focus:outline-none focus:bg-gray-600">上传并恢复</button>
</form>
            </div>
</div>





</div>

<?php include('footer.php') ?>
