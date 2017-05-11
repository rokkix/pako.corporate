
<!-- START CONTENT -->
<div id="content-page" class="span12 content group">
    <div class="page type-page status-publish group">


        <div class="row">
            @if($portfolios)




            <ul id="portfolio" class="columns columns thumbnails">

                @foreach($portfolios as $portfolio)

                    <li class="{{ $portfolio == $portfolios->first()  ? 'first' : ($portfolio == $portfolios->last() ? 'last' : '') }} work span4 {{ $portfolio == $portfolios->first() ? 'first' : ''}}">

                        <div class="picture_overlay">
                            <img width="360" height="216" src="{{ asset(env('THEME')) }}/images/portfolios/{{ $portfolio->img->max }}" class="attachment-thumb_portfolio_3cols" alt="piggie8"/>

                            <div class="overlay">
                                <div>
                                    <p>
                                        <a href="{{ asset(env('THEME')) }}/images/portfolios/{{ $portfolio->img->path }}" rel="lightbox" class="ch-info-lightbox">
                                            <img src="{{ asset(env('THEME')) }}/images/icons/zoom.png" alt="Open Lightbox"/></a>
                                        <a href="{{ route('portfolios.show',['alias'=>$portfolio->alias]) }}">
                                            <img src="{{ asset(env('THEME')) }}/images/icons/project.png" alt=""/>
                                        </a>
                                    </p>

                                    <p class="title">{{ $portfolio->title }}</p>

                                    <p class="subtitle">brand identity</p>
                                </div>
                            </div>
                        </div>


                        <h4>
                            <a href="{{ route('portfolios.show',['alias'=>$portfolio->alias]) }}">{{ $portfolio->title }}</a>
                        </h4>

                        <p>
                            {!! str_limit($portfolio->text,150) !!}
                        </p>

                        <a class="read-more" href="{{ route('portfolios.show',['alias'=>$portfolio->alias]) }}">Смотреть проект</a>
                    </li>
                @endforeach





            </ul>

            <div class='general-pagination group'>
                @if($portfolios->lastPage() > 1)
                    @if($portfolios->currentPage() !== 1)
                        <a href="{{ $portfolios->url($portfolios->currentPage() - 1) }}">&laquo;</a>
                    @endif
                    @for($i = 1;$i <= $portfolios->lastPage(); $i++)
                        @if($portfolios->currentPage() == $i)
                            <a class="selected disabled">{{ $i }}</a>
                        @else
                            <a href="{{ $portfolios->url($i) }}" >{{ $i }}</a>
                        @endif
                    @endfor
                    @if($portfolios->currentPage() !== $portfolios->lastPage())
                        <a href="{{ $portfolios->url($portfolios->currentPage() + 1) }}">&rsaquo;</a>
                    @endif
                @endif
            </div>
            @endif
        </div>

    </div>

</div>