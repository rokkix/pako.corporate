@if($articles)

<div class="section blog margin-bottom span12">
    <h2 class="title">
        From the <span class="title-highlight">blog</span> with featured article
    </h2>
    <div class="row">
        @foreach($articles as $k=>$item)
            @if($k == 0)
                <div class="post type-post status-publish format-video category-design hentry-post span6 sticky">
                    <div class="row">
                        <div class="thumbnail span3">
                            <img width="263" height="243" src="{{ asset(env('THEME')) }}/images/{{ $item->img->mini }}" class="attachment-section_blog wp-post-image" alt="3" />
                            <div class="date span1">
                                <p>
                                    <span class="month">{{ $item->created_at->format('F') }}</span>
                                    <span class="day">{{ $item->created_at->format('d') }}</span>
                                </p>
                            </div>
                        </div>


                        <div class="the-content span3">
                            <h4>
                                <a href="{{ route('articles.show',['alias' => $item->alias]) }}" title="{{ $item->title }}">
                                    {{ $item->title }}
                                </a>
                            </h4>
                            {!! str_limit($item->desc,200) !!}
                            <p>
                                <a href="{{ route('articles.show',['alias' => $item->alias]) }}" class="more-link">|| читать далее</a>
                            </p>
                        </div>
                    </div>
                </div>
                @continue
            @endif
                <div class="post type-post status-publish format-standard category-design category-themes tag-corporate tag-minimal hentry-post span3">
                    <div class="row">
                        <div class="date span1">
                            <p>
                                <span class="month">{{ $item->created_at->format('F') }}</span>
                                <span class="day">{{ $item->created_at->format('d') }}</span>
                            </p>
                        </div>

                        <div class="meta span2">
                            <h4>
                                <a href="{{ route('articles.show',['alias' => $item->alias]) }}" title="{{ $item->title }}">
                                    {{ $item->title }}
                                </a>
                            </h4>

                            <p class="author">by <strong>Nicola Mustone</strong></p>

                            <p class="comments">
                                <a href="blog-detail.html" title="Comment on Nice &amp; Clean. The best for your blog!">
                                    <strong>Comments:</strong> 0
                                </a>
                            </p>
                        </div>
                    </div>
                </div>



        @endforeach

    </div>
</div>

@endif
