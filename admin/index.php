<?php include('function.php') ?>
<?php if(!haslogin()){reurl(siteurl.'/admin/login.php');} ?>
<?php $title="概要"; include('header.php') ?>
<?php include('menu.php') ?>

<?php 
//1.1.1升级到1.2.0平滑升级处理函数
$updateinfo='';
$linkpath='../config/link.php';
require_once($linkpath);//载入链接数组
if(!empty($links)&&!isset($links[0]['icon'])){
foreach ($links as &$fl) {
$fl['icon']='';
}unset($fl); 
if (file_put_contents($linkpath, "<?php\n \$links= ".var_export($links, true).";\n?>")) {
$links=newlinks($links);
}
$updateinfo='<p class="mt-3 text-red-500">1.1.1→1.2.0，平滑升级完成！</p>';
}



?>




<div class="container mx-auto px-2 sm:px-6">




<!--介绍-->
<div class="bg-white dark:bg-black p-2 sm:p-6 mt-9"> 
<h2 class="flex items-center text-xl font-medium text-gray-800 capitalize dark:text-white md:text-2xl"><svg class="w-6 h-6 inline text-blue-700 mr-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>概要</h2>
<?php echo $updateinfo; ?>
<p class="mt-3 text-gray-800 dark:text-gray-200">低端导航是一款基于世界上最好的编程语言PHP开发，致力于做最简洁的导航程序！</p>
</div>
<!--介绍end-->


<!--最近添加的链接-->
<div class="bg-white dark:bg-black p-2 sm:p-6 mt-9" x-data="{a:''}">
<h2 class="flex items-center text-xl font-medium text-gray-800 capitalize dark:text-white md:text-2xl"><svg class="w-6 h-6 inline text-blue-700 mr-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>最近链接</h2>
<div class="grid grid-cols-2 xl:grid-cols-3 gap-4 mt-3" x-init="fetch('<?php echo siteurl; ?>/api/links.php?num=12').then(data => data.json()).then(data=>{
a=data;
});"> 

<template x-for="(item,index) in a" :key="index">
<div class="p-2 w-full">
    <a :href="item.site" class="h-full bg-white dark:bg-gray-900 flex items-center border-gray-100 dark:border-gray-600 border p-3 rounded hover:shadow-md duration-300" target="_blank" :title="item.dis" rel="noopener noreferrer">
        <img :alt="item.name" class="w-10 h-10 lg:w-12 lg:h-12 bg-gray-100 object-cover object-center flex-shrink-0 rounded-full mr-4" :src="item.icon">
        <div class="flex-grow">
            <h2 class="text-gray-700 dark:text-gray-200 title-font font-medium" x-text="item.name"></h2>
            <p class="text-gray-500 line-1" x-text="item.dis"></p>
            </div>
            </a>
    </div>
</template>

</div>
</div>
<!--最近添加的链接end-->



</div>

<?php include('footer.php') ?>
