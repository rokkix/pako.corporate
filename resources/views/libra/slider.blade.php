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
                @foreach($sliders as $slider)
                    <li>
                        <a href="#">
                            Enjoy your freedom... -
                        </a>

                    </li>
                @endforeach


            </ul>

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



