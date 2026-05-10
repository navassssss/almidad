
<nav class="container mx-auto flex justify-between w-screen">

    <div class="relative">
        <button class="md:hidden mt-16 ms-5 focus:outline-none" id="menu-btn">
            <svg class="h-10 w-10 text-gray-700" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                stroke="currentColor" id="menu-icon">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
            </svg>
            <svg class="h-10 w-10 text-gray-700 hidden" xmlns="http://www.w3.org/2000/svg" fill="none"
                viewBox="0 0 24 24" stroke="currentColor" id="close-icon">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
        <div id="mobileMenuDropdown" style="z-index: 10;"
            class="absolute sm:left-10 mt-0 top-10 left-5 w-64 sm:w-80 bg-white rounded-lg shadow-lg hidden text-center">
            <div class="flex">
                <button class="block px-4 py-2 text-gray-700 hover:text-[#4484A4] font-semibold text-left"
                    id="back-btn">
                    <svg class="h-10 w-10 inline-block mr-2" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
                </button>
                <a href="<?php echo e(route('home')); ?>"><img class="h-16 m-5 ms-10" src="<?php echo e(asset('images/logo.png')); ?>"
                        alt="logo"></a>
                <hr class="mx-6">
            </div>
            <a href="content page1.html" class="block px-4 hover:text-[#4484A4] font-semibold py-2 text-gray-700">ملف
                العدد</a>
            <hr class="mx-6">
            <hr class="mx-6">
            <a href="#" class="block px-4 hover:text-[#4484A4] font-semibold py-2 text-gray-700">مقامة</a>
            <hr class="mx-6">
            <a href="#" class="block px-4 hover:text-[#4484A4] font-semibold py-2 text-gray-700">فكرة</a>
            <hr class="mx-6">
            <a href="#" class="block px-4 hover:text-[#4484A4] font-semibold py-2 text-gray-700">فعاليات</a>
            <hr class="mx-6">
            <a href="#" class="block px-4 hover:text-[#4484A4] font-semibold py-2 text-gray-700">دراسة</a>
            <hr class="mx-6">
            <a href="#" class="block px-4 hover:text-[#4484A4] font-semibold py-2 text-gray-700">تاريخ</a>
            <hr class="mx-6">
            <a href="#" class="block px-4 hover:text-[#4484A4] font-semibold py-2 text-gray-700">حوار</a>
            <hr class="mx-6">
            <a href="#" class="block px-4 hover:text-[#4484A4] font-semibold py-2 text-gray-700">شخصية</a>
        </div>
    </div>

    <div>
        <div class="mt-16 hidden xl:flex">
            <div>
                <form action="<?php echo e(route('search')); ?>" method="get">
                    <input type="text" placeholder="ابحث المقالات" name="search"
                        class="text-white h-8 w-52 bg-[#4484A4] rounded-[6px] text-end pe-3 font-bold"
                        onblur="handleBlur(this)" value="<?php echo e(request('search', '')); ?>">
                </form>
            </div>
        </div>
        <div class="hidden xl:flex m-2 space-x-2 ms-7">
            <a href="https://x.com/almidadarabic" target="_blank"><img class="h-5" src="<?php echo e(asset('images/xicon.png')); ?>"
                    alt="x"></a>
            <a href="https://www.facebook.com/almidadarabic" target="_blank"><img class="h-5"
                    src="<?php echo e(asset('images/fbicon.png')); ?>" alt="fb"></a>
            <a href="https://www.youtube.com/@almidadarabic" target="_blank"><img class="h-5"
                    src="<?php echo e(asset('images/yticon.png')); ?>" alt="yt"></a>
            <a href="https://www.instagram.com/al_midad_/" target="_blank"><img class="h-5"
                    src="<?php echo e(asset('images/instaicon.png')); ?>" alt="insta"></a>
            <span class="font-bold">تابعنا</span>
        </div>
    </div>


    <div class="hidden md:flex font-bold mt-20 me-10 text-[20px] md:space-x-6 xl:space-x-20">
        <?php if($moreCategories->count() > 0): ?>
            <div class="relative w-32 group">

                <button id="mainDropdownButton"
                    class="py-2 text-right flex items-center w-[76px] ms-[40px] mt-[-8px] text-[20px]">
                    <svg class="w-5 h-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                    <span id="selectedItem" class="hover:text-[#4484A4] text-gray-700 text-20px">المزيد</span>
                </button>

                <div id="mainDropdownMenu"
                    class="absolute z-10 mt-2 w-full bg-white border border-gray-300 hidden group-hover:block">
                    <ul>

                        <?php $__currentLoopData = $moreCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $more): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li class="px-4 py-2 text-gray-700 hover:text-[#4484A4] cursor-pointer text-right"
                                data-value="<?php echo e($more->a_name); ?>">

                                <a href="<?php echo e(route('category.show', ['category' => $more->slug])); ?>">
                                    <?php echo e($more->a_name); ?>

                                </a>
                            </li>
                            <hr class="mx-4">
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            </div>
        <?php endif; ?>


        <?php $__currentLoopData = $mainCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $main): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <a class="hover:text-[#4484A4] text-[#3F3B3B]" href="<?php echo e(route('category.show', ['category' => $main->slug])); ?>">
                <?php echo e($main->a_name); ?>

            </a>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>


    <div>
        <a href="<?php echo e(route('home')); ?>"><img class="h-20 md:h-24 mt-11 me-5 md:me-0" src="<?php echo e(asset('images/logo.png')); ?>"
                alt="logo"></a>
    </div>
</nav>
<script>
    // Store the last submitted search value globally
    let lastSearchValue = "<?php echo e(request('search', '')); ?>";

    function handleBlur(input) {
        const currentValue = input.value.trim();

        if (currentValue === '') return;               // Don't submit empty
        if (currentValue === lastSearchValue) return;  // Don't submit if unchanged

        lastSearchValue = currentValue;  // Update last submitted value
        input.form.submit();             // Submit the form
    }
</script><?php /**PATH C:\xampp\htdocs\midad_latest\resources\views/components/layouts/nav.blade.php ENDPATH**/ ?>