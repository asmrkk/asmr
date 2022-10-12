
    <footer class="absolute bottom-0 w-full bg-white dark:bg-black mt-10">
        <div class="container px-6 py-8 mx-auto">

            <div class="flex flex-col items-center sm:flex-row sm:justify-between">
            <p class="text-sm text-gray-400">© Copyright 2022. All Rights Reserved. 低端导航版本 1.2.0</p>

            <div class="flex mt-3 -mx-2 sm:mt-0">
                <a href="https://blog.zezeshe.com/about.html" class="mx-2 text-sm text-gray-400 hover:text-gray-500 dark:hover:text-gray-300" aria-label="about" target="_blank"> About </a>

                <a href="https://blog.zezeshe.com/" class="mx-2 text-sm text-gray-400 hover:text-gray-500 dark:hover:text-gray-300" aria-label="blog" target="_blank"> Blog </a>
            </div>
            </div>
        </div>
    </footer>
  
 </main> 




<!--notiec-->
<div class="fixed inset-0 bg-black z-50 bg-opacity-50 flex justify-center items-center" x-show="$store.notice.text" x-transition>
<div class="rounded p-6 max-w-xs bg-gray-50 text-lu dark:text-white dark:bg-gray-600">
<div class="text-center"><div class="px-5 dark:text-gray-100 dark:border-gray-400">
<template x-if="$store.notice.type=='success'"><span class="d-block text-green-500 mb-2">
    <svg t="1553065772988" fill="currentColor" class="w-28 mx-auto" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg" p-id="2922" xmlns:xlink="http://www.w3.org/1999/xlink"><defs><style type="text/css"></style></defs><path d="M666.272 472.288l-175.616 192a31.904 31.904 0 0 1-23.616 10.4h-0.192a32 32 0 0 1-23.68-10.688l-85.728-96a32 32 0 1 1 47.744-42.624l62.144 69.6 151.712-165.888a32 32 0 1 1 47.232 43.2m-154.24-344.32C300.224 128 128 300.32 128 512c0 211.776 172.224 384 384 384 211.68 0 384-172.224 384-384 0-211.68-172.32-384-384-384" p-id="2923"></path></svg>
    </span>
</template>
<template x-if="$store.notice.type=='error'"><span class="d-block text-red-500 mb-2">
<svg t="1553065784656" fill="currentColor" class="w-28 mx-auto" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg" p-id="3053" xmlns:xlink="http://www.w3.org/1999/xlink"><defs><style type="text/css"></style></defs><path d="M544 576a32 32 0 0 1-64 0v-256a32 32 0 0 1 64 0v256z m-32 160a32 32 0 1 1 0-64 32 32 0 0 1 0 64z m0-608C300.256 128 128 300.256 128 512s172.256 384 384 384 384-172.256 384-384S723.744 128 512 128z" p-id="3054"></path></svg>
    </span>
</template>
    <div class="text-sm" x-html="$store.notice.text"></div></div></div>
</div></div>



<script src="https://cdn.staticfile.org/alpinejs/3.10.3/cdn.min.js" defer></script>
<script src="https://cdn.staticfile.org/clipboard.js/2.0.10/clipboard.min.js"></script>
 <script>
document.addEventListener('alpine:init', () => {
Alpine.data('data', () => ({
    menu:true,
    profilemenu:false,
    myname:null,
    mymail:null,
    myavatar:null,
}));
    Alpine.store('notice', {
    text:false,
    type:'',
    tixing(txt,type='success'){
        this.text=txt;
        this.type=type;
    }
});
});
function Notifications(txt,type){
Alpine.store('notice').tixing(txt,type);
timerout = setTimeout("Alpine.store('notice').text=''", 1000);  
}
    </script>
</body>
</html>
