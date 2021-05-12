<div class="my-4">

	<h2>
		<a href="<?php the_permalink(); ?>" rel="bookmark" class="title-link" title="Permanent Link to <?php the_title_attribute(); ?>">
		 
			<?php the_title(); ?>
		</a>
	</h2>

	<?php
	the_excerpt();
	// wp_link_pages();
	?>
	<hr class="custom-hr">
</div>
   <?php
