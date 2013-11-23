<?php get_header(); ?>

      <section id="content">
        <div class="inner-wrapper">
        

        <!-- Begin Content Page -->
          <div class="row-fluid">
            <div class="span12">

                <h2>Aktualności</h2>
              
                <div class="row-fluid">
               <?php /* Start the Loop */ ?>
               <?php while ( have_posts() ) : the_post(); ?>
                <?php get_template_part( 'content', get_post_format() ); ?>
               <?php endwhile; ?>
                </div>



            </div>
          </div>
          <!-- End Content Page -->
           
        </div>
      </section><!-- End section content page -->      
     


<?php get_footer(); ?>