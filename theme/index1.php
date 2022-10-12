<?php
include('config/cate.php');//载入分类
include('config/link.php');//载入链接
?>
<!doctype html>
<html lang="zh-CN">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,user-scalable=no,viewport-fit=cover,initial-scale=1">
  <title><?php echo $setting['sitename'].' - '. $setting['sitedis']; ?></title>
  <meta name="title" content="<?php echo $setting['sitename']; ?>">
  <meta name="description" content="<?php echo $setting['sitedis']; ?>"/>
  <meta name="keywords" content="<?php echo $setting['keyword']; ?>"/>

  <link rel="dns-prefetch" href="//cdn.staticfile.org"/> 
  <link rel="apple-touch-icon" href="./favicon.webp">
  <link rel="icon" href="./favicon.webp">
  <link href="./theme/output.css?202006" rel="stylesheet">
  <!--<script src="./3.0.24.js" defer></script>-->
  <?php echo $setting['tongji']; ?>
</head>
<body class="bg-white dark:bg-gray-900">
<nav class="bg-white shadow dark:bg-gray-800 fixed inset-x-0 z-30" x-data="{menu:false}">
        <div class="container px-6 py-4 mx-auto md:flex md:justify-between md:items-center">
            <div class="flex items-center justify-between">
                <div class="flex items-center flex-shrink-0 text-base font-bold text-sky-500 transition-colors duration-200 transform dark:text-white lg:text-xl"><svg class="fill-current h-6 w-6 mr-2" width="54" height="54" viewBox="0 0 54 54" xmlns="http://www.w3.org/2000/svg"><path d="M13.5 22.1c1.8-7.2 6.3-10.8 13.5-10.8 10.8 0 12.15 8.1 17.55 9.45 3.6.9 6.75-.45 9.45-4.05-1.8 7.2-6.3 10.8-13.5 10.8-10.8 0-12.15-8.1-17.55-9.45-3.6-.9-6.75.45-9.45 4.05zM0 38.3c1.8-7.2 6.3-10.8 13.5-10.8 10.8 0 12.15 8.1 17.55 9.45 3.6.9 6.75-.45 9.45-4.05-1.8 7.2-6.3 10.8-13.5 10.8-10.8 0-12.15-8.1-17.55-9.45-3.6-.9-6.75.45-9.45 4.05z"></path></svg><span><?php echo $setting['sitename']; ?></span>
                </div>

            </div>

        </div>
    </nav>
    
<div class="bg-gray-50 dark:bg-gray-700 pt-24 pb-10">
<div class="max-w-screen-md px-4 py-6 mx-auto">
<!-- Right -->
<div class="bg-white dark:bg-gray-900 rounded border border-gray-200 dark:border-gray-600 flex items-center justify-between">
    <input type="text" x-model="search" placeholder="请输入搜索内容" class="bg-transparent py-1 text-gray-600 dark:text-gray-200 px-4 focus:outline-none flex-grow" />
<a :href="url" x-effect="if(search){url='https://www.baidu.com/s?ie=UTF-8&wd='+search;}else{url=''}" class="hidden" x-ref="baidu" target="_blank"></a>
<button class="py-2 px-4 bg-white dark:bg-gray-800 text-gray-600 dark:text-gray-200 rounded-r border-l border-gray-200 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-900 active:bg-gray-200 dark:active:bg-black disabled:opacity-50 inline-flex items-center focus:outline-none" @click="if(search){$refs.baidu.click();}">搜索</button>
</div>    
     
</div>   
</div>
   

