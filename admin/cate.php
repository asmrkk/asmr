<?php include('function.php') ?>
<?php if(!haslogin()){reurl(siteurl.'/admin/login.php');} ?>
<?php 
$get=$_GET;
$path='../config/cate.php';
require_once($path);
if(!empty($get['edit'])){//修改分类前获取待修改分类信息
function filter($elem){
    return $elem['mid'] == $_GET['edit'];
}
$res = array_values(array_filter($fenlei,'filter'))[0];
}
?>


<?php $title="分类管理"; include('header.php') ?>
<?php include('menu.php') ?>

<div class="container mx-auto px-2 sm:px-6" x-data="{a:[]}" 
x-init="fetch('<?php echo siteurl; ?>/api/?type=cate').then(data => data.json()).then(data=>{a=data;});">

<div x-data="{name:'<?php if(!empty($res)){echo $res['name'];} ?>',slug:'<?php if(!empty($res)){echo $res['slug'];} ?>'}" class="grid grid-cols-2 gap-4 bg-white dark:bg-black p-2 sm:p-6 mt-9"> 
<div>
<label for="catename" class="text-gray-700 dark:text-gray-200">分类名</label>
<input id="catename" x-model="name" type='text' name="name" placeholder="请输入分类名字" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring" />
</div>
<div>
<label for="cateslug" class="text-gray-700 dark:text-gray-200">分类缩略名</label>
<input id="cateslug" x-model="slug" type='text' name="slug" placeholder="请输入缩略名" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring" />
</div>
<button @click="if(name&&slug){
fetch('<?php echo siteurl; ?>/admin/api.php?name='+name+'&slug='+slug<?php if(!empty($get['edit'])){ echo '+\'&edit='.$get['edit'].'\''; }else{echo '+\'&addcate=true\'';} ?>,{method: 'POST',}).then(data => data.json()).then(data => {if(data.status=='-1'){Notifications(data.info,'error');}else{a=data;name='';slug='';<?php if(!empty($get['edit'])): ?>Notifications('分类修改完成！');setTimeout('location.replace(\'<?php echo siteurl; ?>/admin/cate.php\')', 1050);<?php else: ?>Notifications('分类创建完成！');<?php endif; ?>
}});
}else{Notifications('分类或缩略名禁止为空！','error');}" type="button" class="col-span-2 mb-1 w-full bg-blue-600 text-gray-200 rounded hover:bg-blue-500 px-4 py-2 focus:outline-none"><?php if(!empty($get['edit'])): ?>修改<?php else: ?>新增<?php endif; ?></button>   
</div>


<div class="bg-white dark:bg-black p-2 sm:p-6 mt-9" x-data="{dragging: null, dropping: null, timer: null}" 
@drop.prevent="if(dragging !== null && dropping !== null){if(dragging < dropping) a = [...a.slice(0, dragging), ...a.slice(dragging + 1, dropping + 1), a[dragging], ...a.slice(dropping + 1)]; else a = [...a.slice(0, dropping), a[dragging], ...a.slice(dropping, dragging), ...a.slice(dragging + 1)]}; dropping = null;" 
@dragover.prevent="$event.dataTransfer.dropEffect = 'move'" 
@dragend.prevent="fetch('<?php echo siteurl; ?>/admin/api.php?cate='+JSON.stringify(a),{method: 'POST',}).then(data => data.json()).then(data => {if(data.status=='-1'){Notifications(data.info,'error');}});"> 

<template x-for="(item,index) in a">
<div class="p-4 border bg-white dark:bg-gray-900 dark:text-white dark:border-gray-700 mt-2 rounded flex items-center justify-between relative cursor-move" draggable="true" :class="{'border-blue-600': dragging === index}" @dragstart="dragging = index" @dragend="dragging = null">
<div class="flex"><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
  <path stroke-linecap="round" stroke-linejoin="round" d="M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM16 13a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z" />
</svg><span x-text="item.name" class="ml-2"></span><span class="text-gray-500 ml-1"
x-text="'('+item.slug+')'"></span><span class="text-gray-500 ml-1"
x-text="'[mid:'+item.mid+']'"></span></div>
<div><a :href="'?edit='+item.mid" class="text-green-500">修改</a>
<?php if(empty($get['edit'])): ?>
            <button  @click="msg = '您真的确定要删除吗？';
    if (confirm(msg)==true){
    fetch('<?php echo siteurl; ?>/admin/api.php?delete=cate&mid='+item.mid,{method: 'POST',}).then(data => data.json()).then(data => {if(data.status=='-1'){Notifications(data.info,'error');}else{a=data;Notifications('链接已删除！');
}});
        return true;
    }else{
        return false;
    }
" type="button" class="text-red-500">删除</button><?php endif; ?>  </div>

        
        <div class="absolute inset-0 opacity-50" x-show.transition="dragging !== null" :class="{'bg-blue-200': dropping === index}" @dragenter.prevent="if(index !== dragging) {dropping = index}" @dragleave="if(dropping === index) dropping = null" style="display: none;"></div>
      </div>
</template>


</div>









</div>







<?php include('footer.php') ?>
