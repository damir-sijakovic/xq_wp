<?php
/**
 * Template Name: Blank Template
 *
 * Displays the  Blank Template Layout of the theme.
 *
 * @package xq
 * @subpackage xq
 * @since xq 1.0.0
 */

$myCss = get_template_directory_uri() . '/assets/xq/xq.css';
// $bootstrapJs = get_template_directory_uri() . '/assets/library/bootstrap/js/bootstrap.min.js';
// /assets/library/bootstrap/js/bootstrap.min.js', array('jquery'), '4.0.0', true);

?>

<link rel="stylesheet" href="<?php echo $myCss;  ?>">



<!DOCTYPE html>
<html>
<title><?php wp_title() ?></title>
<style>

</style>
<body class="xq-animate-top" style="display:none;" onload="bodyOnLoad(this)">
	
<?php the_content(); ?>
	
</body>
</html>


<script>

function bodyOnLoad(that)
{
	document.body.style.display = 'block';
}

</script>
