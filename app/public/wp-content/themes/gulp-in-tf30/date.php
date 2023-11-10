
  <?php get_header(); ?>
	<!-- content -->
	<div id="content">
		<div class="inner">

			<!-- primary -->
			<main id="primary">
        <?php if(function_exists('bcn_display')): ?>
          <!-- breadcrumb -->
          <div class="breadcrumb">
            <?php bcn_display() ?>
          </div><!-- /breadcrumb -->
        <?php endif;?>


				<div class="archive-head m_description">
					<div class="archive-lead">DATE</div>
					<h1 class="archive-title m_category"><?php the_archive_title(); ?></h1><!-- /archive-title -->
					<div class="archive-description">
						<p>
              <?php the_archive_description(); ?>
						</p>
					</div><!-- /archive-description -->
				</div><!-- /archive-head -->

          <?php get_template_part('template-parts/entries'); ?>

			</main><!-- /primary -->

			<!-- secondary -->
      <?php get_sidebar(); ?>

		</div><!-- /inner -->
	</div><!-- /content -->

  <?php get_footer(); ?>
