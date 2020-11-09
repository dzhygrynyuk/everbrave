<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package everbrave
 */

$thumbnail_url = '';
$post_id = get_the_id();
if(has_post_thumbnail()){
    $thumbnail_url = get_the_post_thumbnail_url();
}else{
    $thumbnail_url = get_template_directory_uri().'/assets/img/default-thumbnail.jpg';
}

$post_item_categories = get_the_category();
$post_item_type = get_the_terms( $post_id, 'post-type' );

foreach ($post_item_categories as $key => $post_item){
    if('featured' === $post_item->slug){
        if($key > 0){
            $cat_tmp = $post_item_categories[$key];
            unset($post_item_categories[$key]);
            array_unshift($post_item_categories, $cat_tmp);
        }
    }
}

?>

<div class="item <?php if($i === 0){ print('full-featured'); }else{ print('featured'); }?>">
    <a href="<?php echo get_post_link( $post_id ); ?>" <?php echo get_post_target( $post_id ); ?> <?php echo get_post_nofollow( $post_id ); ?>><img src="<?php echo $thumbnail_url; ?>" alt="Image"></a>
    <div class="content-box">
        <?php if($post_item_categories): ?>
            <ul class="tags">
                <?php foreach ($post_item_categories as $post_item_category): ?>
                    <li><a href="/resources/?topic=<?php echo $post_item_category->slug; ?>"><?php echo $post_item_category->name; ?></a></li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>    
        <a href="<?php echo get_post_link( $post_id ); ?>" class="title" <?php echo get_post_target( $post_id ); ?> <?php echo get_post_nofollow( $post_id ); ?>><?php the_title(); ?></a>
        <div class="bottom-box">
            <?php if( $post_item_type[0]->term_id != 41 && $post_item_type[0]->term_id != 42):?> 
                <?php if($i === 0):?>
                    <div class="date-user-info">
                        <?php everbrave_posted_by();?>
                        <span class="v-libe"></span>
                        <span class="date"><?php the_date('F j, Y'); ?></span>
                    </div>    
                <?php else: ?>   
                    <span class="date"><?php the_date('F j, Y'); ?></span>
                <?php endif; ?>
            <?php endif; ?>     
            <a href="<?php echo get_post_link( $post_id ); ?>" class="left-arrow" <?php echo get_post_target( $post_id ); ?> <?php echo get_post_nofollow( $post_id ); ?>></a>
        </div>
    </div>
</div>

