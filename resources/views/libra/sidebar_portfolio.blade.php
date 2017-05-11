@if($portfolios && count($portfolios) >0)


<div id="sidebar-homevi" class="span3 sidebar group">
    <div class="widget-first widget featured-projects">
        <h3>Наши работы</h3>
        <div class="featured-projects-widget flexslider">
            <ul class="slides">
                @foreach($portfolios as $portfolio)
                    <li>
                        <div class="thumb-project">
                            <a href="{{ route('portfolios.show',['alias' => $portfolio->alias]) }}">
                                <img width="320" height="154" src="{{ asset(env('THEME')) }}/images/portfolios/{{ $portfolio->img->mini }}" class="attachment-featured_project_thumb" alt="piggie8" />
                            </a>
                        </div>
                        <h4>{{ $portfolio->title }}</h4>
                    </li>
                @endforeach

            </ul>
        </div>

        <script type="text/javascript">
            jQuery(document).ready(function($){
                var animation = $.browser.msie || $.browser.opera ? 'fade' : 'slide';
                $('.featured-projects-widget').flexslider({
                    animation: animation,
                    slideshowSpeed: 8000,
                    animationSpeed: 300,
                    selectors: 'ul > li',
                    directionNav: true,
                    slideshow: true,

                    pauseOnAction: false,
                    controlNav: false,
                    touch: true
                });
            });
        </script>
    </div>
</div>

@else
<p><p>
@endif