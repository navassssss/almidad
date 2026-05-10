<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>{{ trim($title ?? 'المداد - مجلة كلية دار الحسنات الإسلامية'. ' (Al Midad)')  }}</title>
<link rel="shortcut icon" href="{{ asset('images/favicon.png') }}" type="image/x-icon">
<meta name="description"
  content="{{ trim($description ?? 'مجلة المداد هي فكرة نيرة من المتحمسين من كلية دار الحسنات الإسلامية، قاصدا إلى انتشاع وازدهار اللغة العربية وآدابها بين الطالبين، وقد نشرت أحد عشر عدد طوال هذه السنوات') }}">
<meta name="keywords" content="مجلة المداد, كلية دار الحسنات, Al-Midad, Arabic magazine, Darul Hasanath, DHIC, DHIU">
<meta name="author" content="Editorial Team - Al-Midad">
<link rel="canonical" href="{{ url()->current() }}">
<meta name="robots" content="index, follow">
<meta property="og:type" content="article">
<meta property="og:title" content="{{ trim($title ?? ' المداد - مجلة كلية دار الحسنات الإسلامية')  }}">
<meta property="og:description"
  content="{{ trim($description ?? 'مجلة المداد هي فكرة نيرة من المتحمسين من كلية دار الحسنات الإسلامية، قاصدا إلى انتشاع وازدهار اللغة العربية وآدابها بين الطالبين، وقد نشرت أحد عشر عدد طوال هذه السنوات') }}">
<meta property="og:url" content="{{ url()->current() }}">
<meta property="og:image" content="{{ $image ?? url(asset('images/logo.png')) }}">
<meta property="og:site_name" content="المداد - Al Midad">
<meta property="article:published_time" content="{{ $publishedTime ?? now()->toIso8601String() }}">
<meta property="article:modified_time" content="{{ $modified_time ?? $publishedTime ?? now()->toIso8601String() }}">
<meta property="article:author" content="{{ $author . " - المداد " ?? 'المداد - Al-Midad' }}">
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="{{ trim($title ?? ' المداد - مجلة كلية دار الحسنات الإسلامية')  }}">
<meta name="twitter:description"
  content="{{ trim($description ?? 'مجلة المداد هي فكرة نيرة من المتحمسين من كلية دار الحسنات الإسلامية، قاصدا إلى انتشاع وازدهار اللغة العربية وآدابها بين الطالبين، وقد نشرت أحد عشر عدد طوال هذه السنوات') }}">
<meta name="twitter:image" content="{{ $image ?? url(asset('images/logo.png')) }}">
<meta name="twitter:site" content="@almidadarabic">
<meta property="article:section" content="{{ $category ?? 'General' }}">
<meta property="article:tag" content="{{ implode(',', $tags ?? []) }}">
<meta property="og:locale" content="ar_AR">


<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "description":"{{ trim($description ?? 'مجلة المداد هي فكرة نيرة من المتحمسين من كلية دار الحسنات الإسلامية، قاصدا إلى انتشاع وازدهار اللغة العربية وآدابها بين الطالبين، وقد نشرت أحد عشر عدد طوال هذه السنوات') }}",
  @if (url()->current() == route('home'))
    "@type": "WebSite",
@else
    "@type": "NewsArticle",
    @endif
  
  "alternateName": "Al Midad",
  "inLanguage": "ar",
    "mainEntityOfPage": {
        "@type": "WebPage",
        "@id": "{{ url()->current() }}"
    },
    "potentialAction": {
    "@type": "SearchAction",
    "target": "{{ route('search') . '?search={search_term_string}' }}",
    "query-input": "required name=search_term_string"
  },

  "headline": "{{ trim($title ?? ' المداد - مجلة كلية دار الحسنات الإسلامية')  }}",
  "image": [
    "{{ $image ?? asset('images/logo.png') }}"
  ],
  "datePublished": "{{ $publishedTime ?? now()->toIso8601String() }}",
  "dateModified": "{{ $modified_time ?? $publishedTime ?? now()->toIso8601String() }}",
  "author": {
    "@type": "Person",
    "name": "{{ $author ?? 'المداد - Al-Midad' }}",
    "url": ""
  },
  "publisher": {
    "@type": "Organization",
    "name": "المداد - Al-Midad",
    "url": "{{ url('/') }}",
    "logo": {
    "@type": "ImageObject",
    "@id": "{{ url(asset('images/logo.png')) }}",
    "url": "{{ url(asset('images/logo.png')) }}"
    },

  }
}
</script>