<!-- Small Banner -->
<?php if($layout['description']): ?>
    <div class="colored-text-services" >
        <div class="container">
            <?php if($layout['description']): ?>
                <p class="text" style="color: <?php echo $layout['text_color']; ?>"><?php echo $layout['description']; ?></p>    
            <?php endif; ?>
            <?php if($layout['bottom_text']): ?>
                <span class="bottom-text"><?php echo $layout['bottom_text']; ?></span>
            <?php endif; ?>    
        </div>
    </div>   
<?php endif;?>