<?php 
$n=0;
foreach($fenlei as $value){
$n++;
$mid=$value['mid'];
$name=$value['name'];
$link=$links;
foreach ($link as $key => $v) {
if($v['mid'] != $mid){
unset($link[$key]);
}
}
$newlinks=$link; 
?>

<section class="py-3 sm:py-6 <?php if($n%2!=0){echo 'bg-white dark:bg-gray-900';}else{echo 'bg-gray-50 dark:bg-gray-700';} ?>">
        <div class="container flex flex-col px-4 py-6 mx-auto">
            
<h3 class="text-lg font-semibold text-gray-800 dark:text-white capitalize border-b-2 border-gray-100 dark:border-gray-800 pb-1 mb-5 flex flex-row items-center"><svg class="w-5 h-5 inline text-blue-700" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg><span x-text="fenlei.name"><?php echo $name ?></span></h3>

            <div class="w-full">
<div class="flex flex-wrap -m-2">
<?php foreach($newlinks as $val){ ?>
<div class="p-2 lg:w-1/3 md:w-1/2 w-full">
    <a href="<?php echo $val['site']; ?>" class="h-full bg-white dark:bg-gray-900 flex items-center border-gray-100 dark:border-gray-600 border p-3 rounded hover:shadow-md duration-300" target="_blank" title="<?php echo $val['dis']; ?>" rel="noopener noreferrer">
        <img alt="<?php echo $val['name']; ?>" class="w-10 h-10 lg:w-12 lg:h-12 bg-gray-100 object-cover object-center flex-shrink-0 rounded-full mr-4" src="<?php
        if(!empty($val['icon'])){echo $val['icon'];}else{
        echo 'https://zezeshe.com/api/ico/?url='.$val['site'];
        } ?>">
        <div class="flex-grow">
            <h2 class="text-gray-700 dark:text-gray-200 title-font font-medium"><?php echo $val['name']; ?></h2>
            <p class="text-gray-500 line-1"><?php echo $val['dis']; ?></p>
            </div>
            </a>
    </div>

<?php } ?>
</div>
            </div>
        </div>
</section>
<?php } ?>

  







