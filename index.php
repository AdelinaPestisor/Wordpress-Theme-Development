<?php
get_header();
?>
<div class="row">
	<?php
	$index = 0;
	$nr_columns = 3;
	if (have_posts()) {
			while (have_posts()) : the_post();
				if (0 === $index % $nr_columns) {
		           ?>
					<div class="bg-body-custom">

					<!-- col-sm col-md-6 col-lg-4 -->
					<?php
				}
				// Post Content here
				get_template_part('template-parts/posts/content', 'excerpt');

				$index++;
				if (0 !== $index && 0 === $index % $nr_columns) {
					?>
					</div>
		            <?php
				}

		endwhile;
	} // end if
	               ?>
</div>

<!-- Paginatia -->
<section class="container pagination d-flex justify-content-center">
	<div class="row">
		<?php
		$paged = (get_query_var('paged')) ? get_query_var('paged') : '1';
		$args = array(
			'post_type' => 'post',
			'posts_per_page'         => '3',
			'paged'                  => $paged
		);
		query_posts($args);
		$posts = get_posts($args);
		if ($posts) {
		?>
			<header>
				<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
			</header>
		<?php
			foreach ($posts as $post) {
				get_template_part('template-parts/content', get_post_format());
			}
			the_posts_pagination(array(
				'screen_reader_text' => ' ',
				'mid_size' => 3,
				'prev_text' => _('« Previous'),
				'next_text' => _('Next »'),
			));
		} else {
			echo '<p> No post found..</p>';
		}

		?>
	</div>
</section>
<?php
get_sidebar();
?>
<?php
get_footer();
