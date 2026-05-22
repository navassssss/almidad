<!DOCTYPE html>
<html lang="ar">

<head>
    @php
        $finalTitle = !empty($title) ? $title . ' - المداد' . ' (Al Midad)' : null;
        $finalDescription = !empty($description) ? $description : null;
        $image = !empty($image) ? $image : null;
        $publishedTime = !empty($publishedTime) ? $publishedTime : "sd";
        $modifiedTime = !empty($modifiedTime) ? $modifiedTime : null;
        $author = !empty($author) ? $author : null;
        $category = !empty($category) ? $category : null;
        $tags = !empty($tags) ? $tags : null;
    @endphp
    <x-layouts.seo :title="$finalTitle" :description="$finalDescription" :publishedTime="$publishedTime"
        :modifiedTime="$modifiedTime" :image="$image" :author="$author" :category="$category" :tags="$tags">
    </x-layouts.seo>



    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    
    @vite('resources/css/app.css')
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
@stack('styles')
</head>

<body class="bg-[#FFFFFF]" data-aos-easing="ease-in-out" style="font-family: Almarai, serif;">


    <!--navigation-->

    <x-layouts.nav></x-layouts.nav>

    {{ $slot }}


    {{-- Footer --}}
    <footer class="mt-24 w-full bg-no-repeat bg-cover bg-center mx-auto" dir="ltr"
        style="background-image: url({{ asset('images/footer.jpg') }});">
        <div class="pb-3 md:py-10 bg-white bg-opacity-95">
            <div
                class="w-[94%] mx-auto max-w-7xl p-4 place-items-center grid lg:grid-cols-3 md:grid-cols-3 grid-cols-1 gap-3 sm:gap-0">
                <div class="py-0 md:py-5">
                    <a href="{{ route('home') }}" class="hidden sm:block">
                        <img src="{{ asset('images/logo.png') }}" alt="Al Midad Arabic Magazine Logo - DHIC"
                            class="w-[70%]" />
                    </a>
                    <a href="{{ route('home') }}" class="block sm:hidden">
                        <img src="{{ asset('images/logo2.png') }}" alt="Al Midad Arabic Magazine Logo2 - DHIC"
                            class="w-full h-full" />
                    </a>
                </div>
                <div class="-mt-8 flex flex-row gap-8 md:gap-12 md:flex-row sm:mt-0 w-full font-bold text-[20px]"
                    dir="rtl" style="font-family: Almarai, serif;">
                    <ul class="w-full md:w-1/2 list-none text-gray-600">
                        <li class="text-center text-[15px] sm:px-2 pt-1 border-b border-gray-600"><a
                                href="{{ route('about') }}">عن المجلة</a>
                        </li>
                        <li
                            class="text-center text-[15px] sm:border-gray-600 sm:px-2 mt-1 pt-1 border-b border-gray-600">
                            <a href="{{ route('editor_note') }}">كلمة رئيس التحرير</a>
                        </li>
                    </ul>
                    <ul class="w-full md:w-1/2 list-none text-gray-600">
                        <li class="text-center text-[15px] sm:px-2 focus:text-gray-700 pt-1 border-b border-gray-600"><a
                                target="_blank"
                                href="https://mail.google.com/mail/?view=cm&amp;fs=1&amp;tf=1&amp;to=almidad@gmail.com">إرسال
                                المقالة</a></li>
                        <li class="text-center text-[15px] sm:px-2 mt-1 pt-1 border-b border-gray-600">
                            <a href="{{ route('contact') }}">إتصل بنا</a>
                        </li>
                    </ul>
                </div>

                <div
                    class="flex w-full h-full items-center mt-2 justify-center md:justify-right space-x-1 text-[#5B565C]">
                    <a></a>
                    <p class="ml-1">Follow Us</p>
                    <a href="https://www.instagram.com/al_midad_/" target="_blank"><img class="h-5"
                            src="{{ asset('images/instaicon.png') }}"></a>
                    <a href="https://www.facebook.com/almidadarabic" target="_blank"><img class="h-5"
                            src="{{ asset('images/fbicon.png') }}"></a>
                    <a href="https://www.youtube.com/channel/UCJ9Sg9Eu7WdpCqy4z4Qr0Cw" target="_blank"><img class="h-5"
                            src="{{ asset('images/yticon.png') }}"></a>
                    <a href="https://twitter.com/almidadarabic" target="_blank"><img class="h-5"
                            src="{{ asset('images/xicon.png') }}"></a>
                </div>

            </div>
            <div class="w-full text-xs pb-2 text-gray-400 text-center mt-8">
                ©2025 almidad.com, All rights reserved | Developed by
                <a href="#"></a>
            </div>
        </div>
    </footer>
    @stack('scripts')
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

</html>