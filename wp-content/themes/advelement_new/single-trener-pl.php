<?php
wp_enqueue_script('mousewheel', get_template_directory_uri() . '/fancybox/jquery.mousewheel-3.0.6.pack.js');
wp_enqueue_script('fancybox', get_template_directory_uri() . '/fancybox/jquery.fancybox.pack.js', '2.0.6');
wp_enqueue_script('home', get_template_directory_uri() . '/js/single.js');
wp_enqueue_style('fancybox', get_template_directory_uri() . '/fancybox/jquery.fancybox.css', '2.0.6');
get_header();
?>

<?php
$currentPostID = get_the_ID();
$cur_lang = pll_current_language();

$cur_category_stringID = '113, -22';
$currentOfferCategoryID = 113;
$parentCategory = 4645;


if ($cur_lang == 'en') {
    $cur_category_stringID = '181, -22';
    $currentOfferCategoryID = 181;
    $parentCategory = 5235;
}


$args = array(
    'numberposts' => -1,
    'cat' => $currentOfferCategoryID,
    'orderby' => 'menu_order',
    'order' => 'DESC'
);
$posts = get_posts($args);
$sortedPosts = array();
foreach ($posts as $post => $idx) {
    $sortedPosts[$post] = $idx->ID;
}

$postInArray = array_search($currentPostID, $sortedPosts);
$nextPostID = $sortedPosts[$postInArray + 1];
if ($nextPostID == null) {
    $nextPostID = $sortedPosts[0];
};

$currentPostCustomFields = get_fields($currentPostID);

$my_query = query_posts('p=' . $currentPostID); // in place of 111 you need to give desired ID.
global $post;
$post = $my_query[0];
setup_postdata($post);