<section id="about" class="bg-white dark:bg-gray-800 pt-10">
        <div class="container px-6 py-8 mx-auto">
            <div class="items-center lg:flex">
                <div class="lg:w-1/2">
                    <h2 class="text-3xl font-bold text-gray-800 dark:text-gray-100">低端导航</h2>

                    <p class="mt-4 text-gray-500 dark:text-gray-400 lg:max-w-md">
                    低端导航是一款基于世界上最好的编程语言PHP开发，致力于做最简洁的导航程序！
                    </p>

                    <div class="flex items-center mt-6 -mx-2">
                        <a class="mx-2" href="https://www.bilibili.com/video/BV1pT411G7iY" aria-label="Bilibili" target="_blank">
                            <svg class="w-5 h-5 text-gray-700 fill-current dark:text-gray-200 hover:text-gray-600 dark:hover:text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg" p-id="1672"><path d="M306.005333 117.632L444.330667 256h135.296l138.368-138.325333a42.666667 42.666667 0 0 1 60.373333 60.373333L700.330667 256H789.333333A149.333333 149.333333 0 0 1 938.666667 405.333333v341.333334a149.333333 149.333333 0 0 1-149.333334 149.333333h-554.666666A149.333333 149.333333 0 0 1 85.333333 746.666667v-341.333334A149.333333 149.333333 0 0 1 234.666667 256h88.96L245.632 177.962667a42.666667 42.666667 0 0 1 60.373333-60.373334zM789.333333 341.333333h-554.666666a64 64 0 0 0-63.701334 57.856L170.666667 405.333333v341.333334a64 64 0 0 0 57.856 63.701333L234.666667 810.666667h554.666666a64 64 0 0 0 63.701334-57.856L853.333333 746.666667v-341.333334A64 64 0 0 0 789.333333 341.333333zM341.333333 469.333333a42.666667 42.666667 0 0 1 42.666667 42.666667v85.333333a42.666667 42.666667 0 0 1-85.333333 0v-85.333333a42.666667 42.666667 0 0 1 42.666666-42.666667z m341.333334 0a42.666667 42.666667 0 0 1 42.666666 42.666667v85.333333a42.666667 42.666667 0 0 1-85.333333 0v-85.333333a42.666667 42.666667 0 0 1 42.666667-42.666667z" p-id="1673"></path></svg>
                        </a>
                    
                        <a class="mx-2" href="https://github.com/jrotty/LowNavigation" aria-label="Github" target="_blank">
                            <svg class="w-5 h-5 text-gray-700 fill-current dark:text-gray-200 hover:text-gray-600 dark:hover:text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                <path d="M256 32C132.3 32 32 134.9 32 261.7c0 101.5 64.2 187.5 153.2 217.9 1.4.3 2.6.4 3.8.4 8.3 0 11.5-6.1 11.5-11.4 0-5.5-.2-19.9-.3-39.1-8.4 1.9-15.9 2.7-22.6 2.7-43.1 0-52.9-33.5-52.9-33.5-10.2-26.5-24.9-33.6-24.9-33.6-19.5-13.7-.1-14.1 1.4-14.1h.1c22.5 2 34.3 23.8 34.3 23.8 11.2 19.6 26.2 25.1 39.6 25.1 10.5 0 20-3.4 25.6-6 2-14.8 7.8-24.9 14.2-30.7-49.7-5.8-102-25.5-102-113.5 0-25.1 8.7-45.6 23-61.6-2.3-5.8-10-29.2 2.2-60.8 0 0 1.6-.5 5-.5 8.1 0 26.4 3.1 56.6 24.1 17.9-5.1 37-7.6 56.1-7.7 19 .1 38.2 2.6 56.1 7.7 30.2-21 48.5-24.1 56.6-24.1 3.4 0 5 .5 5 .5 12.2 31.6 4.5 55 2.2 60.8 14.3 16.1 23 36.6 23 61.6 0 88.2-52.4 107.6-102.3 113.3 8 7.1 15.2 21.1 15.2 42.5 0 30.7-.3 55.5-.3 63 0 5.4 3.1 11.5 11.4 11.5 1.2 0 2.6-.1 4-.4C415.9 449.2 480 363.1 480 261.7 480 134.9 379.7 32 256 32z"></path>
                            </svg>
                        </a>
                    
                        <a class="mx-2" href="https://tailwindcss.com/" aria-label="TailwindCss" target="_blank">
                            <svg class="w-5 h-5 text-gray-700 fill-current dark:text-gray-200 hover:text-gray-600 dark:hover:text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg" p-id="2095"><path d="M512.042667 204.8c-136.533333 0-221.866667 68.266667-256 204.8 51.2-68.266667 110.933333-93.866667 179.2-76.8 38.954667 9.728 66.773333 37.973333 97.621333 69.290667C583.082667 453.034667 641.152 512 768.042667 512c136.533333 0 221.866667-68.266667 256-204.8-51.2 68.266667-110.933333 93.866667-179.2 76.8-38.954667-9.728-66.773333-37.973333-97.621334-69.290667C697.045333 263.765333 638.976 204.8 512.042667 204.8z m-256 307.2c-136.533333 0-221.866667 68.266667-256 204.8 51.2-68.266667 110.933333-93.866667 179.2-76.8 38.954667 9.728 66.773333 37.973333 97.621333 69.290667 50.218667 50.944 108.288 109.909333 235.178667 109.909333 136.533333 0 221.866667-68.266667 256-204.8-51.2 68.266667-110.933333 93.866667-179.2 76.8-38.954667-9.728-66.773333-37.973333-97.621334-69.290667C441.045333 570.965333 382.976 512 256.042667 512z" p-id="2096"></path></svg>
                        </a>
                    </div>
                </div>

                <div class="mt-8 hidden lg:block lg:mt-0 lg:w-1/2">
                    <div class="flex items-center justify-center lg:justify-end">
                        <div class="max-w-lg">
                            <img class="object-cover object-center w-full h-64" src="./images/website.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<footer class="bg-gray-800">
        <div class="container px-6 pb-8 mx-auto">
<hr class="mb-8 border-gray-700">
            <div class="flex flex-col items-center sm:flex-row sm:justify-between">
            <p class="text-sm text-gray-400">© Copyright 2022. All Rights Reserved.</p>

            <div class="flex mt-3 -mx-2 sm:mt-0">
                <a href="https://blog.zezeshe.com/about.html" class="mx-2 text-sm text-gray-400 hover:text-gray-300" aria-label="about" target="_blank"> About </a>

                <a href="https://blog.zezeshe.com/" class="mx-2 text-sm text-gray-400 hover:text-gray-300" aria-label="blog" target="_blank"> Blog </a>

            </div>
            </div>
        </div>
</footer>

<script src="https://cdn.staticfile.org/alpinejs/3.9.6/cdn.min.js" defer></script>
</body>
</html>
