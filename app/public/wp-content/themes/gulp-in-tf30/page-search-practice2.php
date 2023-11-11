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
  </div><!-- /entry-header -->

<!-- entry-body -->
<div class="entry-body">
  <?php the_content(); ?>
  <?php get_search_form(); ?>
  <table>
    <?php get_field('company'); ?>
    <hr>
    <?php if(get_field('company')): ?>
      <tr>
        <th>会社名</th>
        <td><?php the_field('company'); ?></td>
      </tr>
    <?php endif; ?>
    <?php if(get_field('url')): ?>
      <tr>
        <th>サイトURL</th>
        <td><?php the_field('url'); ?></td>
      </tr>
    <?php endif; ?>
    <?php if(get_field('position')): ?>
      <tr>
        <th>担当範囲</th>
        <td><?php the_field('position'); ?></td>
      </tr>
    <?php endif; ?>
    <?php if(get_field('kibo')): ?>
      <tr>
        <th>規模</th>
        <td><?php the_field('kibo'); ?></td>
      </tr>
    <?php endif; ?>
  </table>
  <hr>

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