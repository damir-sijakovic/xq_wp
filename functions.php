<?php
add_action('after_setup_theme', 'dsijakXq_setup');
function dsijakXq_setup()
{
    load_theme_textdomain('dsijakXq', get_template_directory() . '/languages');
    add_theme_support('title-tag');
    add_theme_support('automatic-feed-links');
    add_theme_support('post-thumbnails');
    add_theme_support('html5', ['search-form']);
    global $content_width;
    if (!isset($content_width)) {
        $content_width = 1920;
    }
    register_nav_menus(['main-menu' => esc_html__('Main Menu', 'dsijakXq')]);
}
add_action('wp_enqueue_scripts', 'dsijakXq_load_scripts');
function dsijakXq_load_scripts()
{    
    wp_enqueue_style( 'xq', get_template_directory_uri() . '/assets/xq/xq.css');
    wp_enqueue_style('dsijakXq-style', get_stylesheet_uri());
    wp_enqueue_script('jquery');
    wp_enqueue_script('postJs', get_template_directory_uri() . '/onload.js');
}
add_action('wp_footer', 'dsijakXq_footer_scripts');
function dsijakXq_footer_scripts()
{
?>

<script>
jQuery(document).ready(function ($) {
var deviceAgent = navigator.userAgent.toLowerCase();
if (deviceAgent.match(/(iphone|ipod|ipad)/)) {
$("html").addClass("ios");
$("html").addClass("mobile");
}
if (navigator.userAgent.search("MSIE") >= 0) {
$("html").addClass("ie");
}
else if (navigator.userAgent.search("Chrome") >= 0) {
$("html").addClass("chrome");
}
else if (navigator.userAgent.search("Firefox") >= 0) {
$("html").addClass("firefox");
}
else if (navigator.userAgent.search("Safari") >= 0 && navigator.userAgent.search("Chrome") < 0) {
$("html").addClass("safari");
}
else if (navigator.userAgent.search("Opera") >= 0) {
$("html").addClass("opera");
}
});
</script>

<?php
}
add_filter('document_title_separator', 'dsijakXq_document_title_separator');
function dsijakXq_document_title_separator($sep)
{
    $sep = '|';
    return $sep;
}
add_filter('the_title', 'dsijakXq_title');
function dsijakXq_title($title)
{
    if ($title == '') {
        return '...';
    } else {
        return $title;
    }
}
add_filter('the_content_more_link', 'dsijakXq_read_more_link');
function dsijakXq_read_more_link()
{
    if (!is_admin()) {
        return ' <a href="' . esc_url(get_permalink()) . '" class="more-link">...</a>';
    }
}
add_filter('excerpt_more', 'dsijakXq_excerpt_read_more_link');
function dsijakXq_excerpt_read_more_link($more)
{
    if (!is_admin()) {
        global $post;
        return ' <a href="' . esc_url(get_permalink($post->ID)) . '" class="more-link">...</a>';
    }
}
add_filter('intermediate_image_sizes_advanced', 'dsijakXq_image_insert_override');
function dsijakXq_image_insert_override($sizes)
{
    unset($sizes['medium_large']);
    return $sizes;
}
add_action('widgets_init', 'dsijakXq_widgets_init');
function dsijakXq_widgets_init()
{
    register_sidebar([
        'name' => esc_html__('Sidebar Widget Area', 'dsijakXq'),
        'id' => 'primary-widget-area',
        'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
        'after_widget' => '</li>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ]);
}
add_action('wp_head', 'dsijakXq_pingback_header');
function dsijakXq_pingback_header()
{
    if (is_singular() && pings_open()) {
        printf('<link rel="pingback" href="%s" />' . "\n", esc_url(get_bloginfo('pingback_url')));
    }
}
add_action('comment_form_before', 'dsijakXq_enqueue_comment_reply_script');
function dsijakXq_enqueue_comment_reply_script()
{
    if (get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}
function dsijakXq_custom_pings($comment)
{
    ?>
<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>"><?php echo comment_author_link(); ?></li>
<?php
}
add_filter('get_comments_number', 'dsijakXq_comment_count', 0);
function dsijakXq_comment_count($count)
{
    if (!is_admin()) {
        global $id;
        $get_comments = get_comments('status=approve&post_id=' . $id);
        $comments_by_type = separate_comments($get_comments);
        return count($comments_by_type['comment']);
    } else {
        return $count;
    }
}
?>
<!--?php add_action('wp_body_open', function() { //some code to fire or inject HTML here }); ?-->
