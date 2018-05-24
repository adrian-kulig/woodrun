<?php
/**
 * The template for displaying all single posts.
 */

session_start();
get_header();
setup_postdata(get_queried_object());
$postID = get_the_ID(get_queried_object());


?>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css"
      integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">

<div class="container" style="padding:0;">
    <div id="content">
        <div class="competition-content">
            <div class="row">
                <div class="col-md-12">
                    <hgroup id="slogan">
                        <h1>Twoja biblioteka ćwiczeń</h1>

                        <?php  if(!isset($_SESSION['user']) || $_SESSION['user'] != $postID):?>
                            <div class="exercies-password">
                                <span>Podaj swoje hasło do repozytorium</span>
                                <form id="select-exercises">
                                    <input type="password" name="exercises-pass" id="exercises-pass">
                                    <input type="hidden" id="post_id" value="<?php echo get_the_ID(get_queried_object());?>">
                                    <input type="hidden" id="exercises-email" value="<?php echo get_field('email',get_queried_object());?>">
                                    <input type="hidden" id="end_date" value="<?php echo get_field('data_konca_pakietu',get_queried_object());?>">
                                    <button id="send-pass" value="Wyślij">Wyślij</button>
                                </form>


                                <div id="exercies-message">
                                    <span>Podane hasło jest nieprawidłowe.</span>
                                </div>

                                <div id="exercies-message-end-date">
                                    <span>Twój pakiet wygasł.</span>
                                </div>
                            </div>
                        <?php endif;?>
                    </hgroup>
                </div>
            </div>
            <div class="row" id="exercies-list-item">

                <?php


                if(isset($_SESSION['user']) && $_SESSION['user'] == $postID):?>

                <?php

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

                echo $html;

                endif; ?>


            </div>
        </div>
    </div>
</div>



<div id="template-exercise-modal" class="modal" role="dialog">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="competition-body">

                </div>
            </div>
        </div>
    </div>
</div>



<?php get_footer();?>


