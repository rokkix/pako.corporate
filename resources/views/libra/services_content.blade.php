<!-- START SERVICES-->
@if($services)
<div id="services" class="sidebar-no">
    <div class="container group">
        <div class="row">
            <!-- START CONTENT -->
            <div id="content-home" class="span12 content group">
                <div class="page type-page status-publish hentry group">
                    <div class="section rounded ch-grid margin-top margin-bottom">
                        <div class="services-row row group">
                            @foreach($services as $service)
                            <div class="span3 service_{{ $services->first() ? 'first' : '' }}">
                                <div class="circle-services">
                                    <div class="ch-item no-empty" style="background-image: url({{ asset(env('THEME')) }}/images/services/{{$service->img}});">

                                    </div>
                                </div>


                                       {!! $service->title !!}


                                {!! $service->desc !!}
                            </div>
                            @endforeach


                        </div>
                        <!-- end row -->
                    </div>


                </div>
                <!-- START COMMENTS -->

                <!-- END COMMENTS -->
            </div>
            <!-- END CONTENT -->

            <!-- START EXTRA CONTENT -->
            <!-- END EXTRA CONTENT -->
        </div>
    </div>
</div>
@endif