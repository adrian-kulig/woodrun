    <section id="comments">
<?php 
    if(have_comments()):
?>
		<ol>
			<?php
				wp_list_comments( array( 'callback' => 'adv_comment' ) );
			?>
		</ol>
<?php
    endif;
?>
    </section>
    <section id="comment-form">
<?php 
    $args = array(
        'fields' => apply_filters('comment_form_default_fields', $fields),
        'logged_in_as' => false,
        'comment_notes_before' => false,
        'comment_notes_after' => false,
        'cancel_reply_link' => false,
        'title_reply' => 'Wyślij nam swoją opinię',
        'id_form' => '',
        'comment_field' => '<p><textarea name="comment">Twój komentarz</textarea></p>',
        'label_submit' => ''
    );
    comment_form($args); 
?>
    </section>