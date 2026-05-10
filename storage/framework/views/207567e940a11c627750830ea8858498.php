<!DOCTYPE html>
<html lang="ar">

<head>
    <?php
        $finalTitle = !empty($title) ? $title . ' - المداد' . ' (Al Midad)' : null;
        $finalDescription = !empty($description) ? $description : null;
        $image = !empty($image) ? $image : null;
        $publishedTime = !empty($publishedTime) ? $publishedTime : "sd";
        $modifiedTime = !empty($modifiedTime) ? $modifiedTime : null;
        $author = !empty($author) ? $author : null;
        $category = !empty($category) ? $category : null;
        $tags = !empty($tags) ? $tags : null;
    ?>
    <?php if (isset($component)) { $__componentOriginald764baa8d694a4957f2d6d05fdb30262 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald764baa8d694a4957f2d6d05fdb30262 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.layouts.seo','data' => ['title' => $finalTitle,'description' => $finalDescription,'publishedTime' => $publishedTime,'modifiedTime' => $modifiedTime,'image' => $image,'author' => $author,'category' => $category,'tags' => $tags]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('layouts.seo'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($finalTitle),'description' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($finalDescription),'publishedTime' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($publishedTime),'modifiedTime' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($modifiedTime),'image' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($image),'author' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($author),'category' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($category),'tags' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($tags)]); ?>
     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginald764baa8d694a4957f2d6d05fdb30262)): ?>
<?php $attributes = $__attributesOriginald764baa8d694a4957f2d6d05fdb30262; ?>
<?php unset($__attributesOriginald764baa8d694a4957f2d6d05fdb30262); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald764baa8d694a4957f2d6d05fdb30262)): ?>
<?php $component = $__componentOriginald764baa8d694a4957f2d6d05fdb30262; ?>
<?php unset($__componentOriginald764baa8d694a4957f2d6d05fdb30262); ?>
<?php endif; ?>



    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
</head>
<?php echo app('Illuminate\Foundation\Vite')('resources/css/app.css'); ?>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Almarai:wght@300;400;700;800&family=Noto+Naskh+Arabic:wght@600&family=Noto+Sans+Arabic:wght@100..900&family=Vazirmatn:wght@100..900&display=swap');

    .swiper {
        width: 700px;
        height: 400px;
    }

    .visually-hidden {
        position: absolute;
        width: 1px;
        height: 1px;
        margin: -1px;
        padding: 0;
        overflow: hidden;
        clip: rect(0 0 0 0);
        white-space: nowrap;
        border: 0;
    }


    .swiper-slide {
        display: flex;
        justify-content: center;
        align-items: center;
        font-size: 24px;
        font-weight: bold;
        color: white;
        border-radius: 20px;
    }
</style>
<?php echo $__env->yieldPushContent('styles'); ?>

<body class="bg-[#FFFFFF]" data-aos-easing="ease-in-out" style="font-family: Almarai, serif;">


    <!--navigation-->

    <?php if (isset($component)) { $__componentOriginal9e79cd15ec5b5957133f9c0a985abe76 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9e79cd15ec5b5957133f9c0a985abe76 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.layouts.nav','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('layouts.nav'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9e79cd15ec5b5957133f9c0a985abe76)): ?>
