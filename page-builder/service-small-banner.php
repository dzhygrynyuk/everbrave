<!-- Small Banner -->
<?php if( $layout['button_type'] == 'standard' && ( $layout['title'] || !empty($layout['buttom'])) ): ?>
    <div class="small_banner-services" style="<?php if($layout['margin_top']){ echo 'margin-top: '.$layout['margin_top'].'px;'; } if($layout['margin_bottom']){ echo 'margin-bottom: '.$layout['margin_bottom'].'px;'; } ?>">
        <div class="container">   
            <div class="small_banner" style="background: <?php echo $layout['bg_color'] ?>">
                <?php if($layout['title']): ?>
                    <p class="description size-<?php echo $layout['font_size']; ?>"><?php echo $layout['title']; ?></p>    
                <?php endif; ?> 
                <?php if(!empty($layout['buttom']) && ($layout['buttom']['title'] && $layout['buttom']['url'])) : ?>
                    <a href="<?php echo $layout['buttom']['url'];?>" class="btn <?php if($layout['color_button'] == 'red'){echo 'btn_red';}else{echo 'btn_white';}?>" target="<?php if($layout['buttom']['target']){print('_blank');}?>"><?php echo $layout['buttom']['title'];?></a>
                <?php endif; ?>
            </div> 
        </div>
    </div>   
<?php elseif($layout['button_type'] == 'hubspot'): ?> 
    <div class="small_banner-services" style="<?php if($layout['margin_top']){ echo 'margin-top: '.$layout['margin_top'].'px;'; } if($layout['margin_bottom']){ echo 'margin-bottom: '.$layout['margin_bottom'].'px;'; } ?>">
        <div class="container">
            <?php echo $layout['hubspot_code']; ?>
        </div>
    </div>
<?php endif;?>
