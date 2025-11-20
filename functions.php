<?php
/**
* @package   Avenue
* @author    YOOtheme http://www.yootheme.com
* @copyright Copyright (C) YOOtheme GmbH
* @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
*/

// check compatibility
if (version_compare(PHP_VERSION, '5.3', '>=')) {

    // bootstrap warp
    require(__DIR__.'/warp.php');
}

//remove_action('wp_head', 'wp_generator');

	remove_action( 'do_feed_rdf',  'do_feed_rdf',  10, 1 );
	remove_action( 'do_feed_rss',  'do_feed_rss',  10, 1 );
	// remove_action( 'do_feed_rss2', 'do_feed_rss2', 10, 1 );
	remove_action( 'do_feed_atom', 'do_feed_atom', 10, 1 );
	add_action( 'wp', function(){
		remove_action('wp_head', 'parent_post_rel_link', 10, 0); // prev link
		remove_action('wp_head', 'start_post_rel_link', 10, 0); // start link
		remove_action('wp_head', 'wp_generator');
		remove_action('wp_head', 'feed_links_extra', 3);
		remove_action('wp_head', 'rsd_link');

		remove_action('wp_head', 'wlwmanifest_link');
		remove_action('wp_head', 'index_rel_link');
		remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0);
		remove_action('wp_head', 'wp_oembed_add_discovery_links');

		remove_action('wp_head', 'rel_canonical');
		remove_action('wp_head', 'rest_output_link_wp_head');

		// Emoji
		remove_action('wp_print_styles', 'print_emoji_styles');
		remove_action('admin_print_scripts', 'print_emoji_detection_script');
		remove_action('admin_print_styles', 'print_emoji_styles');
		// remove_action('template_redirect', 'rest_output_link_header', 11, 0);
		remove_filter('wp_mail', 'wp_staticize_emoji_for_email');
		remove_filter('the_content_feed', 'wp_staticize_emoji');
		remove_filter('comment_text_rss', 'wp_staticize_emoji');
	});

add_filter( 'post_gallery', 'gallery_function', 10, 2 );

function gallery_function( $output, $atts ) {
	global $post; 
	$out = '';
	if($atts["ids"]):
		$arrs = explode(',', $atts["ids"]);
		if(count($arrs)):
			$out = '<figure class="wp-block-gallery has-nested-images columns-default is-cropped">';
			foreach($arrs as $idstr):
				$id = (int)$idstr;
				if($src = wp_get_attachment_url($id)):
					$medium = wp_get_attachment_image_src($id, "medium");
					$out .= '
		<figure class="wp-block-image size-large">
			<a href="' . $src . '" target="_blank" data-fancybox="gallery-' . $post->ID . '">
				<img decoding="async" width="' . $medium[1] . '" height="' . $medium[2] . '" data-id="' . $id . '" class="wp-image-' . $id . '" src="' . $medium[0] . '" alt="">
			</a>
		</figure>';
				endif;
			endforeach;
			$out .= '
	</figure>';
		endif;
	endif;
	return $out;
}
// Update CSS within admin area
/*
function zi_admin_styles() {
  wp_enqueue_style('admin-styles', get_template_directory_uri().'/hide-php-update-message.css', array(), '1.0', 'all');
}
add_action('admin_enqueue_scripts', 'zi_admin_styles');
*/
