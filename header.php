<?php //zume_force_login(); // requires no spaces above or else it will throw a headers already send error.

/* Redirect to zume5 all version_5 enabled languages */
$zume_languages_v5 = zume_languages('v5_only');
$zume_current_language = zume_current_language();
if ( isset( $zume_languages_v5[$zume_current_language] ) && ! is_admin() ) {
    if ( wp_redirect( 'https://zume5.training/'.$zume_current_language ) ) {
        exit;
    }
}

?>

<!doctype html>

  <html class="no-js"  <?php language_attributes(); ?>>

    <head>

        <meta charset="utf-8">

        <!-- Force IE to use the latest rendering engine available -->
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <!-- Mobile Meta -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
        <meta class="foundation-mq">

        <!-- If Site Icon isn't set in customizer -->
        <?php if ( ! function_exists( 'has_site_icon' ) || ! has_site_icon() ) { ?>
            <!-- Icons & Favicons -->
            <link rel="icon" href="<?php echo esc_attr( get_theme_file_uri( 'favicon.png' ) ); ?>">
            <link href="<?php echo esc_attr( get_theme_file_uri( 'assets/images/apple-icon-touch.png' ) ); ?>" rel="apple-touch-icon" />
            <!--[if IE]>
                <link rel="shortcut icon" href="<?php echo esc_attr( get_theme_file_uri( 'favicon.ico' ) ); ?>">
            <![endif]-->
            <meta name="msapplication-TileColor" content="#f01d4f">
            <meta name="msapplication-TileImage" content="<?php echo esc_attr( get_theme_file_uri( 'assets/images/win8-tile-icon.png' ) ); ?>">
            <meta name="theme-color" content="#121212">
        <?php } ?>

        <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

        <?php wp_head(); ?>

        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">

    </head>

    <!-- Uncomment this line if using the Off-Canvas Menu -->

    <body <?php body_class(); ?>>

        <div class="off-canvas-wrapper" >

            <?php get_template_part( 'parts/content', 'offcanvas' ); ?>

            <div class="off-canvas-content" data-off-canvas-content >

                <header class="header" role="banner" >

                     <!-- This navs will be applied to the topbar, above all content
                          To see additional nav styles, visit the /parts directory -->
                        <?php get_template_part( 'parts/nav', 'offcanvas-topbar' ); ?>

                </header> <!-- end .header -->