<?php $attributes = $__attributesOriginal9e79cd15ec5b5957133f9c0a985abe76; ?>
<?php unset($__attributesOriginal9e79cd15ec5b5957133f9c0a985abe76); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9e79cd15ec5b5957133f9c0a985abe76)): ?>
<?php $component = $__componentOriginal9e79cd15ec5b5957133f9c0a985abe76; ?>
<?php unset($__componentOriginal9e79cd15ec5b5957133f9c0a985abe76); ?>
<?php endif; ?>

    <?php echo e($slot); ?>



    
    <footer class="mt-24 w-full bg-no-repeat bg-cover bg-center mx-auto" dir="ltr"
        style="background-image: url(<?php echo e(asset('images/footer.jpg')); ?>);">
        <div class="pb-3 md:py-10 bg-white bg-opacity-95">
            <div
                class="w-[94%] mx-auto max-w-7xl p-4 place-items-center grid lg:grid-cols-3 md:grid-cols-3 grid-cols-1 gap-3 sm:gap-0">
                <div class="py-0 md:py-5">
                    <a href="<?php echo e(route('home')); ?>" class="hidden sm:block">
                        <img src="<?php echo e(asset('images/logo.png')); ?>" alt="Al Midad Arabic Magazine Logo - DHIC"
                            class="w-[70%]" />
                    </a>
                    <a href="<?php echo e(route('home')); ?>" class="block sm:hidden">
                        <img src="<?php echo e(asset('images/logo2.png')); ?>" alt="Al Midad Arabic Magazine Logo2 - DHIC"
                            class="w-full h-full" />
                    </a>
                </div>
                <div class="-mt-8 flex flex-row gap-8 md:gap-12 md:flex-row sm:mt-0 w-full font-bold text-[20px]"
                    dir="rtl" style="font-family: Almarai, serif;">
                    <ul class="w-full md:w-1/2 list-none text-gray-600">
                        <li class="text-center text-[15px] sm:px-2 pt-1 border-b border-gray-600"><a
                                href="<?php echo e(route('about')); ?>">عن المجلة</a>
                        </li>
                        <li
                            class="text-center text-[15px] sm:border-gray-600 sm:px-2 mt-1 pt-1 border-b border-gray-600">
                            <a href="<?php echo e(route('editor_note')); ?>">كلمة رئيس التحرير</a>
                        </li>
                    </ul>
                    <ul class="w-full md:w-1/2 list-none text-gray-600">
                        <li class="text-center text-[15px] sm:px-2 focus:text-gray-700 pt-1 border-b border-gray-600"><a
                                target="_blank"
                                href="https://mail.google.com/mail/?view=cm&amp;fs=1&amp;tf=1&amp;to=almidad@gmail.com">إرسال
                                المقالة</a></li>
                        <li class="text-center text-[15px] sm:px-2 mt-1 pt-1 border-b border-gray-600">
                            <a href="<?php echo e(route('contact')); ?>">إتصل بنا</a>
                        </li>
                    </ul>
                </div>

                <div
                    class="flex w-full h-full items-center mt-2 justify-center md:justify-right space-x-1 text-[#5B565C]">
                    <a></a>
                    <p class="ml-1">Follow Us</p>
                    <a href="https://www.instagram.com/al_midad_/" target="_blank"><img class="h-5"
                            src="<?php echo e(asset('images/instaicon.png')); ?>"></a>
                    <a href="https://www.facebook.com/almidadarabic" target="_blank"><img class="h-5"
                            src="<?php echo e(asset('images/fbicon.png')); ?>"></a>
                    <a href="https://www.youtube.com/channel/UCJ9Sg9Eu7WdpCqy4z4Qr0Cw" target="_blank"><img class="h-5"
                            src="<?php echo e(asset('images/yticon.png')); ?>"></a>
                    <a href="https://twitter.com/almidadarabic" target="_blank"><img class="h-5"
                            src="<?php echo e(asset('images/xicon.png')); ?>"></a>
                </div>

            </div>
            <div class="w-full text-xs pb-2 text-gray-400 text-center mt-8">
                ©2025 almidad.com, All rights reserved | Developed by
                <a href="#"></a>
            </div>
        </div>
    </footer>
    <?php echo $__env->yieldPushContent('scripts'); ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>




    <script>
    document.addEventListener('DOMContentLoaded', () => {
        // Dropdown
        const mainDropdownButton = document.getElementById('mainDropdownButton');
        const mainDropdownMenu = document.getElementById('mainDropdownMenu');

        if (mainDropdownButton && mainDropdownMenu) {
            mainDropdownButton.addEventListener('click', () => {
                mainDropdownMenu.classList.toggle('hidden');
            });
        }

        // Mobile menu
        const menuButton = document.getElementById('menu-btn');
        const mobileMenuDropdown = document.getElementById('mobileMenuDropdown');
        const menuIcon = document.getElementById('menu-icon');
        const closeIcon = document.getElementById('close-icon');
        const backButton = document.getElementById('back-btn');

        if (menuButton && mobileMenuDropdown && menuIcon && closeIcon && backButton) {
            menuButton.addEventListener('click', () => {
                mobileMenuDropdown.classList.toggle('hidden');
                menuIcon.classList.toggle('hidden');
                closeIcon.classList.toggle('hidden');
            });

            backButton.addEventListener('click', () => {
                mobileMenuDropdown.classList.add('hidden');
                menuIcon.classList.remove('hidden');
                closeIcon.classList.add('hidden');
            });
        }
    });
</script>

</body>

</html><?php /**PATH C:\xampp\htdocs\midad_latest\resources\views/components/layouts/app.blade.php ENDPATH**/ ?>