<?php get_header(); ?>
<?php $fields = get_fields(); ?>
<?php $options = get_fields('option'); ?>

<main class="main page-services">

    <!-- Banner -->
    <section class="services-banner"
        style="background-color: <?php echo $fields['banner_background_color']; ?>">
        <div class="services-banner_bgi bgi"
            style="background-image: url('<?php echo $fields['banner_background_image']; ?>');">
        </div>
        <div class="left-right-line"></div>

        <div class="container">
            <h2 class="title">
                <?php echo $fields['banner_title']; ?>
            </h2>
        </div>

        <?php if($fields['banner_bottom_logo']): ?>
            <img class="banner-bottom-logo" src="<?php echo $fields['banner_bottom_logo']; ?>" alt="Image">
        <?php endif; ?>    

    </section>

    <!-- Breadcrumbs -->
    <div class="breadcrumbs-section">
        <div class="container">
            <div class="breadcrumbs">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="item">Home</a>
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="item">How We Can Help</a>
                <span class="item active"><?php the_title(); ?></span>
            </div>
        </div>
    </div>
    
    <!-- Content -->
    <?php foreach ($fields['services_layouts'] as $layout):
        switch ($layout['acf_fc_layout']) {
            case 'text_image':
                include 'page-builder/service-text-image.php';
                break;
            case 'full_boxes':
                include 'page-builder/service-full-boxes.php';
                break;   
            case 'color_block':
                include 'page-builder/service-small-banner.php';
                break;     
            case 'posts':
                include 'page-builder/service-posts.php';
                break;  
            case 'column_information':
                include 'page-builder/service-column-information.php';
                break;  
            case 'colored_text':
                include 'page-builder/service-colored-text.php';
                break;   
            case 'circles_section':
                include 'page-builder/service-circles-section.php';
                break;  
            case 'image_description_repeater':
                include 'page-builder/service-image-text-repeater.php';
                break;        
        }        
    endforeach; ?>

</main>

<?php get_footer(); ?>