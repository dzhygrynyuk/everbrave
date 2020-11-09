<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package everbrave
 */

get_header();

$fields = get_fields();
$options = get_fields('option'); 

$user_photo_url = get_field('user_custom_photo', 'user_'.get_the_author_ID());
if(empty($user_photo_url)){
    $user_photo_url = get_template_directory_uri().'/assets/img/no-user-photo.png';
}
?>

<?php while ( have_posts() ) : the_post(); 

	$thumbnail_url = '';
	if(has_post_thumbnail()){
	    $thumbnail_url = get_the_post_thumbnail_url();
	}else{
	    $thumbnail_url = get_template_directory_uri().'/assets/img/default-thumbnail.jpg';
	}

	$post_item_categories = get_the_category();
	$categories_ids = [];
	foreach ($post_item_categories as $value){
		if($value->term_id == 1) break;
		$categories_ids[] = $value->term_id;
	}

	?>

	<main class="main page-post">

		<!-- Banner -->
		<section class="page-post_banner">
			<div class="container">
				<?php if($post_item_categories): ?>
		            <div class="wrap">
						<div class="post-tags">
			                <?php foreach ($post_item_categories as $post_item_category): 
			                	if($post_item_category->term_id !== 1): ?>
			                    	<a href="/resources/?topic=<?php echo $post_item_category->slug; ?>" class="post-tag"><?php echo $post_item_category->name; ?></a>
			                    <?php endif; ?>	
			                <?php endforeach; ?>
			            </div>    
		            </div>
		        <?php endif; ?>   
			</div>
		</section>

		<!-- Content -->
		<section class="post">
			<div class="container">
				<div class="social-share"></div>
				<div class="post_header">
					<div class="post_header_info">
						<div class="post_header_info_top">
							<div class="post-author">
								<div class="post-author-photo bgi" style="background-image: url('<?php echo $user_photo_url; ?>"></div>
								<span class="post-author-name"><?php the_author(); ?></span>
							</div>
							<div class="line"></div>
							<div class="post-date"><?php the_date('F j, Y'); ?></div>
						</div>
						<h3 class="title"><?php the_title(); ?></h3>
					</div>
					<div class="post_header-bgi bgi" style="background-image: url('<?php echo $thumbnail_url; ?>');"></div>
					<!-- <img class="post_header-bgi" src="<?php echo $thumbnail_url; ?>" alt="Image"> -->
				</div>

				<div class="post-content"><?php the_content(); ?></div>
			</div>
		</section>

		<!-- Form -->
		<section class="post-form">
			<div class="container">
				<div class="wrap">
					<h3 class="title">Was this article helpful? Subscribe <br>to receive more useful content like this.</h3>
					<script charset="utf-8" type="text/javascript" src="//js.hsforms.net/forms/v2.js"></script>
					<script>
						hbspt.forms.create({
							portalId: "282298",
							formId: "77d120a9-412c-4363-a970-d4216f35b054"
						});
					</script>
				</div>
				
			</div>
		</section>

		<!-- About Author -->
		<section class="about-authors">
			<div class="container"> 

				<div class="about-author">
					<div class="about-author_left">
						<div class="about-author-photo bgi"
							style="background-image: url('<?php echo $user_photo_url; ?>">
						</div>
						<div class="about-author_left_bottom">
							<span class="about-author-name"><?php the_author_firstname(); ?> <?php the_author_lastname(); ?></span>
							<div class="about-author_social">
								<?php $twitter = get_the_author_meta( 'twitter', $post->post_author ); ?>
								<?php $linkedin = get_the_author_meta( 'linkedin', $post->post_author ); ?>
								<?php $instagram = get_the_author_meta( 'instagram', $post->post_author ); ?>

								<?php if($linkedin) : ?>
									<a href="<?php echo $linkedin; ?>" class="about-author_social-item" target="_blank">
										<svg width="18.559" height="18.56" viewBox="0 0 18.559 18.56">
											<path id="linkedin" d="M10674-1876.441v-13.4h4.122v13.4Zm14.433,0v-7.075c0-1.643-.624-2.9-2.058-2.9a2.159,2.159,0,0,0-1.934,1.619,2.813,2.813,0,0,0-.133.994v7.36h-4.121v-8.821c0-1.593-.055-2.924-.105-4.075h3.705l.183,1.778h.078a4.588,4.588,0,0,1,3.942-2.063c2.61,0,4.568,1.748,4.568,5.508v7.673ZM10674-1892.885a2.03,2.03,0,0,1,2.061-2.115,2,2,0,0,1,2.062,2.062,1.953,1.953,0,0,1-2.064,2.037A1.952,1.952,0,0,1,10674-1892.885Z" transform="translate(-10674.003 1895)" fill="#fff"/>
										</svg>
									</a>
								<?php endif; ?>
								<?php if($twitter) : ?>
									<a href="<?php echo $twitter; ?>" class="about-author_social-item" target="_blank">
										<svg width="20.883" height="16.971" viewBox="0 0 20.883 16.971">
											<path id="Path_504" data-name="Path 504" d="M393.816,978.344a8.588,8.588,0,0,1-2.721,1.042,4.284,4.284,0,0,0-7.41,2.93,4.376,4.376,0,0,0,.11.977,12.162,12.162,0,0,1-8.83-4.477,4.286,4.286,0,0,0,1.325,5.72,4.26,4.26,0,0,1-1.941-.536v.055a4.288,4.288,0,0,0,3.437,4.2,4.253,4.253,0,0,1-1.934.073,4.29,4.29,0,0,0,4,2.976,8.656,8.656,0,0,1-6.344,1.774,12.186,12.186,0,0,0,18.758-10.266c0-.184,0-.371-.012-.554a8.693,8.693,0,0,0,2.137-2.218,8.559,8.559,0,0,1-2.459.675A4.3,4.3,0,0,0,393.816,978.344Z" transform="translate(-373.51 -978.031)" fill="#fff"/>
										</svg>
									</a>
								<?php endif; ?>
								<?php if($instagram) : ?>
									<a href="<?php echo $instagram; ?>" class="about-author_social-item" target="_blank">
										<svg id="instagram" width="19.339" height="19.339" viewBox="0 0 19.339 19.339">
											<path id="Path_3" data-name="Path 3" d="M9.67,1.719a29.649,29.649,0,0,1,3.868.107,4.983,4.983,0,0,1,1.826.322A3.773,3.773,0,0,1,17.19,3.975,4.983,4.983,0,0,1,17.513,5.8c0,.967.107,1.289.107,3.868a29.649,29.649,0,0,1-.107,3.868,4.983,4.983,0,0,1-.322,1.826,3.773,3.773,0,0,1-1.826,1.826,4.983,4.983,0,0,1-1.826.322c-.967,0-1.289.107-3.868.107A29.649,29.649,0,0,1,5.8,17.513a4.983,4.983,0,0,1-1.826-.322,3.773,3.773,0,0,1-1.826-1.826,4.983,4.983,0,0,1-.322-1.826c0-.967-.107-1.289-.107-3.868A29.649,29.649,0,0,1,1.826,5.8a4.983,4.983,0,0,1,.322-1.826A3.859,3.859,0,0,1,2.9,2.9a1.816,1.816,0,0,1,1.074-.752A4.983,4.983,0,0,1,5.8,1.826,29.649,29.649,0,0,1,9.67,1.719M9.67,0A31.746,31.746,0,0,0,5.694.107a6.633,6.633,0,0,0-2.364.43A4.206,4.206,0,0,0,1.612,1.612,4.206,4.206,0,0,0,.537,3.331a4.9,4.9,0,0,0-.43,2.364A31.746,31.746,0,0,0,0,9.67a31.746,31.746,0,0,0,.107,3.975,6.633,6.633,0,0,0,.43,2.364,4.206,4.206,0,0,0,1.074,1.719A4.206,4.206,0,0,0,3.331,18.8a6.633,6.633,0,0,0,2.364.43,31.745,31.745,0,0,0,3.975.107,31.746,31.746,0,0,0,3.975-.107,6.633,6.633,0,0,0,2.364-.43A4.508,4.508,0,0,0,18.8,16.009a6.633,6.633,0,0,0,.43-2.364c0-1.074.107-1.4.107-3.975a31.745,31.745,0,0,0-.107-3.975,6.633,6.633,0,0,0-.43-2.364,4.206,4.206,0,0,0-1.074-1.719A4.206,4.206,0,0,0,16.009.537a6.633,6.633,0,0,0-2.364-.43A31.746,31.746,0,0,0,9.67,0m0,4.727A4.863,4.863,0,0,0,4.727,9.67,4.942,4.942,0,1,0,9.67,4.727m0,8.165A3.166,3.166,0,0,1,6.446,9.67,3.166,3.166,0,0,1,9.67,6.446,3.166,3.166,0,0,1,12.893,9.67,3.166,3.166,0,0,1,9.67,12.893m5.157-9.562a1.182,1.182,0,1,0,1.182,1.182,1.192,1.192,0,0,0-1.182-1.182" fill="#fff" fill-rule="evenodd"/>
										</svg>
									</a>
								<?php endif; ?>
							</div>
						</div>
					</div>
					<div class="about-author_right">
						<span class="about-author-title">About the Author</span>
						<p class="about-author-desc"><?php echo the_author_description(); ?></p>
						<a href="/resources/?author=<?php the_author_nickname(); ?>" class="about-author-link">More stories by <?php the_author_firstname(); ?></a>
					</div>
				</div>

			</div>
		</section>

		<!-- More Articles -->

		<?php $args_related_posts = array(
		    'post_type' => 'post', 
		    'posts_per_page' => 3,
		    'orderby' => 'date',
		    'order'   => 'DESC',
		    'post__not_in' => array(get_the_ID()),
		    'category__in' => $categories_ids,
		);
		if(!empty($categories_ids)):
			$loop_related_posts = new WP_Query( $args_related_posts );
			if($loop_related_posts->have_posts()): ?>
				<section class="home-posts-sec">
					<div class="container">	
						<h2>Related Articles</h2>
						<div class="posts-box">
							<?php while ($loop_related_posts->have_posts()): $loop_related_posts->the_post();
								get_template_part( 'template-parts/post', 'item' );
							endwhile; ?>	
						</div>
					</div>
				</section>		
			<?php endif; ?>
		<?php endif; ?>
	</main>

<?php endwhile; ?>	

<script>

	jQuery(document).ready(function ($) {

		//Hide Share
		$(window).scroll(function(){
			let offsetTop = $('.home-posts-sec').offset().top - 300
			let windowTop = $(window).scrollTop();
			let share = $('.social-rocket-floating-buttons');

			windowTop < offsetTop ? share.fadeIn() : share.fadeOut();
		});

	});

</script>

<?php get_footer(); ?>
