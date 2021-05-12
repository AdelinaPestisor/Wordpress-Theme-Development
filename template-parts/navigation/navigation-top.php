<?php
/*
Header navigation template
*/
?>

<nav class="navbar navbar-expand-lg navbar-light custom-nav nav-color">
  <div class="container-fluid m-0">
          <a class="navbar-brand" href="<?php get_bloginfo('url');?>"> <?php if ( function_exists( 'the_custom_logo' ) ) {
            the_custom_logo();
        } ?> </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
   <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <?php  wp_nav_menu( array(
          'theme_location' => 'Primary Menu',
          'menu' =>'Menu top',
          'depth'           => 2, // 1 = no dropdowns, 2 = with dropdowns.
          // 'container'       => 'div',
          'container_class' => 'collapse navbar-collapse',
          'container_id'    => 'bs-example-navbar-collapse-1',
          'menu_class'      => 'navbar-nav mr-auto',
          'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s  </ul>',
          'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
          'walker'          => new WP_Bootstrap_Navwalker(),

      ) );?>

     <?php get_search_form( );?>
   </div>
</div>
  
</nav>