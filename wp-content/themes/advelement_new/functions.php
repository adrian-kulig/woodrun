<?php
ini_set('upload_max_size', '96M');
ini_set('post_max_size', '96M');
ini_set('max_execution_time', '500');


require_once "post-types/logotypes.php";
require_once "post-types/competition-files.php";
require_once "post-types/users-account.php";
require_once "post-types/exercises-repository.php";
require_once "post-types/suplements.php";

load_theme_textdomain('woodrun', get_template_directory() . '/languages');


add_action('do_feed_facebook-9lBM3', 'feed_facebook', 10, 1);

function feed_facebook()
{
    load_template(TEMPLATEPATH . '/feed-facebook.php');
}

add_theme_support('post-thumbnails');
add_image_size('167x148', 167, 148, true);
add_image_size('780xX', 780, 0, true);


add_editor_style();
register_sidebar(array(
    'name' => 'Dyscyplina',
    'id' => 'd',
    'description' => 'Panel do edycji dyscypliny na stronie głównej',
    'before_widget' => '<aside id="sport">',
    'after_widget' => '</aside>',
    'before_title' => '<h3>',
    'after_title' => '</h3>
',
));
register_sidebar(array(
    'name' => 'Adventure Snow Team',
    'id' => 'ast',
    'description' => 'Panel do edycji przycisku na stronie ofert letnich',
    'before_widget' => '',
    'after_widget' => '',
    'before_title' => '<h3>',
    'after_title' => '</h3>
',
));
register_sidebar(array(
    'name' => 'Adventure Bike Team',
    'id' => 'abt',
    'description' => 'Panel do edycji przycisku na stronie ofert zimowych',
    'before_widget' => '',
    'after_widget' => '',
    'before_title' => '<h3>',
    'after_title' => '</h3>
',
));
register_sidebar(array(
    'name' => 'Stopka',
    'id' => 's',
    'description' => 'Panel do edycji boxów w stopce',
    'before_widget' => '            <div class="footer-entry black-entry">
            <article>',
    'after_widget' => '                </article>
        </div>',
    'before_title' => '<h2>',
    'after_title' => '</h2>
',
));
register_sidebar(array(
    'name' => 'Reklama',
    'id' => 'm',
    'description' => 'Panel do edycji tekstu i reklamy w stopce',
    'before_widget' => '',
    'after_widget' => '',
    'before_title' => '<h3>',
    'after_title' => '</h3>
',
));
register_sidebar(array(
    'name' => 'Kontakt',
    'id' => 'k',
    'description' => 'Panel do edycji danych kontaktowych',
    'before_widget' => '',
    'after_widget' => '',
    'before_title' => '<h3>',
    'after_title' => '</h3>
',
));
register_sidebar(array(
    'name' => 'Klienci',
    'id' => 'c',
    'description' => 'Panel do edycji opinii klientów',
    'before_widget' => '',
    'after_widget' => '',
    'before_title' => '<h3>',
    'after_title' => '</h3>
',
));
register_sidebar(array(
    'name' => 'Blog',
    'id' => 'b',
    'description' => 'Panel do edycji opisu na blogu',
    'before_widget' => '',
    'after_widget' => '',
    'before_title' => '<h3>',
    'after_title' => '</h3>
',
));
register_sidebar(array(
    'name' => 'Blog-en',
    'id' => 'b-en',
    'description' => 'Panel do edycji opisu na blogu angielskim',
    'before_widget' => '',
    'after_widget' => '',
    'before_title' => '<h3>',
    'after_title' => '</h3>
',
));

register_sidebar(array(
    'name' => 'Ekspres_narty',
    'id' => 'ex',
    'description' => 'Panel do edycji opisu w zakładce Ekspres narty',
    'before_widget' => '',
    'after_widget' => '',
    'before_title' => '<h3>',
    'after_title' => '</h3>
',
));
register_sidebar(array(
    'name' => 'Przygoda',
    'id' => 'pr',
    'description' => 'Panel do edycji opisu w zakładce Stwórz swoją aktywną przygodę',
    'before_widget' => '',
    'after_widget' => '',
    'before_title' => '<h3>',
    'after_title' => '</h3>
',
));
register_sidebar(array(
    'name' => 'Adventure_dla_Ciebie',
    'id' => 'adv',
    'description' => 'Panel do edycji opisu w zakładce Adventure_dla_Ciebie',
    'before_widget' => '',
    'after_widget' => '',
    'before_title' => '<h3>',
    'after_title' => '</h3>
',
));

register_sidebar(array(
    'name' => 'Oferty',
    'id' => 'o',
    'description' => 'Panel do edycji opisu ofert',
    'before_widget' => '',
    'after_widget' => '',
    'before_title' => '<h3>',
    'after_title' => '</h3>
',
));
register_sidebar(array(
    'name' => 'Trener-online',
    'id' => 'tr',
    'description' => 'Panel do edycji opisu trener-online',
    'before_widget' => '',
    'after_widget' => '',
    'before_title' => '<h3>',
    'after_title' => '</h3>
',
));
register_sidebar(array(
    'name' => 'Powder_alarm',
    'id' => 'p',
    'description' => 'Panel do edycji zakładki',
    'before_widget' => '',
    'after_widget' => '',
    'before_title' => '<h3>',
    'after_title' => '</h3>
',
));
register_sidebar(array(
    'name' => 'Freshmail',
    'id' => 'fr',
    'description' => 'Panel do wstawienia freshmaila',
    'before_widget' => '',
    'after_widget' => '',
    'before_title' => '<h3>',
    'after_title' => '</h3>
',
));
register_sidebar(array(
    'name' => 'Rezerwacja',
    'id' => 'r',
    'description' => 'Panel do edycji danych do rezerwacji',
    'before_widget' => '',
    'after_widget' => '',
    'before_title' => '<h3>',
    'after_title' => '</h3>
',
));
register_sidebar(array(
    'name' => 'Galeria',
    'id' => 'g',
    'description' => 'Panel do edycji tekst w galerii',
    'before_widget' => '',
    'after_widget' => '',
    'before_title' => '<h3>',
    'after_title' => '</h3>
',
));
register_sidebar(array(
    'name' => 'Ankieta',
    'id' => 'r',
    'description' => 'Panel do edycji tekstu do wypełnienia ankiety',
    'before_widget' => '',
    'after_widget' => '',
    'before_title' => '<h3>',
    'after_title' => '</h3>
',
));

