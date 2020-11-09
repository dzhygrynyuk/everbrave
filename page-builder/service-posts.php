<!-- Posts -->
<?php 

$post_variant = $layout['post_variant'];

if($post_variant == 'category'){
    $select_category_id = $layout['post_category'];

    $args_posts = array(
        'post_type' => 'post', 
        'posts_per_page' => 3,
        'orderby' => 'date',
        'order'   => 'DESC',
        'tax_query' => array(
            array(
                'taxonomy' => 'category',
                'field'    => 'id',
                'terms'    => $select_category_id,
            ),
        ),
    );   
}elseif($post_variant == 'select'){
    $posts_ids = array();
    if(!empty($layout['posts'])){
        foreach ($layout['posts'] as $post) {
            if(!empty($post['item'])){
                array_push($posts_ids, $post['item']);
            }
        }
    }
    $args_posts = array(
        'post_type' => 'post', 
        'posts_per_page' => 3,
        'orderby' => 'date',
        'order'   => 'DESC',
        'post__in' => $posts_ids,
    );
}


$loop_posts = new WP_Query( $args_posts );
if($loop_posts->have_posts()): ?>
    <section class="home-posts-sec services-posts">
        <div class="container"> 
            <?php if($layout['title']): ?>
                <h2><?php echo $layout['title'] ;?></h2>
            <?php else: ?>    
                <h2>Related Articles</h2>
            <?php endif; ?>    
            <div class="posts-box">
                <?php while ($loop_posts->have_posts()): $loop_posts->the_post();
                    get_template_part( 'template-parts/post', 'item' );
                endwhile; ?>    
            </div>
        </div>
    </section>      
<?php endif; ?>