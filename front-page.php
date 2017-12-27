<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package My_First_Theme
 */

get_header(); ?>
<div class="row">
        <div id="primary" class="content-area col-md-12 col-xs-12">
                <main id="main" class="site-main">
                    
                    <div class="entry-content">
                    <?php while ( have_posts() ) : the_post();?>
                    
                    <?php
                    if(has_post_thumbnail()){
                    the_post_thumbnail();
                    }else{
                    echo "Please insert image";
                    }
	                ?>
                    <?php the_content(); ?>

                    <?php endwhile; // End of the loop. ?>
                    
	                </div><!-- .entry-content -->
                   
                       <div class="front-slider col-md-10 col-md-offset-1">
                                <div class="slider">

                                <?php                  
                                $params = array(
                                    'posts_per_page' => 6,
                                    'post_type'       => 'post',
                                    'paged'           => $current_page
                                );
                                query_posts($params);

                                $wp_query->is_archive = true;
                                $wp_query->is_home = false;
                                $content = get_the_content();

                                while(have_posts()): the_post();?>

                                    <div class="slider-post">
   <div class="thumbnail">

<?php
    if(has_post_thumbnail()){
    
    the_post_thumbnail('slider');
    
    }else{
        echo "<img src='http://via.placeholder.com/242x200'>";
    }
 ?>


     <div class="caption">
    <strong><h3><?php the_title() ?></h3></strong>
        <?php
        $trimmed_content = wp_trim_words( $content, 35, ' <br><a class="btn btn-success" role="button" href="' . get_permalink( $post->ID ) . '">Read more</a>' );  
        ?>

        <?php echo '<p>'.$trimmed_content.'</p>'; ?>
        
        
        </div>
        </div>
</div><!-- slider-post -->                      
                                <?php endwhile;?>

                                </div><!-- slider -->
                            </div><!-- front-slider col-md-10 col-md-offset-1 -->
                        
                    
                </main><!-- #main -->
        </div><!-- #primary -->

</div><!-- #row -->

<?php
get_footer();