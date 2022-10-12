<?php include('function.php') ?>
<?php if(!haslogin()){reurl(siteurl.'/admin/login.php');}
$catepath='../config/cate.php';
require_once($catepath);//载入分类数组
?>
<?php $title="添加链接"; include('header.php') ?>
<?php include('menu.php') ?>

<div class="container mx-auto px-2 sm:px-6" x-data="{a:''}">

<!--添加链接-->
<div class="bg-white dark:bg-black p-2 sm:p-6 mt-9" x-data="{name:'',dis:'',site:'',mid:'<?php echo $fenlei[0]['mid']; ?>',icon:''}">
<h2 class="flex items-center text-xl font-medium text-gray-800 capitalize dark:text-white md:text-2xl"><svg class="w-6 h-6 inline text-blue-700 mr-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>添加链接</h2>
<div class="grid grid-cols-2 gap-4 mt-3"> 
<div>
<label for="name" class="text-gray-700 dark:text-gray-200">站名</label>
<input id="name" x-model="name" type='url' name="name" placeholder="请输入网站名字" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring" />
</div>
<div>
<label for="des" class="text-gray-700 dark:text-gray-200">网站描述</label>
<input id="des" x-model="dis" type='text' name="dis" placeholder="请输入网站描述" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring" />
</div>
<div>
<label for="site" class="text-gray-700 dark:text-gray-200">网站地址</label>
<input id="site" x-model="site" type='text' name="site" placeholder="请输入网站地址" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring" />
</div>
<div>
<label for="mid" class="text-gray-700 dark:text-gray-200">网站分类</label>
<select id="mid" x-model="mid" name="mid" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring" aria-label="选择分类">
<?php 
$n=0;
foreach ($fenlei as &$fl) {$s='';
if($n==0){$s=' selected';}
    echo '<option value="'.$fl['mid'].'"'.$s.'>'.$fl['name'].'</option>';
$n++;
}?>
    </select>
</div>
<div class="col-span-2">
<label for="icon" class="text-gray-700 dark:text-gray-200">网站图标地址</label>
<input id="icon" x-model="icon" type='text' name="icon" placeholder="请输入网站图标地址" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring" />
</div>


<button  @click="if(name&&site&&mid){
fetch('<?php echo siteurl; ?>/admin/api.php?addlink=true&name='+name+'&dis='+dis+'&site='+encodeURIComponent(site)+'&mid='+mid+'&icon='+encodeURIComponent(icon),{method: 'POST',}).then(data => data.json()).then(data => {if(data.status=='-1'){Notifications(data.info,'error');}else{a=data;name='';dis='';site='';Notifications('链接添加完成！');
}});
}else{Notifications('站名网址或分类禁止为空！','error');}" type="button" class="col-span-2 mb-1 w-full bg-blue-600 text-gray-200 rounded hover:bg-blue-500 px-4 py-2 focus:outline-none">添加</button>   
</div>

</div>
<!--添加链接end-->

<!--最近的链接-->
<div class="bg-white dark:bg-black p-2 sm:p-6 mt-9">
<h2 class="flex items-center text-xl font-medium text-gray-800 capitalize dark:text-white md:text-2xl"><svg class="w-6 h-6 inline text-blue-700 mr-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>最近添加</h2>
<div class="grid grid-cols-2 gap-4 mt-3" x-init="fetch('<?php echo siteurl; ?>/api/links.php?num=8').then(data => data.json()).then(data=>{
a=data;
});"> 

<template x-for="(item,index) in a" :key="index">
<div class="p-2 w-full">
    <a :href="item.site" class="h-full bg-white dark:bg-gray-900 flex items-center border-gray-100 dark:border-gray-600 border p-3 rounded-lg hover:shadow-md duration-300" target="_blank" x-data="{icon:item.icon}">
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
<!--最近的链接-->
</div>
<?php include('footer.php') ?>
