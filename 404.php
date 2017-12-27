<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package My_First_Theme
 */

get_header(); ?>
<div class="row">
                <div id="primary" class="content-area col-md-8 col-xs-12">
                    <main id="main" class="site-main">

                    <section class="error-404 not-found">
                        <header class="page-header">
                            <h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'my-first-theme' ); ?></h1>
                        </header><!-- .page-header -->

                        <div class="page-content">
                            <p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try a search?', 'my-first-theme' ); ?></p>

                            <?php
                                get_search_form();
                            ?>

                            

                        </div><!-- .page-content -->
                    </section><!-- .error-404 -->

                </main><!-- #main -->
            </div><!-- #primary -->

            <div class="col-md-4 col-xs-12">
                <?php get_sidebar(); ?>
            </div>
</div><!-- #row -->

<?php
get_footer();
