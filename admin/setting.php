<?php include('function.php') ?>
<?php if(!haslogin()){reurl(siteurl.'/admin/login.php');} ?>
<?php 
//设置时区，否则文章的发布时间会查8H
date_default_timezone_set('PRC');
$path='../config/config.php';
require_once($path);
?>



<?php $title="设置"; include('header.php') ?>
<?php include('menu.php') ?>

<div class="container mx-auto px-2 sm:px-6">




<!--网站设置-->
<div class="bg-white dark:bg-black p-2 sm:p-6 mt-9" x-data="{siteurl:'<?php echo $setting['siteurl']; ?>',sitedis:'<?php echo $setting['sitedis']; ?>',sitename:'<?php echo $setting['sitename']; ?>',keyword:'<?php echo $setting['keyword']; ?>',tongji:'<?php echo $setting['tongji']; ?>'}"> 
<h2 class="flex items-center text-xl font-medium text-gray-800 capitalize dark:text-white md:text-2xl"><svg class="w-6 h-6 inline text-blue-700 mr-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>网站设置</h2>


<div class="grid grid-cols-1 gap-6 mt-4 sm:grid-cols-2">
                <div>
                    <label class="text-gray-700 dark:text-gray-200" for="siteurl">网站地址</label>
                    <input id="siteurl" x-model="siteurl" name="siteurl" type="url" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring">
                </div>
                <div>
                    <label class="text-gray-700 dark:text-gray-200" for="sitename">网站名</label>
                    <input id="sitename" x-model="sitename" name="sitename" type="text" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring">
                </div>
                <div>
                    <label class="text-gray-700 dark:text-gray-200" for="sitedis">网站描述</label>
                    <input id="sitedis" x-model="sitedis" name="sitedis" type="text" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring">
                </div>
                <div>
                    <label class="text-gray-700 dark:text-gray-200" for="keyword">网站关键词</label>
                    <input id="keyword" x-model="keyword" name="keyword" type="text" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring">
                </div>
                
            </div>

            <div class="mt-4">
                    <label class="text-gray-700 dark:text-gray-200" for="tongji">统计代码</label>
                <textarea id="tongji" x-model="tongji" name="tongji" type="text" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring"></textarea>
                <p class="flex items-center pt-2 text-gray-800 dark:text-gray-200">
指<code class="text-red-500">Html</code>的<code class="text-red-500">head</code>部分放置的内容，一般用来放置<a href="https://invite.51.la/1NJaiBx8?target=V6" target="_blank" rel="noopener noreferrer" class="text-red-500">51LA</a>统计代码，推荐使用<a href="https://invite.51.la/1NJaiBx8?target=V6" target="_blank" rel="noopener noreferrer"><img src="https://sdk.51.la/icon/2-1.png"></a></p>
            </div>

            <div class="flex justify-end mt-6">
                <button @click="if(sitename&&siteurl){
fetch('<?php echo siteurl; ?>/admin/api.php?sitename='+sitename+'&sitedis='+sitedis+'&siteurl='+siteurl+'&keyword='+keyword+'&tongji='+tongji,{method: 'POST',}).then(data => data.json()).then(data => {if(data.status=='-1'){Notifications(data.info,'error');}else{Notifications('设置保存完成！');
}});
}else{Notifications('站名和网址禁止为空！','error');}" class="px-6 py-2 leading-5 text-white transition-colors duration-200 transform bg-gray-700 rounded-md hover:bg-gray-600 focus:outline-none focus:bg-gray-600">保存</button>
            </div>













</div>

<!--个人设置-->
<div class="bg-white dark:bg-black p-2 sm:p-6 mt-9" x-data="{mail:'<?php echo $profile['mail']; ?>',screenName:'<?php echo $profile['screenName']; ?>',}"> 
<h2 class="flex items-center text-xl font-medium text-gray-800 capitalize dark:text-white md:text-2xl"><svg class="w-6 h-6 inline text-blue-700 mr-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>个人设置</h2>


<div class="grid grid-cols-1 gap-6 mt-4 sm:grid-cols-2">
                <div>
                    <label class="text-gray-700 dark:text-gray-200" for="screenName">昵称</label>
                    <input id="screenName" x-model="screenName" name="screenName" type="text" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring">
                </div>
                <div>
                    <label class="text-gray-700 dark:text-gray-200" for="mail">邮箱</label>
                    <input id="mail" x-model="mail" name="mail" type="mail" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring">
                </div>
            </div>

            <div class="flex justify-end mt-6">
                <button @click="if(screenName&&mail){
fetch('<?php echo siteurl; ?>/admin/api.php?screenName='+screenName+'&mail='+mail,{method: 'POST',}).then(data => data.json()).then(data => {if(data.status=='-1'){Notifications(data.info,'error');}else{Notifications('设置保存完成！');myname=data.screenName;mymail=data.mail;myavatar=data.avatar;
}});
}else{Notifications('昵称与邮箱禁止为空！','error');}" class="px-6 py-2 leading-5 text-white transition-colors duration-200 transform bg-gray-700 rounded-md hover:bg-gray-600 focus:outline-none focus:bg-gray-600">保存</button>
            </div>

</div>
<!--登录设置-->
<div class="bg-white dark:bg-black p-2 sm:p-6 mt-9" x-data="{username:'<?php echo $config['username']; ?>',password:null,confirm:null,}"> 
<h2 class="flex items-center text-xl font-medium text-gray-800 capitalize dark:text-white md:text-2xl"><svg class="w-6 h-6 inline text-blue-700 mr-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>登录设置</h2>
<div class="grid grid-cols-1 gap-6 mt-4 sm:grid-cols-2">
                <div>
                    <label class="text-gray-700 dark:text-gray-200" for="username">登录用户名</label>
                    <input id="username" x-model="username" name="username" type="text" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring">
                </div>
                <div>
                    <label class="text-gray-700 dark:text-gray-200" for="password">密码</label>
                    <input id="password" x-model="password" name="password" type="password" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring">
                </div>
                <div>
                    <label class="text-gray-700 dark:text-gray-200" for="confirm">重复密码</label>
                    <input id="confirm" x-model="confirm" name="confirm" type="password" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring">
                </div>
            </div>

            <div class="flex justify-end mt-6">
                <button @click="if(username&&password&&confirm){
fetch('<?php echo siteurl; ?>/admin/api.php?username='+username+'&password='+password+'&confirm='+confirm,{method: 'POST',}).then(data => data.json()).then(data => {if(data.status=='-1'){Notifications(data.info,'error');}else{Notifications('设置完成！');
}});
}else{Notifications('用户名密码禁止为空！','error');}" class="px-6 py-2 leading-5 text-white transition-colors duration-200 transform bg-gray-700 rounded-md hover:bg-gray-600 focus:outline-none focus:bg-gray-600">保存</button>
            </div>
</div>


</div>

<?php include('footer.php') ?>
