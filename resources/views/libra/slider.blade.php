@if(count($sliders) > 0)
    <div id="slider-elastic-0" class="slider slider-elastic elastic ei-slider" style="width: 100%; height: 400px;">
        <div class="ei-slider-loading">Loading</div>
        <ul class="ei-slider-large">
            @foreach($sliders as $slider)

                <li class="@if($slider == $sliders->first()) first @endif @if($slider == $sliders->last()) last @endif slide-{{ $slider->id }} slide align-">
                    <img width="1920" height="400" src="{{ asset(env('THEME')) }}/images/{{ $slider->img }}" class="attachment-full" alt="001" />

                    <div class="ei-title">
                        {!! $slider->title !!}
                    </div>
                </li>
            @endforeach

        </ul>

        <!-- ei-slider-large -->
        <ul class="ei-slider-thumbs">
            <li class="ei-slider-element">
                Current
            </li>

            <li>
                <a href="#">Welcome to Libra - </a>
                <img src="{{ asset(env('THEME')) }}/images/slider/001-150x59.jpg" alt=" - " />
            </li>

            <li>
                <a href="#">
                    Be yourself... -
                </a>
                <img src="{{ asset(env('THEME')) }}/images/slider/002-150x59.jpg" alt=" - " />
            </li>

            <li>
                <a href="#">
                    A new WP theme -
                </a>
                <img src="{{ asset(env('THEME')) }}/images/slider/003-150x59.jpg" alt=" - " />
            </li>

            <li>
                <a href="#">
                    This premium theme -
                </a>
                <img src="{{ asset(env('THEME')) }}/images/slider/004-150x59.jpg" alt=" - " />
            </li>

            <li>
                <a href="#">
                    Enjoy your freedom... -
                </a>
                <img src="{{ asset(env('THEME')) }}/images/slider/005-150x59.jpg" alt=" - " />
            </li>
        </ul>
        <!-- ei-slider-thumbs -->

        <div class="shadow"></div>
    </div>
    <!-- ei-slider -->
    <!-- END #slider -->
    <script type="text/javascript">
        jQuery(document).ready(function($){
            $('#slider-elastic-0.elastic').eislideshow({
                easing		: 'easeOutExpo',
                titleeasing	: 'easeOutExpo',
                titlespeed	: 1200,
                autoplay	: true,
                slideshow_interval : 3000,
                speed       : 800,
                animation   : 'sides'
            });
        });
    </script>
@endif



