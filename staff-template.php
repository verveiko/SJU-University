<?php
/**
 * Template Name: Staff
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package My_First_Theme
 */

get_header(); ?>

<div class="row">
    <div id="primary" class="content-area col-md-12 col-xs-12">
        <main id="main" class="site-main">    
            
            <div class="col-md-6">
            <h1>Faculty Staff</h1>
            <?php
            $the_query = new WP_Query( array(
            'post_type' => 'staff',
            'tax_query' => array(
                array (
                    'taxonomy' => 'staff-department',
                    'field' => 'slug',
                    'terms' => 'faculty',
                )
            ),
        ) );
            

        while ( $the_query->have_posts() ) :
           $the_query->the_post();
            echo "<div class='post-wrap'>";
            echo "<a href='";
            the_permalink();
            echo "'>";
            the_title( '<h3 class="entry-title">', '</h3>' );
            echo "</a>";
            
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
            echo "</div>";
        endwhile;
                
        wp_reset_postdata();
        ?>
        <a href="../staff-department/faculty/">See all the faculty staff ></a>
        </div>
            
         <div class="col-md-6">
            <h1>Administrative Staff</h1>
            <?php
            $the_query = new WP_Query( array(
            'post_type' => 'staff',
            'tax_query' => array(
                array (
                    'taxonomy' => 'staff-department',
                    'field' => 'slug',
                    'terms' => 'administrative',
                )
            ),
        ) );
            

        while ( $the_query->have_posts() ) :
           $the_query->the_post();
            echo "<div class='post-wrap'>";
            echo "<a href='";
            the_permalink();
            echo "'>";
            the_title( '<h3 class="entry-title">', '</h3>' );
            echo "</a>";
            
            if (get_field('course')){
            echo "<p><strong>Course:</strong> "; 
            the_field('course');
            echo "</p>";
            }
            the_content();
            if (get_field('website')){
            echo "<span class='website'>Web Site: </span>";
            echo "<a target=_blank href='";
            the_field('website');
            echo "'>";
            the_field('website');
            echo "</a>";
            }
            echo "</div>";
        endwhile;

        /* Restore original Post Data 
         * NB: Because we are using new WP_Query we aren't stomping on the 
         * original $wp_query and it does not need to be reset.
        */
        wp_reset_postdata();
        ?>
        <a href="../staff-department/administrative/">See all the administrative staff ></a>
        </div>
            
		</main><!-- #main -->
	</div><!-- #primary -->
</div>


<?php get_footer(); ?>