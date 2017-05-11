@if($reviews)

<div>
    <h2 style="text-align: center">Отзывы клиентов</h2>

    <div class="testimonials-flexslider">
        <ul class="slides">
            @foreach($reviews as $review)
                <li>
                    <blockquote>
                        <p>
                            <a href="{{ $review->url }}">
                                &rdquo;{{ $review->text }}&rdquo;
                            </a>
                        </p>
                    </blockquote>

                    <p class="meta">
                        <strong>
                            <a href="#" class="name">{{ $review->customer }}</a>
                        </strong> -
                        <a href="{{ $review->url }}">
                            {{ $review->url }}
                        </a>
                    </p>
                </li>
            @endforeach



        </ul>
        <div class="prev"></div>
        <div class="next"></div>
    </div>

    <script type="text/javascript">
        jQuery(function($){
            var animation = $.browser.msie || $.browser.opera ? 'fade' : 'slide';
            $('.testimonials-flexslider').flexslider({
                animation : animation,
                slideshowSpeed: 5000,
                animationSpeed: 500,
                touch: false,
                controlNav: false,
                directionNav: true
            });
        });
    </script>
</div>
@endif