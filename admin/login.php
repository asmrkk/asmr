<?php
include('function.php');
$_config = require_once('../config/config.php');
$_config =$config;
$pass= $_POST;
$username=$_config['username'];
$password = $_config['password'];

$cookielock=md5($username.$password);


if(haslogin()){reurl(siteurl.'/admin/index.php');}

if(!empty($pass['pass'])&&$pass['pass']==$password&&!empty($pass['username'])&&$pass['username']==$username){
    setcookie("zt", $cookielock, time()+86400,'/');
    reurl(siteurl.'/admin/index.php');
}else{ 
$tixing='<span class="text-xs text-center text-gray-500 uppercase dark:text-gray-400 hover:underline">请在下方填写用户名与密码</span>';
 if (!empty($pass['pass'])||!empty($pass['username'])) {$tixing='<span class="text-xs text-center text-red-500 hover:underline">用户名或密码错误！</span>';}
$title="登录"; include('header.php');
?>
<div class="pt-16">
    <div class="flex  max-w-sm mx-auto overflow-hidden bg-white rounded-lg shadow-lg dark:bg-gray-800 lg:max-w-4xl">
        <div class="hidden bg-cover lg:block lg:w-1/2" style="background-image:url('<?php echo siteurl.'/images/bg.webp' ?>')"></div>
        <form class="w-full px-6 py-8 md:px-8 lg:w-1/2" action="" method="post" role="form">
            <h2 class="text-2xl font-semibold text-center text-gray-700 dark:text-white">登录</h2>

            <div class="flex items-center justify-between mt-4">
                <span class="w-1/5 border-b dark:border-gray-600 lg:w-1/4"></span>

                <?php echo $tixing; ?>

                <span class="w-1/5 border-b dark:border-gray-400 lg:w-1/4"></span>
            </div>

            <div class="mt-4">
                <label class="block mb-2 text-sm font-medium text-gray-600 dark:text-gray-200" for="LoggingEmailName">用户名</label>
                <input id="LoggingEmailName" class="block w-full px-4 py-2 text-gray-700 bg-white border rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring focus:ring-blue-300" type="text" name="username" required>
            </div>

            <div class="mt-4">
                <div class="flex justify-between">
                    <label class="block mb-2 text-sm font-medium text-gray-600 dark:text-gray-200" for="loggingPassword">密码</label>
                </div>

                <input id="loggingPassword" class="block w-full px-4 py-2 text-gray-700 bg-white border rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring focus:ring-blue-300" type="password" name="pass" required>
            </div>

            <div class="mt-8">
                <button class="w-full px-4 py-2 tracking-wide text-white transition-colors duration-200 transform bg-gray-700 rounded hover:bg-gray-600 focus:outline-none focus:bg-gray-600" type="submit">
                    登录
                </button>
            </div>
        </form>
    </div></div>
<?php
 include('footer.php');
    die();
}



?>
