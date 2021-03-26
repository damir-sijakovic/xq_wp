<?php
/**
 * Template Name: Front Page Template
 *
 * Displays the Front Page Layout of the theme.
 *
 * @package xq
 * @subpackage xq
 * @since xq 1.0.0
 */
get_header();
echo '<h1>';
single_post_title();
echo '</h1>';
the_content();
get_footer();







