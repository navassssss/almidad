<?php if (isset($component)) { $__componentOriginal5863877a5171c196453bfa0bd807e410 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5863877a5171c196453bfa0bd807e410 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.layouts.app','data' => ['title' => ''.e($category->a_name).'','description' => 'مقالات ومواضيع في قسم '.e($category->a_name).' في مجلة المداد العربية.']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('layouts.app'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => ''.e($category->a_name).'','description' => 'مقالات ومواضيع في قسم '.e($category->a_name).' في مجلة المداد العربية.']); ?>
    <hr class="mt-10 mx-24">
    <section class=" mt-10">
        <div class="container mx-auto">
             <?php if($articles->count() > 0): ?>
            <h1
                class="text-center text-[#886C8D] mx-auto font-bold text-3xl border-b-2 mb-8 pt-5 w-fit px-10  border-[#A0A0A0]  pb-4">
                <?php echo e($category->a_name); ?></h1>
            <!--cards-->
            <div class="flex flex-wrap justify-center gap-5 mt-10">
               

                    <?php $__currentLoopData = $articles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $article): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <a href="<?php echo e(route('article.show', ['category' => $article->category->slug, 'article' => $article->slug])); ?>"
                            class="flex-grow max-w-sm min-w-[300px] sm:w-[300px] md:w-[400px] lg:w-[500px]">
                            <div
                                class="pt-28 h-[230px] hover:scale-105 transition-all bg-gradient-to-b from-black to-black p-4 rounded-[10px] shadow-lg relative text-end">
                                <img src="<?php echo e(asset('storage/' . $article->image)); ?>"
                                    class="absolute inset-0 h-full w-full object-cover opacity-60"
                                    style="border-radius: 10px;" alt="<?php echo e($article->topic); ?>" <?php if($loop->iteration > 2): ?> loading="lazy" <?php else: ?> fetchpriority="high" <?php endif; ?>>
                                <div class="relative z-10 text-white">
                                    <h2 class="text-[10px] bg-[#886C8D] inline-block px-2 me-8 font-bold">
                                        <?php echo e($article->category->a_name); ?></h2>
                                    <h3 class="text-xl mt-2 me-8"><?php echo e($article->topic); ?></h3>
                                    <p class="mt-1 text-[13px] me-8"><?php echo e($article->author->name); ?></p>
                                </div>
                            </div>
                        </a>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php else: ?>
                    <p dir="rtl" class="text-center  mx-auto font-bold text-3xl  mb-8 pt-5 w-fit ">
                        لا توجد مقالات متعلقة بـ "<?php echo e($category->a_name); ?>"
                    </p>
                <?php endif; ?>
            </div>
            <div class="mt-10 flex justify-center">
                <div class="flex space-x-4">
                    <?php echo e($articles->links()); ?>

                </div>
            </div>



            <!--cards end-->
        </div>
    </section>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal5863877a5171c196453bfa0bd807e410)): ?>
<?php $attributes = $__attributesOriginal5863877a5171c196453bfa0bd807e410; ?>
<?php unset($__attributesOriginal5863877a5171c196453bfa0bd807e410); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal5863877a5171c196453bfa0bd807e410)): ?>
<?php $component = $__componentOriginal5863877a5171c196453bfa0bd807e410; ?>
<?php unset($__componentOriginal5863877a5171c196453bfa0bd807e410); ?>
<?php endif; ?><?php /**PATH C:\xampp\htdocs\midad_latest\resources\views/category.blade.php ENDPATH**/ ?>