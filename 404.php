<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package everbrave
 */

get_header(); ?>

<main class="main">
	<div class="page-404">
		<div class="box-404">
			<div class="star_1">
				<svg xmlns="http://www.w3.org/2000/svg" width="72.115" height="90.386" viewBox="0 0 72.115 90.386">
				  <g id="Star_right" data-name="Star right" transform="translate(-310.017 -80.321)">
				    <path id="star_1_1" data-name="STAR MID" d="M379.392,114.68c-29.723-2.715-31.938-4.9-34.678-34.359-2.744,29.461-4.961,31.645-34.7,34.359,29.736,2.7,31.953,4.914,34.7,34.361C347.454,119.594,349.669,117.381,379.392,114.68Z" fill="#fff"/>
				    <path id="star_1_2" data-name="STAR L" d="M332.454,144.508c-1.047,11.217-1.9,12.055-13.215,13.092,11.32,1.021,12.168,1.879,13.215,13.107,1.029-11.229,1.877-12.086,13.211-13.107C334.331,156.563,333.483,155.725,332.454,144.508Z" fill="#fff"/>
				    <path id="star_1_3" data-name="STAR R" d="M373.538,140.129c.682-7.289,1.234-7.826,8.594-8.514-7.359-.67-7.912-1.205-8.594-8.5-.676,7.291-1.23,7.826-8.59,8.5C372.308,132.3,372.862,132.84,373.538,140.129Z" fill="#fff"/>
				  </g>
				</svg>
			</div>
			<div class="star_2">
				<svg xmlns="http://www.w3.org/2000/svg" width="72.115" height="90.386" viewBox="0 0 72.115 90.386">
				  <g id="Star_right" data-name="Star right" transform="translate(-310.017 -80.321)">
				    <path id="star_2_1" data-name="STAR MID" d="M379.392,114.68c-29.723-2.715-31.938-4.9-34.678-34.359-2.744,29.461-4.961,31.645-34.7,34.359,29.736,2.7,31.953,4.914,34.7,34.361C347.454,119.594,349.669,117.381,379.392,114.68Z" fill="#fff"/>
				    <path id="star_2_2" data-name="STAR L" d="M332.454,144.508c-1.047,11.217-1.9,12.055-13.215,13.092,11.32,1.021,12.168,1.879,13.215,13.107,1.029-11.229,1.877-12.086,13.211-13.107C334.331,156.563,333.483,155.725,332.454,144.508Z" fill="#fff"/>
				    <path id="star_2_3" data-name="STAR R" d="M373.538,140.129c.682-7.289,1.234-7.826,8.594-8.514-7.359-.67-7.912-1.205-8.594-8.5-.676,7.291-1.23,7.826-8.59,8.5C372.308,132.3,372.862,132.84,373.538,140.129Z" fill="#fff"/>
				  </g>
				</svg>
			</div>
			<h1>404</h1>
			<h2><span>OOPS!</span> Looks like you’re lost in space…</h2>
		</div>
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="btn btn_white">Go Home</a>

		<div class="star">
			<svg xmlns="http://www.w3.org/2000/svg" width="72.115" height="90.386" viewBox="0 0 72.115 90.386">
			  <g id="Star_right" data-name="Star right" transform="translate(-310.017 -80.321)">
			    <path id="star_1" data-name="STAR MID" d="M379.392,114.68c-29.723-2.715-31.938-4.9-34.678-34.359-2.744,29.461-4.961,31.645-34.7,34.359,29.736,2.7,31.953,4.914,34.7,34.361C347.454,119.594,349.669,117.381,379.392,114.68Z" fill="#fff"/>
			    <path id="star_2" data-name="STAR L" d="M332.454,144.508c-1.047,11.217-1.9,12.055-13.215,13.092,11.32,1.021,12.168,1.879,13.215,13.107,1.029-11.229,1.877-12.086,13.211-13.107C334.331,156.563,333.483,155.725,332.454,144.508Z" fill="#fff"/>
			    <path id="star_3" data-name="STAR R" d="M373.538,140.129c.682-7.289,1.234-7.826,8.594-8.514-7.359-.67-7.912-1.205-8.594-8.5-.676,7.291-1.23,7.826-8.59,8.5C372.308,132.3,372.862,132.84,373.538,140.129Z" fill="#fff"/>
			  </g>
			</svg>
		</div>

		<div class="rocket">
			<img src="<?php echo get_template_directory_uri(); ?>/assets/img/rocket_404.svg" class="rocket_icon" alt="Rocket">
		</div>

		<div class="moon-box">
			<div class="moon"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/moon_palnet404.svg" class="moon_icon" alt="Moon"></div>
		</div>

		<img src="<?php echo get_template_directory_uri(); ?>/assets/img/planet_404.svg" class="planet_icon" alt="Planet">
	</div>
	<?php get_footer(); ?>
</main>