<x-layouts.app :title="$article->topic" :description="Str::limit(strip_tags($article->content), 160)"
    :topic="$article->topic" :publishedTime="$article->created_at" :modifiedTime="$article->updated_at"
    :image="asset('storage/' . $article->image)" :author="$article->author?->name ?? 'Unknown'"
    :category="$article->category?->a_name ?? 'Unknown'">

    <hr class="mt-10 mx-24">
    <section class="container mx-auto flex">
        <div class="hidden xl:inline-block w-[30%]">
            <h2 class="font-semibold text-[25px] mt-20 text-[#886C8D] text-end">أحدث المنشورات</h2>
            <hr class="ms-14 h-[2px]">
            @foreach ($articles as $forart)
                @if($forart->category)
                    <a href="{{ route('article.show', ['category' => $forart->category->slug, 'article' => $forart->slug]) }}">
                @else
                    <a href="#">
                @endif
                    <div class="bg-[#F8F8F8] shadow-lg ms-14 mt-5 hover:scale-105 transition-all">
                        <div class="flex">
                            <div>
                                <h2 class="font-semibold text-[20px] text-end mt-5 me-[19px]">
                                    {{Str::limit($forart->topic, 30)}}
                                </h2>
                                <p class="text-[#3F3B3B]  text-[13px] text-end me-[21px]">{{$forart->author?->name ?? 'Unknown'}}</p>
                            </div>
                            <div>
                                <img class="h-28 rounded-lg mt-2 min-w-[140px]  ms-[-6px] mb-[7px] me-5"
                                    src="{{ asset('storage/' . $forart->image) }}" loading="lazy" alt="{{ $forart->topic }} - Al Midad">
                            </div>
                        </div>
                    </div>
                </a>
            @endforeach

            @if (!is_null($ad))
                <a href="{{ $ad->link }}" target="_blank" class="flex justify-center">
                    <img class="hover:scale-105 ms-14 w-[88%] transition-all mt-8"
                        src="{{ asset('storage/' . $ad->image) }}" loading="lazy" alt="Ad of Almidad Arabic Magazine"
                        style="height: 200px;">
                </a>

            @endif
        </div>
        <div class="w-[100%] xl:w-[60%] ms-[4%]">
            <div class="me-3">
                <img class="mt-20 justify-center rounded-3xl object-cover"
                    src="{{ asset('storage/' . $article->image) }}" loading="lazy" alt="{{ $article->topic }} - Al Midad">
            </div>
            <div class="flex justify-between">
                <span class="flex text-[12px] mt-3 ms-5 font-semibold"> <img class="h-3 me-3 ms-1 mt-[2px]"
                        src="{{ asset('images/dateblackicon.png') }}" loading="lazy" alt="تاريخ النشر"> {{ $article->created_at }} </span>

                @if($article->category)
                    <a href="{{ route('category.show', ['category' => $article->category->slug]) }}"
                        class="text-[12px] font-semibold bg-[#886C8D] px-2 py-1 me-5 text-white mt-2 rounded">
                        {{$article->category->a_name}}
                    </a>
                @endif
            </div>
            <h1 class="text-end font-extrabold text-2xl md:text-[45px] me-5 mt-5" style="line-height: revert;">
                {{$article->topic}}
            </h1>
            <div class="flex mt-5" dir="rtl"><img class="w-10 h-10 rounded-full ms-5 object-cover"
                    src="{{ $article->author?->photo ? asset('storage/' . $article->author->photo) : asset('storage/01JRYG5XDRR08NMBS2XA2XFZ27.png') }}" loading="lazy" alt="صورة الكاتب">
                <h2 class="font-extrabold text-end ms-2 text-[15px] md:text-[20px] ">{{ $article->author?->name ?? 'Unknown' }}
                </h2>

            </div>
            <p class=" font-bold text-[10px] md:text-[15px] ms-16" dir="rtl">{{ $article->author?->details }}</p>
            <div class="rich-content">

                {!! str($article->content)->sanitizeHtml() !!}

            </div>
            <div class="flex justify-between mt-16">
                <div class="flex">
                    <img class="h-3 mt-[3px]" src="{{ asset('images/eye.png') }}" loading="lazy" alt="عدد المشاهدات">
                    <span class="text-[13px] font-bold ms-1">{{$article->views}}</span>
                </div>
                <div class="flex me-5 space-x-1">
                    <a href="https://x.com/almidadarabic" target="_blank"><img class="h-5"
                            src="{{ asset('images/xicon.png') }}" loading="lazy" alt="x"></a>
                    <a href="https://www.facebook.com/almidadarabic" target="_blank"><img class="h-5"
                            src="{{ asset('images/fbicon.png') }}" loading="lazy" alt="fb"></a>
                    @if($article->category)
                        <a href="whatsapp://send?text=Check out this page: {{$article->topic}} -  {{ route('article.show', ['category' => $article->category->slug, 'article' => $article->slug]) }}"
                            target="_blank" data-action="share/whatsapp/share" target="_blank"><img class="h-5"
                                src="{{ asset('images/whatsapp.png') }}" loading="lazy" alt="whatsapp"></a>
                    @endif
                </div>
            </div>
        </div>
    </section>
    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                document.querySelectorAll('.rich-content a').forEach(function (link) {
                    link.setAttribute('target', '_blank');
                    link.setAttribute('rel', 'noopener noreferrer');
                });
            });
        </script>


    @endpush
    @push('styles')
        <style>
            .rich-content {
                margin-top: 2.5rem;
            }

            .rich-content a {
                color: #3B82F6;
                /* Tailwind blue-500 */
                text-decoration: underline;
            }

            .rich-content p {
                /* font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif; */
                font-weight: 400;
                /* text-align: end; */
                font-size: 19px;
                margin-top: 1rem;
                /* mt-10 */
                /* margin-inline-end: 4.25rem; */
                margin-inline-start: 1.25rem;
                overflow-wrap: break-word;
                /* me-17 */
            }

            .rich-content blockquote::before {
                content: "“";
                font-size: 3rem;
                line-height: 0;
                color: #3B82F6;
                position: absolute;
                transform: translateY(-0.5rem);
            }

            .rich-content blockquote {
                border-inline-start: 4px solid #3B82F6;
                /* Tailwind blue-500 */
                padding-inline-start: 1rem;
                font-weight: 400;
                font-style: italic;
                font-size: 17px;
                margin-top: 2.5rem;
                background-color: #F9FAFB;
                margin-inline-start: 1.25rem;

            }

            .rich-content ol {
                list-style-type: decimal;
                margin-inline-start: 1.75rem;
                /* Same as Tailwind's ms-5 */
                padding-left: 1.75rem;
                font-weight: 400;
                /* text-align: end; */
                font-size: 15px;
                margin-top: 2.5rem;
                /* mt-10 */
                /* margin-inline-end: 4.25rem; */
                /* me-17 */
            }

            .rich-content h3 {
                font-weight: 600;
                /* text-align: end; */
                font-size: 21px;
                margin-top: 1rem;
                /* mt-10 */
                /* margin-inline-end: 4.25rem; */
                margin-inline-start: 1.25rem;
                overflow-wrap: break-word;
                */
            }

            .rich-content h2,
            h1 {
                font-weight: 600;
                /* text-align: end; */
                font-size: 24px;
                margin-top: 1rem;
                /* mt-10 */
                /* margin-inline-end: 4.25rem; */
                margin-inline-start: 1.25rem;
                overflow-wrap: break-word;
                */
            }
        </style>
    @endpush
</x-layouts.app>