<?php get_header(); ?>

      <section id="content">
        <div class="inner-wrapper">
        

        <!-- Begin Content Page -->
          <div class="row-fluid">
            <div class="span12">

              
                <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                    
                <?php if ( has_post_thumbnail() && ! post_password_required() ) : ?>
                    <div class="entry-thumbnail">
                            <?php the_post_thumbnail(); ?>
                    </div>
                <?php endif; ?>
                
                <h1 class="entry-title"><?php the_title(); ?></h1>
                
                <?php the_content(); ?>
                
                <?php endwhile; ?>
                
                <?php endif; ?>



            </div>
          </div>
          <!-- End Content Page -->
           
        </div>
      </section><!-- End section content page -->      
     


<?php get_footer(); ?>