function adv_column($atts, $content = null, $tag = null)
{
    $content = do_shortcode($content);
    return '<div class="column"><p>' . $content . '
</div>';
}

add_shortcode('column', 'adv_column');

function adv_button($atts, $content = null, $tag = null)
{
    $a = shortcode_atts(array(
        'page' => '',
    ), $atts);
    $page = get_page_by_title($a['page']);
    $link = get_permalink($page->ID);
    return '<a href="' . $link . '"><button class="advbutton">' . $a['page'] . '</button></a>';
}

add_shortcode('advbutton', 'adv_button');

function adv_el($atts, $content = null, $tag = null)
{
    if (preg_match('#watch\?v=([a-zA-Z0-9\-_]+)#', $content, $url)) {
        return '<div class="frame"><a href="' . $content . '"><img src="http://img.youtube.com/vi/' . $url[1] . '/1.jpg" alt="video" /></a></div>';
    } else {
        if (preg_match('#vimeo.com/(\d+)#', $content, $url)) {
            $data = unserialize(file_get_contents('http://vimeo.com/api/v2/video/' . $url[1] . '.php'));
            return '<div class="frame"><a href="' . $content . '"><img src="' . $data[0]['thumbnail_medium'] . '" alt="video" /></a></div>';
        } else {
            if (preg_match('#/wp-content/uploads/#', $content)) {
                return '<div class="frame"><a href="' . $content . '"><img src="' . str_replace('.jpg', '-150x150.jpg',
                        $content) . '" alt="image" /></a></div>';
            } else {
                return '<div class="frame"><a href="' . $content . '"><img src="' . $content . '" alt="image" /></a></div>';
            }
        }
    }
}

add_shortcode('element', 'adv_el');

function adv_authors()
{
    global $wpdb;
    $authors = $wpdb->get_results("SELECT ID, user_nicename from $wpdb->users ORDER BY display_name");
    return $authors;
}

function adv_us($atts, $content = null, $tag = null)
{
    $return = '
    <ul id="authors">';
    $authors = adv_authors();
    foreach ($authors as $author) {
        if ($author->ID == 1) {
            continue;
        }
        preg_match('#src="([^"]+)"#', get_avatar($author->ID), $src);
        $author = get_userdata($author->ID);
        $return .= '<li>
<h3>' . $author->first_name . ' ' . $author->last_name . '</h3>
<p class="photo"><img src="' . str_replace('.thumbnail.', '.', end($src)) . '" alt="2" width="330" height="245" /></p>
<p>' . get_the_author_meta('interests', $author->ID) . '</p>
<p class="author-description">' . $author->description . '</p>
</li>';
    }
    $return .= '</ul>';
    return $return;
}

add_shortcode('us', 'adv_us');

function adv_friends($atts, $content = null, $tag = null)
{
    $return = '<div id="friends"><ul><li><h3>' . $content . '</h3></li>';
    $return .= wp_list_bookmarks('echo=0&categorize=0&title_li=&title_before=&title_after=&orderby=id&category_name=Przyjaciele');
    $return .= '</ul></div>';
    return $return;
}

add_shortcode('friends', 'adv_friends');

function fb_add_custom_user_profile_fields($user)
{
    ?>
    <h3>Dodatkowe informacje</h3>
    <table class="form-table">
        <tr>
            <th>
                <label for="interests">Zainteresowania</label>
            </th>
            <td>
                <input type="text" name="interests" id="interests"
                       value="<?php echo esc_attr(get_the_author_meta('interests', $user->ID)); ?>"
                       class="regular-text"/><br/>
                <span class="description">Wprowadź swoje zainteresowania, oddzielając je przecinkiem (np. narty, snowboard)</span>
            </td>
        </tr>
    </table>
<?php }

function fb_save_custom_user_profile_fields($user_id)
{
    if (!current_user_can('edit_user', $user_id)) {
        return false;
    }
    update_usermeta($user_id, 'interests', $_POST['interests']);
}

add_action('show_user_profile', 'fb_add_custom_user_profile_fields');
add_action('edit_user_profile', 'fb_add_custom_user_profile_fields');
add_action('personal_options_update', 'fb_save_custom_user_profile_fields');
add_action('edit_user_profile_update', 'fb_save_custom_user_profile_fields');

