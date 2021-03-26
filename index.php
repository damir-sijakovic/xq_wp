<?php get_header(); ?>
<main id="content" class="xq-container">
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<?php get_template_part( 'entry' ); ?>
<?php comments_template(); ?>
<?php endwhile; endif; ?>
<?php get_template_part( 'nav', 'below' ); ?>

<div class="xq-contrainer xq-stripe-40 xq-padding"> 

<h1>Wordpress Boilerplate</h1>

<p>Features:</p>

<ul>
    <li>Blank Page Template - create empty pages.</li>
    <li>Typography - nice looking fonts.</li>
    <li>w3.css Components Compatible - just rename w3-component to xq-component.</li>
    <li>onLoad js function - do stuff after everything is loaded. </li>
</ul>

<div class="xq-btn xq-blue xq-large">Hello Button</div>
<br>
<small>* You can edit this section in 'theme/index.php'.</small>
<br><br>
</div>

</main>
<?php get_sidebar(); ?>
<?php get_footer(); ?>