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

$cur_category_stringID = '4, -22';
$currentOfferCategoryID = 4;
$currentOfferCategoryTermID = 5;
$parentPage = 2;

if($cur_lang =='en'){
    $cur_category_stringID = '161, -22';
    $currentOfferCategoryID = 161;
    $currentOfferCategoryTermID = 135;
    $parentPage = 5219;
}

$args = array(
    'numberposts' => -1,
    'cat' => $cur_category_stringID,
    'orderby' => 'menu_order',
    'order' => 'DESC'
);

$posts = get_posts($args);
$sortedPosts = array();
foreach ($posts as $post => $idx){
    $sortedPosts[$post] = $idx->ID;
}

$postInArray = array_search($currentPostID, $sortedPosts);
$nextPostID = $sortedPosts[$postInArray+1];
if($nextPostID == null){
    $nextPostID = $sortedPosts[0];
};



$my_query = query_posts('p='.$currentPostID); // in place of 111 you need to give desired ID.
global $post;
$post = $my_query[0];
setup_postdata($post);


?>

<div id="content">
    <div>
        <article class="single-entry">
            <a href="<?php echo get_permalink($nextPostID); ?>" title="Zobacz wszystkie"><?php _e('Zobacz następną', 'woodrun'); ?></a>
<?php the_post(); the_content(); ?>

            <?php
            $tripDates = get_post_meta($currentPostID, 'oferta_terminy_do_formularza');
            $currentPostCustomFields = get_fields($currentPostID);

            $tripRooms = $currentPostCustomFields['oferta_zakwaterowanie'];
            $tripRooms = preg_split('/<br[^>]*>/i', $tripRooms);

            $tripDates = $currentPostCustomFields['oferta_terminy_do_formularza'];
            $tripDates = preg_split('/<br[^>]*>/i', $tripDates);

            ?>


            <div class="offer_form single-offer">
                <h2> <?php _e('Formularz zamówienia', 'woodrun'); ?></h2>
                <form id="offer_form" data-postID="<?php echo get_the_ID();?>">

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

<!--                    NOWE OPCJE START-->
                        <span class="field_title"> <?php _e('Wybierz termin', 'woodrun'); ?></span>
                        <select class="input-type offer_term" type="text" id="offer_term" name="offer_term">
                            <option disabled selected value>  <?php _e('-- Wybierz datę --', 'woodrun'); ?>  </option>
                            <?php
                            foreach ($tripDates as $tripDate):?>
                                <option value="<?php echo $tripDate;?>"><?php echo $tripDate;?></option>
                            <?php endforeach;
                            ?>
                        </select>


                        <span class="field_title"> <?php _e('Wybierz zakwaterowanie', 'woodrun'); ?></span>
                        <select class="input-type offer_room" type="text" id="offer_room" name="offer_room">
                            <option disabled selected value>  <?php _e('-- Wybierz opcję --', 'woodrun'); ?> </option>
                            <?php
                            foreach ($tripRooms as $tripRoom):?>
                                <option value="<?php echo $tripRoom;?>"><?php echo $tripRoom;?></option>
                            <?php endforeach;
                            ?>
                        </select>


                        <span class="field_title"> <?php _e('Za dodatkową opłatą chcę, aby do mojego zakwaterowania nie była przydzielona inna osoba', 'woodrun'); ?></span>
                        <select class="input-type offer_accept_other_person" type="text" id="offer_accept_other_person" name="offer_accept_other_person">
                            <option disabled selected value>   <?php _e('-- Wybierz opcję --', 'woodrun'); ?> </option>
                            <option value="tak"> <?php _e('Tak', 'woodrun'); ?></option>
                            <option value="nie"> <?php _e('Nie', 'woodrun'); ?></option>
                        </select>


                        <span class="field_title"> <?php _e('Proszę o przedstawienie mi także oferty dla osoby towarzyszącej (noclegi, wyżywienie)', 'woodrun'); ?></span>
                        <select class="input-type offer_for_other_person" type="text" id="offer_for_other_person" name="offer_for_other_person">
                            <option disabled selected value>  <?php _e('-- Wybierz opcję --', 'woodrun'); ?> </option>
                            <option value="tak"> <?php _e('Tak', 'woodrun'); ?></option>
                            <option value="nie"> <?php _e('Nie', 'woodrun'); ?></option>
                        </select>
