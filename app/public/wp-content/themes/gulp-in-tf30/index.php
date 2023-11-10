
	<?php get_header(); ?>

	<!-- pickup -->
	<div id="pickup">
		<div class="inner">
			<?php get_template_part('template-parts/pickup_by_tag'); ?>

		</div><!-- /inner -->
	</div><!-- /pickup -->


	<!-- content -->
	<div id="content">
		<div class="inner">

			<!-- primary -->
			<main id="primary">

				<!-- entries -->
				<div class="entries">
					<?php if(have_posts()): ?>
						<?php while(have_posts()): ?>
							<?php the_post(); ?>
								<!-- entry-item -->
								<a href="<?php the_permalink() ?>" class="entry-item">
									<!-- entry-item-img -->
									<div class="entry-item-img">
										<?php my_the_post_thumbnail(); ?>
									</div><!-- /entry-item-img -->

									<!-- entry-item-body -->
									<div class="entry-item-body">
										<div class="entry-item-meta">
											<div class="entry-item-tag"><?php my_the_post_category(false); ?></div><!-- /entry-item-tag -->
											<time class="entry-item-published" datetime="<?php the_time('c') ?>"><?php the_time('Y/n/j') ?></time><!-- /entry-item-published -->
										</div><!-- /entry-item-meta -->
										<h2 class="entry-item-title"><?php the_title() ?></h2><!-- /entry-item-title -->
										<div class="entry-item-excerpt">
											<p><?php the_excerpt() ?></p>
										</div><!-- /entry-item-excerpt -->
									</div><!-- /entry-item-body -->
								</a><!-- /entry-item -->
							<?php endwhile; ?>
					<?php endif; ?>
				</div><!-- /entries -->

				<?php get_template_part('template-parts/pagination'); ?>

			</main><!-- /primary -->

			<?php get_sidebar(); ?>


		</div><!-- /inner -->
	</div><!-- /content -->

	<?php get_footer(); ?>