function adv_comment($comment, $args, $depth)
{
$GLOBALS['comment'] = $comment;
?>
<li>
    <article id="comment-<?php comment_ID(); ?>" class="comment">
        <header>
            <h3><?php echo get_comment_meta(get_comment_ID(), 'destination', true); ?></h3>
        </header>
        <div class="comment-content"><?php comment_text(); ?></div>
        <footer>
            <span><?php comment_author(); ?></span>
            <time pubdate
                  datetime="<?php echo get_comment_time('c'); ?>"><?php echo adv_date(get_comment_time('U')); ?></time>
        </footer>
    </article>
    <?php
    }

    function adv_commentfields($fields)
    {
        $fields['author'] = '<p><input name="author" type="text" value="Imię i nazwisko" /></p>';
        $fields['destination'] = '<p><input name="destination" type="text" value="Gdzie byłeś?" /></p>';

        return $fields;
    }

    function adv_commentfield()
    {
        ?>
        <p><input name="destination" type="text" value="Gdzie byłeś?"/></p>
        <?php
    }

    add_filter('comment_form_default_fields', 'adv_commentfields');
    add_action('comment_form_logged_in_after', 'adv_commentfield');
    add_action('comment_form_after_fields', 'adv_commentfield');

    function save_comment_meta_data($comment_id)
    {
        $destination = $_POST['destination'];
        update_comment_meta($comment_id, 'destination', $destination);
    }

    add_action('comment_post', 'save_comment_meta_data');

    function adv_date($u)
    {
        return str_replace(
            array('.01.', '.02.', '.03.', '.04.', '.05.', '.06.', '.07.', '.08.', '.09.', '.10.', '.11.', '.12.'),
            array(
                ' styczeń ',
                ' luty ',
                ' marzec ',
                ' kwiecień ',
                ' maj ',
                ' czerwiec ',
                ' lipiec ',
                ' sierpień ',
                ' wrzesień ',
                ' październik ',
                ' listopad ',
                ' grudzień '
            ),
            date('j.m.Y', $u)
        );
    }

    function adv_excerptmore($more)
    {
        return '...';
    }

    add_filter('excerpt_more', 'adv_excerptmore');

    function adv_excerptlength($length)
    {
        return 25;
    }

    add_filter('excerpt_length', 'adv_excerptlength', 999);

    function adv_home_background()
    {
        the_post();
        preg_match_all('#src="([^"]+)"#', get_the_content(), $matches);
        shuffle($matches[1]);
        //echo ' style="background-image: url(' . $matches[1][array_rand($matches[1])] . ')"';
        ?>
        <ul id="slider-main">
            <div class="slider-carousel owl-carousel">
                <?php
                foreach ($matches[1] as $match) {
                    echo '<div class="item-slider" style="background-image: url(' . $match . ');"></div>';
                }
                ?>
            </div>
        </ul>

        <?php

//    echo '<ul id="slider">';
//    foreach ($matches[1] as $match) {
//        echo '<li style="background-image: url(' . $match . ');"></li>';
//    }
//    echo '</ul>';
    }

    function adv_permalink()
    {
        /**
         * Filter the display of the permalink for the current post.
         *
         * @since 1.5.0
         *
         * @param string $permalink The permalink for the current post.
         */
        return esc_url(apply_filters('the_permalink', get_permalink()));
    }

    function adv_excerpt()
    {

        /**
         * Filter the displayed post excerpt.
         *
         * @since 0.71
         *
         * @see get_the_excerpt()
         *
         * @param string $post_excerpt The post excerpt.
         */
        return apply_filters('the_excerpt', get_the_excerpt());
    }

    class Adv_Walker extends Walker_Nav_Menu
    {
        function start_el(&$output, $item, $depth, $args)
        {
            global $_cat;

            if (array_search('current-menu-item', $item->classes) ||
                (isset($_cat) && $_cat->category_parent == 4 && $item->object_id == 2 ||
                    (isset($_cat) && $_cat->category_parent == 113 && $item->object_id == 4645))
            ) {
                $current = 'current';
            } elseif (in_category(11) && $item->title == 'Aktualności') {
                $current = 'current';
            } elseif (in_category(66) && $item->title == 'Ekspres narty') {
                $current = 'current';
            } elseif (in_category(67) && $item->title == 'Stwórz swoją aktywną przygodę') {
                $current = 'current';
            } elseif (in_category(76) && $item->title == 'Adventure dla Ciebie') {
                $current = 'current';
            } elseif (is_category(5)) {
                if (in_category(99) && $item->title == 'Zima') {
                    $current = 'current';
                } elseif (in_category(101) && $item->title == 'Lato') {
                    $current = 'current';
                }
            } elseif (is_category(101) && $item->title == 'Lato') {
                $current = 'current';
            }

            //elseif (!in_category(array(11,66,67,76)) && $item->title == 'Oferty') $current = 'current';

            $output .= '<li class="' . $current . '">';
            $attributes = '';

            !empty($item->attr_title)
            and $attributes .= ' title="' . esc_attr($item->attr_title) . '"';
            !empty($item->target)
            and $attributes .= ' target="' . esc_attr($item->target) . '"';
            !empty($item->xfn)
            and $attributes .= ' rel="' . esc_attr($item->xfn) . '"';
            !empty($item->url)
            and $attributes .= ' href="' . esc_attr($item->url) . '"';

            $title = apply_filters('the_title', $item->title, $item->ID);


            $item_output = $args->before
                . "<a$attributes>"
                . $title
                . '</a>';

            $output .= apply_filters(
                'walker_nav_menu_start_el'
                , $item_output
                , $item
                , $depth
                , $args
            );

        }
    }

    function add_my_var($public_query_vars)
    {
        $public_query_vars[] = 'oferta';
        return $public_query_vars;
    }

    function get_parent_category()
    {
        global $wp_query;
        $category = $wp_query->get_queried_object();
        if ($category->category_parent) {
            return $category->category_parent;
        } else {
            return $category->cat_ID;
        }
    }

    add_filter('query_vars', 'add_my_var');

    add_filter('widget_text', 'do_shortcode');
    register_nav_menu('nav', 'Navigation');
    remove_filter('the_content', 'wpautop');
    add_filter('the_content', 'wpautop', 99);
    add_filter('the_content', 'shortcode_unautop', 100);

    function get_post_custom_x($id)
    {

        global $wpdb;

        $querystr = "SELECT wposts.ID, wpostmeta.meta_ID, wpostmeta.meta_key, wpostmeta.meta_value " .
            "FROM $wpdb->posts wposts, $wpdb->postmeta wpostmeta " .
            "WHERE wposts.ID = wpostmeta.post_id AND wposts.ID = " . $id . " " .
            "ORDER BY wpostmeta.meta_id ASC";

        $pageposts = $wpdb->get_results($querystr, OBJECT);
        $return = array();

        foreach ($pageposts AS $key => $val) {
            $return[$val->meta_key][] = $val->meta_value;
        }

        return $return;
    }

    add_action('init', 'wpdocs_custom_init');

    /**
     * Add excerpt support to pages
     */
    function wpdocs_custom_init()
    {
        add_post_type_support('post', 'page-attributes');
    }

    function sortByOrder($a, $b)
    {
        return $b['sortNumber'] - $a['sortNumber'];
    }


    add_action('wp_ajax_order_offer', 'order_offer');
    add_action('wp_ajax_nopriv_order_offer', 'order_offer');
    function order_offer()
    {

        $userData = $_POST['data'];
        $voucher = $_POST['voucher'];
        $message = '';

        $postCategories = get_the_category($voucher['post']);
        $sendMailAnkieta = false;

        foreach ($postCategories as $postCategory) {
            if ($postCategory->name == 'Optimum' || $postCategory->name == 'Fit' || $postCategory->name == 'Zdrowie') {
                $sendMailAnkieta = true;
            };
        }

        $message .= 'Witamy, <br> Potwierdzamy złożenie przez Ciebie zamówienia w dniu ' . current_time('Y-m-d H:i:s') . '.<br><br>';
        $message .= 'Szczegóły zamówienia: <br><br>';
        $message .= '<b>Dane osoby zamawiającej:</b> <br> <br>';
        if ($userData['company-nip'] && $userData['company-regon']) {
            $message .= 'Nazwa firmy : ' . $userData['company-name'] . '<br>';
        }
        $message .= 'Imię i Nazwisko : ' . $userData['person-name'] . '<br>';
        $message .= 'Email : ' . $userData['person-email'] . '<br>';
        $message .= 'Telefon : ' . $userData['person-phone'] . '<br>';
        $message .= 'Adres : ' . $userData['person-address'] . '<br>';
        $message .= 'Kod pocztowy : ' . $userData['person-zipcode'] . '<br>';
        $message .= 'Miejscowość : ' . $userData['person-zipcode-country'] . '<br>';
        if ($userData['company-nip'] && $userData['company-regon']) {
            $message .= 'NIP : ' . $userData['company-nip'] . '<br>';
            $message .= 'REGON : ' . $userData['company-regon'] . '<br>';
        }


//    Nazwa produktu i opis zawartości
        $message .= '<br><br><b>Nazwa produktu i opis zawartości: </b> ' . $voucher["name"] . '  <br>';
        $message .= '<b>Cena:</b> ' . $voucher["price"] . '<br>';
        $message .= '<b>Czas trwania umowy:</b> ' . $voucher["duration"] . '<br><br><br>';

//    dodatkowe dane (zakwaterowanie,data pobuty etc.)
        if (isset($userData['offer_term']) && isset($userData['offer_room'])) {
            $message .= '<b> Informacje:</b> <br><br> ';
            $message .= '<b> Data pobytu: </b>' . $userData['offer_term'] . '<br>';
            $message .= '<b> Zakwaterowanie: </b>' . $userData['offer_room'] . '<br>';
            $message .= '<b> Za dodatkową opłatą chcę, aby do mojego zakwaterowania nie była przydzielona inna osoba: </b>' . $userData['offer_accept_other_person'] . '<br>';
            $message .= '<b> Proszę o przedstawienie mi także oferty dla osoby towarzyszącej z zakresem świadczeń: noclegi i wyżywienie: </b>' . $userData['offer_for_other_person'] . '<br><br><br>';
        }


        $message .= '<b> Dane do przelewu:</b> <br><br> ';

        $message .= 'Anna Makuch <br>';
        $message .= 'Koszarawa 497<br>';
        $message .= '34-332 Koszarawa<br>';
        $message .= 'numer konta ING: 14 1050 1214 1000 0022 9478 5213<br>';
        $message .= 'Tytuł płatności: Nazwa produktu, Data, Imię, Nazwisko<br><br><br>';


//        TRESCI ZGOD PRZEDSTAWIAMY
        if($_POST['rulesText']){
            $message .= $_POST['rulesText'];
        }

        $message .= '<br><br>Dziękujemy za okazane nam zaufanie.<br><br>';

        $message .= 'W przypadku oferty specjalnej, potwierdzenie i finalna wysokość kwoty do zapłacenia zostanie Ci przesłana przez nas niezwłocznie po uwzględnieniu przez nas tej informacji w generowanym dla Ciebie Potwierdzeniu Zawarcia Umowy, które otrzymasz drogą emailową. Prosimy poczekaj na ten dokument chwilę - tam otrzymasz komplet informacji - i po jego otrzymaniu dokonaj wymaganej płatności.<br><br>';

        $message .= 'Woodrun';


        $userEmail = $userData['person-email'];
        $adminEmail = 'biuro@woodrun.pl';


        $subject = 'Potwierdzenie zamówienia';
        $body = $message;
        $headers = array('Content-Type: text/html; charset=UTF-8');

        $status = 400;
        try {

            if (!$userData['offer_term']) {
                $days = preg_replace('/[^0-9]/', '', $voucher["duration"]);
                $now = date('Y-m-d');
                $nextDate = date('Y-m-d', strtotime($now . '+' . $days . ' days'));

                $createOrder = createOrderUser(array(
                    'user_name' => $userData['person-name'],
                    'user_email' => $userData['person-email'],
                    'user_phone' => $userData['person-phone'],
                    'offer_id' => $voucher['post']->ID,
                    'offer_name' => $voucher['name'],
                    'offer_price' => $voucher['price'],
                    'offer_start_date' => $now,
                    'offer_end_date' => $nextDate,
                    'user_notes' => 'Czas trwania : ' . $voucher["duration"],
                ));

                if (!empty($createOrder)) {
                    if ($createOrder['status'] == 200) {
                        $link = get_permalink($createOrder['userid']);
                        notifyCreatedAccountOrder(array(
                            'user_email' => $userData['person-email'],
                            'link' => $link,
                            'id' => $createOrder['userid']
                        ));
                    }
                }
            }
            wp_mail($userEmail, $subject, $body, $headers);
            wp_mail($adminEmail, $subject, $body, $headers);
            if ($sendMailAnkieta) {
                sendMailQuestionnaire($userEmail);
            }
            $status = 200;
        } catch (Exception $e) {
            $status = $e->getMessage();
        }

        wp_send_json_success(array('status' => $status));
    }

    add_action('wp_ajax_competition_admin_mail', 'competition_admin_mail');
    add_action('wp_ajax_nopriv_competition_admin_mail', 'competition_admin_mail');
    function competition_admin_mail()
    {

        $postData = $_POST['data'];
        $message = '';
        $userEmail = 'kulig.adrian1@gmail.com';

        $message .= '<b>Dziękujemy za nadesłanie zgłoszenia do konkursu Bieganie - moja pasja - filmy</b> <br>';

        $message .= '<b> Dane osobowe: </b><br>';

        foreach ($postData as $data) {
            $name = $data['name'];
            $value = $data['value'];
            if ($data['name'] == 'Imie') {
                $name = 'Imię';
            }
            if ($data['name'] == 'Email') {
                $userEmail = $data['value'];
            }
            if ($data['name'] == 'Zgoda-regulamin') {
                $value = 'Wyrażam zgodę na postanowienia <a target="_blank" href="/wp-content/themes/advelement_new/assets/KonkursWoodrunFILM-Bieganie-moja-pasja.pdf">Regulaminu Konkursu “BIEGANIE - MOJA PASJA - filmy”</a> ';
            }
            if ($data['name'] == 'Zgoda-dane') {
                $value = 'Wyrażam zgodę na przetwarzanie moich danych osobowych i na wykorzystanie przesłanych filmów oraz ich opisów do celów promocyjnych przez Organizatora';
            }

            $message .= $name . ' : ' . $value . '<br>';
        }

        $message .= '<br><br>Informujemy, że odbiór ewentualnej nagrody będzie możliwy tylko po wcześniejszym polajkowaniu naszej strony na Facebooku <br>';
        $message .= 'Komisja Konkursowa będzie przy wyborze zwycięzcy brała pod uwagę wyłącznie te filmy, które uzyskają co najmniej 1 polubienie od innych (filmy będę wystawione jako galeria na Fb)<br><br>';

        $message .= '<br><br>Dziękujemy za okazane nam zaufanie.<br><br>';


        $message .= 'Woodrun';


        $adminEmail = 'biuro@woodrun.pl';

        $subject = 'Potwierdzenie zgłoszenia do konkursu';
        $body = $message;
        $headers = array('Content-Type: text/html; charset=UTF-8', 'Cc: biuro@woodrun.pl');

        $status = 400;
        try {
            wp_mail($userEmail, $subject, $body, $headers);
//        wp_mail( $adminEmail, $subject, $body, $headers);
            $status = 200;
        } catch (Exception $e) {
            $status = $e->getMessage();
        }

        wp_send_json_success(array('status' => $status));
    }


    function sendMailQuestionnaire($userEmail)
    {
        $message = '';
        $message .= 'Witamy, <br><br>
   Poniżej przedstawiamy zasady współpracy z naszym dietetykiem w ramach pakietu Woodrun. <br><br>';

        $message .= '1. W trakcie procesu zamówienia pakietu, udzielona została przez Pana/Panią następująca zgoda: 
“Oświadczam, że jestem osobą całkowicie zdrową i nie mam zdiagnozowanych przez lekarza żadnych chorób, 
które mogłyby wpłynąć na moje zdrowie w trakcie realizacji planu żywieniowego wraz z treningiem”. <br>';

        $message .= '2. Warunkiem koniecznym rozpoczęcia współpracy z dietetykiem jest wypełnienie przez 
Klienta Woodrun ankiety dietetycznej, którą otrzymuje w trakcie procesu zamówienia pakietu. 
<b>Link do ankiety: </b> ' . get_home_url() . '/#ankieta-dietetyk <br>';

        $message .= '3. Po przesłaniu ankiety, w ciągu 3 dni roboczych dietetyk przygotuję dla Klienta dietę. 
Uwaga: w przypadku stwierdzenia braku informacji zwrotnej od dietetyka, prosimy o maila na adres 
biuro@woodrun.pl z informacją, że dieta nie dotarła, niekiedy mail trafia do spamu. <br>';

        $message .= '4. Klient ma prawo do zadania 1 krótkiego maila z dopytaniem dietetyka o ewentualne 
niejasności, diety są przygotowywane z zachowaniem jak najwyższej staranności, aby informacje były 
zrozumiałe i jednoznaczne.';


        $subject = 'Link do ankiety dietetycznej i zasady współpracy z dietetykiem';
        $body = $message;
        $headers = array(
            'Content-Type: text/html; charset=UTF-8',
            'BCC: biuro@woodrun.pl',
        );

        try {
            wp_mail($userEmail, $subject, $body, $headers);
            $status1 = 200;
        } catch (Exception $e) {
            $status1 = $e->getMessage();
        }

    }


    // wyświetlanie tekstu do max X znaków
    function short_text_after_word($string, $wordsreturned)
    {
        $retval = $string;
        $string = preg_replace('/(?<=\S,)(?=\S)/', ' ', $string);
        $string = str_replace("\n", " ", $string);
        $array = explode(" ", $string);
        if (count($array) <= $wordsreturned) {
            $retval = $string;
        } else {
            array_splice($array, $wordsreturned);
            $retval = implode(" ", $array) . " ...";
        }
        return $retval;
    }

    function short_text_after_characters($string, $wordsreturned)
    {
        if (strlen($string) > $wordsreturned) {
            $string = substr($string, 0, $wordsreturned) . '...';
        }
        return $string;
    }


    //ladowanie filmu konkursowego
    add_action('wp_ajax_render_competition_movie', 'render_competition_movie');
    add_action('wp_ajax_nopriv_render_competition_movie', 'render_competition_movie');
    function render_competition_movie()
    {
        $movieID = $_POST['data'];
        $post = get_post($movieID);

        $movie = get_field('movie', $post);
        $name = get_field('name', $post);
        $description = get_field('krotki_opis', $post);

        $html = '';
        $html .= '
        <div class="user-data">
            <h3 class="name">' . $name . '</h3>
        </div>
        <div class="user-movie">
            <iframe src="' . $movie . '" frameborder="0" allowfullscreen></iframe>
        </div>
        <div class="user-description">
            <span class="description">' . $description . '</span>
        </div>';

        wp_send_json_success(array('status' => 200, 'html' => $html));
    }


    //ladowanie cwiczen do modala
    add_action('wp_ajax_render_exercise_box', 'render_exercise_box');
    add_action('wp_ajax_nopriv_render_exercise_box', 'render_exercise_box');
    function render_exercise_box()
    {
        $exerciseID = $_POST['data'];
        $exercise = get_post($exerciseID);


        $name = get_field('nazwa', $exercise);
        $description = get_field('opis', $exercise);
        $type = get_field('typ_pliku', $exercise);
        $file = null;

        $html = '';

        $html .= '
    <div class="box">
    <h3 class="name">' . $name . '</h3>
    <span class="description">' . $description . '</span>';

        switch ($type) {
            case 'Youtube':
                $file = get_field('youtube_link', $exercise);
                $html .= '
                <div class="responsive--video">
                    <iframe width="560" height="315" src="' . $file . '" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                </div>';
                break;
            case 'Film':
                $file = get_field('filmik_wlasny', $exercise);
                $html .= '  
                                <video width="100%" height="auto" controls>
                                    <source src="' . $file . '" type="video/mp4">
                                </video>';
                break;
            case 'Grafika':
                $file = get_field('zdjecie_wlasne', $exercise);
                $html .= '<img class="img-responsive" src="' . $file . '">';
                break;
            case 'PDF':
                $file = get_field('dokument_pdf', $exercise);
                $html .= '
                    <div class="responsive--video">
                        <iframe width="560" height="315" src="'.$file.'" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                    </div>';
                break;
            case 'Dokument':
                $file = get_field('dokument_wlasny', $exercise);
                $html .= '
                    <a href="'.$file.'" download="dokument1">Pobierz plik</a>';
                break;
            case 'Link':
                $file = get_field('link' ,$exercise);
                $link_text = get_field('link_text' ,$exercise);
                $html .= '<a href="'.$file.'" target="_blank">'.$link_text.'</a>';
        }

        $html .= '</div>';

        wp_send_json_success(array('status' => 200, 'html' => $html));
    }


    //sprawdzanie danych logowania
    add_action('wp_ajax_exercise_login', 'exercise_login');
    add_action('wp_ajax_nopriv_exercise_login', 'exercise_login');
    function exercise_login()
    {
        $pass = $_POST['pass'];
        $email = $_POST['email'];
        $postID = $_POST['post_id'];


        $status = 400;
        $checkPass = substr(md5($email.$postID), 0, 5);
        $html ='';

        if ($checkPass == $pass) {
            $status = 200;
            $html = '';

            session_start();
            $_SESSION['user']= $postID;


            $exercises = get_field('lista_ćwiczeń',$postID);

            if($exercises){
                foreach ($exercises as $exercise){
                    $name = get_field('nazwa', $exercise);
                    $description = get_field('opis', $exercise);
                    $type = get_field('typ_pliku', $exercise);
                    $file = null;


                    $html .=
                        '<div class="col-md-4 movie-box exercise-box">
                    <div class="box">
                    <div class="short-description">
                        <h5 class="description-name">'.$name.'</h5>
                        <span class="description-text">'.short_text_after_characters($description,150).'</span>
                    </div>';

                    $html .='<div class="content-text">';

                    switch($type){
                        case 'Youtube':
                            $file = get_field('youtube_link', $exercise);
                            $html .= '
                                <div class="responsive--video">
                                    <iframe width="560" height="315" src="' . $file . '" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                                </div>';
                            break;
                        case 'Film':
                            $file = get_field('filmik_wlasny', $exercise);
                            $html .= '  
                                <video width="100%" height="auto" controls>
                                    <source src="' . $file . '" type="video/mp4">
                                </video>';
                            break;
                        case 'Grafika':
                            $file = get_field('zdjecie_wlasne', $exercise);
                            $html .= '<img class="img-responsive" src="' . $file . '">';
                            break;
                        case 'PDF':
                            $file = get_field('dokument_pdf', $exercise);
                            $html .= '
                    <div class="responsive--video">
                        <iframe width="560" height="315" src="'.$file.'" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                    </div>';
                            break;
                        case 'Dokument':
                            $file = get_field('dokument_wlasny', $exercise);
                            $html .= '
                    <a href="'.$file.'" download="dokument1">Pobierz plik</a>';
                            break;
                        case 'Link':
                            $file = get_field('link' ,$exercise);
                            $link_text = get_field('link_text' ,$exercise);
                            $html .= '<a href="'.$file.'" target="_blank">'.$link_text.'</a>';
                    }
                    $html .='</div>';

                    $html .='<div class="more-info">
                            <a class="show-more" data-id="'.$exercise->ID.'">Zobacz więcej</a>
                        </div>
                    </div>
                </div>
                ';

                }
            }else{
                $html .= ' <div class="col-md-12 empty-exercises"><h4>W Twojej bibliotece ćwiczeń nie ma żadnych filmów.</h4></div>';
            }
        };

        wp_send_json_success(array('status' => $status, 'html' => $html));


    }

    function createOrderUser($userData = null)
    {

        $response = array('status' => 400, 'message' => "Błąd");

        $post_id = wp_insert_post(array(
            'post_type' => 'users-account',
            'post_title' => $userData['user_email'],
            'post_content' => '',
            'post_status' => 'publish',
        ));

        if ($post_id) {
            update_field('field_5adf59e6b3cb7', $userData['user_name'], $post_id);
            update_field('field_5ae0a38760f14', $userData['user_phone'], $post_id);
            update_field('field_5adf5a0ab3cb8', $userData['user_email'], $post_id);
            update_field('field_5adf5a0db3cb9', $userData['offer_name'], $post_id);
            update_field('field_5adf5a13b3cba', $userData['offer_start_date'], $post_id);
            update_field('field_5adf5a1bb3cbb', $userData['offer_end_date'], $post_id);
            update_field('field_5adf5a24b3cbc', $userData['offer_price'], $post_id);
            update_field('field_5adf5a2bb3cbd', $userData['user_notes'], $post_id);

            $response = array(
                'status' => '200',
                'userid' => $post_id
            );
        }

        return $response;
    }


    //Wysłanie maila ifnormujacego o stworzeniu konta
    function notifyCreatedAccountOrder($userData)
    {
        $message = '';

        $message .= '<b>Twoje konto dostępowe do biblioteki materiałów instruktażowych Woodrun zostało założone.</b><br><br>';
        $message .= '<b> Dane logowania: </b><br>';
        $message .= '<b> Link: </b> <a href="' . $userData['link'] . '">' . $userData['link'] . '</a> <br>';
        $message .= '<b> Login: </b> ' . $userData['user_email'] . ' <br>';
        $message .= '<b> Hasło: </b> ' . substr(md5($userData['user_email'].$userData['id']), 0, 5) . ' <br><br><br>';

        $message .= 'Woodrun';


        $subject = 'Dostęp do biblioteki materiałów instruktażowych Woodrun';
        $body = $message;
        $headers = array('Content-Type: text/html; charset=UTF-8', 'Cc: biuro@woodrun.pl');

        $status = 400;
        try {
            wp_mail($userData['user_email'], $subject, $body, $headers);
            $status = 200;
        } catch (Exception $e) {
            $status = $e->getMessage();
        }
        return $status;
    }



    add_action('wp_ajax_search_post_by_meta', 'search_post_by_meta');
    add_action('wp_ajax_nopriv_search_post_by_meta', 'search_post_by_meta');
    function search_post_by_meta(){
        global $wpdb;
        $status = 400;
        $link = '';
        $data = $_POST['data'];

        if($data['type'] == 'false'){
            $args = array(
                'post_type' => 'post',
                'posts_per_page' => -1,
                'cat' => $data['catID'],
                'meta_query' => array(
                    'relation' => 'AND',
                    array(
                        'key' => 'suplementy',
                        'compare' => '=', // works!
                        'value' => '' // This is ignored, but is necessary...
                    ),
                    array(
                        'key' => 'voucher_duration',
                        'compare' => '=', // works!
                        'value' => $data['duration']
                    ),
                )
            );

            $query = new WP_Query($args);
            if($query->posts[0]){
                $link = get_permalink($query->posts[0]->ID);
                $status = 200;
                wp_send_json_success(array('status' => $status, 'link' => $link));
            }
        }


        $sql = "
        SELECT   wp_posts.* FROM wp_posts  LEFT JOIN wp_term_relationships ON (wp_posts.ID = wp_term_relationships.object_id) 
        INNER JOIN wp_postmeta ON ( wp_posts.ID = wp_postmeta.post_id )  INNER JOIN wp_postmeta AS mt1 ON ( wp_posts.ID = mt1.post_id ) 
        WHERE 1=1  AND ( wp_term_relationships.term_taxonomy_id IN (".$data['catID'].")) 
        AND ( ( wp_postmeta.meta_key = 'suplementy' AND (wp_postmeta.meta_value) LIKE '%".$data['type']."%' )) 
        AND ( mt1.meta_key = 'voucher_duration' AND mt1.meta_value = '".$data['duration']."' )
        AND wp_posts.post_type = 'post' AND (wp_posts.post_status = 'publish' OR wp_posts.post_status = 'future' OR wp_posts.post_status = 'draft' OR wp_posts.post_status = 'pending' OR wp_posts.post_status = 'private') GROUP BY wp_posts.ID ORDER BY wp_posts.post_date DESC";

        $results = $wpdb->get_results($sql);
        if(!empty($results)){
            $link = get_permalink($results[0]->ID);
            $status = 200;
        }else{
            $status = 400;
        }

        wp_send_json_success(array('status' => $status, 'link' => $link));
    }

    add_action('wp_ajax_get_category_suplements', 'get_category_suplements');
    add_action('wp_ajax_nopriv_get_category_suplements', 'get_category_suplements');
    function get_category_suplements(){
        $status = 200;
        $suplementsHTML = '';

        $categoryID = $_POST['data']['catID'];
        $categoryParentName = $_POST['data']['parentCatName'];

        $cat = get_category($categoryID);
        $suplements = get_field('suplementy',$cat);

        $moreText = 'Dowiedz się więcej';
        $selectText = 'Wybierz';
        $suplementNameField = 'suplement_name';
        $suplementShortDescField = 'suplement_short_description';
        $suplementLongDescField = 'suplement_long_description';
        if(pll_current_language() == 'en'){
            $selectText = 'Select';
            $moreText = 'Read more...';
            $suplementNameField = 'suplement_name_en';
            $suplementShortDescField = 'suplement_short_description_en';
            $suplementLongDescField = 'suplement_long_description_en';
        }

//        DLA KATEGORII BIEGANIE
        if($categoryParentName == 'Bieganie'){
            $suplementsHTML .='<div class="row">';
            $suplementsHTML .= '
            <div class="col-md-4">
                <div class="box not-colored">
                    <div class="text-content">
                        <h2>Pakiet standard <br>(<span style="font-size:12px;">bez suplementacji</span>)</h2> 
                        <span></span>
                        <span></span>
                        <span class="select-step" data-step="2" data-name="Brak" data-type="false">'.$selectText.'</span> 
                    </div>
                </div>
                <div class="days-container">
                    <div class="col-md-4 day-item" data-duration="90 dni" data-name="Brak" data-type="false">90 dni</div>
                    <div class="col-md-4 day-item" data-duration="180 dni" data-name="Brak" data-type="false">180 dni</div>
                    <div class="col-md-4 day-item" data-duration="365 dni" data-name="Brak" data-type="false">365 dni</div>
                </div>
            </div>';

            foreach ($suplements as $suplement){
                $name = get_field($suplementNameField,$suplement);
                $short_desc = get_field($suplementShortDescField,$suplement);
                $logn_desc = get_field($suplementLongDescField,$suplement);
                $suplementsHTML .= '
            <div class="col-md-4">
                <div class="category-item box not-colored">
                    <div class="text-content">
                        <h2>'.$name.'</h2> 
                        <span class="description">'.$short_desc.'</span>
                        <div class="read-more-content-div">
                            <span class="read-more-btn">'.$moreText.'</span>
                            <div class="long-description-text">'.$logn_desc.'</div>
                        </div>
                        <span class="select-step" data-step="2" data-name="'.$name.'" data-type="'.$suplement->ID.'">'.$selectText.'</span> 
                    </div>
                </div>
                <div class="days-container">
                    <div class="col-md-4 day-item" data-duration="90 dni" data-name="'.$name.'" data-type="'.$suplement->ID.'">90 dni</div>
                    <div class="col-md-4 day-item" data-duration="180 dni" data-name="'.$name.'" data-type="'.$suplement->ID.'">180 dni</div>
                    <div class="col-md-4 day-item" data-duration="365 dni" data-name="'.$name.'" data-type="'.$suplement->ID.'">365 dni</div>
                </div>
            </div>';
            }
        }
        /*
         * ROBIMY DLA CAŁEJ PARENT CATEGORY PRZEJSCIE Z DANEJ KATEGORII DO PRODUKTU, bo wszędzie mamy 180 dni
         */
        else if($categoryParentName == 'Zdrowie'){
            $suplementsHTML .='<div class="row">';
            $suplementsHTML .= '
            <div class="col-md-4">
                <div class="box not-colored item-instant-package" data-duration="180 dni" data-name="Brak" data-type="false">
                    <div class="text-content">
                        <h2>Pakiet standard <br>(<span style="font-size:12px;">bez suplementacji</span>)</h2> 
                        <span></span>
                        <span></span>
                        <span class="select-step day-item" data-step="2" data-duration="180 dni" data-name="Brak" data-type="false">'.$selectText.'</span> 
                    </div>
                </div>
            </div>';

            foreach ($suplements as $suplement){
                $name = get_field($suplementNameField,$suplement);
                $short_desc = get_field($suplementShortDescField,$suplement);
                $logn_desc = get_field($suplementLongDescField,$suplement);
                $suplementsHTML .= '
            <div class="col-md-4">
                <div class="category-item box item-instant-package not-colored" data-duration="180 dni" data-name="'.$name.'" data-type="'.$suplement->ID.'">
                    <div class="text-content">
                        <h2>'.$name.'</h2> 
                        <span class="description">'.$short_desc.'</span>
                        <div class="read-more-content-div">
                            <span class="read-more-btn">'.$moreText.'</span>
                            <div class="long-description-text">'.$logn_desc.'</div>
                        </div>
                        <span class="select-step" data-step="2" data-duration="180 dni" data-name="'.$name.'" data-type="'.$suplement->ID.'">'.$selectText.'</span> 
                    </div>
                </div>
            </div>';
            }
        }


        $suplementsHTML .= "</div>";
        wp_send_json_success(array('status' => $status, 'data' => $suplementsHTML));
    }



