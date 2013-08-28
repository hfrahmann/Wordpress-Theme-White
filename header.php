 <!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<title><?php

	wp_title( '|', true, 'right' );

	// Add the blog name.
	bloginfo( 'name' );

	?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <link rel="profile" href="http://gmpg.org/xfn/11" />
    <link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php
$theme_options = get_option('hf_theme_options');
if(isset($theme_options['headerimage']) && strlen($theme_options['headerimage']) > 0) {
?>
    <div class="hf-headerimage" style="background-image:url(<?php echo $theme_options['headerimage'] ?>);"></div>
<?php } ?>

    <div class="hf-titleblock">
        <a href="<?php echo home_url( '/' ); ?>" class="hf-title"><?php bloginfo( 'name' ); ?></a>
    </div>
    <!--<span class="hf-blogdescription"><?php bloginfo( 'description' ); ?></span>-->

    <div class="hf-block">

        <div class="hf-content">
            