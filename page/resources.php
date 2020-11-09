<?php 
/**
 * Template Name: Resources Page
 */

get_header();
$fields = get_fields(); 

if(!empty($_GET['topic'])){
	$filter_category = trim($_GET['topic']);
}

if(!empty($_GET['type'])){
	$filter_type = trim($_GET['type']);
}

if(!empty($_GET['author'])){
	$filter_author = trim($_GET['author']);
}

$terms_types = get_terms( [
	'taxonomy' => 'post-type',
	'hide_empty' => true,
] );

$terms_category = get_terms( [
	'taxonomy' => 'category',
	'hide_empty' => true,
] );

$featured_posts_ids = array();

if(!isset($filter_category) && !isset($filter_type) && !isset($filter_author)){
	$args_featured_posts = array(
	    'post_type' => 'post', 
	    'posts_per_page' => 3,
	    'orderby' => 'date',
	    'order'   => 'DESC',
	    'category_name' => 'featured'
	);
	$loop_featured_posts = new WP_Query( $args_featured_posts );

	$count_featured_posts = $loop_featured_posts->post_count;

	if($loop_featured_posts->have_posts()):
		while ($loop_featured_posts->have_posts()): $loop_featured_posts->the_post();
			$featured_posts_ids[] = $post->ID;
		endwhile;
		wp_reset_query();
	endif;

	if($count_featured_posts < 3){
		$count_other_posts = 3 - (int)$count_featured_posts;
		$args_posts_other = array(
		    'post_type' => 'post', 
		    'posts_per_page' => $count_other_posts,
		    'orderby' => 'date',
		    'order'   => 'DESC'
		);
		$loop_other_posts = new WP_Query( $args_posts_other );

		if($loop_other_posts->have_posts()):
			while ($loop_other_posts->have_posts()): $loop_other_posts->the_post();
				$featured_posts_ids[] = $post->ID;
			endwhile;
		endif;	
		wp_reset_query();
	}
}

if(!isset($filter_category) && !isset($filter_type) && !isset($filter_author)){
	$args_posts = array(
	    'post_type' => 'post', 
	    'posts_per_page' => 3,
	    'orderby' => 'date',
	    'order'   => 'DESC',
	    'post__not_in' => $featured_posts_ids
	);
	$loop_posts = new WP_Query( $args_posts );
}else{
	$args_posts = array(
		'post_type' => 'post', 
		'posts_per_page' => 6,
		'orderby' => 'date',
		'order'   => 'DESC',
		'author_name' => $filter_author,
		'category_name' => $filter_category,
		'post-type' => $filter_type
	);
	$loop_posts = new WP_Query( $args_posts );
}	

$post_ids = $featured_posts_ids;

if($loop_posts->have_posts()):
	while ($loop_posts->have_posts()): $loop_posts->the_post();
		$post_ids[] = $post->ID;
	endwhile;
endif;	
wp_reset_query();

//var_dump($post_ids);

/*
IF Categoty input = empty AND Type input != empty
*/

if( !isset($filter_category) && isset($filter_type) ){

	$args_filtered_posts = array(
		'post_type' => 'post', 
		'posts_per_page' => -1,
		'post-type' => $filter_type
	);
	$loop_filtered_posts = new WP_Query( $args_filtered_posts );

	$filtered_categories = array();
	$i=0; while ($loop_filtered_posts->have_posts()): $loop_filtered_posts->the_post();
		//Category Item
		$cat_item = get_the_category( $post->ID );
		$object_cat = (object) ['name' => $cat_item[0]->name, 'slug' => $cat_item[0]->slug];
		$filtered_categories[$i] = $object_cat;
	$i++; endwhile;
	wp_reset_query();

	if(!empty($filtered_categories)){
		$terms_category = array();
		$terms_category = array_unique($filtered_categories, SORT_REGULAR);
	}
}

/*
IF Categoty input != empty AND Type input = empty
*/

if(isset($filter_category) && !isset($filter_type)){

	$args_filtered_posts = array(
		'post_type' => 'post', 
		'posts_per_page' => -1,
		'category_name' => $filter_category
	);
	$loop_filtered_posts = new WP_Query( $args_filtered_posts );

	$filtered_types = array();
	$i=0; while ($loop_filtered_posts->have_posts()): $loop_filtered_posts->the_post();
		//Type Item
		$type_item = get_the_terms( $post->ID, 'post-type' );
		$object_type = (object) ['name' => $type_item[0]->name, 'slug' => $type_item[0]->slug];
		$filtered_types[$i] = $object_type;
	$i++; endwhile;
	wp_reset_query();

	if(!empty($filtered_types)){
		$terms_types = array();
		$terms_types = array_unique($filtered_types, SORT_REGULAR);
	}
}

/*
IF Categoty input != empty AND Type input != empty
*/

