<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package everbrave
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="robots" content="noindex,follow" />
    <meta name="msapplication-TileColor" content="#ff8000" >
    <meta name="theme-color" content="#ff8000" >
    <meta name="keywords" content=""/>
    <meta name="description" content=""/>
    
    <link rel="shortcut icon" href="<?php echo get_template_directory_uri();?>/assets/img/favicon.ico" type="image/x-icon">  
	<link rel="icon" href="<?php echo get_template_directory_uri();?>/assets/img/favicon.png" type="image/png">  
	<?php
	wp_enqueue_script("jquery");
    wp_enqueue_script( 'jquery', get_template_directory_uri() . '/assets/libs/jquery.min.js', array(), '2.3.3' );
	?>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<?php 
$options = get_fields('option'); 
$fields = get_fields();

$logo_dark = $options['logo_dark'];
$logo_white = $options['logo_white'];
?>


<header class="header-main <?php if(is_front_page()){ print('home'); }?>">
	<div class="container">
		<div class="header-wrapper">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="logo"><img src="<?php if($fields['type_header_logo'] === 'white' || is_search() || is_singular( 'services' ) || is_404()){ echo $logo_white; }else{echo $logo_dark; } ?>" alt="Logo"></a>
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="logo-mobile"><img src="<?php echo $logo_white;?>" alt="Logo"></a>
			<div class="header-box">
				<div class="menu-box">
					<?php wp_nav_menu(
						array(
							'theme_location' => 'menu_header',
							'menu_class'     => 'header-menu',
							'items_wrap'     => '<ul id="%1$s" class="%2$s">%3$s</ul>',
							'container'      => false,
						)
					); ?>
					<?php if($options['social_fb'] || $options['social_in'] || $options['social_tw'] || $options['social_inst']): ?>
						<ul class="social-net-list">
							<?php if($options['social_fb']): ?>
								<li class="fb"><a href="<?php echo $options['social_fb'];?>" target="_blank"></a></li>
							<?php endif; ?>	
							<?php if($options['social_in']): ?>
								<li class="in"><a href="<?php echo $options['social_in'];?>" target="_blank"></a></li>
							<?php endif; ?>
							<?php if($options['social_tw']): ?>
								<li class="tw"><a href="<?php echo $options['social_tw'];?>" target="_blank"></a></li>
							<?php endif; ?>
							<?php if($options['social_inst']): ?>
								<li class="inst"><a href="<?php echo $options['social_inst'];?>" target="_blank"></a></li>
							<?php endif; ?>
							<li class="chat"><a href="#"></a></li>
						</ul>
					<?php endif; ?>
				</div>
			</div>
			<div class="hamburger-menu"></div>
		</div>
	</div>
</header>


<div class="fixed-header">
	<div class="container">

		<div class="wrap">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" 
				class="fixed-header-logo">
				<img src="<?php echo $logo_white;?>" alt="Logo">
			</a>
			<?php wp_nav_menu(
				array(
					'theme_location' => 'menu_header',
					'menu_class'     => 'header-menu',
					'items_wrap'     => '<ul id="%1$s" class="%2$s">%3$s</ul>',
					'container'      => false,
				)
			); ?>
		</div>

	</div>
</div>
