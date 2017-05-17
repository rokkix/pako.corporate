<!-- SLOGAN -->
<div class="slogan">
    <h2>Portfolio Full Description</h2>

    <h3>Project detail #1</h3>
</div>
<div id="content-page" class="span12 content group">
    <div class="page type-page status-publish group">
        @if($portfolio)

        <div id="portfolio" class="portfolio-full-description portfolio-full-small">

            <!-- START SMALL LAYOUT -->
            <div class="page type-page status-publish work group row">
                <div class="work-thumbnail span6">
                    <div class="thumb-wrapper">


                        <div class="work-thumbnail">
                            <div class="picture_overlay_empty picture_overlay">
                                <img width="574" height="340" src="{{ asset(env('THEME')) }}/images/portfolios/{{ $portfolio->img->path }}" class="attachment-thumb_portfolio_fulldesc" alt="piggie8"/>
                            </div>
                        </div>

                        <script>
                            jQuery(document).ready(function ($) {
                                jQuery(".work-thumbnail .overlay a.lightbox_fulldesc").colorbox({
                                    transition: 'elastic',
                                    rel: 'lightbox_fulldesc',
                                    fixed: true,
                                    maxWidth: '100%',
                                    maxHeight: '100%',
                                    opacity: 0.7
                                });
                            });
                        </script>
                    </div>
                </div>

                <div class="work-description span6">
                    <h3>{{ $portfolio->title }}</h3>


                    <p>
                        {!! $portfolio->text !!}
                    </p>

                    <div class="work-skillsdate span6">
                        <p class="categories paragraph-links">
                            <span class="meta-label">Filter:</span> {{ $portfolio->filter->title }}
                        </p>

                        <p class="customer">
                            <span class="meta-label">Customer:</span> {{ $portfolio->customer }}

                        </p>
                    </div>
                </div>
                <div class="clear"></div>
            </div>
            <!-- END SMALL LAYOUT -->

            <div class="clear"></div>
            @if(!$portfolio->photo->isEmpty() && (count($portfolio->photo) > 0) )
            <h3>Other Projects</h3>

            <div class="portfolio-full-description-related-projects row">

                @foreach($portfolio->photo as $portfolio)

                    <div class="related_project span3">


                        <div class="related_img">
                            <div class="picture_overlay">
                                <img width="360" height="216" src="{{ asset(env('THEME')) }}/images/photos/{{ $portfolio->img->max }}" class="attachment-thumb_portfolio_fulldesc_related" alt="009"/>

                                <div class="overlay">
                                    <div>
                                        <p>
                                            <a href="{{ asset(env('THEME')) }}/images/photos/{{ $portfolio->img->path }}" rel="lightbox" class="ch-info-lightbox">
                                                <img src="{{ asset(env('THEME')) }}/images/icons/zoom.png" alt="Open Lightbox"/>
                                            </a>
                                            <a href="#">
                                                <img src="{{ asset(env('THEME')) }}/images/icons/project.png" alt=""/>
                                            </a></p>

                                        <p class="title">Guanacos</p>

                                        <p class="subtitle">corporate</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach




            </div>
                @endif


        </div>
        @endif

        <div class="clear"></div>
    </div>
    <!-- START COMMENTS -->
    <div id="comments">
    </div>
    <!-- END COMMENTS -->
</div>