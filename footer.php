<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package everbrave
 */

$options = get_fields('option');
$logo_white = $options['logo_white'];
?>

<!-- <a href="#" class="fix-everbuddy-chat"><img src="<?php echo get_template_directory_uri();?>/assets/img/everbuddy-chat.svg" alt=""></a> -->

<footer class="footer-main <?php if(is_front_page()){ print('home'); }?>">
	<div class="container">
		<div class="logo-box">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="logo">
				<img src="<?php echo $logo_white; ?>" alt="Logo">
			</a>
		</div>
		<div class="content-box">
			<div class="left-col">
				<?php if($options['footer_title']): ?>
					<h4><?php echo $options['footer_title'];?></h4>
				<?php endif; ?>
				<?php if($options['footer_address'] || $options['footer_phone'] || $options['footer_email']): ?>
					<ul class="footer-list">
						<?php if($options['footer_address']): ?>
							<li class="address">
								<a href="<?php echo $options['footer_address']['url'];?>" target="_blank">
									<?php echo $options['footer_address']['title'];?>
								</a>
							</li>
						<?php endif; ?>	
						<?php if($options['footer_phone']): ?>
							<li class="phone"><a href="tel:<?php echo $options['footer_phone'];?>"><?php echo $options['footer_phone'];?></a></li>
						<?php endif; ?>	
						<?php if($options['footer_email']): ?>
							<li class="email">
								<a href="mailto:<?php echo $options['footer_email'];?>">
									<?php echo $options['footer_email'];?>
								</a>
							</li>
						<?php endif; ?>	
					</ul>
				<?php endif; ?>
				
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
							<li class="inst">
								<a href="<?php echo $options['social_inst'];?>" target="_blank"></a>
							</li>
						<?php endif; ?>
					</ul>
				<?php endif; ?>
			</div>
			<div class="right-col">
				<div class="first-menu">
					<?php wp_nav_menu(
						array(
							'theme_location' => 'menu_footer_first',
							'menu_class'     => 'footer-menu',
							'items_wrap'     => '<ul id="%1$s" class="%2$s">%3$s</ul>',
							'container'      => false,
						)
					); ?>
				</div>
				<div class="second-menu">
					<?php wp_nav_menu(
						array(
							'theme_location' => 'menu_footer_second',
							'menu_class'     => 'footer-menu',
							'items_wrap'     => '<ul id="%1$s" class="%2$s">%3$s</ul>',
							'container'      => false,
						)
					); ?>
				</div>
			</div>
		</div>
		<div class="copyright-box">
			<?php echo apply_filters( 'the_content', $options['footer_copyright'] );?>
			<?php wp_nav_menu(
				array(
					'theme_location' => 'menu_footer_copy',
					'menu_class'     => 'footer-copy-menu',
					'items_wrap'     => '<ul id="%1$s" class="%2$s">%3$s</ul>',
					'container'      => false,
				)
			); ?>
		</div>
	</div>
</footer>	

<div id="ie_modal" class="ie_modal">
	<div class="container">
		<h2>Your web browser is no longer supported.</h2>
		<p>It looks like you are using a web browser that our website does not support. Please upgrade your browser or view this page on your mobile device.</p>
	</div>
</div>

<script>
	function getInternetExplorerVersion(){
        var rv = -1;
        if (navigator.appName == 'Microsoft Internet Explorer'){
            var ua = navigator.userAgent;
            var re  = new RegExp("MSIE ([0-9]{1,}[\.0-9]{0,})");
            if (re.exec(ua) != null)
                rv = parseFloat( RegExp.$1 );
        }else if (navigator.appName == 'Netscape'){
            var ua = navigator.userAgent;
            var re  = new RegExp("Trident/.*rv:([0-9]{1,}[\.0-9]{0,})");
            if (re.exec(ua) != null)
                rv = parseFloat( RegExp.$1 );
        }
        return rv;
    }

    var versioIE = getInternetExplorerVersion();

    if(versioIE !== -1 && versioIE < 11){
    	var modalIE = document.getElementById('ie_modal');
		var body = document.body;

		modalIE.style.display = 'block';  
		body.classList.add('no-scroll');
    }

</script>

<?php wp_footer(); ?>

</body>
</html>
