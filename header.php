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
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'homepage' ); ?></a>

	<header id="masthead" class="site-header">
		<div class="site-branding row">
            <?php
            if (has_custom_logo()) :
            ?>
            <div class="col-lg-1 col-sm-2">
                <?php
                    the_custom_logo();
                ?>
            </div>
            <?php
            endif;
            ?>
            <div class="col-lg-1 col-sm-2">
                <?php
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
            <div class="col-lg-6 col-sm-7">
                <?php
                $homepage_description = get_bloginfo( 'description', 'display' );
                if ( $homepage_description || is_customize_preview() ) :
                    ?>
                    <p class="site-description"><?php echo $homepage_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>
                <?php endif; ?>
            </div>
            <?php
            if (has_custom_logo()) :
            ?>
            <nav id="site-navigation" class="main-navigation col-lg-4 col-sm-1">
            <?php
            else:
            ?>
            <nav id="site-navigation" class="main-navigation col-lg-5 col-sm-1">
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
