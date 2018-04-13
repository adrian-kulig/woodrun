<div id="content">
    <div>
        <aside class="sidebar">
            <?php if(is_page('40-2')): ?>
                <?php dynamic_sidebar('Offers 40+'); ?>
                <?php
                $args = 'cat=22';
                ?>
            <?php else: ?>
                <?php dynamic_sidebar('Offers'); ?>
                <form action="/" method="get">
                    <fieldset>
                        <label>Dyscyplina</label>
                        <?php wp_dropdown_categories('child_of=85&hide_empty=0&show_option_all=All'); ?>
                        <label>Miesiąc</label>
                        <?php
                        $args = 'cat=85,-22';
                        //$args = array('cat' => '4,-22', 'orderby' => 'post_title', 'order' => 'ASC' );
                        if(is_category()){
                            $e = explode(',', (isset($_GET['cat']) ? $_GET['cat'] : get_query_var('cat')));
                            if(count($e) == 1)
                                $args = 'cat=-22,' . $e[0];
                            else {
                                $args = array( 'category__and' => $e );
                                global $wp_query;
                                $wp_query->set('cat', $e[1]);
                            }
                        }
                        wp_dropdown_categories('child_of=94&hide_empty=0&show_option_all=All');
                        ?>
                        <input type="hidden" id="cat" name="cat" value="" />
                        <input type="submit" value="" />
                    </fieldset>
                </form>
            <?php endif; ?>
        </aside>
        <div id="offers">
            <?php if(!is_page('40-2')): ?>
                <nav>
                    <ul>
                        <li<?php if(is_page(2296)): echo ' class="current-cat"'; endif; ?>><a href="<?php echo get_permalink(2296); ?>" title="All offers">All offers</a></li>
                        <?php wp_list_categories('child_of=85&title_li=&hide_empty=0'); ?>
                    </ul>
                </nav>
            <?php endif; ?>
            <?php
            $the_query = new WP_Query($args);
            $result_html = array();
            while ( $the_query->have_posts() ) {

                $the_query->the_post();
                $date = false;
                $sport = false;

                foreach (wp_get_post_categories($post->ID) as $c) {
                    $cat = get_category($c);
                    if ($cat->parent == 5) $date = $cat;
                    if ($cat->parent == 85) $sport = $cat;
                }
                $meta_date = explode('-', get_post_meta($post->ID, 'Data', true));
                $meta_date[1] = explode('.', $meta_date[1]);
                $meta_time = mktime(0, 0, 0, $meta_date[1][1], $meta_date[0], $meta_date[1][2]);
                $offer = '<li class="offer-entry black-entry">
        <a href="' . the_permalink(true) . '" title="Przejdź do oferty">
            <article>
                <header>
                    <h3>' . the_title('', '', false) . ', <br />' . get_post_meta($post->ID, 'Data', true) . '</h3>
                    <h2>' . $sport->name . '</h2>
                </header>
                ' . the_excerpt(true) . '
                <span class="stempel">' .get_post_meta($post->ID, 'Wolne miejsca', true). '</span>
                <span class="more">przejdź do oferty</span>
            </article>
        </a>
    </li>';

                $result_html[$meta_time] = $offer;
            }
            krsort($result_html);

            wp_reset_postdata();
            ?>
            <ul>
                <?= implode('',$result_html) ?>
            </ul>
        </div>
    </div>
</div>