
<div id="content-blog" class="span9 content group">
    @if($articles)
    @foreach($articles as $article)
            <div class="post type-post status-publish format-standard category-design category-themes tag-corporate tag-minimal group blog-libra-big row">
                <!-- post featured & title -->

                <div class="date-comments span1">
                    <p class="date">
                        <span class="month">{{ $article->created_at->format('M') }}</span>
                        <span class="day">{{ $article->created_at->format('d') }}</span>
                    </p>
                    <p class="comments">
                        <i class="icon-comment"></i>
                                    <span>
                                        <a href="#" title="Comment on Nice &amp; Clean. The best for your blog!">{{ count($article->comments) ? count($article->comments) : '0' }}</a></span></p></div>

                <div class="thumbnail span8">
                    <!-- post title -->
                    <img width="760" height="290" src="{{ asset(env('THEME')) }}/images/blog/{{ $article->img->max }}" class="attachment-blog_libra_big wp-post-image" alt="23" />
                    <!-- post meta -->
                    <h2 class="post-title">
                        <a href="{{ route('articles.show',['alias'=>$article->alias]) }}">{{ $article->title }}</a>
                    </h2>
                </div>

                <div class="clear"></div>
                <!-- post content -->
                <div class="the-content span8 group">
                    {!! $article->desc !!}
                        <a href="{{ route('articles.show',['alias'=>$article->alias]) }}" class="not-btn more-link"> Читать далее</a>
                    </p>
                </div>
                <div class="clear"></div>
            </div>
    @endforeach



    <div class='general-pagination group'>

        @if($articles->lastPage() > 1)
            @if($articles->currentPage() !== 1)
                <a href="{{ $articles->url($articles->currentPage() - 1) }}">&laquo;</a>
            @endif
            @for($i = 1;$i <= $articles->lastPage(); $i++)
                @if($articles->currentPage() == $i)
                    <a class="selected disabled">{{ $i }}</a>
                @else
                        <a href="{{ $articles->url($i) }}" >{{ $i }}</a>
                @endif
            @endfor
            @if($articles->currentPage() !== $articles->lastPage())
                    <a href="{{ $articles->url($articles->currentPage() + 1) }}">&rsaquo;</a>
            @endif
        @endif



    </div>
        @else
         <h2>Записей нет</h2>
        @endif
</div>