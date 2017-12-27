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
		
		<?php
            if(has_post_thumbnail()){
                the_post_thumbnail('portrait');
            }else{
                echo "<img src='http://via.placeholder.com/200x300'>";
            }
	    ?>

	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php
			
			
			the_content();
			
			
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