if(isset($filter_category) && isset($filter_type)){

	$args_filtered_posts_cat = array(
		'post_type' => 'post', 
		'posts_per_page' => -1,
		'post-type' => $filter_type
	);
	$loop_filtered_posts_cat = new WP_Query( $args_filtered_posts_cat );

	$filtered_categories = array();
	$i=0; while ($loop_filtered_posts_cat->have_posts()): $loop_filtered_posts_cat->the_post();
		//Category Item
		$cat_item = get_the_category( $post->ID );
		$object_cat = (object) ['name' => $cat_item[0]->name, 'slug' => $cat_item[0]->slug];
		$filtered_categories[$i] = $object_cat;
	$i++; endwhile;
	wp_reset_query();

	if(!empty($filtered_categories)){
		$terms_category = array();
		$terms_category = array_unique($filtered_categories, SORT_REGULAR);
	}

	$args_filtered_posts_type = array(
		'post_type' => 'post', 
		'posts_per_page' => -1,
		'category_name' => $filter_category
	);
	$loop_filtered_posts_types = new WP_Query( $args_filtered_posts_type );

	$filtered_types = array();
	$i=0; while ($loop_filtered_posts_types->have_posts()): $loop_filtered_posts_types->the_post();
		//Type Item
		$type_item = get_the_terms( $post->ID, 'post-type' );
		$object_type = (object) ['name' => $type_item[0]->name, 'slug' => $type_item[0]->slug];
		$filtered_types[$i] = $object_type;
	$i++; endwhile;
	wp_reset_query();

	if(!empty($filtered_types)){
		$terms_types = array();
		$terms_types = array_unique($filtered_types, SORT_REGULAR);
	}
}

?>

<main class="main">
	
	<div class="page-resources">
		<div class="container">
			<h1><?php the_title(); ?></h1>
			
			<div class="filter-posts-box">
				<span class="filter-label">Filter:</span>
				<?php if($terms_category): ?>
					<select id="category-post" onChange="window.location.href=this.value">
						<option selected disabled value="<?php echo add_query_arg( 'topic', 'all-topics' ); ?>">topic</option>
						<?php foreach ($terms_category as $category): ?>
							<option value="<?php echo add_query_arg( 'topic', $category->slug ); ?>" <?php if($category->slug === $filter_category){print('selected');}?>><?php echo $category->name; ?></option>
						<?php endforeach; ?>
					</select>
				<?php endif; ?>
				<?php if($terms_types): ?>
					<select id="type-post" onChange="window.location.href=this.value">
						<option selected disabled value="<?php echo add_query_arg( 'type', 'all-types' ); ?>">type</option>
						<?php foreach ($terms_types as $type): ?>
							<option value="<?php echo add_query_arg( 'type', $type->slug ); ?>" <?php if($type->slug === $filter_type){print('selected');}?>><?php echo $type->name; ?></option>
						<?php endforeach; ?>
					</select>
				<?php endif; ?>
				<form role="search" method="get" id="searchform" class="searchform" action="<?php echo home_url( '/' ); ?>">
					<div class="input-wrapper">
						<input type="text" placeholder="Search" name="s" id="search_resourse_input">
						<?php if(isset($filter_category) && !empty($filter_category)): ?>
							<input type="hidden" value="<?php echo $filter_category; ?>" name="topic" />
						<?php endif;?>	
						<?php if(isset($filter_type) && !empty($filter_type)): ?>
							<input type="hidden" value="<?php echo $filter_type; ?>" name="type" />
						<?php endif;?>
						<input type="submit" value="">
					</div>
				</form>
			</div>
				

			<!---------------------------------- Posts -------------------------------->
			<div class="posts-box resources-posts-box">
				<?php if(!isset($filter_category) && !isset($filter_type) && !isset($filter_author)):
					$i = 0; if($loop_featured_posts->have_posts()): ?>
						<?php while ($loop_featured_posts->have_posts()): $loop_featured_posts->the_post();
							set_query_var('i', $i);
							get_template_part( 'template-parts/post_featured-item', 'item' );
						$i++; endwhile;
						wp_reset_query();
						if($count_featured_posts < 3){
							while ($loop_other_posts->have_posts()): $loop_other_posts->the_post();
								set_query_var('i', $i);
								get_template_part( 'template-parts/post_featured-item', 'item' );
							$i++; endwhile;
							wp_reset_query();
						}
					endif;
				endif; ?>
				<?php if($loop_posts->have_posts()):
					while ($loop_posts->have_posts()): $loop_posts->the_post();
						if($filter_category){
							set_query_var( 'topic_item', $filter_category );
						}
						get_template_part( 'template-parts/post', 'item' );
					endwhile;
				else: ?>
					<p class="not-result-text">Nothing found!</p>	
				<?php endif; ?>		
			</div>

			<?php if (  $loop_posts->max_num_pages > 1 ) : ?>
                <script>
                    let ajaxurl = '<?php echo site_url() ?>/wp-admin/admin-ajax.php';
                    let true_posts = '<?php echo serialize($loop_posts->query_vars); ?>';
                    let current_page = <?php echo (get_query_var('paged')) ? get_query_var('paged') : 0; ?>;
                    let max_pages = '<?php echo $loop_posts->max_num_pages; ?>';
                    let topic = '<?php echo $filter_category; ?>';
                    let post_ids = '<?php echo serialize($post_ids); ?>';
                </script>
                <div class="btn-wrap-center">
                	<div id="loadmore_resources" class="load-more white">Load More</div>
                </div>	
            <?php endif; ?>

            <?php wp_reset_query();?>

		</div>
	</div>

    <?php get_footer(); ?>

</main>