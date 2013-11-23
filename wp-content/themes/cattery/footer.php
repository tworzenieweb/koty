 <!--Start Footer Section-->
      <footer id="footer">
        <div class="inner-wrapper driver_space"></div>
        <div class="inner-wrapper content">
            <div class="row-fluid">
            <?php if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar('footer_1') ) ?>
            <?php if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar('footer_2') ) ?>
            </div>
        </div>
        <!--End Sucribe Panel-->
        <!--Start Footer Bottom-->
        <div class="footer_bottom">
          <div class="inner-wrapper">
            <div class="row-fluid ">
              <div class="span3"><p class="font_hotel"><?php echo bloginfo('name') ?></p></div>
              <div class="span3">

              </div>
              <div class="span6 text_right"><p>Copyright &copy; <?php echo date('Y') ?> <?php echo bloginfo('url') ?></p></div>
            </div>
          </div>
        </div><!--End Footer Bottom-->
        <!--Start Arrow Back To TOP Page-->
        <div id="back_to_top">
          <a href="#wrapper" class="localScroll btn flat btn-inverse hidden-phone">
            <i class="icon-3x icon-angle-up"></i>
          </a>
        </div><!--End Arrow Back To TOP Page-->
      </footer><!--End Footer Section-->
</div>
      

<?php wp_footer(); ?>

</body>
</html>