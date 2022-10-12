<!doctype html>
<html lang="zh-CN" class="h-screen" x-data="data">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,user-scalable=no,viewport-fit=cover,initial-scale=1">
  <title><?php echo $title; ?> - <?php echo sitename; ?><?php echo ' - '.sitedis; ?></title>
 <link rel="apple-touch-icon" href="../favicon.webp">
 <link rel="icon" href="../favicon.webp">
 <link href="./output.css?20220622" rel="stylesheet">
<!--<script src="../3.0.24.js" defer></script>-->
</head>
<!--获取用户信息昵称邮箱头像-->
<body class="relative min-h-full bg-gray-100 dark:bg-gray-800"
x-init="
fetch('<?php echo siteurl; ?>/api/?type=profile').then(data => data.json()).then(data => {
myname=data.screenName;mymail=data.mail;myavatar=data.avatar;
});
"   >
    
<main class="pt-20 pb-48">