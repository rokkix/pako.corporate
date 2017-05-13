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




    <title>{{ $title }}</title>
<!--  <script type='text/javascript' src='{{ asset(env('THEME')) }}/js/jquery/jquery.js'></script>  -->
    <!-- RESET STYLESHEET -->
    {{--<link rel="stylesheet" type="text/css" media="all" href="{{ asset(env('THEME')) }}/css/reset.css" />--}}
    <!-- BOOTSTRAP STYLESHEET -->
    {{--<link rel="stylesheet" type="text/css" media="all" href="{{ asset(env('THEME')) }}/css/bootstrap.css" />--}}
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

    <link rel="stylesheet" id="google-fonts-css" href="http://fonts.googleapis.com/css?family=Oswald%7CDroid+Sans%7CPlayfair+Display%7COpen+Sans+Condensed%3A300%7CRokkitt%7CShadows+Into+Light%7CAbel%7CDamion%7CMontez&amp;ver=3.4.2" type="text/css" media="all" />
    <link rel='stylesheet' href='{{ asset(env('THEME')) }}/css/1/font-awesome.css' type='text/css' media='all' />

     {{--<lin   k rel='stylesheet' id='slider-thumb-css'  href='{{ asset(env('THEME')) }}/sliders/thumbnails/css/thumbnails.css' type='text/css' media='all' />--}}
    {{--<link rel='stylesheet' id='responsive-css'  href='{{ asset(env('THEME')) }}/css/responsive.css' type='text/css' media='all' />--}}
    {{--<link rel='stylesheet' id='polaroid-slider-css'  href='{{ asset(env('THEME')) }}/sliders/polaroid/css/polaroid.css' type='text/css' media='all' />--}}
    {{--<link rel='stylesheet' id='ahortcodes-css'  href='{{ asset(env('THEME')) }}/css/shortcodes.css' type='text/css' media='all' />--}}
    {{--<link rel='stylesheet' id='contact-form-css'  href='{{ asset(env('THEME')) }}/css/contact_form.css' type='text/css' media='all' />--}}
    {{--<link rel='stylesheet' id='custom-css'  href='{{ asset(env('THEME')) }}/css/custom.css' type='text/css' media='all' />--}}
    {{--<link rel='stylesheet' id='thickbox-css'  href='{{ asset(env('THEME')) }}/js/thickbox/thickbox.css' type='text/css' media='all' />--}}
    {{--<link rel='stylesheet' id='google-fonts-css'  href='http://fonts.googleapis.com/css?family=Playfair+Display%7COpen+Sans+Condensed%3A300%7COpen+Sans%7CShadows+Into+Light%7CMuli%7CDroid+Sans%7CArbutus+Slab%7CAbel&#038;ver=3.5.1' type='text/css' media='all' />--}}
    {{--<link rel='stylesheet' id='responsive-css'  href='{{ asset(env('THEME')) }}/css/responsive.css' type='text/css' media='all' />--}}
    {{--<link rel='stylesheet' id='polaroid-slider-css'  href='{{ asset(env('THEME')) }}/sliders/polaroid/css/polaroid.css' type='text/css' media='all' />--}}
    {{--<link rel='stylesheet' id='elastic-slider-css'  href='{{ asset(env('THEME')) }}/sliders/elastic/css/elastic.css' type='text/css' media='all' />--}}
    {{--<link rel='stylesheet' id='ahortcodes-css'  href='{{ asset(env('THEME')) }}/css/shortcodes.css' type='text/css' media='all' />--}}
    {{--<link rel='stylesheet' id='contact-form-css'  href='{{ asset(env('THEME')) }}/css/contact_form.css' type='text/css' media='all' />--}}
    <link rel='stylesheet' id='custom-css'  href='{{ asset(env('THEME')) }}/css/custom.css' type='text/css' media='all' />


    <link rel="stylesheet" type="text/css" media="all" href="{{ asset(env('THEME')) }}/css/1/style.css" /> <!-- MAIN THEME STYLESHEET -->

    <!-- FONTs -->
    <link rel="stylesheet" id="google-fonts-css" href="http://fonts.googleapis.com/css?family=Oswald%7CDroid+Sans%7CPlayfair+Display%7COpen+Sans+Condensed%3A300%7CRokkitt%7CShadows+Into+Light%7CAbel%7CDamion%7CMontez&amp;ver=3.4.2" type="text/css" media="all" />
    <link rel='stylesheet' href='{{ asset(env('THEME')) }}/css/1/font-awesome.css' type='text/css' media='all' />

    <!-- JAVASCRIPTs -->
    <script type="text/javascript" src="{{ asset(env('THEME')) }}/js/1/jquery.js"></script>
    <script type="text/javascript" src="{{ asset(env('THEME')) }}/js/1/ckeditor/ckeditor.js"></script>
    <script type="text/javascript" src="{{ asset(env('THEME')) }}/js/1/bootstrap-filestyle.min.js"></script>

    <style type="text/css">
        body { background-color: #ffffff; background-image: url('{{ asset(env('THEME')) }}/images/bg-pattern.png'); background-repeat: repeat; background-position: top left; background-attachment: scroll; }
    </style>


    {{--<link rel="stylesheet" type="text/css" media="all" href="{{ asset(env('THEME')) }}/css/1/reset.css" /> <!-- RESET STYLESHEET -->--}}

    <link rel="stylesheet" type="text/css" media="all" href="{{ asset(env('THEME')) }}/css/1/style-minifield.css" /> <!-- MAIN THEME STYLESHEET -->
    <link rel="stylesheet" type="text/css" media="all" href="{{ asset(env('THEME')) }}/css/1/buttons.css" /> <!-- MAIN THEME STYLESHEET -->
    {{--<link rel="stylesheet" type="text/css" media="all" href="{{ asset(env('THEME')) }}/css/1/cache-custom.css" /> <!-- MAIN THEME STYLESHEET -->--}}
    {{--<link rel="stylesheet" type="text/css" media="all" href="{{ asset(env('THEME')) }}/css/1/cache-custom.css" /> <!-- MAIN THEME STYLESHEET -->--}}

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

                        <div id="topbar_login" class="not_logged_in">

                            <a class="topbar_login" href="#">
                                LOGIN <span class="sf-sub-indicator"></span>
                            </a>

                            <div id="fast-login" class="access-info-box">
                                <form action="#" method="post" name="loginform">

                                    <div class="form">
                                        <p>
                                            <label>
                                                Username<br/>
                                                <input type="text" tabindex="10" size="20" value="" name="log" class="input-text" />
                                            </label>
                                        </p>

                                        <p>
                                            <label>
                                                Password<br/>
                                                <input type="password" tabindex="20" size="20" value="" name="pwd" class="input-text" />
                                            </label>
                                        </p>

                                        <a class="align-left lostpassword" href="#" title="Password Lost and Found">
                                            lost password?
                                        </a>

                                        <p class="align-right">
                                            <input type="submit" tabindex="100" value="Login" name="wp-submit" class="input-submit" />
                                            <input type="hidden" value="index.html" name="redirect_to" />
                                            <input type="hidden" value="1" name="testcookie" />
                                        </p>
                                    </div>
                                </form>
                            </div>
                        </div>
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
                        <a id="logo-img" href="index.html" title="Libra">
                            <img src="{{ asset(env('THEME')) }}/images/libra-logo1.png" title="Libra" alt="Libra" />
                        </a>
                        <p id='tagline'>Ремонт квартир, оффисов , все виды отделочных работ</p>
                    </div>
                    <!-- END LOGO -->

                    <!-- START HEADER SIDEBAR -->

                </div>
            </div>
            <div class="top-border span12"></div>



        </div>

        <div style='height:10px;'></div>
        <!-- SLOGAN -->

        <!-- START PRIMARY -->
        @if (count($errors) > 0)
            <div class="box error-box">

                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach

            </div>
        @endif

        @if (session('status'))
            <div class="box success-box">
                {{ session('status') }}
            </div>
        @endif

        @if (session('error'))
            <div class="box error-box">
                {{ session('error') }}
            </div>
        @endif
        <div id="primary" class="sidebar-no">
            <div class="inner group">
                <div class="row">
                    <!-- START CONTENT -->
                @yield('content')
                <!-- END CONTENT -->

                    <!-- START SIDEBAR -->



                    <!-- END SIDEBAR -->


                    <!-- START EXTRA CONTENT -->

                    <!-- END EXTRA CONTENT -->
                </div>
            </div>
        </div>
        <!-- END PRIMARY -->
        <!-- START REVIEWS -->


        <!-- END REVIEWS -->

        <!-- START COPYRIGHT -->
    @yield('footer')

    <!-- END COPYRIGHT -->

        <div class="wrapper-border"></div>

    </div>
    <!-- END WRAPPER -->

</div>
<!-- END BG SHADOW -->




</body>
<!-- END BODY -->
</html>