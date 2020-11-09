<!--
    Template name: Growth Stories
-->

<?php get_header(); ?>
<?php $fields = get_fields(); ?>
<?php $options = get_fields('option'); ?>

<main class="main page-growth-stories">

    <section class="growth-stories">
        <div class="container">

            <div class="growth-stories_top">
                <h2 class="title">
                    <?php echo $fields['growth_stories_title']; ?>
                </h2>
                <?php echo $fields['growth_stories_description']; ?>
            </div>

            <?php
                $args = array(
                    'post_type'      => 'case_study',
                    'post_status'    => 'publish',
                    'posts_per_page' => 3,
                    'order'          => 'ASC',
                    'post_parent'    => 0
                );
                $caseStudy = new WP_Query($args);
            ?>

            <div class="wrap">
                <?php if($caseStudy->have_posts()) : ?>
                    <?php while ($caseStudy->have_posts()): $caseStudy->the_post(); ?>

                        <?php $caseStudyFields = get_fields($post -> ID); ?>
                        
                        <a href="<?php the_permalink(); ?>" class="growth-stories_item bgi"
                            style="background-image: url('<?php echo $caseStudyFields['banner_background_image']; ?>');">
                            <div class="growth-stories_item_overlay">
                                <div class="growth-stories_item_overlay_bgc"
                                    style="background-color: <?php echo $caseStudyFields['case_study_background_color']; ?>;">
                                </div>
                                <div class="growth-stories_item_wrap">
                                    <?php echo $caseStudyFields['case_study_description']; ?>
                                    <span class="growth-stories_item-subtitle">
                                        <?php echo $caseStudyFields['case_study_subtitle']; ?>
                                    </span>
                                    <span class="growth-stories_item-title">
                                        <?php echo $caseStudyFields['case_study_title']; ?>
                                    </span>
                                    <svg class="growth-stories_item-arrow" width="110" height="47" viewBox="0 0 110 47">
                                        <defs>
                                            <clipPath id="clip-path">
                                            <rect id="Rectangle_585" data-name="Rectangle 585" width="110" height="47" transform="translate(-1714 -12741)" fill="none" stroke="#707070" stroke-width="1"/>
                                            </clipPath>
                                        </defs>
                                        <g id="Arrow" transform="translate(1714 12741)" clip-path="url(#clip-path)">
                                            <g id="Group_355" data-name="Group 355">
                                            <g id="Group_353" data-name="Group 353" transform="translate(-1770.495 -13087.98)">
                                                <line id="Line_69" data-name="Line 69" x2="103.404" transform="translate(59.495 370.345)" fill="none" stroke="#fff" stroke-linecap="round" stroke-miterlimit="10" stroke-width="3"/>
                                                <line id="Line_70" data-name="Line 70" x2="19.365" y2="19.365" transform="translate(143.534 350.98)" fill="none" stroke="#fff" stroke-linecap="round" stroke-miterlimit="10" stroke-width="3"/>
                                                <line id="Line_71" data-name="Line 71" y1="19.365" x2="19.365" transform="translate(143.534 370.345)" fill="none" stroke="#fff" stroke-linecap="round" stroke-miterlimit="10" stroke-width="3"/>
                                            </g>
                                            <g id="Group_354" data-name="Group 354" transform="translate(-1900.495 -13087.98)">
                                                <line id="Line_69-2" data-name="Line 69" x2="103.404" transform="translate(59.495 370.345)" fill="none" stroke="#fff" stroke-linecap="round" stroke-miterlimit="10" stroke-width="3"/>
                                                <line id="Line_70-2" data-name="Line 70" x2="19.365" y2="19.365" transform="translate(143.534 350.98)" fill="none" stroke="#fff" stroke-linecap="round" stroke-miterlimit="10" stroke-width="3"/>
                                                <line id="Line_71-2" data-name="Line 71" y1="19.365" x2="19.365" transform="translate(143.534 370.345)" fill="none" stroke="#fff" stroke-linecap="round" stroke-miterlimit="10" stroke-width="3"/>
                                            </g>
                                            </g>
                                        </g>
                                    </svg>
                                </div>
                            </div>
                        </a>

                    <?php endwhile; ?>
                <?php endif; ?>
            </div>

            <?php if (  $caseStudy->max_num_pages > 1 ) : ?>
                <script>
                    var ajaxurl = '<?php echo site_url() ?>/wp-admin/admin-ajax.php';
                    var true_posts = '<?php echo serialize($caseStudy->query_vars); ?>';
                    var current_page = <?php echo (get_query_var('paged')) ? get_query_var('paged') : 1; ?>;
                    var max_pages = '<?php echo $caseStudy->max_num_pages; ?>';
                </script>
                <div class="btn-wrap-center">
                    <div id="true_loadmore" class="load-more">Load MORE</div>
                </div>    
            <?php endif; ?>

            <!-- Small Banner -->
            <?php $smallBanner = $fields['small_banner']; ?> 
            <?php if( $smallBanner['button_type'] == 'standard' && ($smallBanner['description'] || !empty($layout['link'])) ): ?>
                <div class="small_banner_wrp">
                    <div class="small_banner"
                        style="background: <?php echo $smallBanner['background_color'] ?>">
                        <p class="description"><?php echo $smallBanner['description'] ?></p>
                        <a href="<?php echo $smallBanner['link']['url'] ?>" class="btn btn_white"><?php echo $smallBanner['link']['title'] ?></a>
                        <img src="<?php echo $smallBanner['icon'] ?>" alt="Icon"  class="small_banner-icon">
                        <img class="small_banner-figure" src="<?php echo get_template_directory_uri();?>/assets/img/small-banner-figure.svg" alt="Figure">
                    </div>
                </div>    
            <?php elseif( $smallBanner['button_type'] == 'hubspot'): ?> 
                <div class="small_banner_wrp">
                    <?php echo $smallBanner['hubspot_code']; ?>
                </div>    
            <?php endif; ?>
        
        </div>
    </section>

</main>

<?php get_footer(); ?>