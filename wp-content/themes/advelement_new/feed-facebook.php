<?php
/**
 * Atom Feed Template for displaying Atom Posts feed.
 *
 * @package WordPress
 */

header('Content-Type: ' . feed_content_type('atom') . '; charset=' . get_option('blog_charset'), true);
$more = 1;

echo '<?xml version="1.0" encoding="'.get_option('blog_charset').'"?'.'>'; ?>
<feed
  xmlns="http://www.w3.org/2005/Atom"
  xmlns:thr="http://purl.org/syndication/thread/1.0"
  xml:lang="<?php echo get_option('rss_language'); ?>"
  xml:base="<?php bloginfo_rss('url') ?>/wp-atom.php"
>
	<title type="text"><?php bloginfo_rss('name'); wp_title_rss(); ?></title>
	<subtitle type="text"><?php bloginfo_rss("description") ?></subtitle>

	<updated><?php echo mysql2date('Y-m-d\TH:i:s\Z', get_lastpostmodified('GMT'), false); ?></updated>

	<link rel="alternate" type="text/html" href="<?php bloginfo_rss('url') ?>" />
	<id><?php bloginfo('url'); ?>/?feed=facebook</id>
	<link rel="self" type="application/atom+xml" href="<?php self_link(); ?>" />
<?php global $query_string; query_posts($query_string."&cat=11"); ?>
<?php while (have_posts()) : the_post(); ?>
	<entry>
		<author>
			<name><?php the_author() ?></name>
<?php
	global $post;
	$img = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'medium');	
	$author_url = get_the_author_meta('url'); if ( !empty($author_url) ) :
?>
			<uri><?php the_author_meta('url')?></uri>
<?php endif; ?>
		</author>
		<title type="<?php html_type_rss(); ?>"><![CDATA[<?php the_title_rss() ?>]]></title>
		<link rel="alternate" type="text/html" href="<?php the_permalink_rss() ?>" />
		<id><?php the_guid() ; ?></id>
		<updated><?php echo get_post_modified_time('Y-m-d\TH:i:s\Z', true); ?></updated>
		<published><?php echo get_post_time('Y-m-d\TH:i:s\Z', true); ?></published>
		<?php the_category_rss('atom') ?>
		
		<summary type="<?php html_type_rss(); ?>"><![CDATA[<img src="<?php echo $img[0] ?>" alt="" /><?php the_excerpt_rss(); ?>]]></summary>
<?php atom_enclosure(); ?>
<?php do_action('atom_entry'); ?>
		<link rel="replies" type="text/html" href="<?php the_permalink_rss() ?>#comments" thr:count="<?php echo get_comments_number()?>"/>
		<thr:total><?php echo get_comments_number()?></thr:total>
	</entry>
<?php endwhile ; ?>
</feed>
