<x-layouts.app :title="$search . ' | المداد'">
    @php
        function highlightMatch($text, $search)
        {
            if (!$search)
                return $text;
            $escapedSearch = preg_quote($search, '/');
            return preg_replace("/($escapedSearch)/i", '<span class="bg-yellow-300">$1</span>', e($text));
        }
    @endphp

    <hr class="mt-10 mx-24">
    <section class=" mt-10">
        <div class="container mx-auto">
            @if ($articles->count() > 0)
            <h1 dir="rtl"
                class="text-center text-[#886C8D] mx-auto font-bold text-3xl border-b-2 mb-8 pt-5 w-fit px-10 border-[#A0A0A0] pb-4">
                نتائج البحث عن "{{ $search }}"
            </h1>

            <!--cards-->
            <div class="flex flex-wrap justify-center gap-5 mt-10">
                


                    @foreach ($articles as $article)
                        <a href="{{ route('article.show', ['category' => $article->category->slug, 'article' => $article->slug]) }}"
                            class="flex-grow max-w-sm min-w-[300px] sm:w-[300px] md:w-[400px] lg:w-[500px]">
                            <div
                                class="pt-28 h-[230px] hover:scale-105 transition-all bg-gradient-to-b from-black to-black p-4 rounded-[10px] shadow-lg relative text-end">
                                <img src="{{ asset('storage/' . $article->image) }}"
                                    class="absolute inset-0 h-full w-full object-cover opacity-60"
                                    style="border-radius: 10px;" alt="{{ $article->topic }}" @if($loop->iteration > 2) loading="lazy" @else fetchpriority="high" @endif>
                                <div class="relative z-10 text-white">
                                    <h2 class="text-[10px] bg-[#886C8D] inline-block px-2 me-8 font-bold">
                                        {!! highlightMatch($article->category->a_name, $search) !!}
                                    </h2>
                                    <h3 class="text-xl mt-2 me-8">
                                        {!! highlightMatch($article->topic, $search) !!}
                                    </h3>
                                    <p class="mt-1 text-[13px] me-8">
                                        {!! highlightMatch($article->author->name, $search) !!}
                                    </p>
                                </div>
                            </div>
                        </a>
                    @endforeach
                @else
                    <p dir="rtl"
                        class="text-center  mx-auto font-bold text-3xl  mb-8 pt-5 w-fit ">
                        لا توجد مقالات متعلقة بـ "{{ $search }}"
                    </p>
                @endif

            </div>
            <div class="mt-10 flex justify-center">
                <div class="flex space-x-4">
                    {{ $articles->links() }}
                </div>
            </div>



            <!--cards end-->
        </div>
    </section>
</x-layouts.app>