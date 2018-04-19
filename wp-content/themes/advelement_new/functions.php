<?php

require_once "post-types/logotypes.php";
require_once "post-types/competition-files.php";


load_theme_textdomain( 'woodrun', get_template_directory().'/languages' );



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
function wpdocs_custom_init() {
    add_post_type_support( 'post', 'page-attributes' );
}

function sortByOrder($a, $b)
{
    return $b['sortNumber'] - $a['sortNumber'];
}


add_action('wp_ajax_order_offer', 'order_offer');
add_action('wp_ajax_nopriv_order_offer', 'order_offer');
function order_offer(){

    $userData = $_POST['data'];
    $voucher = $_POST['voucher'];
    $message = '';

    $postCategories = get_the_category($voucher['post']);
    $sendMailAnkieta = false;

    foreach ($postCategories as $postCategory){
        if($postCategory->name == 'Optimum' || $postCategory->name == 'Fit' || $postCategory->name == 'Zdrowie'){
            $sendMailAnkieta = true;
        };
    }

    $message .= 'Witamy, <br> Potwierdzamy złożenie przez Ciebie zamówienia w dniu '. current_time('Y-m-d H:i:s').'.<br><br>';
    $message .= 'Szczegóły zamówienia: <br><br>';
    $message .= '<b>Dane osoby zamawiającej:</b> <br> <br>';
    if($userData['company-nip'] && $userData['company-regon']) {
        $message .= 'Nazwa firmy : ' . $userData['company-name'] . '<br>';
    }
    $message .= 'Imię i Nazwisko : ' . $userData['person-name'] . '<br>';
    $message .= 'Email : ' . $userData['person-email'] . '<br>';
    $message .= 'Telefon : ' . $userData['person-phone']  . '<br>';
    $message .= 'Adres : ' . $userData['person-address']  . '<br>';
    $message .= 'Kod pocztowy : ' . $userData['person-zipcode']  . '<br>';
    $message .= 'Miejscowość : ' . $userData['person-zipcode-country']  . '<br>';
    if($userData['company-nip'] && $userData['company-regon']) {
        $message .= 'NIP : ' . $userData['company-nip'] . '<br>';
        $message .= 'REGON : ' . $userData['company-regon'] . '<br>';
    }

//    $mayArray = array(
//        'user_name' =>$userData['person-name'],
//        'user_email' =>$userData['person-email'],
//        'user_phone' =>$userData['person-phone'],
//        'offer_id' => $voucher['post']->ID,
//        'offer_name' => $voucher['name'],
//        'offer_price' => $voucher['price'],
//        'offer_start_date' => date('Y-m-d H:i:s'),
//        'offer_end_date' => date('Y-m-d H:i:s'),
//        'user_notes' => 'Czas trwania : ' .$voucher["duration"],
//    );


//    Nazwa produktu i opis zawartości
    $message .= '<br><br><b>Nazwa produktu i opis zawartości: </b> ' . $voucher["name"] . '  <br>';
    $message .= '<b>Cena:</b> ' . $voucher["price"] . '<br>';
    $message .= '<b>Czas trwania umowy:</b> ' . $voucher["duration"] . '<br><br><br>';

//    dodatkowe dane (zakwaterowanie,data pobuty etc.)
    if(isset($userData['offer_term']) && isset($userData['offer_room'])){
        $message .= '<b> Informacje:</b> <br><br> ';
        $message .= '<b> Data pobytu: </b>' .$userData['offer_term'] . '<br>';
        $message .= '<b> Zakwaterowanie: </b>' .$userData['offer_room'] . '<br>';
        $message .= '<b> Za dodatkową opłatą chcę, aby do mojego zakwaterowania nie była przydzielona inna osoba: </b>' .$userData['offer_accept_other_person'] . '<br>';
        $message .= '<b> Proszę o przedstawienie mi także oferty dla osoby towarzyszącej z zakresem świadczeń: noclegi i wyżywienie: </b>' .$userData['offer_for_other_person'] . '<br><br><br>';
    }


    $message .= '<b> Dane do przelewu:</b> <br><br> ';

    $message .= 'Anna Makuch <br>';
    $message .= 'Koszarawa 497<br>';
    $message .= '34-332 Koszarawa<br>';
    $message .= 'numer konta ING: 14 1050 1214 1000 0022 9478 5213<br>';
    $message .= 'Tytuł płatności: Nazwa produktu, Data, Imię, Nazwisko<br><br><br>';


    $message .= 'Dziękujemy za okazane nam zaufanie.<br><br>';

    $message .= 'W przypadku oferty specjalnej, potwierdzenie i finalna wysokość kwoty do zapłacenia zostanie Ci przesłana przez nas niezwłocznie po uwzględnieniu przez nas tej informacji w generowanym dla Ciebie Potwierdzeniu Zawarcia Umowy, które otrzymasz drogą emailową. Prosimy poczekaj na ten dokument chwilę - tam otrzymasz komplet informacji - i po jego otrzymaniu dokonaj wymaganej płatności.<br><br>';

    $message .= 'Woodrun';


    $userEmail = $userData['person-email'];
    $adminEmail = 'biuro@woodrun.pl';


    $subject = 'Potwierdzenie zamówienia';
    $body = $message;
    $headers = array('Content-Type: text/html; charset=UTF-8');


    $status = 400;
    try{
//         createOrderUser(array(
//            'user_name' =>$userData['person-name'],
//            'user_email' =>$userData['person-email'],
//            'user_phone' =>$userData['person-phone'],
//            'offer_id' => $voucher['post']->ID,
//            'offer_name' => $voucher['name'],
//            'offer_price' => $voucher['price'],
//            'offer_start_date' => date('Y-m-d H:i:s'),
//            'offer_end_date' => date('Y-m-d H:i:s'),
//            'user_notes' => 'Czas trwania : ' .$voucher["duration"],
//        ));
        wp_mail( $userEmail, $subject, $body, $headers);
        wp_mail( $adminEmail, $subject, $body, $headers);
        if($sendMailAnkieta){
            sendMailQuestionnaire($userEmail);
        }
        $status = 200;
    }catch (Exception $e){
        $status = $e->getMessage();
    }

     wp_send_json_success(array('status' => $status));
}


