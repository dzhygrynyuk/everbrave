<!-- Circles -->
<?php if($layout['circles_list']): 
    $count_circles = count($layout['circles_list']); ?>
    <section class="circles-section">
        <div class="container">
            <div class="circles-box circles_count_<?php echo $count_circles; ?>">
                <?php foreach ($layout['circles_list'] as $circle): ?>
                    <div class="item">
                        <div class="circle">
                            <div class="img" style="background-image: url(<?php echo $circle['image']; ?>);"></div>
                            <!-- <img src="<?php echo $circle['image']; ?>" alt="Image"> -->
                        </div>
                        <h4 class="title"><?php echo $circle['title']; ?></h4>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
<?php endif;?>