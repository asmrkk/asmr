<?php include('function.php') ?>
<?php if(!haslogin()){reurl(siteurl.'/admin/login.php');} ?>
<?php 
//设置时区，否则文章的发布时间会查8H
date_default_timezone_set('PRC');
$catepath='../config/cate.php';
$linkpath='../config/link.php';
require_once($catepath);
require_once($linkpath);

if(!empty($_GET['edit'])){//修改分类前获取待修改分类信息
function filter($elem){
    return $elem['name'] == $_GET['edit'];
}
$res = array_values(array_filter($links,'filter'))[0];
}

?>


<?php $title="管理链接"; include('header.php') ?>
<?php include('menu.php') ?>

<div class="container mx-auto px-2 sm:px-6" x-data="{a:''}">
<?php if(!empty($res)): ?>
<div class="bg-white dark:bg-black p-2 sm:p-6 mt-9" x-data="{name:'<?php echo $res['name']; ?>',dis:'<?php echo $res['dis']; ?>',site:'<?php echo $res['site']; ?>',mid:'<?php echo $res['mid']; ?>',icon:'<?php if(isset($res['icon'])){echo $res['icon'];} ?>'}">
<h2 class="flex items-center text-xl font-medium text-gray-800 capitalize dark:text-white md:text-2xl"><svg class="w-6 h-6 inline text-blue-700 mr-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>修改链接信息</h2>
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
<select id="mid" x-model="mid" name="mid" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring" aria-label="Default select example">
<?php 
$n=0;
foreach ($fenlei as &$fl) {$s='';
if($n==0){$s=' selected';}
    echo '<option value="'.$fl['mid'].'"'.$s.'>'.$fl['name'].'</option>';
$n++;
}?>
<option value="0">回收站</option>
    </select>
</div>
<div class="col-span-2">
<label for="icon" class="text-gray-700 dark:text-gray-200">网站图标地址</label>
<input id="icon" x-model="icon" type='text' name="icon" placeholder="请输入网站图标地址" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring" />
</div>

<button  @click="if(name&&site&&mid){
fetch('<?php echo siteurl; ?>/admin/api.php?name='+name+'&dis='+dis+'&site='+encodeURIComponent(site)+'&mid='+mid<?php if(!empty($res)){echo "+'&edit=".$res['name']."'";} ?>+'&icon='+encodeURIComponent(icon),{method: 'POST',}).then(data => data.json()).then(data => {if(data.status=='-1'){Notifications(data.info,'error');}else{a=data;name='';dis='';site='';icon='';Notifications('链接修改完成！');
}});
}else{Notifications('站名网址或分类禁止为空！','error');}" type="button" class="col-span-2 mb-1 w-full bg-blue-600 text-gray-200 rounded hover:bg-blue-500 px-4 py-2 focus:outline-none">修改</button>   
</div>


</div>

<div class="bg-white dark:bg-black p-2 sm:p-6 mt-9">
<h2 class="flex items-center text-xl font-medium text-gray-800 capitalize dark:text-white md:text-2xl"><svg class="w-6 h-6 inline text-blue-700 mr-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>最近编辑</h2>
<div class="grid grid-cols-2 gap-4 mt-3" x-init="fetch('<?php echo siteurl; ?>/api/links.php?num=8').then(data => data.json()).then(data=>{
a=data;
});"> 

<template x-for="(item,index) in a" :key="index">
<div class="p-2 w-full">
    <a :href="item.site" class="h-full bg-white dark:bg-gray-900 flex items-center border-gray-100 dark:border-gray-600 border p-4 rounded-lg hover:shadow-md duration-300" target="_blank" x-data="{icon:item.icon}">
        <img :alt="item.name" class="w-16 h-16 bg-gray-100 object-cover object-center flex-shrink-0 rounded-full mr-4" :src="item.icon">
        <div class="flex-grow">
            <h2 class="text-gray-700 dark:text-gray-200 title-font font-medium" x-text="item.name"></h2>
            <p class="text-gray-500 line-1" x-text="item.dis"></p>
            </div>
            </a>
    </div>
