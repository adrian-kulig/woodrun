<?php
/*
Template name: Konkurs
*/


get_header();

$args = array(
    'posts_per_page' => -1,
    'orderby' => 'date',
    'order' => 'DESC',
    'post_type' => 'competition-movies',
    'post_status' => 'publish',
);

$posts = get_posts($args);
?>
<!--    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css"-->
<!--          integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">-->

    <div class="container" style="padding:0;">
        <div id="content">
            <div class="competition-content">
                <div class="row">
                    <div class="col-md-12">
                        <hgroup id="slogan">
                            <h1>Filmy konkursowe</h1>
                            <h5 class="target-competition-modal">Prześlij nam swój film i weź udział w konkursie</h5>
                        </hgroup>
                    </div>



                    <?php foreach ($posts as $post): ?>

                        <?php
                        $movie = get_field('movie', $post);
                        $name = get_field('name', $post);
                        $description = get_field('krotki_opis', $post);
                        ?>

                        <div class="col-md-4 movie-box">
                            <div class="box">
                                <h5><?php echo $name;?></h5>
                                <span><?php echo short_text_after_characters($description,150);?></span>
<!--                                <div class="poster" data-id="--><?php //echo $post->ID;?><!--"></div>-->
                                    <video width="100%" height="auto" controls>
                                        <source src="<?php echo $movie;?>" type="video/mp4">
                                    </video>

                                <div class="more-info">
                                    <a class="show-more" data-id="<?php echo $post->ID;?>">Zobacz więcej</a>
                                </div>
                            </div>
                        </div>

                    <?php endforeach; ?>

                </div>
            </div>
        </div>
    </div>



<div id="template-movie-modal" class="modal" role="dialog">
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


