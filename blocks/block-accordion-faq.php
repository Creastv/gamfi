<?php if (have_rows('acordeon')) { ?>
    <div itemscope itemtype="https://schema.org/FAQPage" class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
        <?php $i = 1;
        $faq_a = 0; //add counter for targeting first acccordion element
        while (have_rows('acordeon')) {
            the_row();
            ?>
            <!-- data-aos-duration="1000"  data-aos-delay="<?php echo $i++ ; ?>00"-->
            <div class="panel panel-default" data-aos="fade-up"    itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
                <div class="panel-heading" role="tab" id="heading_<?php echo $faq_a ?>">
                    <h3 itemprop="name" class="panel-title">
                        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" data-target="#collapse_<?php echo $faq_a ?>" href="#collapse_<?php echo $faq_a ?>" aria-expanded="true" aria-controls="collapse_<?php echo $faq_a ?>">
                               <?php the_sub_field('tytul'); ?>
                        </a>
                    </h3>
                </div>
                <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer" id="collapse_<?php echo $faq_a ?>" class="panel-collapse collapse <?php if ($faq_a == 0) echo 'in' ?>" role="tabpanel" aria-labelledby="heading_<?php echo $faq_a ?>">
                    <div itemprop="text" class="panel-body italic">
                        <?php the_sub_field('tresc'); ?>
                    </div>
                </div>
            </div>

            <?php
            $faq_a++;
            $i++;
        }
        ?>
    </div>
<?php } ?>



