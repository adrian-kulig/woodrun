<?php
/**
Template Page for the album overview (extended)

Follow variables are useable :

	$album     	 : Contain information about the album
	$galleries   : Contain all galleries inside this album
	$pagination  : Contain the pagination content

 You can check the content when you insert the tag <?php var_dump($variable) ?>
 If you would like to show the timestamp of the image ,you can use <?php echo $exif['created_timestamp'] ?>
**/
?>
<?php if (!defined ('ABSPATH')) die ('No direct access allowed'); ?><?php if (!empty ($galleries)) : ?>

        <ul id="albums">
<?php foreach ($galleries as $gallery) : ?>
            <li>
                <div>
                    <a class="gallery_link" href="<?php echo nextgen_esc_url($gallery->pagelink); ?>">
						<span><img src="<?php echo nextgen_esc_url($gallery->previewurl); ?>" alt="<?php echo $gallery->title ?>" /></span>
					</a>
                    <h3><?php echo $gallery->title ?></h3>
                    <p><?php echo $gallery->galdesc ?></p>
                </div>
            </li>
<?php endforeach; ?>
        </ul>
<?php endif; ?>