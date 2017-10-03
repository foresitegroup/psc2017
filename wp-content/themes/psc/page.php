<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 */

get_header(); ?>

<div class="site-width content">
	<?php
	while ( have_posts() ) : the_post();
		if (!is_front_page()) :
			echo "<div class=\"page-header\">\n";
			  echo "<h1>";
			    the_title();
			    custom_breadcrumbs();
			  echo "</h1>\n";
			echo "</div>\n";
		endif;

		the_content();
	endwhile; // End of the loop.
	?>
</div>

<?php get_footer();