<!--                    NOWE OPCJE END-->


                    </div>

                    <div class="rules-container">

                        <div class="rules-area">
                            <label class="checkbox-area">
                                    <span class="rule_title"><input id="rules-1" type="checkbox" class="checkbox"
                                                                    name="rules-1"></span>
                                <span class="rule_text">
                                         <?php _e('Akceptuję', 'woodrun'); ?> <a
                                            href="/wp-content/themes/advelement_new/assets/Ogolne_Warunki_Swiadczenia_Uslug_i_Regulamin_E-Shop_Woodrun%2005.02.2018.pdf"
                                            target="_blank" class="doc-btn"> <?php _e('Ogólne Warunki Świadczenia Usług przez Woodrun(OWU)', 'woodrun'); ?><img class="rules-pdf-icon" src="/wp-content/themes/advelement_new/images/pdf-icon.png"> </a>
                                    <?php _e('oraz', 'woodrun'); ?> <a
                                            href="/wp-content/themes/advelement_new/assets/Regulamin_Promocji_Zimowa_promocja_Woodrun_05.02.2018.pdf"
                                            target="_blank" class="doc-btn"> <?php _e('regulamin aktualnie obowiązujących promocji Woodrun', 'woodrun'); ?><img class="rules-pdf-icon" src="/wp-content/themes/advelement_new/images/pdf-icon.png"></a>
                                    </span>
                            </label>
                        </div>


                        <div class="rules-area">
                            <label class="checkbox-area">
                                    <span class="rule_title"><input id="rules-2" type="checkbox" class="checkbox"
                                                                    name="rules-2"></span>
                                <span class="rule_text">
                                     <?php _e('Wyrażam zgodę na 1) przetwarzanie danych osobowych w celu: wykorzystania przez Woodrun oraz
                                    Trenerów W Panelu W do realizacji usług zawartych w Voucherze W lub Pobycie W oraz prezentacji
                                    danych osobowych Użytkownika na jego profilu w Panelu W  (widocznych jedynie dla Administratora,
                                    Trenerów W oraz samego Klienta); 2) udostępnianie przez Woodrun wybranych danych Trenerom W i
                                    innym kontrahentom Administratora w celach opisanych powyżej (związanych z realizacją przez nich
                                    usług wobec Klientów w szczególności z wykorzystaniem Panelu W); 3) dochodzenie przez Woodrun
                                    roszczeń z tytułu prowadzonej działalności; 4) prowadzenie przez Woodrun marketingu bezpośredniego
                                    własnych produktów lub usług administratora danych. 5) i oświadczam o świadomości na temat prawa dostępu
                                    do podanych swoich danych osobowych i ich poprawiania oraz o dobrowolności podania w/w danych, oraz
                                    podanie prawnych podstaw przetwarzania danych: niezbędności podania w/w danych z uwagi na umożliwienie
                                    Woodrun - poprzez wykorzystanie Panelu W – realizacji umowy, zaś w przypadku celów: dochodzenie
                                    roszczeń i marketing bezpośredni z uwagi na Art.23 pkt.4 Ustawy o ochronie danych
                                    osobowych z 29 sierpnia 1997 r.', 'woodrun'); ?>
                                    </span>
                            </label>
                        </div>

                        <div class="rules-area">
                            <label class="checkbox-area">
                                    <span class="rule_title"><input id="rules-6" type="checkbox" class="checkbox"
                                                                    name="rules-6"></span>
                                <span class="rule_text">
                                     <?php _e('Wyrażam zgodę na to, że korzystanie przeze mnie z Usług świadczonych przez Woodrun odbywać się 
                                     będzie na wyłączną moją odpowiedzialność , w szczególności dotyczy to uwarunkowań związanych ze stanem 
                                     mojego zdrowia. W szczególności, przyjmuję do wiadomości, że korzystanie z pakietów Woodrun jest przeznaczone 
                                     wyłącznie dla osób nie posiadających poniższych chorób i dolegliwości: układu nerwowego (epilepsja, 
                                     polineuropatie, po przebytych udarach/wylewach, stwardnienie rozsiane, stwardnienie zanikowe boczne), 
                                     układu hormonalnego (cukrzyca (niezależnie od jej typu), choroba/zespół Cushinga), układu pokarmowego 
                                     (choroba Leśniowskiego-Crohna, po resekcjach narządów układu pokarmowego), układu kostno-stawowego 
                                     (urazy stanowiące przeciwwskazanie do podjęcia treningu siłowego, reumatoidalne zapalenie stawów, 
                                     dna moczanowa, rwa kulszowa), układu sercowo-naczyniowego (tętniaki, wady serca, przebyte zawały serca), 
                                     układu oddechowego (dławica piersiowa, po przebytej resekcji płuc), układu moczowego (choroby nerek, 
                                     po przeszczepie nerek). Nie oferujemy także w/w pakietów kobietom w ciąży, karmiącym piersią, osobom 
                                     odbywającym rehabilitację, osobom zmagającym się z zaburzeniami natury psychicznej, zwłaszcza dającymi 
                                     objawy somatyczne. Przy zamówieniu pakietu niezbędne jest  potwierdzenie spełnienia tych warunków. 
                                     Pakiety nie są przez Woodrun oferowane osobom  z nietolerancjami i alergiami pokarmowymi. ', 'woodrun'); ?>
                                    </span>
                            </label>
                        </div>

                        <div class="rules-area">
                            <label class="checkbox-area">
                                    <span class="rule_title"><input id="rules-3" type="checkbox" class="checkbox"
                                                                    name="rules-3"></span>
                                <span class="rule_text">
                                     <?php _e('Wyrażam zgodę na korzystanie przez Klienta z Usług świadczonych przez Woodrun odbywać
                                    się będzie na wyłączną odpowiedzialność Klienta, w szczególności dotyczy to uwarunkowań
                                    związanych ze stanem zdrowia Klienta', 'woodrun'); ?>
                                    </span>
                            </label>
                        </div>

                        <div class="rules-area">
                            <label class="checkbox-area">
                                    <span class="rule_title"><input id="rules-4" type="checkbox" class="checkbox"
                                                                    name="rules-4"></span>
                                <span class="rule_text">
                                        <?php _e('Oświadczam, że jestem świadomy/-a, że na mocy Ustawy o prawach konsumenta z 30 maja
                                    2014 r.: 1) na podstawie Art. 27 w/w ustawy, mam prawo w terminie 14 dni odstąpić
                                    (postępując szczegółowo w sposób opisany w Art. 30 w/w ustawy) od zawartej umowy bez
                                    podawania przyczyny i ponoszenia kosztów (z wyjątkiem kosztów określonych w art. 33,
                                    art. 34 ust.2 i art. 35); 2) zgodnie z Art. 21 pkt. 2 w/w ustawy, rozpoczęcie realizacji
                                    przez Woodrun realizacji zamówionej przez klienta usługi przed upływem 14-dniowego
                                    terminu na odstąpienie przez Klienta od umowy jest możliwe tylko w przypadku wyrażenia
                                    przez Klienta wyraźnego żądania. ; 3)  zgodnie z Art. 35 w/w ustawy, w przypadku odstąpienia
                                    przez Klienta od umowy po zgłoszeniu żądania opisanego powyżej w pkt. 1.f.ii, Woodrun będzie
                                    zobowiązana do zwrotu Klientowi jedynie części opłaty – będącej w takiej samej relacji do
                                    całości poniesionej przez Klienta opłaty jak relacja wartości niewykorzystanej części usługi
                                    do wartości pełnej usługi.  4) zgodnie z Art. 38 w/w ustawy, w chwili, gdy Woodrun wykona w
                                    pełni zamówioną przez Klienta usługę, Klient utraci prawo do odstąpienia od umowy.', 'woodrun'); ?>
                                    </span>
                            </label>
                        </div>

                        <div class="rules-area">
                            <label class="checkbox-area">
                                    <span class="rule_title"><input id="rules-5" type="checkbox" class="checkbox"
                                                                    name="rules-5"></span>
                                <span class="rule_text">
                                     <?php _e('Wyrażam zgodę w przypadku zakupu przeze mnie Voucherów W (na pakiety opieki online) na
                                    rozpoczęcie realizacji przez Woodrun realizacji zamówionej przez klienta usługi przed
                                    upływem 14-dniowego terminu na odstąpienie przez Klienta od umowy. Zgoda ta jest wymagana
                                    z uwagi na specyfikę usług Woodrun oraz formy płatności za nie (poprzez vouchery posiadające
                                    określony okres ważności). Niniejszy punkt nie odnosi się do Pobytów W.', 'woodrun'); ?>
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
                                    <span> <?php _e('Imię i Nazwisko', 'woodrun'); ?> :</span><span class="data-field"
                                                                        data-name="person-name"></span>
                                </div>
                                <div class="data-box">
                                    <span> <?php _e('E-mail', 'woodrun'); ?> :</span><span class="data-field" data-name="person-email"></span>
                                </div>
                                <div class="data-box">
                                    <span> <?php _e('Telefon', 'woodrun'); ?>  :</span><span class="data-field" data-name="person-phone"></span>
                                </div>
                                <div class="data-box">
                                    <span> <?php _e('Adres', 'woodrun'); ?>  :</span><span class="data-field" data-name="person-address"></span>
                                </div>
                                <div class="data-box">
                                    <span> <?php _e('Kod pocztowy', 'woodrun'); ?> :</span><span class="data-field"
                                                                      data-name="person-zipcode"></span>
                                </div>
                                <div class="data-box">
                                    <span> <?php _e('Miejscowość', 'woodrun'); ?>  :</span><span class="data-field"
                                                                     data-name="person-zipcode-country"></span>
                                </div>
                                <div class="data-box company-fields">
                                    <span> <?php _e('NIP', 'woodrun'); ?> :</span><span class="data-field" data-name="company-nip"></span>
                                </div>
                                <div class="data-box company-fields">
                                    <span> <?php _e('REGON', 'woodrun'); ?> :</span><span class="data-field" data-name="company-regon"></span>
                                </div>

<!--                                <div class="data-box">-->
<!--                                    <span>Termin pobytu:  </span><span class="data-field"-->
<!--                                                                     data-name="offer_term"></span>-->
<!--                                </div>-->
<!--                                <div class="data-box">-->
<!--                                    <span>Zakwaterowanie:  </span><span class="data-field"-->
<!--                                                                       data-name="offer_room"></span>-->
<!--                                </div>-->
<!---->
<!--                                <div class="data-box">-->
<!--                                    <span>Zgoda na zakwaterowanie z innymi osobami:  </span><span class="data-field"-->
<!--                                                                        data-name="offer_accept_other_person"></span>-->
<!--                                </div>-->



                            </div>
                        </div>

                        <div class="confirm-group">
                            <p class="lead"> <?php _e('Voucher ', 'woodrun'); ?>:</p>
                            <span id="voucher_name"><?php echo get_post_meta($currentPostID,'voucher_name',true); ?></span>
                            <span id="voucher_link" style="display:none;"><?php the_permalink(); ?></span>
                        </div>

                        <div class="confirm-group">
                            <p class="lead"> <?php _e('Informacje ', 'woodrun'); ?>: </p>
                            <span> <?php _e('Termin pobytu', 'woodrun'); ?>  </span><span class="data-field"
                                                               data-name="offer_term" id="offer_term"></span> <br>
                            <span> <?php _e('Zakwaterowanie', 'woodrun'); ?> : </span><span class="data-field"
                                                                data-name="offer_room" id="offer_room"></span><br>

                            <span> <?php _e('Za dodatkową opłatą chcę, aby do mojego zakwaterowania nie była przydzielona inna osoba', 'woodrun'); ?>  : </span><span class="data-field"
                                                                                          id="offer_accept_other_person" data-name="offer_accept_other_person"></span><br>

                            <span> <?php _e('Proszę o przedstawienie mi także oferty dla osoby towarzyszącej z zakresem świadczeń: noclegi i wyżywienie', 'woodrun'); ?>  : </span><span class="data-field"
                                                                                          id="offer_for_other_person" data-name="offer_for_other_person"></span><br>

                            <span id="voucher_link" style="display:none;"><?php the_permalink(); ?></span>
                        </div>

                        <div class="confirm-group">
                            <p class="lead"> <?php _e('Cena i termin płatności : ', 'woodrun'); ?></p>
                            <span id="voucher_price"><?php echo get_post_meta($currentPostID,'voucher_price', true); ?></span>
                        </div>
                        <div class="confirm-group">
                            <p class="lead"> <?php _e('Czas trwania umowy* ', 'woodrun'); ?></p>
                            <p id="voucher_duration"><?php echo get_post_meta($currentPostID,'voucher_duration', true); ?></p>
                            <p class="disclaimer"> <?php _e('*Jest to wynikający z umowy czas trwania zobowiązań zarówno
                                Woodrun, jak i Klienta.', 'woodrun'); ?></p>
                        </div>

                        <div class="confirm-group info">
                            <p> <?php _e('Po złożeniu zamówienia otrzymasz na wskazany adres e-mail wiadomość o kolejnych
                                etapach
                                realizacji zamówienia. Ponadto będziemy się kontaktować z Tobą telefonicznie.', 'woodrun'); ?></p>
                        </div>

                        <div class="confirm-button-end">
                            <button id="confirm-button-end" class="<?php if($post->ID == 5439 || $post->ID == 5466):?>austriacamp<?php endif;?>"> <?php _e('Zamawiam z obowiązkiem zapłaty', 'woodrun'); ?></button>
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
<?php echo wpautop(get_post_meta($post->ID, 'Informacje', true)); ?>
            <p class="return"><a href="<?php echo get_permalink(2); ?>" title="Powrót do listy ofert"><?php _e('Powrót do listy ofert', 'woodrun'); ?></a></p>
        </aside>

    </div>
</div>
<?php get_footer(); ?>