</template>

</div>
</div>



<?php else: ?>

<div class="bg-white dark:bg-black p-2 sm:p-6 mt-9" x-data="{mid:'<?php echo $fenlei[0]['mid']; ?>'}">
<div class="flex justify-between items-center">
<h2 class="flex items-center text-xl font-medium text-gray-800 capitalize dark:text-white md:text-2xl"><svg class="w-6 h-6 inline text-blue-700 mr-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>链接列表</h2>
<div>
<select  x-model="mid" name="mid" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring" aria-label="选择分类">
<?php 
$n=0;
foreach ($fenlei as &$fl) {$s='';
if($n==0){$s=' selected';}
    echo '<option value="'.$fl['mid'].'"'.$s.'>'.$fl['name'].'</option>';
$n++;
}?>
<option value="0">回收站</option>
    </select>
</div>
</div>

<div class="grid grid-cols-2 gap-4 mt-3" x-data="{dragging: null, dropping: null, timer: null}" @drop.prevent="if(dragging !== null && dropping !== null){if(dragging < dropping) a = [...a.slice(0, dragging), ...a.slice(dragging + 1, dropping + 1), a[dragging], ...a.slice(dropping + 1)]; else a = [...a.slice(0, dropping), a[dragging], ...a.slice(dropping, dragging), ...a.slice(dragging + 1)]}; dropping = null;" 
@dragover.prevent="$event.dataTransfer.dropEffect = 'move'"
@dragend.prevent="fetch('<?php echo siteurl; ?>/admin/api.php?link='+JSON.stringify(a),{method: 'POST',}).then(data => data.json()).then(data => {if(data.status=='-1'){Notifications(data.info,'error');}});"
x-init="fetch('<?php echo siteurl; ?>/api/links.php').then(data => data.json()).then(data=>{
a=data;
});"> 

<template x-for="(item,index) in a" :key="index">
<template x-if="item['mid']==mid">
<div class="p-2 w-full flex justify-between h-full bg-white dark:bg-gray-900 items-center border-gray-100 dark:border-gray-600 border p-3 rounded-lg hover:shadow-md duration-300 relative cursor-move" draggable="true" :class="{'border-blue-600': dragging === index}" @dragstart="dragging = index" @dragend="dragging = null">
<div class="flex flex-grow">
        <img :alt="item.name" class="w-10 h-10 lg:w-12 lg:h-12 bg-gray-100 object-cover object-center flex-shrink-0 rounded-full mr-4" :src="item.icon">
        <div class="flex-grow">
            <h2 class="text-gray-700 dark:text-gray-200 title-font font-medium" x-text="item.name"></h2>
            <p class="text-gray-500 line-1" x-text="item.dis"></p>
            </div>
</div>
    <div class="flex-none"><a :href="'?edit='+item.name" class="text-green-500">修改</a>
    <button  @click="msg = '您真的确定要删除吗？';
    if (confirm(msg)==true){
    fetch('<?php echo siteurl; ?>/admin/api.php?delete=link&name='+item.name,{method: 'POST',}).then(data => data.json()).then(data => {if(data.status=='-1'){Notifications(data.info,'error');}else{a=data;Notifications('链接已删除！');
}});
        return true;
    }else{
        return false;
    }
" type="button" class="text-red-500">删除</button>   
    </div>
            <div class="absolute inset-0 opacity-50" x-show.transition="dragging !== null" :class="{'bg-blue-200': dropping === index}" @dragenter.prevent="if(index !== dragging) {dropping = index}" @dragleave="if(dropping === index) dropping = null" style="display: none;"></div>
    </div>

</template></template>

</div>





</div><?php endif; ?></div>
<?php include('footer.php') ?>
