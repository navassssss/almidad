<?php if (isset($component)) { $__componentOriginal5863877a5171c196453bfa0bd807e410 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5863877a5171c196453bfa0bd807e410 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.layouts.app','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('layouts.app'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
    
  <div class="w-[90%] mx-auto max-w-7xl" style="font-family: Almarai, serif;">
    <h1 class="mt-20 mx-auto text-2xl pb-1 px-2 w-fit border-b-2 mb-6 font-bold">عن مجلة المداد</h1>
    <section class="p-4 px-6 flex flex-col-reverse md:flex-row">
      <div>

        <p class="py-2 px-4 pl-8 font-normal text-lg
         text-end">
          مجلة المداد هي فكرة نيرة من المتحمسين من كلية دار الحسنات الإسلامية، قاصدا إلى انتشاع وازدهار اللغة العربية
          وآدابها بين الطالبين، وقد نشرت أحد عشر عدد طوال هذه السنوات، فالآن تعلن المجلة على فترة زمنية شهرين محافظا على
          جودة الورقات، محتويا على المقالات والدراسات والبحوث وغيرها من الإبداعات الغالية.
          فالمجلة كانت تحت رئاسة السيد هاشم الباعلوي في بدايته، وبعده تولى عميد الكلية السيد علي باعلوي الحسيني، هناك
          لجنة متهيأة متحامسة لإجراء عمليات المجلة، مشكلة من الباحثين الماهرين الناشطين باللغة العربية.
          فالمجلة تهدف خاصة على تطوير مهارة اللغة العربية وازدهار أدبها وثقافتها بين أيادي ولاية كيرالا، حيث تشكل مجتمعا
          علميا عربيا لمستقبل قابل، نسأل الله سبحانه وتعالى التوفيق والرحمة فيما يحب ويرضى
        </p>
      </div>
      <div class="grid-cols-1 place-items-center hidden">
        <img src="/static/images/covers.png" alt="Al Midad Magazine 1" class="w-3/4 mx-auto" />

      </div>
    </section>

    <h1 class="mt-16 mx-auto text-2xl pb-1 px-2 w-fit border-b-2 mb-6">فريق مجلة المداد</h1>
    <section class="w-3/4 mx-auto p-4 px-6 grid grid-cols-1 sm:grid-cols-3 gap-8 md:gap-36"
      style="font-family: Almarai, serif;">
      <div class="font-light grid justify-items-center" style="font-family: Almarai, serif;">
        <div class="w-[164px] h-[164px] pt-6 border-4 rounded-full overflow-hidden border-[#896C89]">
          <img class="scale-150" src="images/anasusthad.jpeg" alt="" />
        </div>
        <p class="text-base text-center font-light mt-2">مدير التحرير</p>
        <p class="text-lg text-center font-bold mt-2">أنس الهدوي أرفرا</p>
      </div>
      <div class="font-light grid justify-items-center" style="font-family: Almarai, serif;">
        <div class="w-[164px] h-[164px] border-4 rounded-full overflow-hidden border-[#896C89]">
          <img class="" src="images/thangalusthad.jpeg" alt="" />
        </div>
        <p class="text-base text-center font-light mt-2">نائب رئيس المجلة</p>
        <p class="text-lg text-center font-bold mt-2">السيد علي باعلوي الحسيني الندوي</p>
      </div>
      <div class="font-light grid justify-items-center" style="font-family: Almarai, serif;">
        <div
          class="w-[164px] h-[164px]  grid place-items-center rounded-full overflow-hidden border-4 border-[#896C89]">
          <img class="scale-150" src="images/swadiqalithangal.jpg" alt="" />
        </div>
        <p class="text-base text-center font-light mt-2">رئيس المجلة</p>
        <p class="text-lg text-center font-bold mt-2">السيد صادق علي شهاب الحسيني</p>
      </div>
    </section>

    <section
      class="w-3/4 md:w-[55%] mx-auto p-4 px-6 mt-2 grid grid-cols-1 sm:grid-cols-2 gap-8 md:gap-32 items-center">
      <div class="font-light grid justify-items-center" style="font-family: Almarai, serif;">
        <div class="w-[164px] h-[164px] grid place-items-center overflow-hidden border-4 rounded-full border-[#896C89]">
          <img class="" src="images/unaisustahad.png" alt="" />
        </div>
        <p class="text-base text-center font-light mt-2">المشرف العام</p>
        <p class="text-lg text-center font-bold mt-2">أنيس الهدوي وليموك</p>
      </div>
      <div class="font-light grid justify-items-center" style="font-family: Almarai, serif;">
        <div class="w-[164px] h-[164px] grid place-items-center overflow-hidden border-4 rounded-full border-[#896C89]">
          <img class="scale-[1.4]" src="images/farooqusthad.jpeg" alt="" />
        </div>
        <p class="text-base text-center font-light mt-2">رئيس التحرير</p>
        <p class="text-lg text-center font-bold mt-2">عمر الفاروق الهدوي الحسنوي</p>

      </div>
    </section>

  </div>

 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal5863877a5171c196453bfa0bd807e410)): ?>
<?php $attributes = $__attributesOriginal5863877a5171c196453bfa0bd807e410; ?>
<?php unset($__attributesOriginal5863877a5171c196453bfa0bd807e410); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal5863877a5171c196453bfa0bd807e410)): ?>
<?php $component = $__componentOriginal5863877a5171c196453bfa0bd807e410; ?>
<?php unset($__componentOriginal5863877a5171c196453bfa0bd807e410); ?>
<?php endif; ?><?php /**PATH C:\xampp\htdocs\midad_latest\resources\views/about.blade.php ENDPATH**/ ?>