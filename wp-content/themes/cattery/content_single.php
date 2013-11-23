<?php
/**
 * The default template for displaying content
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */
?>


<div class="span12" id="post-<?php the_ID(); ?>">

    <h1 class="media-heading"><a href="<?php permalink_link() ?>"><?php the_title(); ?></a></h1>
    <h4>Dodano <?php the_time('j F, Y') ?></h4>
                <?php the_content( __( 'Kontynuuj <span class="meta-nav">&rarr;</span>', 'cattery' ) ); ?>
 
              <div class="divater"><div class="line"></div><span><img src="<?php bloginfo('template_url'); ?>/images/deviter.png" alt="" /></span></div>
</div>
