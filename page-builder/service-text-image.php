<!-- Client -->
<?php 
$vertical_symbol = '';
$horizontal_symbol = '';
if($layout['vertical_position_type'] == 'bottom'){
   $vertical_symbol = '-'; 
}
if($layout['horizontal_position_type'] == 'right'){
   $horizontal_symbol = '-'; 
}
?>
<?php if($layout['title'] || $layout['image'] || $layout['description'] || ($layout['show_button'] === true && !empty($layout['button']) )): ?>
    <section class="service-text-image image-position-<?php echo $layout['image_position']; ?>" style="<?php if($layout['margin_top']){ echo 'margin-top: '.$layout['margin_top'].'px;'; } if($layout['margin_bottom']){ echo 'margin-bottom: '.$layout['margin_bottom'].'px;'; } ?>">
        <div class="container">
            <?php if($layout['image']): ?>
                <div class="image-box <?php if($layout['top_position'] || $layout['left_position']){echo('position-absolute');}?>">
                    <img src="<?php echo $layout['image']; ?>" alt="Image" style="<?php 
                        if($layout['left_position'] || $layout['top_position']){ echo 'transform: ';
                            if($layout['left_position']){ echo 'translateX('.$horizontal_symbol.$layout['left_position'].'px)';}
                            if($layout['top_position']){ echo 'translateY('.$vertical_symbol.$layout['top_position'].'px)';}
                            echo '; ';
                        }
                        if(!empty($layout['max_width_img'])){ echo 'max-width: '.$layout['max_width_img'].'px;'; }
                    ?>">    
                </div>
            <?php endif; ?>
            <div class="content-box <?php if(!$layout['image']){echo 'no-image';} ?>">
                <?php if($layout['title']): ?>
                    <h2><?php echo $layout['title']; ?></h2>
                <?php endif; ?>   
                <?php if($layout['description']): ?>
                    <div class="desc-wrapper">
                        <?php echo apply_filters( 'the_content', $layout['description'] ); ?>
                    </div>
                <?php endif; ?>

                <?php if( $layout['show_button'] === true && $layout['button_type'] == 'standard' && !empty($layout['button']) && ($layout['button']['title'] && $layout['button']['url']) ): ?>
                    <a href="<?php echo $layout['button']['url'];?>" class="btn btn_black" target="<?php if($layout['button']['target']){print('_blank');}?>"><?php echo $layout['button']['title'];?></a>
                <?php elseif( $layout['show_button'] === true && $layout['button_type'] == 'hubspot' && !empty($layout['hubspot_code']) ): ?>
                    <?php echo $layout['hubspot_code']; ?>
                <?php endif;?>

            </div>
        </div>
    </section>
<?php endif;?>