function sendMailQuestionnaire($userEmail)
{
    $message = '';
    $message .= 'Witamy, <br><br>
       Poniżej przedstawiamy zasady współpracy z naszym dietetykiem w ramach pakietu Woodrun. <br><br>';

    $message .='1. W trakcie procesu zamówienia pakietu, udzielona została przez Pana/Panią następująca zgoda: 
    “Oświadczam, że jestem osobą całkowicie zdrową i nie mam zdiagnozowanych przez lekarza żadnych chorób, 
    które mogłyby wpłynąć na moje zdrowie w trakcie realizacji planu żywieniowego wraz z treningiem”. <br>';

    $message .= '2. Warunkiem koniecznym rozpoczęcia współpracy z dietetykiem jest wypełnienie przez 
    Klienta Woodrun ankiety dietetycznej, którą otrzymuje w trakcie procesu zamówienia pakietu. 
    <b>Link do ankiety: </b> '.get_home_url().'/#ankieta-dietetyk <br>';

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

    try{
        wp_mail( $userEmail, $subject, $body, $headers);
        $status1 = 200;
    }catch (Exception $e){
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
    if (count($array)<=$wordsreturned)
    {
        $retval = $string;
    }
    else
    {
        array_splice($array, $wordsreturned);
        $retval = implode(" ", $array)." ...";
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
            <h3 class="name">'.$name.'</h3>
        </div>
        <div class="user-movie">
            <iframe src="'.$movie.'" frameborder="0" allowfullscreen></iframe>
        </div>
        <div class="user-description">
            <span class="description">'.$description.'</span>
        </div>';


        wp_send_json_success(array('status'=> 200,'html' => $html));

    }



//sprawdzanie danych logowania
function checkLoginData(){
    $userData = $_POST['userData'];

}

function createOrderUser($userData){
    global $wpdb;

    $results = $wpdb->get_results('SELECT * FROM wp_orders WHERE `user_email` = "'.$userData["user_email"].'" ');

    $response = array('status' => 400,'message'=> "Użytkownik już istnieje");

    if(!$results){
        $userPassword = randomPassword(8);
        $userData = array(
            'user_name' => $userData['user_name'],
            'user_phone' => $userData['user_phone'],
            'user_email' => $userData['user_email'],
            'user_password' => md5($userPassword),
            'offer_id' => $userData['offer_id'],
            'offer_name' => $userData['offer_name'],
            'offer_end_date' => $userData['offer_end_date'],
            'offer_price' => $userData['offer_price'],
            'user_notes' => $userData['user_notes'],
        );

        $createUser = $wpdb->insert('wp_orders', $userData);
        if ($createUser === false){
            $response = array('status' => '400');
        }else{
            $id = $wpdb->insert_id;
            $response = array(
                'status' => '200',
                'userid' => $id
            );
        }
    }
    return $response;
}







function randomPassword($length,
    $keyspace = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ') {
    $str = '';
    $max = mb_strlen($keyspace, '8bit') - 1;
    if ($max < 1) {
        throw new Exception('$keyspace must be at least two characters long');
    }
    for ($i = 0; $i < $length; ++$i) {
        $str .= $keyspace[random_int(0, $max)];
    }
    return $str;
}


?>


