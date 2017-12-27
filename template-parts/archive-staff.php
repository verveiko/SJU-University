<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package My_First_Theme
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php
			if ( is_single() ) {
				the_title( '<h1 class="entry-title">', '</h1>' );

			} else {
				the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			}

        ?>

	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php
            
            if (get_field('course')){
            echo "<p><strong>Course:</strong> "; 
            the_field('course');
            echo "</p>";
            }
            
            
            
        
			the_content();

		 if (get_field('website')){
            echo "<b>Web Site: </b>";
            echo "<a target=_blank href='";
            the_field('website');
            echo "'>";
            the_field('website');
            echo "</a>";
            }

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'My_First_Theme' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php my_first_theme_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->