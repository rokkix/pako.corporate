<!DOCTYPE html>
<!--[if IE 6]>
<html id="ie6" class="ie"lang="en-US">
<![endif]-->
<!--[if IE 7]>
<html id="ie7"  class="ie"lang="en-US">
<![endif]-->
<!--[if IE 8]>
<html id="ie8"  class="ie"lang="en-US">
<![endif]-->
<!--[if IE 9]>
<html id="ie9"  class="ie"lang="en-US">
<![endif]-->
<!--[if gt IE 9]>
<html class="ie"lang="en-US">
<![endif]-->

<!-- This doesn't work but i prefer to leave it here... maybe in the future the MS will support it... i hope... -->
<!--[if IE 10]>
<html id="ie10"  class="ie"lang="en-US">
<![endif]-->


<!--[if !IE]>
<html lang="en-US">
<![endif]-->

<!-- START HEAD -->
<head>
    <meta charset="UTF-8" />

    <!-- this line will appear only if the website is visited with an iPad -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.2, user-scalable=yes" />



    <title>Ремонт квартир,оффисов, все виды отделочных работ</title>

    <!-- RESET STYLESHEET -->
    <link rel="stylesheet" type="text/css" media="all" href="{{ asset(env('THEME')) }}/css/reset.css" />
    <!-- BOOTSTRAP STYLESHEET -->
    <link rel="stylesheet" type="text/css" media="all" href="{{ asset(env('THEME')) }}/css/bootstrap.css" />
    <!-- MAIN THEME STYLESHEET -->
    <link rel="stylesheet" type="text/css" media="all" href="{{ asset(env('THEME')) }}/style.css" />

    <!-- [favicon] begin -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset(env('THEME')) }}/favicon.ico" />
    <link rel="icon" type="image/x-icon" href="{{ asset(env('THEME')) }}/favicon.ico" />
    <!-- [favicon] end -->

    <!-- Touch icons more info: http://mathiasbynens.be/notes/touch-icons -->
    <!-- For iPad3 with retina display: -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{ asset(env('THEME')) }}/apple-touch-icon-144x.png" />
    <!-- For first- and second-generation iPad: -->
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{ asset(env('THEME')) }}/apple-touch-icon-114x.png" />
    <!-- For first- and second-generation iPad: -->
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{ asset(env('THEME')) }}/apple-touch-icon-72x.png">
    <!-- For non-Retina iPhone, iPod Touch, and Android 2.1+ devices: -->
    <link rel="apple-touch-icon-precomposed" href="{{ asset(env('THEME')) }}/apple-touch-icon-57x.png" />


    <link rel='stylesheet' id='thickbox-css'  href='{{ asset(env('THEME')) }}/js/thickbox/thickbox.css' type='text/css' media='all' />
    <link rel='stylesheet' id='usquare-css-css'  href='{{ asset(env('THEME')) }}/sliders/usquare/css/frontend/usquare_style.css' type='text/css' media='all' />
    <link rel='stylesheet' id='customScroll-css-css' href='{{ asset(env('THEME')) }}/sliders/usquare/css/frontend/jquery.mCustomScrollbar.css' type='text/css' media='all' />
    <link rel='stylesheet' id='customfont1-css'  href='{{ asset(env('THEME')) }}/sliders/usquare/fonts/ostrich%20sans/stylesheet.css' type='text/css' media='all' />
    <link rel='stylesheet' id='customfont2-css'  href='{{ asset(env('THEME')) }}/sliders/usquare/fonts/PT%20sans/stylesheet.css' type='text/css' media='all' />
    <link rel='stylesheet' id='google-fonts-css'  href='http://fonts.googleapis.com/css?family=Playfair+Display%7COpen+Sans+Condensed%3A300%7COpen+Sans%7CShadows+Into+Light%7CMuli%7CDroid+Sans%7CArbutus+Slab%7CAbel&#038;ver=3.5.1' type='text/css' media='all' />
    <link rel='stylesheet' id='flexslider-css' href='{{ asset(env('THEME')) }}/sliders/flexslider/css/flexslider.css' type='text/css' media='all' />
    <link rel='stylesheet' id='flex-slider-css' href='{{ asset(env('THEME')) }}/sliders/flexslider/css/slider.css' type='text/css' media='all' />
    <link rel='stylesheet' id='flexslider-elegant-css' href='{{ asset(env('THEME')) }}/sliders/flexslider-elegant/css/flexslider.css' type='text/css' media='all' />
    <link rel='stylesheet' id='flex-slider-elegant-css' href='{{ asset(env('THEME')) }}/sliders/flexslider-elegant/css/slider.css' type='text/css' media='all' />
    <link rel='stylesheet' id='slider-thumb-css'  href='{{ asset(env('THEME')) }}/sliders/thumbnails/css/thumbnails.css' type='text/css' media='all' />
    <link rel='stylesheet' id='responsive-css'  href='{{ asset(env('THEME')) }}/css/responsive.css' type='text/css' media='all' />
    <link rel='stylesheet' id='polaroid-slider-css'  href='{{ asset(env('THEME')) }}/sliders/polaroid/css/polaroid.css' type='text/css' media='all' />
    <link rel='stylesheet' id='ahortcodes-css'  href='{{ asset(env('THEME')) }}/css/shortcodes.css' type='text/css' media='all' />
    <link rel='stylesheet' id='contact-form-css'  href='{{ asset(env('THEME')) }}/css/contact_form.css' type='text/css' media='all' />
    <link rel='stylesheet' id='custom-css'  href='{{ asset(env('THEME')) }}/css/custom.css' type='text/css' media='all' />
    <link rel='stylesheet' id='thickbox-css'  href='{{ asset(env('THEME')) }}/js/thickbox/thickbox.css' type='text/css' media='all' />
    <link rel='stylesheet' id='google-fonts-css'  href='http://fonts.googleapis.com/css?family=Playfair+Display%7COpen+Sans+Condensed%3A300%7COpen+Sans%7CShadows+Into+Light%7CMuli%7CDroid+Sans%7CArbutus+Slab%7CAbel&#038;ver=3.5.1' type='text/css' media='all' />
    <link rel='stylesheet' id='responsive-css'  href='{{ asset(env('THEME')) }}/css/responsive.css' type='text/css' media='all' />
    <link rel='stylesheet' id='polaroid-slider-css'  href='{{ asset(env('THEME')) }}/sliders/polaroid/css/polaroid.css' type='text/css' media='all' />
    <link rel='stylesheet' id='elastic-slider-css'  href='{{ asset(env('THEME')) }}/sliders/elastic/css/elastic.css' type='text/css' media='all' />
    <link rel='stylesheet' id='ahortcodes-css'  href='{{ asset(env('THEME')) }}/css/shortcodes.css' type='text/css' media='all' />
    <link rel='stylesheet' id='contact-form-css'  href='{{ asset(env('THEME')) }}/css/contact_form.css' type='text/css' media='all' />
    <link rel='stylesheet' id='custom-css'  href='{{ asset(env('THEME')) }}/css/custom.css' type='text/css' media='all' />




    <link rel='stylesheet' id='colorbox-css'  href='{{ asset(env('THEME')) }}/css/colorbox.css' type='text/css' media='all' />

    <link rel='stylesheet' id='polaroid-slider-css'  href='{{ asset(env('THEME')) }}/portfolios/columns/css/style.css' type='text/css' media='all' />





    <link rel='stylesheet' id='slide-detail-css'  href='{{ asset(env('THEME')) }}/portfolios/full-description/css/style.css' type='text/css' media='all' />




    <link rel='stylesheet' id='comments-css'  href='{{ asset(env('THEME')) }}/css/comments.css' type='text/css' media='all' />


    <link rel='stylesheet' id='fontawesome-css'  href='{{ asset(env('THEME')) }}/css/font-awesome.css' type='text/css' media='all' />




    <link rel='stylesheet' id='blog-libra-big-css'  href='{{ asset(env('THEME')) }}/blog/libra-big/css/style.css' type='text/css' media='all' />


    <style type="text/css">
        body { background-color: #ffffff; background-image: url('{{ asset(env('THEME')) }}/images/bg-pattern.png'); background-repeat: repeat; background-position: top left; background-attachment: scroll; }
    </style>

    <script type='text/javascript' src='{{ asset(env('THEME')) }}/js/jquery/jquery.js'></script>


</head>
<!-- END HEAD -->
<!-- START BODY -->
<body class="home page no_js responsive stretched">

<!-- START BG SHADOW -->
<div class="bg-shadow">

    <!-- START WRAPPER -->
    <div id="wrapper" class="container group">

        <!-- START TOP BAR -->
        <div id="topbar">
            <div class="container">
                <div class="row">
                    <div id="nav" class="span12 light">

                        <!-- START MAIN NAVIGATION -->

                       @yield('navigation')
                        <!-- END MAIN NAVIGATION -->

                        <!-- START TOPBAR LOGIN -->


                        <!-- END TOPBAR LOGIN -->
                    </div>
                </div>
            </div>
        </div>
        <!-- END TOP BAR -->

        <div id="header" class="group margin-bottom">

            <div class="group container">
                <div class="row" id="logo-headersidebar-container">
                    <!-- START LOGO -->
                    <div id="logo" class="span6 group">
                        <a id="logo-img" href="{{ route('home') }}" title="Libra">
                            <img src="{{ asset(env('THEME')) }}/images/pako0.png" title="Libra" alt="Libra" />
                        </a>
                        <p id='tagline'>Ремонт квартир, оффисов, все виды отделочных работ</p>
                    </div>
                    <!-- END LOGO -->

                    <!-- START HEADER SIDEBAR -->
                    <div id="header-sidebar" class="span6 group">
                        <div class="widget-first widget header-text-image">
                            <div class="text-image" style="text-align:left">
                                <img src="{{ asset(env('THEME')) }}/images/phone1.png" alt="CUSTOMER SUPPORT" />
                            </div>

                            <div class="text-content">
                                <h3>Ждем ваших звонков</h3>
                                <p>+375 (29) 705-80-04 пн-вс</p>
                            </div>
                        </div>

                        <div class="widget-last widget widget_text">
                            <div class="textwidget">
                                <div class="socials-default-small facebook-small default">
                                    <a href="https://vk.com/proremotbelarus" class="socials-default-small default facebook" >vkontacte</a>
                                </div>

                                <div class="socials-default-small linkedin-small default">
                                    <a href="#" class="socials-default-small default linkedin" >instagram</a>
                                </div>

                                <div class="socials-default-small skype-small default">
                                    <a href="skype:rokki_x2?add" class="socials-default-small default skype" >skype</a>
                                </div>


                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="top-border span12"></div>

            <!-- BEGIN #slider -->
            @yield('slider')
        </div>
        <div class="slogan">
            <h2>АКЦИЯ!!! </h2>

            <h3>ПОЗВОНИ И ПОЛУЧИ СКИДКУ 10%.НАШЛИ ДЕШЕВЛЕ? СДЕЛАЕМ ЕЩЕ ДЕШЕВЛЕ!</h3>
        </div>
        @yield('service')

        <div style='height:10px;'></div>
        <!-- SLOGAN -->
        @if(Route::currentRouteName() == 'portfolios.index')
        <div class="slogan">


            <h3>Наши работы</h3>
        </div>
        @endif

        <!-- START PRIMARY -->
        <div id="primary" class="sidebar-right">

            <div class="container group">
                <div class="row">
                    <!-- START CONTENT -->
                    @yield('content')
                    <!-- END CONTENT -->

                    <!-- START SIDEBAR -->

                    @yield('sidebar_portfolio')

                    <!-- END SIDEBAR -->


                    <!-- START EXTRA CONTENT -->
                    <div class="extra-content margin-top group span12">
                        <div class="row">
                            <!-- START SECTION BLOG -->
                            @yield('blog')

                            <!-- END SECTION BLOG -->
                            <div class="clear"></div>
                        </div>
                    </div>
                    <!-- END EXTRA CONTENT -->
                </div>
            </div>
        </div>
        <!-- END PRIMARY -->
        <!-- START REVIEWS -->
        @yield('reviews')

        <!-- END REVIEWS -->

        <!-- START COPYRIGHT -->
       @yield('footer')

        <!-- END COPYRIGHT -->

        <div class="wrapper-border"></div>

    </div>
    <!-- END WRAPPER -->

</div>
<!-- END BG SHADOW -->

<script type='text/javascript' src='{{ asset(env('THEME')) }}/js/comment-reply.min.js'></script>
<script type='text/javascript' src='{{ asset(env('THEME')) }}/js/underscore.min.js'></script>
<script type='text/javascript' src='{{ asset(env('THEME')) }}/js/jquery/jquery.masonry.min.js'></script>

<script type='text/javascript' src='{{ asset(env('THEME')) }}/js/jquery.colorbox-min.js'></script>
<script type='text/javascript' src='{{ asset(env('THEME')) }}/js/jquery.easing.js'></script>
<script type='text/javascript' src='{{ asset(env('THEME')) }}/js/jquery.flexslider-min.js'></script>
<script type='text/javascript' src='{{ asset(env('THEME')) }}/js/jquery.touchSwipe.min.js'></script>

<script type='text/javascript' src='{{ asset(env('THEME')) }}/js/hoverIntent.min.js'></script>
<script type='text/javascript' src='{{ asset(env('THEME')) }}/js/media-upload.min.js'></script>
<script type='text/javascript' src='{{ asset(env('THEME')) }}/js/jquery.clickout.min.js'></script>
<script type='text/javascript' src='{{ asset(env('THEME')) }}/js/responsive.js'></script>
<script type='text/javascript' src='{{ asset(env('THEME')) }}/js/mobilemenu.js'></script>
<script type='text/javascript' src='{{ asset(env('THEME')) }}/js/jquery.superfish.js'></script>
<script type='text/javascript' src='{{ asset(env('THEME')) }}/js/jquery.placeholder.js'></script>
<script type='text/javascript' src='{{ asset(env('THEME')) }}/js/contact.js'></script>
<script type='text/javascript' src='{{ asset(env('THEME')) }}/js/jquery.tweetable.js'></script>
<script type='text/javascript' src='{{ asset(env('THEME')) }}/js/jquery.tipsy.js'></script>
<script type='text/javascript' src='{{ asset(env('THEME')) }}/js/jquery.cycle.min.js'></script>
<script type='text/javascript' src='{{ asset(env('THEME')) }}/js/shortcodes.js'></script>

<script type='text/javascript' src='{{ asset(env('THEME')) }}/js/jquery.custom.js'></script>
<script type='text/javascript' src='{{ asset(env('THEME')) }}/sliders/elastic/js/jquery.eislideshow.js'></script>

</body>
<!-- END BODY -->
</html>