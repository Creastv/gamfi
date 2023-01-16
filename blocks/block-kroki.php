<div class="col-md-12">
<?php if( have_rows('kroki') ): $i = 0 ?>
    <div class="kroki">
    <?php while( have_rows('kroki') ): the_row(); 
        $head= get_sub_field('head');
        $subhead= get_sub_field('subhead');
        $desc= get_sub_field('desc');
        
    ?>
        <?php
           $className = '';
           if($i % 2 == 0) {
            $className = "left";
           } else {
            $className = "right";
           }
        ?>
    
        <div class="krok krok-content <?php echo $className ?> <?php the_sub_field('pozycja'); ?>"  data-aos="fade-up" data-aos-duration="1000">
         <div class="wraper-krok">
            <h3><?php echo $head; ?></h3>
            <?php if (!empty($subhead)) { ?>
            <span><?php echo $subhead; ?></span>
            <?php } ?>
            <?php if (!empty($desc)) { ?>
            <div class="desc">
                <?php echo $desc; ?>
            </div>
            <?php } ?>
         </div>
        </div>
        <div class="krok"></div>
        <div class="krok"></div>
    <?php $i++; endwhile;  ?>
    </div>
<?php endif; ?>
</div>
<?php if( have_rows('ostatni_krok') ): ?>
    <?php while( have_rows('ostatni_krok') ): the_row(); 
        $headLast= get_sub_field('head_os');
        $subheadLast= get_sub_field('subhead_os');
        $descLast= get_sub_field('desc_os');
    ?>
<div class="col-md-12" data-aos="fade-up" data-aos-duration="1000">
    <div class="os-krok">
        <div class="wraper-krok">
             <h3><?php echo $headLast; ?></h3>
            <?php if (!empty($subheadLast)) { ?>
            <span><?php echo $subheadLast; ?></span>
            <?php } ?>
            <?php if (!empty($descLast)) { ?>
            <div class="desc">
                <?php echo $descLast; ?>
            </div>
            <?php } ?>
        </div>
    </div>
</div>
<?php endwhile; ?>
<?php endif; ?>