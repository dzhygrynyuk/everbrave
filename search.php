<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package everbrave
 */

get_header();

$terms_types = get_terms( [
	'taxonomy' => 'post-type',
	'hide_empty' => false,
] );

$terms_category = get_terms( [
	'taxonomy' => 'category',
	'hide_empty' => false,
] );

if(!empty($_GET['s'])){
	$search = $_GET['s'];
}

if(!empty($_GET['topic'])){
	$filter_category = trim($_GET['topic']);
}

if(!empty($_GET['type'])){
	$filter_type = trim($_GET['type']);
}

$args_posts = array(
    'post_type' => 'post', 
    'orderby' => 'date',
    'order'   => 'DESC',
);

if(isset($search) && !empty($search)){
	$args_posts += [ "s" => $search ];
}

if( isset($filter_category) && !isset($filter_type) && $filter_category !== 'all-topics' ){
	$args_posts += [ "category_name" => $filter_category ];
}

if( isset($filter_type) && !isset($filter_category) && $filter_type !== 'all-types' ){
	$args_posts += [ "post-type" => $filter_type ];
}


if(isset($filter_type) && isset($filter_category)){
	$args_posts +=  [ "tax_query" => [
						'relation' => 'AND',
						[
							'taxonomy' => 'category',
							'field' => 'slug',
							'terms' => [ ''.$filter_category.'' ]
						],
						[
							'taxonomy' => 'post-type',
							'field' => 'slug',
							'terms' => [ ''.$filter_type.'' ]
						]] 
					];
}

$loop_posts = new WP_Query( $args_posts );

if( isset($search) ){

	$args_filtered_posts_cat = array(
		'post_type' => 'post', 
		'posts_per_page' => -1,
		'post-type' => $filter_type,
		's' => $search
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
		'category_name' => $filter_category,
		's' => $search
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
			<h1><?php printf( esc_html__( 'Search Results for: %s', 'alphavalley' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
			
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

			<?php if($loop_posts->have_posts()): ?>
				<div class="posts-box resources-posts-box">
					<?php while ($loop_posts->have_posts()): $loop_posts->the_post();
						if($filter_category){
							set_query_var( 'topic_item', $filter_category );
						}
						get_template_part( 'template-parts/post', 'item' );
					endwhile; ?>	
				</div>
			<?php else:?>
				<p class="not-result-text">Sorry, but nothing matched your search terms.</p>	
			<?php endif; ?>

		</div>
	</div>

    <?php get_footer(); ?>

</main>

