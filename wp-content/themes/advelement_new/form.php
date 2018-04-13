<?php
/* 
Template name: Form 
*/
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<title><?php
	/*
	 * Print the <title> tag based on what is being viewed.
	 */
	global $page, $paged;

	wp_title( '|', true, 'right' );

	// Add the blog name.
	bloginfo( 'name' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " | $site_description";

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
		echo ' | ' . sprintf( __( 'Page %s', 'twentyeleven' ), max( $paged, $page ) );

	?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="stylesheet" type="text/css" media="all" href="<?php echo get_template_directory_uri(); ?>/reservation.css" />
<script src="<?php echo get_template_directory_uri(); ?>/js/jquery.min.js" type="text/javascript"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/cufon-yui.js" type="text/javascript"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/font.js" type="text/javascript"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/vForm.js" type="text/javascript"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/reservation.js" type="text/javascript"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/layout.js" type="text/javascript"></script>
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->
</head>

<body class="form">

<!-- START FORMULARZ DLA TRENERA-->
<?php
if(isset($_GET['trener'])):?>
    <?php $trips = get_posts( 'category=113&numberposts=-1' ); ?>
    <?php if( $trips ) { ?>

        <fieldset rel="step-1">

            <legend>Formularz zgłoszeniowy - trener</legend>

            <div>

                <p>

                    <label for="offert">Zajęcia z trenerem</label>

                    <select name="offert" id="offert">

                        <option value="" class="default">Wybierz ofertę...</option>

                        <?php foreach( $trips as $trip ) { ?>

                            <?php

                            if( isset( $_GET['trener'] ) && $trip->ID == $_GET['trener'] ) {

                                $trip_current = $trip->ID;


                                $trip_current_details = get_post_custom_x( $trip_current );

                                $trip_current_dates = preg_split( '/\r\n|\r|\n/', $trip_current_details['Terminy do formularza'][0] );

                                $trip_current_times = array();

                                foreach( $trip_current_dates as $item ){

                                    $item = trim( $item );
                                    if( $item != '' ) $trip_current_times[] = $item;

                                }

                                $trip_current_training = $trip_current_details['Szkolenie'];
                                $trip_current_training_addon = $trip_current_details['Szkolenie (dodatkowo)'][0];
                                $trip_current_training_addon_2 = $trip_current_details['Szkolenie (dodatkowo, 2)'][0];
                                $trip_current_training_addon_3 = $trip_current_details['Szkolenie (dodatkowo, 3)'][0];

                                $trip_current_accommodation = $trip_current_details['Zakwaterowanie'];
                                $trip_current_accommodation_addon = $trip_current_details['Zakwaterowanie (dodatkowo)'][0];
                                $trip_current_accommodation_addon_2 = $trip_current_details['Zakwaterowanie (dodatkowo, 2)'][0];
                                $trip_current_accommodation_addon_3 = $trip_current_details['Zakwaterowanie (dodatkowo, 3)'][0];
                                $trip_current_accommodation_shared = $trip_current_details['Zakwaterowanie z innym uczestnikiem'][0];

                                $trip_current_insurance = $trip_current_details['Ubezpieczenie'];
                                $trip_current_insurance_addon = $trip_current_details['Ubezpieczenie (dodatkowo)'][0];
                                $trip_current_insurance_addon_2 = $trip_current_details['Ubezpieczenie (dodatkowo, 2)'][0];
                                $trip_current_insurance_addon_3 = $trip_current_details['Ubezpieczenie (dodatkowo, 3)'][0];


                                $trip_current_question = $trip_current_details['Dodatkowe pytanie'][0];
                                $trip_current_question_tip = $trip_current_details['Dodatkowe pytanie / podpowiedź'][0];

                            }


                            ?>

                            <option id="trip-<?php echo $trip->ID; ?>"<?php if( $trip->ID == $trip_current ) echo ' selected="selected"'; ?>><?php echo $trip->post_title; ?></option>

                        <?php }; ?>

                    </select>

                </p>

                <?php if( $trip_current_times ) { ?>

                    <p>
                        <label for="time">Termin zajęć</label>

                        <select name="time" id="time">

                            <option class="default">Wybierz termin zajęć...</option>

                            <?php foreach( $trip_current_times as $time ) { ?>

                                <option><?php echo $time; ?></option>

                            <?php }; ?>

                        </select>

                    </p>

                <?php }; ?>

                <p>
                    <label for="participants-adults">Liczba osób</label>
                </p>

                <p>
                    <input type="text" class="align-right" value="0" name="participants-adults" id="participants-adults" /> <label for="participants-adults">dorosłych</label>
                </p>

<!--                <p>-->
<!--                    <input type="text" class="align-right" value="0" name="participants-children" id="participants-children" /> <label for="participants-children">dzieci</label>-->
<!--                </p>-->

            </div>

            <?php if( $trip_current_accommodation || $trip_current_accommodation_addon || $trip_current_accommodation_addon_2 || $trip_current_accommodation_addon_3 || $trip_current_accommodation_shared || $trip_current_insurance || $trip_current_insurance_addon || $trip_current_insurance_addon_2 || $trip_current_insurance_addon_3 ) { ?>

                <div<?php if ( !$trip_current_accommodation_shared ) echo ' class="small"';?>>

                    <?php if( $trip_current_accommodation || $trip_current_accommodation_addon || $trip_current_accommodation_addon_2 || $trip_current_accommodation_addon_3 || $trip_current_accommodation_shared ) { ?>

                        <p>
                            <label for="accommodation-1">Zakwaterowanie</label>
                        </p>

                        <?php if( $trip_current_accommodation || $trip_current_accommodation_addon || $trip_current_accommodation_addon_2 || $trip_current_accommodation_addon_3) { ?>

                            <?php $i = 1; ?>

                            <?php if ( $trip_current_accommodation ) { ?>

                                <?php foreach( $trip_current_accommodation as $accommodation ) { ?>

                                    <p>
                                        <input type="radio" name="accommodation" value="<?php echo $accommodation; ?>" id="accommodation-<?php echo $i; ?>" /> <label for="accommodation-<?php echo $i++; ?>"><?php echo $accommodation; ?></label>
                                    </p>

                                <?php }; ?>

                            <?php }; ?>

                            <?php if ( $trip_current_accommodation_addon ) { ?>

                                <p>
                                    <input type="radio" name="accommodation" value="<?php echo $trip_current_accommodation_addon; ?>" id="accommodation-<?php echo $i; ?>" /> <label for="accommodation-<?php echo $i++; ?>"><?php echo $trip_current_accommodation_addon; ?></label>
                                </p>

                            <?php }; ?>

                            <?php if ( $trip_current_accommodation_addon_2 ) { ?>

                                <p>
                                    <input type="radio" name="accommodation" value="<?php echo $trip_current_accommodation_addon_2; ?>" id="accommodation-<?php echo $i; ?>" /> <label for="accommodation-<?php echo $i++; ?>"><?php echo $trip_current_accommodation_addon_2; ?></label>
                                </p>

                            <?php }; ?>

                            <?php if ( $trip_current_accommodation_addon_3 ) { ?>

                                <p>
                                    <input type="radio" name="accommodation" value="<?php echo $trip_current_accommodation_addon_3; ?>" id="accommodation-<?php echo $i; ?>" /> <label for="accommodation-<?php echo $i++; ?>"><?php echo $trip_current_accommodation_addon_3; ?></label>
                                </p>

                            <?php }; ?>

                        <?php }; ?>

                        <?php if( $trip_current_accommodation_shared ) { ?>

                            <p>
                                <input type="radio" name="accommodation-shared" value="<?php echo $trip_current_accommodation_shared; ?>" id="accommodation-shared" /> <label for="accommodation-shared"><?php echo $trip_current_accommodation_shared; ?></label>
                            </p>

                        <?php }; ?>

                    <?php }; ?>

                    <?php if( $trip_current_insurance || $trip_current_insurance_addon || $trip_current_insurance_addon_2 || $trip_current_insurance_addon_3 ) { ?>

                        <p>
                            <label for="insurance-1">Ubezpieczenie</label>
                        </p>

                        <?php $i = 1; ?>

                        <?php if ( $trip_current_insurance ) { ?>

                            <?php foreach( $trip_current_insurance as $insurance ) { ?>

                                <p>
                                    <input type="radio" name="insurance" value="<?php echo $insurance; ?>" id="insurance-<?php echo $i; ?>" /> <label for="insurance-<?php echo $i++; ?>"><?php echo $insurance; ?></label>
                                </p>

                            <?php }; ?>

                        <?php }; ?>

                        <?php if ( $trip_current_insurance_addon ) { ?>

                            <p>
                                <input type="radio" name="insurance" value="<?php echo $trip_current_insurance_addon; ?>" id="insurance-<?php echo $i; ?>" /> <label for="insurance-<?php echo $i++; ?>"><?php echo $trip_current_insurance_addon; ?></label>
                            </p>

                        <?php }; ?>

                        <?php if ( $trip_current_insurance_addon_2 ) { ?>

                            <p>
                                <input type="radio" name="insurance" value="<?php echo $trip_current_insurance_addon_2; ?>" id="insurance-<?php echo $i; ?>" /> <label for="insurance-<?php echo $i++; ?>"><?php echo $trip_current_insurance_addon_2; ?></label>
                            </p>

                        <?php }; ?>

                        <?php if ( $trip_current_insurance_addon_3 ) { ?>

                            <p>
                                <input type="radio" name="insurance" value="<?php echo $trip_current_insurance_addon_3; ?>" id="insurance-<?php echo $i; ?>" /> <label for="insurance-<?php echo $i++; ?>"><?php echo $trip_current_insurance_addon_3; ?></label>
                            </p>

                        <?php }; ?>

                    <?php }; ?>


                </div>

            <?php }; ?>

            <?php if( $trip_current_training || $trip_current_training_addon || $trip_current_training_addon_2 || $trip_current_training_addon_3 ) { ?>

                <div class="small">

                    <p>
                        <label for="training-1">Szkolenie</label>
                    </p>

                    <?php $i = 1; ?>

                    <?php if ( $trip_current_training ) { ?>

                        <?php foreach( $trip_current_training as $training ) { ?>

                            <p>
                                <input type="radio" name="training" value="<?php echo $training; ?>" id="training-<?php echo $i; ?>" /> <label for="training-<?php echo $i++; ?>"><?php echo $training; ?></label>
                            </p>

                        <?php }; ?>

                    <?php }; ?>

                    <?php if ( $trip_current_training_addon ) { ?>

                        <p>
                            <input type="radio" name="training" value="<?php echo $trip_current_training_addon; ?>" id="training-<?php echo $i; ?>" /> <label for="training-<?php echo $i++; ?>"><?php echo $trip_current_training_addon; ?></label>
                        </p>

                    <?php }; ?>

                    <?php if ( $trip_current_training_addon_2 ) { ?>

                        <p>
                            <input type="radio" name="training" value="<?php echo $trip_current_training_addon_2; ?>" id="training-<?php echo $i; ?>" /> <label for="training-<?php echo $i++; ?>"><?php echo $trip_current_training_addon_2; ?></label>
                        </p>

                    <?php }; ?>

                    <?php if ( $trip_current_training_addon_3 ) { ?>

                        <p>
                            <input type="radio" name="training" value="<?php echo $trip_current_training_addon_3; ?>" id="training-<?php echo $i; ?>" /> <label for="training-<?php echo $i++; ?>"><?php echo $trip_current_training_addon_3; ?></label>
                        </p>

                    <?php }; ?>

                </div>

            <?php }; ?>

            <?php if( $trip_current_question ) { ?>

                <div class="question">

                    <p>
                        <label for="question"><?php echo $trip_current_question; ?></label>
                        <textarea name="question" id="question"><?php echo $trip_current_question_tip; ?></textarea>
                    </p>

                </div>

            <?php }; ?>

            <button id="next">Dalej</button>
        </fieldset>
        <fieldset rel="step-2">
            <legend>Uczestnicy oferty</legend>
            <div>
                <p>
                    <label for="name">Dane podstawowe</label>
                    <input type="text" value="Imię" name="name" id="name" />
                    <input type="text" value="Nazwisko" name="surname" id="surname" />
                    <input type="text" value="Data urodzenia" name="birth" id="birth" />
                    <input type="text" value="Nr PESEL" name="pesel" id="pesel" />
                </p>
                <p>
                    <label for="email">Dane kontaktowe</label>
                    <input type="text" value="Adres e-mail" name="email" id="email" />
                    <input type="text" value="Telefon kontaktowy" name="telephone" id="telephone" />
                </p>
            </div>
            <div>
                <p>
                    <label for="province">Adres do korespondencji</label>
                    <select name="province" id="province">
                        <option class="default">Województwo</option>
                        <option value="dolnośląskie">dolnośląskie</option>
                        <option value="kujawsko-pomorskie">kujawsko-pomorskie</option>
                        <option value="lubelskie">lubelskie</option>
                        <option value="lubuskie">lubuskie</option>
                        <option value="łódzkie">łódzkie</option>
                        <option value="małopolskie">małopolskie</option>
                        <option value="mazowieckie">mazowieckie</option>
                        <option value="opolskie">opolskie</option>
                        <option value="podkarpackie">podkarpackie</option>
                        <option value="podlaskie">podlaskie</option>
                        <option value="pomorskie">pomorskie</option>
                        <option value="śląskie">śląskie</option>
                        <option value="świętokrzyskie">świętokrzyskie</option>
                        <option value="warmińsko-mazurskie">warmińsko-mazurskie</option>
                        <option value="wielkopolskie">wielkopolskie</option>
                        <option value="zachodniopomorskie">zachodniopomorskie</option>
                    </select>
                    <input type="text" value="Miejscowość" name="city" id="city" />
                    <input type="text" value="Ulica" name="street" id="street" />
                    <input type="text" value="Nr lokalu" name="number" id="number" />
                    <input type="text" value="Kod pocztowy" name="postalcode" id="postalcode" />
                </p>
            </div>
            <ul id="steps"></ul>
            <button id="prev-person">Poprzednia osoba</button>
            <button id="next-person">Następna osoba</button>
        </fieldset>
        <fieldset rel="step-3">
            <legend>Podsumowanie</legend>
            <div id="details"></div>
            <div>
                <p>
                    <label for="payment">Forma płatności</label>
                    <select name="payment" id="payment">
                        <option class="default">Wybierz</option>
                        <option value="Przelew w euro">Przelew w euro</option>
                        <option value="Przelew w złotówkach">Przelew w złotówkach</option>
                    </select>
                </p>
                <p>
                    <label for="msg">Wasze pytania oraz sugestie</label>
                    <textarea name="msg" id="msg">Czy masz jakieś życzenia specjalne?</textarea>
                </p>
            </div>
            <button id="next">Dalej</button>
        </fieldset>

        <fieldset rel="step-4">
            <legend>Ankieta</legend>
            <div class="poll">
                <p class="poll1">
                    <label for="info2">Znamy się?</label>
                    <select name="info2" id="info2">
                        <option class="default">Wybierz</option>
                        <option value="byłem/byłam już na wyjeździe z Adventure Element">byłem/byłam już na wyjeździe z Adventure Element</option>
                        <option value="to mój pierwszy wyjazd z tym klubem">to mój pierwszy wyjazd z tym klubem</option>
                    </select>
                </p>
                <p class="poll2">
                    <label for="info">Skąd dowiedziałem się o Adventure Element?</label>
                    <select name="info" id="info">
                        <option class="default">Wybierz</option>
                        <option value="Strona internetowa">Strona internetowa</option>
                        <option value="Facebook">Facebook</option>
                        <option value="Plakaty">Plakaty</option>
                        <option value="Ulotki">Ulotki</option>
                        <option value="Znajomi">Znajomi</option>
                        <option value="Rodzina">Rodzina</option>
                        <option value="Inne">Inne</option>
                    </select>
                </p>
            </div>

            <div class="thx">

                <strong>Dziękujemy. Do zobaczenia!</strong>
                <p>Szczegóły dotyczące wyjazdu prześlemy na podany adres mailowy</p>

            </div>


            <button id="send">Wyślij</button>
        </fieldset>

    <?php }; ?>

    <?php
    wp_reset_postdata();
    the_content();
    ?>
<?php endif; ?>

<!-- END FORMULARZ DLA TRENERA-->

<!-- START FORMULARZ DLA OFERTY-->


<?php if(isset($_GET['oferta'])):?>

    <?php $trips = get_posts( 'category=4&numberposts=-1' ); ?>
    <?php if( $trips ) { ?>

        <fieldset rel="step-1">

            <legend>Formularz zgłoszeniowy</legend>

            <div>

                <p>

                    <label for="offert">Oferta</label>

                    <select name="offert" id="offert">

                        <option value="" class="default">Wybierz ofertę...</option>

                        <?php foreach( $trips as $trip ) { ?>

                            <?php

                            if( isset( $_GET['oferta'] ) && $trip->ID == $_GET['oferta'] ) {

                                $trip_current = $trip->ID;


                                $trip_current_details = get_post_custom_x( $trip_current );

                                $trip_current_dates = preg_split( '/\r\n|\r|\n/', $trip_current_details['Terminy do formularza'][0] );

                                $trip_current_times = array();

                                foreach( $trip_current_dates as $item ){

                                    $item = trim( $item );
                                    if( $item != '' ) $trip_current_times[] = $item;

                                }

                                $trip_current_training = $trip_current_details['Szkolenie'];
                                $trip_current_training_addon = $trip_current_details['Szkolenie (dodatkowo)'][0];
                                $trip_current_training_addon_2 = $trip_current_details['Szkolenie (dodatkowo, 2)'][0];
                                $trip_current_training_addon_3 = $trip_current_details['Szkolenie (dodatkowo, 3)'][0];

                                $trip_current_accommodation = $trip_current_details['Zakwaterowanie'];
                                $trip_current_accommodation_addon = $trip_current_details['Zakwaterowanie (dodatkowo)'][0];
                                $trip_current_accommodation_addon_2 = $trip_current_details['Zakwaterowanie (dodatkowo, 2)'][0];
                                $trip_current_accommodation_addon_3 = $trip_current_details['Zakwaterowanie (dodatkowo, 3)'][0];
                                $trip_current_accommodation_shared = $trip_current_details['Zakwaterowanie z innym uczestnikiem'][0];

                                $trip_current_insurance = $trip_current_details['Ubezpieczenie'];
                                $trip_current_insurance_addon = $trip_current_details['Ubezpieczenie (dodatkowo)'][0];
                                $trip_current_insurance_addon_2 = $trip_current_details['Ubezpieczenie (dodatkowo, 2)'][0];
                                $trip_current_insurance_addon_3 = $trip_current_details['Ubezpieczenie (dodatkowo, 3)'][0];


                                $trip_current_question = $trip_current_details['Dodatkowe pytanie'][0];
                                $trip_current_question_tip = $trip_current_details['Dodatkowe pytanie / podpowiedź'][0];

                            }


                            ?>

                            <option id="trip-<?php echo $trip->ID; ?>"<?php if( $trip->ID == $trip_current ) echo ' selected="selected"'; ?>><?php echo $trip->post_title; ?></option>

                        <?php }; ?>

                    </select>

                </p>

                <?php if( $trip_current_times ) { ?>

                    <p>
                        <label for="time">Termin </label>

                        <select name="time" id="time">

                            <option class="default">Wybierz termin...</option>

                            <?php foreach( $trip_current_times as $time ) { ?>

                                <option><?php echo $time; ?></option>

                            <?php }; ?>

                        </select>

                    </p>

                <?php }; ?>

                <p>
                    <label for="participants-adults">Liczba osób</label>
                </p>

                <p>
                    <input type="text" class="align-right" value="0" name="participants-adults" id="participants-adults" /> <label for="participants-adults">dorosłych</label>
                </p>

<!--                <p>-->
<!--                    <input type="text" class="align-right" value="0" name="participants-children" id="participants-children" /> <label for="participants-children">dzieci</label>-->
<!--                </p>-->

            </div>

            <?php if( $trip_current_accommodation || $trip_current_accommodation_addon || $trip_current_accommodation_addon_2 || $trip_current_accommodation_addon_3 || $trip_current_accommodation_shared || $trip_current_insurance || $trip_current_insurance_addon || $trip_current_insurance_addon_2 || $trip_current_insurance_addon_3 ) { ?>

                <div<?php if ( !$trip_current_accommodation_shared ) echo ' class="small"';?>>

                    <?php if( $trip_current_accommodation || $trip_current_accommodation_addon || $trip_current_accommodation_addon_2 || $trip_current_accommodation_addon_3 || $trip_current_accommodation_shared ) { ?>

                        <p>
                            <label for="accommodation-1">Zakwaterowanie</label>
                        </p>

                        <?php if( $trip_current_accommodation || $trip_current_accommodation_addon || $trip_current_accommodation_addon_2 || $trip_current_accommodation_addon_3) { ?>

                            <?php $i = 1; ?>

                            <?php if ( $trip_current_accommodation ) { ?>

                                <?php foreach( $trip_current_accommodation as $accommodation ) { ?>

                                    <p>
                                        <input type="radio" name="accommodation" value="<?php echo $accommodation; ?>" id="accommodation-<?php echo $i; ?>" /> <label for="accommodation-<?php echo $i++; ?>"><?php echo $accommodation; ?></label>
                                    </p>

                                <?php }; ?>

                            <?php }; ?>

                            <?php if ( $trip_current_accommodation_addon ) { ?>

                                <p>
                                    <input type="radio" name="accommodation" value="<?php echo $trip_current_accommodation_addon; ?>" id="accommodation-<?php echo $i; ?>" /> <label for="accommodation-<?php echo $i++; ?>"><?php echo $trip_current_accommodation_addon; ?></label>
                                </p>

                            <?php }; ?>

                            <?php if ( $trip_current_accommodation_addon_2 ) { ?>

                                <p>
                                    <input type="radio" name="accommodation" value="<?php echo $trip_current_accommodation_addon_2; ?>" id="accommodation-<?php echo $i; ?>" /> <label for="accommodation-<?php echo $i++; ?>"><?php echo $trip_current_accommodation_addon_2; ?></label>
                                </p>

                            <?php }; ?>

                            <?php if ( $trip_current_accommodation_addon_3 ) { ?>

                                <p>
                                    <input type="radio" name="accommodation" value="<?php echo $trip_current_accommodation_addon_3; ?>" id="accommodation-<?php echo $i; ?>" /> <label for="accommodation-<?php echo $i++; ?>"><?php echo $trip_current_accommodation_addon_3; ?></label>
                                </p>

                            <?php }; ?>

                        <?php }; ?>

                        <?php if( $trip_current_accommodation_shared ) { ?>

                            <p>
                                <input type="radio" name="accommodation-shared" value="<?php echo $trip_current_accommodation_shared; ?>" id="accommodation-shared" /> <label for="accommodation-shared"><?php echo $trip_current_accommodation_shared; ?></label>
                            </p>

                        <?php }; ?>

                    <?php }; ?>

                    <?php if( $trip_current_insurance || $trip_current_insurance_addon || $trip_current_insurance_addon_2 || $trip_current_insurance_addon_3 ) { ?>

                        <p>
                            <label for="insurance-1">Ubezpieczenie</label>
                        </p>

                        <?php $i = 1; ?>

                        <?php if ( $trip_current_insurance ) { ?>

                            <?php foreach( $trip_current_insurance as $insurance ) { ?>

                                <p>
                                    <input type="radio" name="insurance" value="<?php echo $insurance; ?>" id="insurance-<?php echo $i; ?>" /> <label for="insurance-<?php echo $i++; ?>"><?php echo $insurance; ?></label>
                                </p>

                            <?php }; ?>

                        <?php }; ?>

                        <?php if ( $trip_current_insurance_addon ) { ?>

                            <p>
                                <input type="radio" name="insurance" value="<?php echo $trip_current_insurance_addon; ?>" id="insurance-<?php echo $i; ?>" /> <label for="insurance-<?php echo $i++; ?>"><?php echo $trip_current_insurance_addon; ?></label>
                            </p>

                        <?php }; ?>

                        <?php if ( $trip_current_insurance_addon_2 ) { ?>

                            <p>
                                <input type="radio" name="insurance" value="<?php echo $trip_current_insurance_addon_2; ?>" id="insurance-<?php echo $i; ?>" /> <label for="insurance-<?php echo $i++; ?>"><?php echo $trip_current_insurance_addon_2; ?></label>
                            </p>

                        <?php }; ?>

                        <?php if ( $trip_current_insurance_addon_3 ) { ?>

                            <p>
                                <input type="radio" name="insurance" value="<?php echo $trip_current_insurance_addon_3; ?>" id="insurance-<?php echo $i; ?>" /> <label for="insurance-<?php echo $i++; ?>"><?php echo $trip_current_insurance_addon_3; ?></label>
                            </p>

                        <?php }; ?>

                    <?php }; ?>


                </div>

            <?php }; ?>

            <?php if( $trip_current_training || $trip_current_training_addon || $trip_current_training_addon_2 || $trip_current_training_addon_3 ) { ?>

                <div class="small">

                    <p>
                        <label for="training-1">Szkolenie</label>
                    </p>

                    <?php $i = 1; ?>

                    <?php if ( $trip_current_training ) { ?>

                        <?php foreach( $trip_current_training as $training ) { ?>

                            <p>
                                <input type="radio" name="training" value="<?php echo $training; ?>" id="training-<?php echo $i; ?>" /> <label for="training-<?php echo $i++; ?>"><?php echo $training; ?></label>
                            </p>

                        <?php }; ?>

                    <?php }; ?>

                    <?php if ( $trip_current_training_addon ) { ?>

                        <p>
                            <input type="radio" name="training" value="<?php echo $trip_current_training_addon; ?>" id="training-<?php echo $i; ?>" /> <label for="training-<?php echo $i++; ?>"><?php echo $trip_current_training_addon; ?></label>
                        </p>

                    <?php }; ?>

                    <?php if ( $trip_current_training_addon_2 ) { ?>

                        <p>
                            <input type="radio" name="training" value="<?php echo $trip_current_training_addon_2; ?>" id="training-<?php echo $i; ?>" /> <label for="training-<?php echo $i++; ?>"><?php echo $trip_current_training_addon_2; ?></label>
                        </p>

                    <?php }; ?>

                    <?php if ( $trip_current_training_addon_3 ) { ?>

                        <p>
                            <input type="radio" name="training" value="<?php echo $trip_current_training_addon_3; ?>" id="training-<?php echo $i; ?>" /> <label for="training-<?php echo $i++; ?>"><?php echo $trip_current_training_addon_3; ?></label>
                        </p>

                    <?php }; ?>

                </div>

            <?php }; ?>

            <?php if( $trip_current_question ) { ?>

                <div class="question">

                    <p>
                        <label for="question"><?php echo $trip_current_question; ?></label>
                        <textarea name="question" id="question"><?php echo $trip_current_question_tip; ?></textarea>
                    </p>

                </div>

            <?php }; ?>

            <button id="next">Dalej</button>
        </fieldset>
        <fieldset rel="step-2">
            <legend>Uczestnicy oferty</legend>
            <div>
                <p>
                    <label for="name">Dane podstawowe</label>
                    <input type="text" value="Imię" name="name" id="name" />
                    <input type="text" value="Nazwisko" name="surname" id="surname" />
                    <input type="text" value="Data urodzenia" name="birth" id="birth" />
                    <input type="text" value="Nr PESEL" name="pesel" id="pesel" />
                </p>
                <p>
                    <label for="email">Dane kontaktowe</label>
                    <input type="text" value="Adres e-mail" name="email" id="email" />
                    <input type="text" value="Telefon kontaktowy" name="telephone" id="telephone" />
                </p>
            </div>
            <div>
                <p>
                    <label for="province">Adres do korespondencji</label>
                    <select name="province" id="province">
                        <option class="default">Województwo</option>
                        <option value="dolnośląskie">dolnośląskie</option>
                        <option value="kujawsko-pomorskie">kujawsko-pomorskie</option>
                        <option value="lubelskie">lubelskie</option>
                        <option value="lubuskie">lubuskie</option>
                        <option value="łódzkie">łódzkie</option>
                        <option value="małopolskie">małopolskie</option>
                        <option value="mazowieckie">mazowieckie</option>
                        <option value="opolskie">opolskie</option>
                        <option value="podkarpackie">podkarpackie</option>
                        <option value="podlaskie">podlaskie</option>
                        <option value="pomorskie">pomorskie</option>
                        <option value="śląskie">śląskie</option>
                        <option value="świętokrzyskie">świętokrzyskie</option>
                        <option value="warmińsko-mazurskie">warmińsko-mazurskie</option>
                        <option value="wielkopolskie">wielkopolskie</option>
                        <option value="zachodniopomorskie">zachodniopomorskie</option>
                    </select>
                    <input type="text" value="Miejscowość" name="city" id="city" />
                    <input type="text" value="Ulica" name="street" id="street" />
                    <input type="text" value="Nr lokalu" name="number" id="number" />
                    <input type="text" value="Kod pocztowy" name="postalcode" id="postalcode" />
                </p>
            </div>
            <ul id="steps"></ul>
            <button id="prev-person">Poprzednia osoba</button>
            <button id="next-person">Następna osoba</button>
        </fieldset>
        <fieldset rel="step-3">
            <legend>Podsumowanie</legend>
            <div id="details"></div>
            <div>
                <p>
                    <label for="payment">Forma płatności</label>
                    <select name="payment" id="payment">
                        <option class="default">Wybierz</option>
                        <option value="Przelew w euro">Przelew w euro</option>
                        <option value="Przelew w złotówkach">Przelew w złotówkach</option>
                    </select>
                </p>
                <p>
                    <label for="msg">Wasze pytania oraz sugestie</label>
                    <textarea name="msg" id="msg">Czy masz jakieś życzenia specjalne?</textarea>
                </p>
            </div>
            <button id="next">Dalej</button>
        </fieldset>

        <fieldset rel="step-4">
            <legend>Ankieta</legend>
            <div class="poll">
                <p class="poll1">
                    <label for="info2">Znamy się?</label>
                    <select name="info2" id="info2">
                        <option class="default">Wybierz</option>
                        <option value="byłem/byłam już na wyjeździe z Adventure Element">byłem/byłam już na wyjeździe z Adventure Element</option>
                        <option value="to mój pierwszy wyjazd z tym klubem">to mój pierwszy wyjazd z tym klubem</option>
                    </select>
                </p>
                <p class="poll2">
                    <label for="info">Skąd dowiedziałem się o Adventure Element?</label>
                    <select name="info" id="info">
                        <option class="default">Wybierz</option>
                        <option value="Strona internetowa">Strona internetowa</option>
                        <option value="Facebook">Facebook</option>
                        <option value="Plakaty">Plakaty</option>
                        <option value="Ulotki">Ulotki</option>
                        <option value="Znajomi">Znajomi</option>
                        <option value="Rodzina">Rodzina</option>
                        <option value="Inne">Inne</option>
                    </select>
                </p>
            </div>

            <div class="thx">

                <strong>Dziękujemy. Do zobaczenia!</strong>
                <p>Szczegóły dotyczące wyjazdu prześlemy na podany adres mailowy</p>

            </div>


            <button id="send">Wyślij</button>
        </fieldset>

    <?php }; ?>

    <?php
    wp_reset_postdata();
    the_content();
    ?>

<?php endif; ?>

<script>Cufon.now()</script>
<script type='text/javascript' src='http://adventureelement.pl/wp-content/plugins/contact-form-7/includes/js/jquery.form.js?ver=3.09'></script>
<script type='text/javascript'>
/* <![CDATA[ */
var _wpcf7 = {"loaderUrl":"http:\/\/adventureelement.pl\/wp-content\/plugins\/contact-form-7\/images\/ajax-loader.gif","sending":"Wysy\u0142anie..."};
/* ]]> */
</script>
<script type='text/javascript' src='http://adventureelement.pl/wp-content/plugins/contact-form-7/includes/js/scripts.js?ver=3.2'></script>
</body>
</html>