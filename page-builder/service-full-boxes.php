<!-- More Articles -->
<?php if($layout['boxes']): ?>
    <section class="case-study_more case-study_services">
        <div class="more-articles">
            <?php foreach ($layout['boxes'] as $box): ?>
                <div class="more-articles_item">
                    <div class="more-articles_item_background">
                        <div class="more-articles_item_bgi bgi" style="background-image: url('<?php echo $box['image']; ?>');">
                            <div class="more-articles_item_bgc" style="background-color: <?php echo $box['bg_color']; ?>;"></div>
                        </div>
                    </div>
                    <div class="more-articles_item_content">
                        <div>
                            <?php if($box['title']): ?>
                                <h3 class="title"><?php echo $box['title'] ?></h3>
                            <?php endif; ?>    
                            <?php if($box['subtitle']): ?>
                                <h4 class="subtitle"><?php echo $box['subtitle'] ?></h4>
                            <?php endif; ?>   
                        </div>  
                        <?php if(!empty($box['button']) && ($box['button']['title'] && $box['button']['url'])) : ?>
                            <a href="<?php echo $box['button']['url'];?>" class="btn btn_white" target="<?php if($box['button']['target']){print('_blank');}?>"><?php echo $box['button']['title'];?></a>
                        <?php endif;?>
                    </div>
                </div>
            <?php endforeach ?>
        </div>
    </section>
<?php endif;?>    