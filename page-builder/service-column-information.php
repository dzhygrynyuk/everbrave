<!-- Relation Management -->
<?php if($layout['columns'] || $layout['title'] || $layout['description']): ?>
    <section class="relation-management">
        <div class="container">
            <div class="relation-management_block">
                <?php if($layout['columns']): ?>
                    <div class="wrap">
                        <?php foreach ($layout['columns'] as $column): ?>
                            <div class="relation-management_item">
                                <?php if($column['title']): ?>
                                    <h3 class="title"><?php echo $column['title']; ?></h3>
                                <?php endif; ?>
                                <?php if($column['description']): ?>
                                    <div class="relation-management_list">
                                        <?php echo apply_filters( 'the_content', $column['description'] ); ?>
                                    </div>
                                <?php endif; ?>     
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>

                <?php if($layout['title'] || $layout['description']): ?>
                    <div class="relation-management_text">
                        <?php if($layout['title']): ?>
                            <h3 class="title"><?php echo $layout['title']; ?></h3>
                        <?php endif; ?>  
                        <?php if($layout['description']): ?> 
                            <p class="desc"><?php echo $layout['description']; ?></p>
                        <?php endif; ?>    
                    </div>
                <?php endif; ?>    
            </div>
        </div>
    </section>
<?php endif; ?>    