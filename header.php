<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" <?php language_attributes(); ?>> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="stylesheet" href="<?=get_bloginfo('template_url')?>/css/main.css">
        <style type="text/css">
        body {
            padding-top: 40px;
        }
        .sidebar-nav {
            padding: 9px 0;
        }
        </style>
        <link rel="stylesheet" href="<?=get_bloginfo('template_url')?>/css/bootstrap-responsive.css">
        <link rel="pingback" href="<?=get_bloginfo('pingback_url')?>" />
        <script src="<?=get_bloginfo('template_url')?>/js/vendor/modernizr-2.6.1-respond-1.1.0.min.js"></script>
        <?php wp_head(); ?>
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="chromeframe">You are using an outdated browser. <a href="http://browsehappy.com/">Upgrade your browser today</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to better experience this site.</p>
        <![endif]-->

        <div class="navbar navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </a>
                    <a class="brand" href="http://<?=$_SERVER['HTTP_HOST']?>"><?=$_SERVER['HTTP_HOST']?></a>
                    <div class="nav-collapse collapse">
                        <?php wp_nav_menu(array(
                            'container' => false,
                            'menu_class' => 'nav',
                            'walker' => new Walker_Navbar_Menu())); ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">

            <div class="row">
                <div class="span12">
                    <h1><?=get_bloginfo('description')?></h1>
                </div>
            </div>

            <div class="row">

                <div id="top-sidebar" class="span12">
                    <?php if (!dynamic_sidebar('top-sidebar')) : ?>
                    <ul class="social-networks">
                        <li><span class="pictonic"></span> <a target="_blank" href="http://github.com/montes"><?=__('My', 'montes-one')?> Github</a></li>
                        <li><span class="pictonic"></span> <a target="_blank" href="http://twitter.com/montesjmm"><?=__('My', 'montes-one')?> Twitter</a></li>
                        <li><span class="pictonic"></span> <a target="_blank" href="mailto:javier@montesjmm.com">javier@montesjmm.com</a></li>
                    </ul>
                    <?php endif; // end sidebar widget area ?>
                </div><!-- #secondary .widget-area -->

            </div><div class="row">