?>


    <div id="content">
        <div>
            <article class="single-entry">
                <a href="<?php echo get_permalink($nextPostID); ?>" title="Zobacz wszystkie"><?php _e('Zobacz następny',
                        'woodrun'); ?></a>

                <?php the_post(); ?>
                <h1><?php the_title();?></h1>
                <?php the_content(); ?>



                <div class="offer_form single-offer">
                    <h2> <?php _e('Formularz zamówienia', 'woodrun'); ?></h2>
                    <form id="offer_form" data-postID="<?php echo get_the_ID(); ?>">

                        <div class="user-profil">
                            <button value="Person"> <?php _e('Osoba prywatna', 'woodrun'); ?></button>
                            <button value="Firma"> <?php _e('Firma', 'woodrun'); ?></button>
                        </div>

                        <div class="form-group">

                            <div class="company-fields">
                                <span class="field_title"> <?php _e('Nazwa firmy', 'woodrun'); ?> : </span>
                                <input class="input-type company-team" type="text" id="company-name" name="company-name"
                                       placeholder="<?php _e('Nazwa firmy', 'woodrun'); ?>">
                            </div>

                            <span class="field_title"> <?php _e('Imię i Nazwisko', 'woodrun'); ?> : </span>
                            <input class="input-type" type="text" id="person-name" name="person-name"
                                   placeholder="<?php _e('Imię i Nazwisko', 'woodrun'); ?>">

                            <span class="field_title"> <?php _e('Adres E-mail', 'woodrun'); ?> : </span>
                            <input class="input-type" type="text" id="person-email" name="person-email"
                                   placeholder="<?php _e('Adres E-mail', 'woodrun'); ?>">

                            <span class="field_title"> <?php _e('Telefon', 'woodrun'); ?> : </span>
                            <input class="input-type" type="text" id="person-phone" name="person-phone"
                                   placeholder="<?php _e('Telefon', 'woodrun'); ?>">

                            <span class="field_title"> <?php _e('Ulica i numer domu', 'woodrun'); ?> : </span>
                            <input class="input-type" type="text" id="person-address" name="person-address"
                                   placeholder="<?php _e('Ulica i numer domu', 'woodrun'); ?>">

                            <span class="field_title"> <?php _e('Kod pocztowy i miejscowość', 'woodrun'); ?> : </span>
                            <input class="input-type" type="text" id="person-zipcode" name="person-zipcode"
                                   placeholder="___-____">
                            <input class="input-type" type="text" id="person-zipcode-country"
                                   name="person-zipcode-country" placeholder="<?php _e('Miejscowość', 'woodrun'); ?>">


                            <div class="company-fields">

                                <span class="field_title"> <?php _e('NIP', 'woodrun'); ?> : </span>
                                <input class="input-type company-team" type="text" id="company-nip" name="company-nip"
                                       placeholder="<?php _e('NIP', 'woodrun'); ?>">

                                <span class="field_title"> <?php _e('REGON', 'woodrun'); ?> : </span>
                                <input class="input-type company-team" type="text" id="company-regon"
                                       name="company-regon" placeholder="<?php _e('REGON', 'woodrun'); ?>">

                            </div>

                        </div>

                        <div class="rules-container">

                            <div class="rules-area">
                                <label class="checkbox-area">
                                    <span class="rule_title"><input id="rules-1" type="checkbox" class="checkbox"
                                                                    name="rules-1"></span>
                                    <span class="rule_text">
                                         <?php _e('Akceptuję', 'woodrun'); ?> <a
                                                href="/wp-content/themes/advelement_new/assets/Ogólne_Warunki_Świadczenia_Usług_i_Regulamin_E-Shop_Woodrun_25.05.2018.pdf"
                                                target="_blank"
                                                class="doc-btn"> <?php _e('Ogólne Warunki Świadczenia Usług przez Woodrun(OWU)',
                                                'woodrun'); ?><img class="rules-pdf-icon"
                                                                   src="/wp-content/themes/advelement_new/images/pdf-icon.png"> </a>
                                        <?php _e('oraz', 'woodrun'); ?> <a
                                                href="/wp-content/themes/advelement_new/assets/Regulamin_Promocji_Letnia_promocja_Woodrun_25.05.2018.pdf"
                                                target="_blank"
                                                class="doc-btn"> <?php _e('regulamin aktualnie obowiązujących promocji Woodrun',
                                                'woodrun'); ?><img class="rules-pdf-icon"
                                                                   src="/wp-content/themes/advelement_new/images/pdf-icon.png"></a>
                                    </span>
                                </label>
                            </div>


                            <div class="rules-area">
                                <label class="checkbox-area">
                                    <span class="rule_title"><input id="rules-2" type="checkbox" class="checkbox"
                                                                    name="rules-2"></span>
                                    <span class="rule_text">
                                     <?php _e('Wyrażam zgodę na umieszczenie moich danych osobowych w informatycznej bazie danych Jałowcówka Gospodarstwo Rolne,
                                        Koszarawa 497 (kod pocztowy 34-332 Koszarawa), zwane dalej Woodrun i ich przetwarzanie zgodnie z Ustawą o Ochronie Danych
                                         Osobowych z dnia 29 sierpnia 1997 r. (Dz. U. Dz.U. 1997 nr 133 poz. 883 z późn. zm.) oraz Rozporządzeniem Parlamentu 
                                        Europejskiego i Rady (UE) 2016/679 z dnia 27 kwietnia 2016 r. w sprawie ochrony osób fizycznych w związku z przetwarzaniem
                                        danych osobowych i w sprawie swobodnego przepływu takich danych oraz uchylenia dyrektywy 95/46/WE (RODO) w celu otrzymywania
                                         informacji marketingowych (w tym prowadzenia marketingu bezpośredniego własnych usług i produktów), handlowych i 
                                         informacyjnych dotyczących m.in. oferty Woodrun za pomocą poczty elektronicznej, zgodnie z Ustawą o Świadczeniu Usług Drogą 
                                         Elektroniczną z dnia 18 lipca 2002 r. (Dz.U. 2002 nr 144 poz. 1204). Dane będą przetwarzane przez okres 15 lat. Jestem świadomy, 
                                         że mam możliwość dostępu do swoich danych, w celu ich sprostowania i usunięcia oraz żądania ograniczenia ich przetwarzania oraz 
                                         wycofania udzielonej zgody w każdym momencie, przy czym,  cofnięcie uprzednio wyrażonej zgody nie wpłynie na legalność 
                                         przetwarzania przed jej wycofaniem, a także wniesienia skargi do organu nadzorczego. Dane nie będą przekazywane 
                                         do państw trzecich.  Abu komunikować się z Tobą, Woodrun korzysta z firm świadczących usługi wchodzące w skład oferty Woodrun – 
                                         specjalizujących si ę w danych dziedzinach oferty Woodrun, firm oferujących hosting, rozsyłanie wiadomości email, sms, lub poprzez 
                                         inne kanały komunikacji elektronicznej. Aby móc pracować dla Woodrun, firmy te posiadają dostęp do Twoich danych Nie mogą z nich 
                                         korzystać poza zakresem realizowania usług dla Woodrun. ', 'woodrun'); ?>
                                    </span>
                                </label>
                            </div>


                            <div class="rules-area">
                                <label class="checkbox-area">
                                    <span class="rule_title"><input id="rules-3" type="checkbox" class="checkbox"
                                                                    name="rules-3"></span>
                                    <span class="rule_text">
                                     <?php _e('Wyrażam zgodę, że korzystanie przeze mnie z Usług świadczonych przez Woodrun, odbywać się będzie na moją
                                      wyłączną odpowiedzialność, w szczególności dotyczy to uwarunkowań związanych ze stanem mojego zdrowia i oświadczam, 
                                      że nie cierpię na żadną z poniższych chorób i dolegliwości: układu nerwowego (epilepsja, polineuropatie, po przebytych 
                                      udarach/wylewach, stwardnienie rozsiane, stwardnienie zanikowe boczne), układu hormonalnego (cukrzyca (niezależnie od jej typu), 
                                      choroba/zespół Cushinga), układu pokarmowego (choroba Leśniowskiego-Crohna, po resekcjach narządów układu pokarmowego), 
                                      układu kostno-stawowego (urazy stanowiące przeciwwskazanie do podjęcia treningu siłowego, reumatoidalne zapalenie stawów, 
                                      dna moczanowa, rwa kulszowa), układu sercowo-naczyniowego (tętniaki, wady serca, przebyte zawały serca), układu oddechowego 
                                      (dławica piersiowa, po przebytej resekcji płuc), układu moczowego (choroby nerek, po przeszczepie nerek), nie odbywam 
                                      rehabilitacji, nie zmagam się z zaburzeniami natury psychicznej, zwłaszcza dającymi objawy somatyczne. Oświadczam także, 
                                      że nie jestem w ciąży i nie karmię piersią. ','woodrun'); ?>
                                    </span>
                                </label>
                            </div>

                            <?php if (in_category('fit') || in_category('optimum') || in_category('fit-en') || in_category('optimum-en') || in_category('zdrowie') || in_category('health')): ?>
                                <div class="rules-area">
                                    <label class="checkbox-area">
                                        <span class="rule_title"><input id="rules-6" type="checkbox" class="checkbox"
                                                                        name="rules-6"></span>
                                        <span class="rule_text">
                                         <?php _e('Oświadczam, że jestem osobą całkowicie zdrową i nie mam zdiagnozowanych przez 
                                         lekarza żadnych chorób, które mogłyby wpłynąć na moje zdrowie w trakcie realizacji
                                          planu żywieniowego wraz z treningiem', 'woodrun'); ?>
                                        </span>
                                    </label>
                                </div>
                            <?php endif; ?>

                            <div class="rules-area">
                                <label class="checkbox-area">
                                    <span class="rule_title"><input id="rules-4" type="checkbox" class="checkbox"
                                                                    name="rules-4"></span>
                                    <span class="rule_text">
                                        <?php _e('Wyrażam zgodę na kontakt ze mna drogą telefoniczną lub mailową ze strony Woodrun, w celu odbycia
                                         ze mną rozmowy lub korespondencji mailowej i dzięki temu uzyskania informacji (w tym danych dotyczących
                                          moich celów biegowych i kilometrażu tygodniowego w celu optymalnego dostosowania proponowanego planu 
                                          treningowego do moich potrzeb i możliwości, co jest elementem profilowania - automatycznego podejmowania 
                                          decyzji),  pozwalających na przygotowanie i omówienie ze mną proponowanego zindywidualizowanego na moje 
                                          potrzeby planu treningowego, wraz z informacjami uzupełniającymi dotyczącymi w/w planu i metodyki treningu 
                                          biegowego przesłanymi w formie poradnikowej. ', 'woodrun'); ?>
                                    </span>
                                </label>
                            </div>

                            <div class="rules-area">
                                <label class="checkbox-area">
                                    <span class="rule_title"><input id="rules-5" type="checkbox" class="checkbox"
                                                                    name="rules-5"></span>
                                    <span class="rule_text">
                                     <?php _e('Oświadczam, że:  1) jestem świadomy, że na podstawie Art. 27 Ustawy o prawach konsumenta z 30 maja 2014 r., 
                                     mogę w terminie 14 dni odstąpić (postępując szczegółowo w sposób opisany w Art. 30 w/w ustawy) od zawartej umowy bez 
                                     podawania przyczyny i ponoszenia kosztów (z wyjątkiem kosztów określonych w art. 33, art. 34 ust.2 i art. 35); 2) 
                                     wyrażam zgodę na rozpoczęcie realizacji przez Woodrun realizacji zamówionej przeze mnie usługi przed upływem 14-dniowego 
                                     terminu na odstąpienie przeze mnie od umowy; zgoda ta jest wymagana z uwagi na specyfikę usług Woodrun oraz formy płatności 
                                     za nie (poprzez vouchery posiadające określony okres ważności) oraz że zgodnie z Art. 35 w/w ustawy, w przypadku odstąpienia 
                                     przeze mnie od umowy Woodrun będzie zobowiązana do zwrotu mi jedynie części opłaty – będącej w takiej samej relacji do 
                                     całości poniesionej przeze mnie opłaty jak relacja wartości niewykorzystanej części usługi do wartości pełnej usługi; 3) 
                                     zgodnie z Art. 38 w/w ustawy, w chwili, gdy Woodrun wykona w pełni zamówioną przeze mnie usługę, utracę prawo do 
                                     odstąpienia od umowy.', 'woodrun'); ?>
                                    </span>
                                </label>
                            </div>

                        </div>


                        <div class="clearfix confirm-order">
                            <button class="confirm-button"><?php _e('Zamawiam', 'woodrun'); ?></button>
                        </div>


                        <div class="order-details">
                            <h3 class="title"> <?php _e('Podsumowanie zamówienia', 'woodrun'); ?></h3>

                            <div class="confirm-group">
                                <p class="lead"> <?php _e('Dane', 'woodrun'); ?> :</p>
                                <div id="userDetailsProducts">
                                    <div class="data-box company-fields">
                                        <span> <?php _e('Nazwa firmy', 'woodrun'); ?> :</span><span class="data-field"
                                                                                                    data-name="company-name"></span>
                                    </div>
                                    <div class="data-box">
                                        <span> <?php _e('Imię i Nazwisko', 'woodrun'); ?> :</span><span
                                                class="data-field"
                                                data-name="person-name"></span>
                                    </div>
                                    <div class="data-box">
                                        <span> <?php _e('E-mail', 'woodrun'); ?> :</span><span class="data-field"
                                                                                               data-name="person-email"></span>
                                    </div>
                                    <div class="data-box">
                                        <span> <?php _e('Telefon', 'woodrun'); ?> :</span><span class="data-field"
                                                                                                data-name="person-phone"></span>
                                    </div>
                                    <div class="data-box">
                                        <span> <?php _e('Adres', 'woodrun'); ?> :</span><span class="data-field"
                                                                                              data-name="person-address"></span>
                                    </div>
                                    <div class="data-box">
                                        <span> <?php _e('Kod pocztowy', 'woodrun'); ?> :</span><span class="data-field"
                                                                                                     data-name="person-zipcode"></span>
                                    </div>
                                    <div class="data-box">
                                        <span> <?php _e('Miejscowość', 'woodrun'); ?> :</span><span class="data-field"
                                                                                                    data-name="person-zipcode-country"></span>
                                    </div>
                                    <div class="data-box company-fields">
                                        <span> <?php _e('NIP', 'woodrun'); ?> :</span><span class="data-field"
                                                                                            data-name="company-nip"></span>
                                    </div>
                                    <div class="data-box company-fields">
                                        <span> <?php _e('REGON', 'woodrun'); ?> :</span><span class="data-field"
                                                                                              data-name="company-regon"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="confirm-group">
                                <p class="lead"> <?php _e('Voucher ', 'woodrun'); ?> : </p>
                                <span id="voucher_name"><?php echo get_post_meta($currentPostID, 'voucher_name',
                                        true); ?></span>
                                <span id="voucher_link" style="display:none;"><?php the_permalink(); ?></span>
                            </div>
                            <div class="confirm-group">
                                <p class="lead"> <?php _e('Cena i termin płatności', 'woodrun'); ?> : </p>
                                <span id="voucher_price"><?php echo get_post_meta($currentPostID, 'voucher_price',
                                        true); ?></span>
                            </div>
                            <div class="confirm-group">
                                <p class="lead"> <?php _e('Czas trwania umowy* ', 'woodrun'); ?> : </p>
                                <p id="voucher_duration"><?php echo get_post_meta($currentPostID, 'voucher_duration',
                                        true); ?></p>
                                <p class="disclaimer"> <?php _e('*Jest to wynikający z umowy czas trwania zobowiązań zarówno
                                Woodrun, jak i Klienta.', 'woodrun'); ?></p>
                            </div>

                            <div class="confirm-group info">
                                <p> <?php _e('Po złożeniu zamówienia otrzymasz na wskazany adres e-mail wiadomość o kolejnych
                                etapach
                                realizacji zamówienia. Ponadto będziemy się kontaktować z Tobą telefonicznie.',
                                        'woodrun'); ?></p>
                            </div>

                            <div class="confirm-button-end">
                                <button id="confirm-button-end"> <?php _e('Zamawiam z obowiązkiem zapłaty',
                                        'woodrun'); ?></button>
                            </div>
                        </div>

                    </form>
                </div>
                <div class="confirmation-order-success">
                    <h2><?php _e('Dziękujemy za złożenie zamówienia.', 'woodrun'); ?></h2>
                </div>
                <div class="confirmation-order-error">
                    <h2><?php _e('Przepraszamy, coś poszło nie tak.', 'woodrun'); ?></h2>
                    <span class="error-log"></span>
                </div>
            </article>
            <aside class="sidebar">
                <p class="price">
                    <?php echo $currentPostCustomFields['price']; ?>

                </p>
                <?php dynamic_sidebar('Rezerwacja'); ?>
                <p class="reservation">
                    <span><?php _e('Rezerwuj online', 'woodrun'); ?></span>
                </p>
                <span>
                    <?php echo $currentPostCustomFields['informacje_bonusy']; ?>
                </span>
                <p class="return"><a href="<?php echo get_permalink($parentCategory); ?>"
                                     title="Powrót do listy ofert"><?php _e('Powrót do listy ofert', 'woodrun'); ?></a>
                </p>
            </aside>

        </div>
    </div>


<?php get_footer(); ?>