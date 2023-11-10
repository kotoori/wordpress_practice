<?php get_header(); ?>


<!-- content -->
<div id="content" class="m_one">
<div class="inner">

<!-- primary -->
<main id="primary">

<?php if(function_exists('bcn_display')): ?>
  <!-- breadcrumb -->
  <div class="breadcrumb">
    <?php bcn_display(); ?>
  </div><!-- /breadcrumb -->
<?php endif; ?>

<!-- entry -->
<?php if(have_posts()): ?>
<?php while(have_posts()): ?>
<?php the_post(); ?>
<article class="entry m_page">

<!-- entry-header -->
<div class="entry-header">
	<h1 class="entry-title"><?php the_title() ?></h1><!-- /entry-title -->
  <?php my_the_post_thumbnail(); ?>
  </div><!-- /entry-header -->

<!-- entry-body -->
<div class="entry-body">
  <?php the_content(); ?>
  <?php my_link_pages(); ?>
</div><!-- /entry-body -->
</article><!-- /entry -->
<?php endwhile; ?><!-- hove_posts() -->
<?php endif; ?><!-- hove_posts() -->
</main><!-- /primary -->

<?php get_sidebar(); ?>

</div><!-- /inner -->
</div><!-- /content -->

<?php get_footer(); ?>