//    POBRANIE CHILDÓW KATEGORII
    add_action('wp_ajax_get_sub_categories', 'get_sub_categories');
    add_action('wp_ajax_nopriv_get_sub_categories', 'get_sub_categories');
    function get_sub_categories(){
        $status = 200;
        $subCategoriesHtml = '';

        $categoryParentID = $_POST['data'];

        $categories = get_categories(
            array(
                'parent' => $categoryParentID,
                'hide_empty' => 0,
                'orderby' => 'menu_order',
                'order' => 'DESC'
            )
        );

        $moreText = 'Dowiedz się więcej';
        if(pll_current_language() == 'en'){
            $moreText = 'Read more...';
        }


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

        $subCategoriesHtml .='<div class="row">';

        foreach($categories as $category){
            $longDesc = get_field('long_description',$category);

            if($category->name == 'Start'){
                $subCategoriesHtml .='
                <div class="col-md-4">
                    <div class="category-item box item-instant-package" data-id="'.$category->term_id.'" data-duration="30 dni" data-name="Brak" data-type="false">
                        <div class="text-content">
                        <h2>'.$category->name.'</h2>
                        <span class="description">'.$category->description.'</span>';
                    if($longDesc){
                        $subCategoriesHtml .= ' 
                            <div class="read-more-content-div">
                                <span class="read-more-btn">'.$moreText.'</span>
                                <div class="long-description-text">'.$longDesc.'</div>
                            </div>';
                    }
                    $subCategoriesHtml .= '<span class="select-step" data-name="'.$category->name.'" data-id="'.$category->term_id.'">Wybierz </span>
                        </div>
                    </div>
                </div>';
            }else{
                $subCategoriesHtml .='
                <div class="col-md-4">
                    <div class="category-item box">
                        <div class="text-content">
                        <h2>'.$category->name.'</h2>
                        <span class="description">'.$category->description.'</span>';
                    if($longDesc){
                        $subCategoriesHtml .= ' 
                            <div class="read-more-content-div">
                                <span class="read-more-btn">'.$moreText.'</span>
                                <div class="long-description-text">'.$longDesc.'</div>
                            </div>';
                    }
                    $subCategoriesHtml .= '<span class="select-step" data-name="'.$category->name.'" data-id="'.$category->term_id.'">Wybierz </span>
                        </div>
                    </div>
                </div>';
            }

        }

        $subCategoriesHtml .= "</div>";


        wp_send_json_success(array('status' => $status, 'data' => $subCategoriesHtml));

    }

?>


