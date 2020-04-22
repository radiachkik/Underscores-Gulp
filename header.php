<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Homepage
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">

    <canvas id="particles-background"></canvas><!-- Canvas for the particle animation -->

    <a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'homepage' ); ?></a>

	<header id="masthead" class="site-header">
		<div class="site-branding row">
            <?php
            if (has_custom_logo()) :
            ?>
            <div class="col-lg-1 col-sm-2 col-2 col">
                <?php
                    the_custom_logo();
                ?>
            </div>
            <?php
            endif;
            if (has_custom_logo()):
            ?>
                <div class="col-xl-7 col-lg-6 col-sm-9 col-8 col">
            <?php
            else:
            ?>
                <div class="col-xl-7 col-lg-6 col-sm-11 col-10 col">
                <?php
            endif;
                if ( is_front_page() && is_home() ) :
                    ?>
                    <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                    <?php
                else :
                    ?>
                    <p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
                    <?php
                endif;
                ?>
            </div>
            <?php
            if (has_custom_logo()) :
            ?>
            <nav id="site-navigation" class="main-navigation col-xl-4 col-lg-5 col-sm-1 col-2 col">
            <?php
            else:
            ?>
            <nav id="site-navigation" class="main-navigation col-xl-5 col-lg-6 col-sm-1 col-2 col">
            <?php
            endif;
            ?>
                <button class="menu-toggle navbar-toggler" type="button" aria-controls="primary-menu" aria-expanded="false">
                    <i class="fas fa-bars"></i>
                </button>
                <?php
                wp_nav_menu(
                    array(
                        'theme_location' => 'menu-1',
                        'menu_id'        => 'primary-menu',
                    )
                );
                ?>
            </nav><!-- #site-navigation -->
        </div>
    </header><!-- #masthead -->

	<div id="content" class="site-content">

