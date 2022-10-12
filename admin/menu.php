<nav class="fixed inset-x-0 top-0 z-30 shadow bg-black text-white">
        <div class="container px-6 py-1.5 mx-auto">
            <div class="md:flex md:items-center md:justify-between">
                <div class="flex items-center justify-between">
                        <a href="<?php echo siteurl; ?>/admin" class="flex items-center flex-shrink-0 text-white mr-6">
        <svg class="fill-current h-8 w-8 mr-2" width="54" height="54" viewBox="0 0 54 54" xmlns="http://www.w3.org/2000/svg"><path d="M13.5 22.1c1.8-7.2 6.3-10.8 13.5-10.8 10.8 0 12.15 8.1 17.55 9.45 3.6.9 6.75-.45 9.45-4.05-1.8 7.2-6.3 10.8-13.5 10.8-10.8 0-12.15-8.1-17.55-9.45-3.6-.9-6.75.45-9.45 4.05zM0 38.3c1.8-7.2 6.3-10.8 13.5-10.8 10.8 0 12.15 8.1 17.55 9.45 3.6.9 6.75-.45 9.45-4.05-1.8 7.2-6.3 10.8-13.5 10.8-10.8 0-12.15-8.1-17.55-9.45-3.6-.9-6.75.45-9.45 4.05z"></path></svg>
        <span class="font-semibold text-xl tracking-tight"><?php echo sitename; ?></span>
        </a>


                    <!-- Mobile menu button -->
                    <div class="flex md:hidden">
                        <button type="button" @click="menu=!menu" class="" aria-label="toggle menu">
                            <svg viewBox="0 0 24 24" class="w-6 h-6 fill-current">
                                <path fill-rule="evenodd" d="M4 5h16a1 1 0 0 1 0 2H4a1 1 0 1 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2z"></path>
                            </svg>
                        </button>
                    </div>
                </div>

                <!-- Mobile Menu open: "block", Menu closed: "hidden" -->
                <div class="hidden flex-1 md:flex md:items-center md:justify-between" :class="{'hidden':menu}">
                    <div class="flex flex-col -mx-4 md:flex-row md:items-center md:mx-8">
                        <a href="<?php echo siteurl; ?>/admin" class="px-2 py-1 mx-2 mt-2 text-sm font-medium transition-colors duration-200 transform rounded-md md:mt-0 dark:text-gray-200 hover:bg-gray-700">概要</a>
                        <a href="<?php echo siteurl; ?>/admin/link.php" class="px-2 py-1 mx-2 mt-2 text-sm font-medium transition-colors duration-200 transform rounded-md md:mt-0 dark:text-gray-200 hover:bg-gray-700">添加链接</a>
                        <a href="<?php echo siteurl; ?>/admin/manage-link.php" class="px-2 py-1 mx-2 mt-2 text-sm font-medium transition-colors duration-200 transform rounded-md md:mt-0 dark:text-gray-200 hover:bg-gray-700">链接管理</a>
                        <a href="<?php echo siteurl; ?>/admin/cate.php" class="px-2 py-1 mx-2 mt-2 text-sm font-medium transition-colors duration-200 transform rounded-md md:mt-0 dark:text-gray-200 hover:bg-gray-700">分类管理</a>
                        
                        <div class="relative inline-block" x-data="{open:false}" @click.outside="open=false">
            <!-- Dropdown toggle button -->
            <button @click="open=!open" class="flex relative z-10 block px-2 py-1 mx-2 mt-2 text-sm font-medium transition-colors duration-200 transform rounded-md md:mt-0 dark:text-gray-200 hover:bg-gray-700">
                <span>拓展</span>
                <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M12 15.713L18.01 9.70299L16.597 8.28799L12 12.888L7.40399 8.28799L5.98999 9.70199L12 15.713Z" fill="currentColor"></path>
                </svg>
            </button>

            <!-- Dropdown menu -->
            <div x-show="open" x-transition class="absolute right-0 z-20 w-28 py-2 mt-2 bg-white rounded-md shadow-md dark:bg-gray-800">
            <a href="<?php echo siteurl; ?>/admin/backup.php" class="block px-4 py-3 text-sm text-gray-600 capitalize transition-colors duration-200 transform dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 dark:hover:text-white"> 备份与恢复 </a>
                
            <a href="<?php echo siteurl; ?>/admin/import.php" class="block px-4 py-3 text-sm text-gray-600 capitalize transition-colors duration-200 transform dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 dark:hover:text-white"> 批量导入 </a>
            </div>
        </div>
                        
                        
                        
                        <a href="<?php echo siteurl; ?>/admin/setting.php" class="px-2 py-1 mx-2 mt-2 text-sm font-medium transition-colors duration-200 transform rounded-md md:mt-0 dark:text-gray-200 hover:bg-gray-700">设置</a>
                    </div>

                    <div class="flex items-center mt-4 md:mt-0">
                        
                        <a href="<?php echo siteurl; ?>" class="px-2 py-1 mx-2 mt-2 text-sm font-medium transition-colors duration-200 transform rounded-md md:mt-0 dark:text-gray-200 hover:bg-gray-700" target="_blank">返回首页</a>
                        
                        <div class="flex items-center justify-center">
        <div class="relative inline-block" @click.outside="profilemenu=false">
            <!-- Dropdown toggle button -->
            <button class="relative z-10 block p-2 flex items-center" aria-label="toggle profile dropdown" @click="profilemenu=!profilemenu">
                            <div class="w-8 h-8 overflow-hidden border-2 border-gray-400 rounded-full">
                                <img :src="myavatar">
                            </div>

                            <h3 class="mx-2 text-sm font-medium dark:text-gray-200 md:hidden" x-text="myname"></h3>
            </button>

            <!-- Dropdown menu -->
            <div class="absolute left-0 sm:left-auto sm:right-0 z-20 w-56 py-2 mt-2 bg-white rounded-md shadow-xl dark:bg-gray-800 hidden break-all" :class="{'hidden':!profilemenu}">
            <div class="flex items-center p-3 -mt-2 text-sm text-gray-600 transition-colors duration-200 transform dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 dark:hover:text-white">
                    <img class="flex-shrink-0 object-cover mx-1 rounded-full w-9 h-9" :src="myavatar" alt="my avatar">
                    <div class="mx-1">
                        <h1 class="text-sm font-semibold text-gray-700 dark:text-gray-200" x-text="myname"></h1>
                        <p class="text-sm text-gray-500 dark:text-gray-400" x-text="mymail"></p>
                    </div>
                </div>

                <hr class="border-gray-200 dark:border-gray-700 ">
            
            
            <a href="<?php echo siteurl; ?>/admin/setting.php" class="flex items-center p-3 text-sm text-gray-600 capitalize transition-colors duration-200 transform dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 dark:hover:text-white">
                    <svg class="w-5 h-5 mx-1" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M13.8199 22H10.1799C9.71003 22 9.30347 21.673 9.20292 21.214L8.79592 19.33C8.25297 19.0921 7.73814 18.7946 7.26092 18.443L5.42392 19.028C4.97592 19.1709 4.48891 18.9823 4.25392 18.575L2.42992 15.424C2.19751 15.0165 2.27758 14.5025 2.62292 14.185L4.04792 12.885C3.98312 12.2961 3.98312 11.7019 4.04792 11.113L2.62292 9.816C2.27707 9.49837 2.19697 8.98372 2.42992 8.576L4.24992 5.423C4.48491 5.0157 4.97192 4.82714 5.41992 4.97L7.25692 5.555C7.50098 5.37416 7.75505 5.20722 8.01792 5.055C8.27026 4.91269 8.52995 4.78385 8.79592 4.669L9.20392 2.787C9.30399 2.32797 9.71011 2.00049 10.1799 2H13.8199C14.2897 2.00049 14.6958 2.32797 14.7959 2.787L15.2079 4.67C15.4887 4.79352 15.7622 4.93308 16.0269 5.088C16.2739 5.23081 16.5126 5.38739 16.7419 5.557L18.5799 4.972C19.0276 4.82967 19.514 5.01816 19.7489 5.425L21.5689 8.578C21.8013 8.98548 21.7213 9.49951 21.3759 9.817L19.9509 11.117C20.0157 11.7059 20.0157 12.3001 19.9509 12.889L21.3759 14.189C21.7213 14.5065 21.8013 15.0205 21.5689 15.428L19.7489 18.581C19.514 18.9878 19.0276 19.1763 18.5799 19.034L16.7419 18.449C16.5093 18.6203 16.2677 18.7789 16.0179 18.924C15.7557 19.0759 15.4853 19.2131 15.2079 19.335L14.7959 21.214C14.6954 21.6726 14.2894 21.9996 13.8199 22ZM7.61992 16.229L8.43992 16.829C8.62477 16.9652 8.81743 17.0904 9.01692 17.204C9.20462 17.3127 9.39788 17.4115 9.59592 17.5L10.5289 17.909L10.9859 20H13.0159L13.4729 17.908L14.4059 17.499C14.8132 17.3194 15.1998 17.0961 15.5589 16.833L16.3799 16.233L18.4209 16.883L19.4359 15.125L17.8529 13.682L17.9649 12.67C18.0141 12.2274 18.0141 11.7806 17.9649 11.338L17.8529 10.326L19.4369 8.88L18.4209 7.121L16.3799 7.771L15.5589 7.171C15.1997 6.90671 14.8132 6.68175 14.4059 6.5L13.4729 6.091L13.0159 4H10.9859L10.5269 6.092L9.59592 6.5C9.39772 6.58704 9.20444 6.68486 9.01692 6.793C8.81866 6.90633 8.62701 7.03086 8.44292 7.166L7.62192 7.766L5.58192 7.116L4.56492 8.88L6.14792 10.321L6.03592 11.334C5.98672 11.7766 5.98672 12.2234 6.03592 12.666L6.14792 13.678L4.56492 15.121L5.57992 16.879L7.61992 16.229ZM11.9959 16C9.78678 16 7.99592 14.2091 7.99592 12C7.99592 9.79086 9.78678 8 11.9959 8C14.2051 8 15.9959 9.79086 15.9959 12C15.9932 14.208 14.2039 15.9972 11.9959 16ZM11.9959 10C10.9033 10.0011 10.0138 10.8788 9.99815 11.9713C9.98249 13.0638 10.8465 13.9667 11.9386 13.9991C13.0307 14.0315 13.9468 13.1815 13.9959 12.09V12.49V12C13.9959 10.8954 13.1005 10 11.9959 10Z" fill="currentColor"></path>
                    </svg>

                    <span class="mx-1">
                        个人设置
                    </span>
                </a>
            
                <a href="<?php echo siteurl.'/admin?logout=true' ?>" class="flex items-center p-3 text-sm text-gray-600 capitalize transition-colors duration-200 transform dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 dark:hover:text-white">
                    <svg class="w-5 h-5 mx-1" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M19 21H10C8.89543 21 8 20.1046 8 19V15H10V19H19V5H10V9H8V5C8 3.89543 8.89543 3 10 3H19C20.1046 3 21 3.89543 21 5V19C21 20.1046 20.1046 21 19 21ZM12 16V13H3V11H12V8L17 12L12 16Z" fill="currentColor"></path>
                    </svg>

                    <span class="mx-1">
                        登出网站
                    </span>
                </a>
            </div>
        </div>
    </div>
                        
                        
                        
                        
                    </div>
                </div>
            </div>
        </div>
    </nav>
