<?php
/* 
Template name: Team 
*/
?>
<?php get_header(); ?>
<div id="content">
    <div>
        <hgroup id="slogan">
            <h1>Adventure Element</h1>
            <h2>Od nas zaczyna się przygoda!</h2>
        </hgroup>
		<?php the_post(); the_content(); ?>
    </div>
</div>
<?php get_footer(); ?>