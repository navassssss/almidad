<?php if (isset($component)) { $__componentOriginal5863877a5171c196453bfa0bd807e410 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5863877a5171c196453bfa0bd807e410 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.layouts.app','data' => ['title' => 'الرئيسية','description' => 'مجلة المداد العربية - مجلة أدبية وثقافية تصدر من طلاب كلية دار الحسنات الإسلامية، وتهدف إلى نشر وازدهار اللغة العربية وأدبها.']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('layouts.app'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'الرئيسية','description' => 'مجلة المداد العربية - مجلة أدبية وثقافية تصدر من طلاب كلية دار الحسنات الإسلامية، وتهدف إلى نشر وازدهار اللغة العربية وأدبها.']); ?>

    
    <section class="xl:hidden container mx-auto">
        <div>
            <div class="h-[373px] w-[305px] mt-[95px] ml-2 2xl:ml-40 xl:ml-10 border border-solid rounded-[28px]"
                style="border-color: #886C8D;">
                <img class="absolute top-44 h-64 ms-12 hover:scale-110 transition" src="images/hero.png" alt="مجلة المداد العربية">
                <h2 class="mt-52 text-center text-[24px]">
                    طبعة جديدة عن <br>
                    <span class="font-bold text-center text-[#886C8D] text-[36px] mt-0">قضية فلسطين</span>
                </h2>
                <div class="flex">
                    <a href="#">
                        <button
                            class="flex bg-[#4484A4] hover:bg-black w-24 h-6 ms-11 mt-5 rounded-[3px] justify-between"
                            style="cursor: pointer;">
                            <img class="h-[13px] ms-3 mt-[6px]" src="images/pdf.png" alt="PDF">
                            <span class="text-white text-[13px] me-3 mt-[2px] font-semibold">PDF اقرأ</span>
                        </button>
                    </a>
                    <a href="#">
                        <button
                            class="flex bg-[#4484A4] hover:bg-black w-28 h-6 ms-2 mt-5 rounded-[3px] justify-between"
                            style="cursor: pointer;">
                            <img class="h-[15px] ms-3 mt-[4px]" src="images/play icon.png" alt="Play">
                            <span class="text-white text-[13px] me-3">شاهد الفيديو</span>
                        </button>
                    </a>
                </div>
            </div>
        </div>
    </section>
    <h1 class="visually-hidden">Al Midad</h1>
    <p class="visually-hidden">Al Midad Arabic Magazine is a brilliant idea from enthusiasts from Darul Hasanath Islamic College, aiming to spread and flourish the Arabic language and its literature among students. Eleven issues have been published throughout these years.</p>
    <section class="hidden xl:flex container mx-auto">
        <!-- Left Section -->
        <?php if($editions->count() > 0): ?>
            <div>
                <div class="h-[373px] w-[305px] mt-[95px] ml-2 2xl:ml-40 xl:ml-10 border border-solid rounded-[28px]"
                    style="border-color: #886C8D;">
                    <img class="absolute top-44 h-64 ms-12 hover:scale-110 transition-all"
                        src="<?php echo e(asset('storage/' . $editions->last()->image)); ?>" alt="الطبعة الأخيرة - <?php echo e($editions->last()->edition); ?>">
                    <h2 class="mt-52 text-center text-[24px]">
                        طبعة جديدة عن <br>
                        <span
                            class="font-bold text-center text-[#886C8D] text-[36px] mt-0"><?php echo e($editions->last()->edition); ?></span>
                    </h2>
                    <div class="flex">
                        <a href="<?php echo e($editions->last()->link); ?>">
                            <button
                                class="flex bg-[#4484A4] hover:bg-black w-24 h-6 ms-11 mt-5 rounded-[3px] justify-between"
                                style="cursor: pointer;">
                                <img class="h-[13px] ms-3 mt-[6px]" src="images/pdf.png" alt="PDF">
                                <span class="text-white text-[13px] me-3 mt-[2px] font-semibold">PDF اقرأ</span>
                            </button>
                        </a>
                        <a href="<?php echo e($editions->last()->link); ?>" target="_blank">
                            <button
                                class="flex bg-[#4484A4] hover:bg-black w-28 h-6 ms-2 mt-5 rounded-[3px] justify-between"
                                style="cursor: pointer;">
                                <img class="h-[15px] ms-3 mt-[4px]" src="images/play icon.png" alt="Play">
                                <span class="text-white text-[13px] me-3">شاهد الفيديو</span>
                            </button>
                        </a>
                    </div>
                </div>
            </div>
        <?php endif; ?>
        <!-- Right Section -->
        <div class="swiper mySwiper mt-16 hidden lg:block">
            <div class="swiper-wrapper">
                <!-- Slides -->

                <?php $__currentLoopData = $slides; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $slide): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                    <div class="swiper-slide bg-slide4"><a
                            href="<?php echo e(route('article.show', ['category' => $slide->category->slug, 'article' => $slide->slug])); ?>">
                            <div
                                class="w-[800px] h-[400px] pt-52 hover:scale-105 transition-all bg-gradient-to-b from-black to-black p-4 rounded-[10px] shadow-lg relative text-end">
                                <img src="<?php echo e(asset('storage/' . $slide->image)); ?>"
                                    class="absolute inset-0 h-full w-full object-cover opacity-50"
                                    style="border-radius: 10px;" alt="<?php echo e($slide->topic); ?>"
                                    <?php if($loop->first): ?> fetchpriority="high" <?php else: ?> loading="lazy" <?php endif; ?>>

                                <div class="relative z-10 text-white">
                                    <h2 class="text-[20px] bg-[#886C8D] inline-block px-2 me-16 font-bold"><?php echo e($slide->topic); ?>

                                    </h2>
                                    <h3 class="text-[30px] mt-2 me-16"><?php echo e($slide->category->a_name); ?></h3>
                                    <p class="mt-1 text-[13px] me-16 text-gray-100"><?php echo e($slide->author->name); ?></p>
                                </div>
                            </div>
                        </a>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </div>
            <!-- Pagination -->
            <div class="swiper-pagination"></div>
        </div>
    </section>

    <section class="bg-[#D6D4D442] mt-14">
        <div class="container mx-auto">
            <h2 class="text-center text-[#886C8D] font-bold text-[30px] pt-5">المقالات المميزة</h2>
            <!--cards-->

            <div class="flex flex-wrap justify-center gap-5 mt-5">
                <?php $__currentLoopData = $featuredd; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $featured): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <a href="<?php echo e(route('article.show', ['category' => $featured->category->slug, 'article' => $featured->slug])); ?>"
                        class="flex-grow max-w-sm min-w-[300px] sm:w-[300px] md:w-[400px] lg:w-[500px]">
                        <div
                            class="pt-28 h-[230px] hover:scale-105 transition-all bg-gradient-to-b from-black to-black p-4 rounded-[10px] shadow-lg relative text-end">
                            <img src="<?php echo e(asset('storage/' . $featured->image)); ?>"
                                class="absolute inset-0 h-full w-full object-cover opacity-60"
                                style="border-radius: 10px;" alt="<?php echo e($featured->topic); ?>" loading="lazy">
                            <div class="relative z-10 text-white">
                                <h2 class="text-[10px] bg-[#886C8D] inline-block px-2 me-8 font-bold">
                                    <?php echo e($featured->category->a_name); ?>

                                </h2>
                                <h3 class="text-xl mt-2 me-8"><?php echo e($featured->topic); ?></h3>
                                <p class="mt-1 text-[13px] me-8"><?php echo e($featured->author->name); ?></p>
                            </div>
                        </div>
                    </a>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>


            <!--cards end-->
            <a href="content page1.html">
                <h2 class="text-center text-[#4484A4] font-bold text-[18px] mt-16"><u>المزيد</u></h2>
            </a><br>
        </div>
    </section>

    <section class="bg-[#d6d4d4] mt-14">
        <div class="container mx-auto">
            <h2 class="text-center text-[#886C8D] font-bold text-[29px] pt-5">الشؤون الجارية</h2>
            <!--card-->
            <div class="flex flex-wrap justify-center gap-5 mt-5">
                <?php $__currentLoopData = $currents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $current): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <a href="<?php echo e(route('article.show', ['category' => $current->category->slug, 'article' => $current->slug])); ?>"
                        class="flex-grow max-w-sm min-w-[300px] sm:w-[300px] md:w-[400px] lg:w-[500px]">
                        <div
                            class="pt-28 h-[230px] hover:scale-105 transition-all bg-gradient-to-b from-black to-black p-4 rounded-[10px] shadow-lg relative text-end">
                            <img src="<?php echo e(asset('storage/' . $current->image)); ?>"
                                class="absolute inset-0 h-full w-full object-cover opacity-60"
                                style="border-radius: 10px;" alt="<?php echo e($current->topic); ?>" loading="lazy">
                            <div class="relative z-10 text-white">
                                <h2 class="text-[10px] bg-[#886C8D] inline-block px-2 me-8 font-bold">
                                    <?php echo e($current->category->a_name); ?>

                                </h2>
                                <h3 class="text-xl mt-2 me-8"><?php echo e($current->topic); ?></h3>
                                <p class="mt-1 text-[13px] me-8"><?php echo e($current->author->name); ?></p>
                            </div>
                        </div>
                    </a>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </div>
            <!--card end-->
            <a href="content page1.html">
                <h2 class="text-center text-[#4484A4] font-bold text-[18px] mt-14"><u>المزيد</u></h2>
            </a><br>
        </div>
    </section>
    <!--الطبعاتالأخيرۃ-->
    <section class="hidden bg-[#6A94A9]">

        <div class="container mx-auto">
            <h2 class="font-bold text-[30px] text-center pt-10 text-white">الطبعاتالأخيرۃ</h2>
            <div class="slider owl-carousel max-w-screen-xl flex mt-10">
                <div class="card mx-4 flex-1">
                    <div class="img w-full">
                        <img src="images/cover midad 1.png" class="h-full w-full object-cover" loading="lazy" alt="غلاف مجلة المداد">
                    </div>
                </div>
                <div class="card mx-4 flex-1">
                    <div class="img w-full">
                        <img src="images/cover midad 2.png" class="h-full w-full object-cover" loading="lazy" alt="غلاف مجلة المداد">
                    </div>
                </div>
                <div class="card mx-4 flex-1">
                    <div class="img w-full">
                        <img src="images/cover midad 3.png" class="h-full w-full object-cover" loading="lazy" alt="غلاف مجلة المداد">
                    </div>
                </div>
                <div class="card mx-4 flex-1">
                    <div class="img w-full">
                        <img src="images/cover midad 5.png" class="h-full w-full object-cover" loading="lazy" alt="غلاف مجلة المداد">
                    </div>
                </div>
                <div class="card mx-4 flex-1">
                    <div class="img w-full">
                        <img src="images/cover midad 4.png" class="h-full w-full object-cover" loading="lazy" alt="غلاف مجلة المداد">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--الأخبار-->
    <section class="mt-14">
        <div class="container mx-auto">
            <h2 class="text-center text-[#886C8D] font-bold text-[29px] pt-5">الأخبار</h2>
            <!--card-->
            <div class="flex flex-wrap justify-center mt-10 gap-5">
                <?php $__currentLoopData = $newss; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $new): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                    <div class="flex-grow max-w-[585px] min-w-[300px] sm:w-[300px] md:w-[400px] lg:w-[500px]">
                        <div
                            class="pt-24 h-[320px] bg-gradient-to-b from-black to-black p-4 rounded-[5px] shadow-lg relative text-end">
                            <div class="absolute inset-0 h-full w-full bg-cover bg-center opacity-40"
                                style="background-image: url('<?php echo e(asset('storage/' . $new->image)); ?>'); border-radius: 5px;">
                            </div>
                            <div class="relative z-10 text-[#ffff] me-14 mt-[-75px]">
                                <h2 class="text-end font-semibold text-2xl"><?php echo e($new->topic); ?></h2>
                                <div class="flex justify-end mt-5">
                                    <p class="text-[12px]"><?php echo e($new->created_at); ?></p>
                                    <img class="h-3 mt-1 ms-2" src="<?php echo e(asset('images/dateicon.png')); ?>" loading="lazy" alt="تاريخ النشر">
                                </div>
                                <p class="text-md mt-4 max-w-sm ms-32  overflow-hidden hidden md:flex">

                                    <?php echo e(Str::limit($new->content, 350)); ?>

                                </p>
                                <a href="#"><button
                                        class="bg-[#4484A4] hover:bg-[#918787] text-white text-[12px] rounded-[4px] me-96 py-[2px] px-1">اقرأ
                                        المزيد</button></a>
                            </div>
                        </div>
                    </div>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </div>
        </div>
    </section>

    

    <?php $__env->startPush('scripts'); ?>
        <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
        <script>
            // cover slider
            $(document).ready(function () {
                $(".slider").owlCarousel({
                    loop: true,
                    autoplay: true,
                    autoplayTimeout: 2000, // 2s
                    autoplayHoverPause: true,
                });
            });
            // hero swiper
            var swiper = new Swiper(".mySwiper", {
                effect: "cards",
                loop: false,
                grabCursor: true,
                autoplay: {
                    delay: 3000,
                    disableOnInteraction: true,
                },
                mousewheel: true,
                loop: false,
                pagination: {
                    el: ".swiper-pagination",
                    clickable: true,
                },
                speed: 1000,
            });


            const swiperCover = new Swiper(".swiper-cover", {
                // Optional parameters
                direction: "horizontal",
                loop: true,
                speed: 200,
                slidesPerView: 1,
                spaceBetween: 30,

                autoplay: {
                    delay: 2500,
                    disableOnInteraction: false,
                },
                mousewheel: true,
                coverflowEffect: {
                    rotate: 30,
                    slideShadows: true,
                },
                // If we need pagination
                pagination: {
                    el: ".swiper-cover-pagination",
                },
                breakpoints: {
                    // When window width is >= 576px
                    0: {
                        slidesPerView: 1,
                    },
                    576: {
                        slidesPerView: 3,
                    },
                    700: {
                        slidesPerView: 4,
                    },
                    900: {
                        slidesPerView: 4,
                    },
                },
            });
        </script>
    <?php $__env->stopPush(); ?>

    <?php $__env->startPush('styles'); ?>
        <style>
            .swiper-slide {
                border-radius: 1.6rem;
                box-shadow: rgba(0, 0, 0, 0.25) 0px 25px 50px -12px;

            }

            .swiper-pagination-bullet-active {
                opacity: 1 !important;
                background-color: white;
                /* active color */
                transform: scale(1.2);
            }

            .swiper-pagination-bullet {
                opacity: 0.5;
                background-color: white;
                /* active color */
                /* transform: scale(1.2); */
            }
        </style>

    <?php $__env->stopPush(); ?>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal5863877a5171c196453bfa0bd807e410)): ?>
<?php $attributes = $__attributesOriginal5863877a5171c196453bfa0bd807e410; ?>
<?php unset($__attributesOriginal5863877a5171c196453bfa0bd807e410); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal5863877a5171c196453bfa0bd807e410)): ?>
<?php $component = $__componentOriginal5863877a5171c196453bfa0bd807e410; ?>
<?php unset($__componentOriginal5863877a5171c196453bfa0bd807e410); ?>
<?php endif; ?><?php /**PATH C:\xampp\htdocs\midad_latest\resources\views/welcome.blade.php ENDPATH**/ ?>