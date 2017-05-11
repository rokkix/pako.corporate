
<div id="sidebar-blog-sidebar" class="span3 sidebar group">
    <div class="widget-first widget recent-posts">
        <h3>Последние <span class="title-highlight">работы</span></h3>
        <div class="recent-post group">
            @if(!$portfolios->isEmpty())
                @foreach($portfolios as $portfolio)
                    <div class="hentry-post group">
                        <div class="thumb-img">
                            <img width="75" height="75" src="{{ asset(env('THEME')) }}/images/portfolios/{{ $portfolio->img->micro }}" class="attachment-blog_thumb wp-post-image" alt="23" />
                        </div>
                        <div class="text">
                            <a href="{{ route('portfolios.show',['alias'=>$portfolio->alias]) }}" title="{{ $portfolio->title }}" class="title">
                                {{ str_limit($portfolio->text,100) }}
                            </a>

                        </div>
                    </div>
                @endforeach
            @endif

        </div>
    </div>



    <div class="widget recent-comments">
        <h3>Последние <span class="title-highlight">комментарии</span></h3>
        @if(!$comments->isEmpty())
        <div class="recent-comments group">
                @foreach($comments as $comment)
                <div class="the-post group">

                    <p class="comment">
                       {{ $comment->text }}
                    </p>

                    <div class="avatar">
                        @set($hash, ($comment->email) ? md5($comment->email) : $comment->user->email)
                        <img alt='' src="https://www.gravatar.com/avatar/{{$hash}}?d=mm&s=55" class='avatar photo' height='33' width='33'/>
                    </div>

                                    <span class="author">
                                        <strong>
                                            <a href="#">
                                            {{ isset($comment->user) ? $comment->user->name : $comment->name}}
                                            </a>
                                        </strong> in
                                    </span>
                    <br />

                    <a href="{{ route('articles.show',['alias'=>$comment->article->alias]) }}" class="title">{{ $comment->article->title }}</a>
                </div>
                 @endforeach



        </div>
        @endif
    </div>


</div>