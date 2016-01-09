<?php
    /*
        Header Template
        
        @package bambuletheme
    */
?>
    <!DOCTYPE html>
    <html <?php language_attributes(); ?>

    <head>
        <title><?php bloginfo('name'); wp_title(); ?></title>
        <meta name="description" content="<?php bloginfo('description'); ?>">
        <meta charset="<?php bloginfo('charset'); ?>">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
        <link rel="profile" href="http://gmpg.org/xfn/11">
        <?php if( is_singular() && pings_open( get_queried_object() ) ): ?>
            <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
            <?php endif; ?>
                <?php wp_head(); ?>
    </head>

    <body <?php body_class(); ?> >

        <div class="container">
            <div class="row">
                <div class="col-xs-12">

                    <div class="header-container text-center background-image" style="background-image: url(<?php header_image(); ?>);">
                        <div class="header-content table">
                            <div class="table-cell">
                                <h1 class="site-title"><span class="hide"><?php bloginfo('name'); ?></span><img src="http://localhost/axid/wp-content/themes/bambule/img/axidlogo.png" height="131px" width="141px"></h1>
                                <h2 class="site-description"><?php bloginfo('description'); ?></h2>
                            </div>
                            <!-- .table-cell -->
                        </div>
                        <!-- .header-content -->
                        <div class="nav-container">

                        </div>
                        <!-- .nav-container -->
                    </div>
                    <!-- .header-container -->
                </div>
                <!-- .col-xs-12 -->
            </div>
            <!-- .row -->
        </div>
        <!-- .container -->