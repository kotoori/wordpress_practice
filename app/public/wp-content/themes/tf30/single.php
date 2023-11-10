
  <?php get_header(); ?>

	<!-- content -->
	<div id="content">
		<div class="inner">

			<!-- primary -->
			<main id="primary">

				<!-- breadcrumb -->
        <?php if(function_exists('bcn_display')): ?>
          <div class="breadcrumb">
            <?php bcn_display(); ?>
          </div><!-- /breadcrumb -->
        <?php endif; ?>

				<!-- entry -->
        <?php if(have_posts()): ?>
          <?php while(have_posts()): ?>
            <?php the_post(); ?>
              <article class="entry">
              <!-- entry-header -->
              <div class="entry-header">
                <div class="entry-label"><?php my_the_post_category(true); ?></div><!-- /entry-item-tag -->
                <h1 class="entry-title"><?php the_title(); ?></h1><!-- /entry-title -->
    
                <!-- entry-meta -->
                <div class="entry-meta">
                  <time class="entry-published" datetime="<?php the_time('c'); ?>"><?php the_time('Y/n/j'); ?></time>
                  <?php if(get_the_modified_time('c') !== get_the_time('c')): ?>
                    <time class="entry-updated" datetime="<?php the_modified_time('c'); ?>">最終更新日 <?php the_modified_time('Y/n/j'); ?></time>
                  <?php endif; ?>
                </div><!-- /entry-meta -->
    
                <!-- entry-img -->
                <div class="entry-img">
                <?php my_the_post_thumbnail(); ?>
                </div><!-- /entry-img -->
    
              </div><!-- /entry-header -->
    
              <!-- entry-body -->
              <div class="entry-body">
                <?php the_content(); ?>
                <?php get_template_part('template-parts/single_contact'); ?>
                <?php my_link_pages(); ?>
              </div><!-- /entry-body -->
    
              <div class="entry-tag-items">
                <div class="entry-tag-head">タグ</div><!-- /entry-tag-head -->
                <?php my_the_post_tag(get_the_ID()); ?>
                
              </div><!-- /entry-tag-items -->
                
                <?php get_template_part('template-parts/relation'); ?>
              </article> <!-- /entry -->

            <?php endwhile; ?>
        <?php endif; ?>
			</main><!-- /primary -->

      <?php get_sidebar(); ?>

		</div><!-- /inner -->
	</div><!-- /content -->

  <?php get_footer(); ?>
