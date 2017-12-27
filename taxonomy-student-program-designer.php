<?php
/**
 * The template for displaying archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package My_First_Theme
 */

get_header(); ?>
<div class="row">
        <div id="primary" class="content-area col-md-12 col-xs-12">
                <main id="main" class="site-main" role="main">

                <?php if ( have_posts() ) : ?>

                    <header class="page-header">
                        <?php
                            single_term_title( '<h1 class="page-title">', '</h1>' );

                        ?>
                    </header><!-- .page-header -->

                    <?php /* Start the Loop */ ?>
                    <?php while ( have_posts() ) : the_post(); ?>

                        <?php
                            get_template_part( 'template-parts/archive', 'student');
                        ?>

                    <?php endwhile; ?>

                    <?php the_posts_navigation(); ?>

                <?php else : ?>

                    <?php get_template_part( 'template-parts/content', 'none' ); ?>

                <?php endif; ?>

                </main><!-- #main -->
            </div><!-- #primary -->

</div><!-- #row -->

<?php
get_footer();