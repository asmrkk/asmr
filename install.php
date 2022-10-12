<?php 
    function tixing($txt){
    return '<span class="text-xs text-center text-red-500 uppercase dark:text-gray-400 hover:underline">'.$txt.'</span>'; 
    }
if(isset($setting['siteurl'])&&empty($setting['siteurl'])):
    $tixing='<span class="text-xs text-center text-gray-500 uppercase dark:text-gray-400 hover:underline">请在下方输入配置信息</span>';
    $post= $_POST;
    if(!empty($post['siteurl'])&&!empty($post['username'])&&!empty($post['usermail'])&&!empty($post['pass'])){

if (filter_var($post['siteurl'], FILTER_VALIDATE_URL ) === false ){
    $tixing=tixing('网址格式不正确！');
}else{
$configpath='./config/config.php';
$siteurl=rtrim($post['siteurl'],'/');
 $setting=array('siteurl'=>$siteurl,'sitedis'=>'一个代码写的比较Low的导航程序','sitename'=>'低端导航');  
 $profile=array('screenName'=>$post['username'],'mail'=>$post['usermail'],); 
 $config=array('username'=>$post['username'],'password'=>$post['pass'],);
   file_put_contents($configpath, "<?php\n \$setting= ".var_export($setting, true).";\n \$profile= ".var_export($profile, true).";\n \$config= ".var_export($config, true).";\n?>");
   $cookielock=md5($post['username'].$post['pass']);
   setcookie("zt", $cookielock, time()+86400,'/');
   header("Location: ".$siteurl.'/admin'); 
}

    }else{
    if(isset($post['siteurl'])){
    $tixing=tixing('所有参数禁止为空！');  }
    }
    

?>
<!doctype html>
<html lang="zh-CN" class="h-screen" x-data="data">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,user-scalable=no,viewport-fit=cover,initial-scale=1">
  <title>安装引导</title>
 <link rel="apple-touch-icon" href="../favicon.webp">
 <link rel="icon" href="../favicon.webp">
 <link href="./admin/output.css?2022" rel="stylesheet">
</head>
<body class="relative min-h-full bg-gray-100 dark:bg-gray-800">
<main class="pb-48">



<div class="pt-16">
    <div class="flex  max-w-sm mx-auto overflow-hidden bg-white rounded-lg shadow-lg dark:bg-gray-800 lg:max-w-4xl">
        <div class="hidden bg-cover lg:block lg:w-1/2" style="background-image:url('./images/bg.webp')"></div>
        <form class="w-full px-6 py-8 md:px-8 lg:w-1/2" action="" method="post" role="form">
            <h2 class="text-2xl font-semibold text-center text-gray-700 dark:text-white">安装引导</h2>

            <div class="flex items-center justify-between mt-4">
                <span class="w-1/5 border-b dark:border-gray-600 lg:w-1/4"></span>

                <?php echo $tixing; ?>

                <span class="w-1/5 border-b dark:border-gray-400 lg:w-1/4"></span>
            </div>

            <div class="mt-4">
                <label class="block mb-2 text-sm font-medium text-gray-600 dark:text-gray-200" for="siteurl">网址</label>
                <input id="siteurl" class="block w-full px-4 py-2 text-gray-700 bg-white border rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring focus:ring-blue-300" type="url" name="siteurl" required>
            </div>

            <div class="mt-4">
                <label class="block mb-2 text-sm font-medium text-gray-600 dark:text-gray-200" for="LoggingEmailName">用户名</label>
                <input id="LoggingEmailName" class="block w-full px-4 py-2 text-gray-700 bg-white border rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring focus:ring-blue-300" type="text" name="username" required>
            </div>

            <div class="mt-4">
                <label class="block mb-2 text-sm font-medium text-gray-600 dark:text-gray-200" for="LoggingEmailMail">邮箱</label>
                <input id="LoggingEmailMail" class="block w-full px-4 py-2 text-gray-700 bg-white border rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring focus:ring-blue-300" type="mail" name="usermail" required>
            </div>

            <div class="mt-4">
                <div class="flex justify-between">
                    <label class="block mb-2 text-sm font-medium text-gray-600 dark:text-gray-200" for="loggingPassword">密码</label>
                </div>

                <input id="loggingPassword" class="block w-full px-4 py-2 text-gray-700 bg-white border rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring focus:ring-blue-300" type="password" name="pass" required>
            </div>

            <div class="mt-8">
                <button class="w-full px-4 py-2 tracking-wide text-white transition-colors duration-200 transform bg-gray-700 rounded hover:bg-gray-600 focus:outline-none focus:bg-gray-600" type="submit">
                    安装
                </button>
            </div>
        </form>
    </div></div>











<?php  include('admin/footer.php');
else: echo '非法访问！';
endif ?>