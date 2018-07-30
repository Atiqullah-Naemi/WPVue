<?php

  get_header();

  while(have_posts()) :
    the_post(); ?>

   	<h2><?php the_title(); ?></h2>
   	<div>
   		<?php the_content(); ?>
   	</div>
    
  <?php endwhile;

  get_footer();

?>