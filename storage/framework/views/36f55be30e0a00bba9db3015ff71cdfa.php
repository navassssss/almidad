<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?php echo e(trim($title ?? 'المداد - مجلة كلية دار الحسنات الإسلامية'. ' (Al Midad)')); ?></title>
<link rel="shortcut icon" href="<?php echo e(asset('images/favicon.png')); ?>" type="image/x-icon">
<meta name="description"
  content="<?php echo e(trim($description ?? 'مجلة المداد هي فكرة نيرة من المتحمسين من كلية دار الحسنات الإسلامية، قاصدا إلى انتشاع وازدهار اللغة العربية وآدابها بين الطالبين، وقد نشرت أحد عشر عدد طوال هذه السنوات')); ?>">
<meta name="keywords" content="مجلة المداد, كلية دار الحسنات, Al-Midad, Arabic magazine, Darul Hasanath, DHIC, DHIU">
<meta name="author" content="Editorial Team - Al-Midad">
<link rel="canonical" href="<?php echo e(url()->current()); ?>">
<meta name="robots" content="index, follow">
<meta property="og:type" content="article">
<meta property="og:title" content="<?php echo e(trim($title ?? ' المداد - مجلة كلية دار الحسنات الإسلامية')); ?>">
<meta property="og:description"
  content="<?php echo e(trim($description ?? 'مجلة المداد هي فكرة نيرة من المتحمسين من كلية دار الحسنات الإسلامية، قاصدا إلى انتشاع وازدهار اللغة العربية وآدابها بين الطالبين، وقد نشرت أحد عشر عدد طوال هذه السنوات')); ?>">
<meta property="og:url" content="<?php echo e(url()->current()); ?>">
<meta property="og:image" content="<?php echo e($image ?? url(asset('images/logo.png'))); ?>">
<meta property="og:site_name" content="المداد - Al Midad">
<meta property="article:published_time" content="<?php echo e($publishedTime ?? now()->toIso8601String()); ?>">
<meta property="article:modified_time" content="<?php echo e($modified_time ?? $publishedTime ?? now()->toIso8601String()); ?>">
<meta property="article:author" content="<?php echo e($author . " - المداد " ?? 'المداد - Al-Midad'); ?>">
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="<?php echo e(trim($title ?? ' المداد - مجلة كلية دار الحسنات الإسلامية')); ?>">
<meta name="twitter:description"
  content="<?php echo e(trim($description ?? 'مجلة المداد هي فكرة نيرة من المتحمسين من كلية دار الحسنات الإسلامية، قاصدا إلى انتشاع وازدهار اللغة العربية وآدابها بين الطالبين، وقد نشرت أحد عشر عدد طوال هذه السنوات')); ?>">
<meta name="twitter:image" content="<?php echo e($image ?? url(asset('images/logo.png'))); ?>">
<meta name="twitter:site" content="@almidadarabic">
<meta property="article:section" content="<?php echo e($category ?? 'General'); ?>">
<meta property="article:tag" content="<?php echo e(implode(',', $tags ?? [])); ?>">
<meta property="og:locale" content="ar_AR">


<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "description":"<?php echo e(trim($description ?? 'مجلة المداد هي فكرة نيرة من المتحمسين من كلية دار الحسنات الإسلامية، قاصدا إلى انتشاع وازدهار اللغة العربية وآدابها بين الطالبين، وقد نشرت أحد عشر عدد طوال هذه السنوات')); ?>",
  <?php if(url()->current() == route('home')): ?>
    "@type": "WebSite",
<?php else: ?>
    "@type": "NewsArticle",
    <?php endif; ?>
  
  "alternateName": "Al Midad",
  "inLanguage": "ar",
    "mainEntityOfPage": {
        "@type": "WebPage",
        "@id": "<?php echo e(url()->current()); ?>"
    },
    "potentialAction": {
    "@type": "SearchAction",
    "target": "<?php echo e(route('search') . '?search={search_term_string}'); ?>",
    "query-input": "required name=search_term_string"
  },

  "headline": "<?php echo e(trim($title ?? ' المداد - مجلة كلية دار الحسنات الإسلامية')); ?>",
  "image": [
    "<?php echo e($image ?? asset('images/logo.png')); ?>"
  ],
  "datePublished": "<?php echo e($publishedTime ?? now()->toIso8601String()); ?>",
  "dateModified": "<?php echo e($modified_time ?? $publishedTime ?? now()->toIso8601String()); ?>",
  "author": {
    "@type": "Person",
    "name": "<?php echo e($author ?? 'المداد - Al-Midad'); ?>",
    "url": ""
  },
  "publisher": {
    "@type": "Organization",
    "name": "المداد - Al-Midad",
    "url": "<?php echo e(url('/')); ?>",
    "logo": {
    "@type": "ImageObject",
    "@id": "<?php echo e(url(asset('images/logo.png'))); ?>",
    "url": "<?php echo e(url(asset('images/logo.png'))); ?>"
    },

  }
}
</script><?php /**PATH C:\xampp\htdocs\midad_latest\resources\views/components/layouts/seo.blade.php ENDPATH**/ ?>