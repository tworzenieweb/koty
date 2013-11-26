<?php
/**
 * The default template for displaying content
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */
?>


<div class="span6" id="post-<?php the_ID(); ?>">

    <h4 class="media-heading"><a href="<?php permalink_link() ?>"><?php the_title(); ?></a> <small>Dodano <?php the_time('j F, Y') ?></small></h4>
                <?php the_content( __( 'Kontynuuj <span class="meta-nav">&rarr;</span>', 'cattery' ) ); ?>
 
              <div class="divater"><div class="line"></div><span><img src="<?php bloginfo('template_url'); ?>/images/deviter.png" alt="" /></span></div>
</div>
