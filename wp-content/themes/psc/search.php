<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>

<div class="site-width content">
	<div class="page-header">
		<h1><?php printf( __( 'Search Results for %s', 'twentyseventeen' ), '<span>' . get_search_query() . '</span>' ); custom_breadcrumbs(); ?></h1>
	</div>

	<?php
	if ( have_posts() ) :
		/* Start the Loop */
		while ( have_posts() ) : the_post();
			?>

			<div class="search-result">
				<a href="<?php echo get_permalink(); ?>" class="search-title"><?php the_title(); ?></a>
				
				<?php the_excerpt(); ?>

				<a href="<?php echo get_permalink(); ?>">Read More</a>
			</div>

			<?php
		endwhile; // End of the loop.
	else : ?>
		<p>Sorry, nothing matched your search terms. Please try again with some different keywords.</p>
		<?php
		get_search_form();
	endif;
	?>
</div>

<?php get_footer(); ?>