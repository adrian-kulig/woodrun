<div id="content">
    <div>
        <aside class="sidebar">
            <?php dynamic_sidebar('Trener-online'); ?>
        </aside>

        <div class="sidebar-ankieta ankieta">
            <h3><?php _e('Wypełnij ankietę - daj nam znać co Cię interesuje z naszej oferty', 'woodrun'); ?></h3>
        </div>


        <?php
        $cur_lang = pll_current_language();
        $parentCategoryID = 113;
        if($cur_lang =='en') {
            $parentCategoryID = 181;
        }

        $categories = get_categories(
            array(
                'parent' => $parentCategoryID,
                'hide_empty' => 0,
                'orderby' => 'menu_order',
                'order' => 'DESC'
            )
        );

        $sortedCategories = array();
        foreach($categories as $category){
            $order = get_field('kolejnosc',$category);
            if(!$order){
                if(!empty($sortedCategories)){
                    $order = min(array_keys($sortedCategories)) - 1;
                }else{
                    $order = 0 ;
                }
            }
            $sortedCategories[$order] = $category;
        }
        krsort($sortedCategories);
        $categories = $sortedCategories;


        ?>
        <div id="offers" class="trener-online-content">

            <div class="breadcrumbs"><span></span></div>

            <div id="categories-list" class="step step-0">
                <h2 class="section-title"><?php _e('Wybierz typ pakietu', 'woodrun'); ?></h2>
                <input type="button" class="next-step-btn" id="btn-step-0" data-step="step-0" value="<?php _e('Przejdź dalej', 'woodrun'); ?>">

                <div class="categories-content">
                    <div class="row">
                        <?php foreach($categories as $category):?>
                            <?php
                            $long_desc = get_field('long_description',$category);
                            ?>
                            <div class="col-md-4 col-sm-12">
                                <div class="category-item box">
                                    <div class="text-content">
                                        <h2><?php echo $category->name;?></h2>
                                        <span class="description"><?php echo $category->description;?></span>
                                        <?php if($long_desc):?>
                                            <div class="read-more-content-div">
                                                <span class="read-more-btn"><?php _e('Dowiedz się więcej...', 'woodrun'); ?></span>
                                                <div class="long-description-text"><?php echo $long_desc;?></div>
                                            </div>
                                        <?php endif;?>
                                        <span class="select-step" data-name="<?php echo $category->name;?>" data-id="<?php echo $category->term_id; ?>"><?php _e('Wybierz', 'woodrun'); ?> </span>
                                    </div>
                                </div>
                            </div>

                        <?php endforeach;?>
                    </div>
                </div>
            </div>



            <div id="categories-list" class="step step-1">
                <h2 class="section-title"><?php _e('Wybierz kategorię', 'woodrun'); ?></h2>
                <input type="button" class="prev-step-btn" id="btn-prev-step-0" data-back-to-step="step-0" value="<?php _e('Cofnij', 'woodrun'); ?>">
                <input type="button" class="next-step-btn" id="btn-step-1" data-step="step-1" value="Przejdź dalej">

                <div class="categories-content"></div>
            </div>

            <div class="item-type-list step step-2">
                <input type="button" class="prev-step-btn" id="btn-prev-step-1" data-back-to-step="step-1" value="<?php _e('Cofnij', 'woodrun'); ?>">
                <input type="button" class="next-step-btn" id="btn-step-2" data-step="step-2" value="<?php _e('Przejdź dalej', 'woodrun'); ?>">

                <div class="types">
                </div>
            </div>

            <div class="item-duration-content step step-3">
                <div class="duration-items">
                    <input type="button" class="prev-step-btn" id="btn-prev-step-2" data-back-to-step="step-1" value="<?php _e('Cofnij', 'woodrun'); ?>">
                    <input type="button" class="next-step-btn" id="btn-step-3" data-step="step-2" value="<?php _e('Przejdź dalej', 'woodrun'); ?>">

                    <div class="row">
                        <div class="col-md-4">
                            <div class="box">
                                <div class="text-content">
                                    <h2><?php _e('30 dni', 'woodrun'); ?></h2> <span class="select-step" data-step="3" data-duration="30 dni"><?php _e('Wybierz', 'woodrun'); ?></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="box">
                                <div class="text-content">
                                <h2><?php _e('90 dni', 'woodrun'); ?></h2> <span class="select-step" data-step="3" data-duration="90 dni"><?php _e('Wybierz', 'woodrun'); ?></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="box">
                                <div class="text-content">
                                    <h2><?php _e('180 dni', 'woodrun'); ?></h2><span class="select-step" data-step="3" data-duration="180 dni"><?php _e('Wybierz', 'woodrun'); ?></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="box">
                                <div class="text-content">
                                    <h2><?php _e('365 dni', 'woodrun'); ?></h2><span class="select-step" data-step="3" data-duration="365 dni"><?php _e('Wybierz', 'woodrun'); ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>



        </div>



    </div>
</div>


<div id="ankieta-modal" class="modal">
    <div class="modal-content">
        <div class="modal-header">
            <span class="close">&times;</span>
            <h2><?php _e('Wypełnij ankietę, abyśmy mogli jak najlepiej dobrać i zaproponować Ci ofertę','woodrun'); ?></h2>
        </div>
        <div class="modal-body">
            <?= do_shortcode('[contact-form-7 id="4693" title="Ankieta"]'); ?>
        </div>
    </div>
</div>


<div id="additional-information" class="modal">
    <div class="modal-content">
        <div class="modal-header">
            <span class="close">&times;</span>
            <h2><?php _e('Dodatkowe informacje', 'woodrun'); ?></h2>
        </div>
        <div class="modal-body"></div>
    </div>
</div>