<!-- Image Description Repeater -->
<?php if( $layout['title'] || $layout['description'] ): ?>
    <section class="service-text-image-repeater">
        <div class="container">
            <div class="top-content">
                <?php if($layout['title']): ?>
                    <h2><?php echo $layout['title']; ?></h2>
                <?php endif; ?>   
                <?php if($layout['description']): ?>
                    <div class="desc-wrapper">
                        <?php echo apply_filters( 'the_content', $layout['description'] ); ?>
                    </div>
                <?php endif; ?>
            </div>
            <?php if($layout['image_description_list']): ?>
                <div class="imag-text-repeater">
                    <?php foreach ($layout['image_description_list'] as $value): ?>
                        <?php if($value['image'] || $value['description']): ?>
                            <div class="item">
                                <?php if($value['image']): ?>
                                    <img src="<?php echo $value['image']; ?>" alt="Image">
                                <?php endif; ?>
                                <?php if($value['description']): ?>    
                                    <div class="desc_wrp">
                                        <?php echo apply_filters( 'the_content', $value['description'] ); ?>
                                    </div>
                                <?php endif; ?> 
                            </div>
                        <?php endif; ?>    
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>    
        </div>
    </section>
<?php endif;?>