<?php get_header(); ?>
<!-- main-visual -->
<div class="mainvisual">
  <div class="inner">
    <div class="mainvisual-content">
      <?php $post_type = get_post_type();
            $post_obj = get_post_type_object($post_type);
      ?>
      <div class="mainvisual-title"><?php echo $post_obj->label ?></div>
    </div>
  </div><!-- /inner -->
</div><!-- /main-visual -->

<div class="work-breadcrumb">
  <div class="inner">
    <!-- breadcrumb -->
    <div class="breadcrumb">
      <?php bcn_display(); ?>
    </div><!-- /breadcrumb -->
  </div><!-- /inner -->
</div><!-- /work-breadcrumb -->

<!-- content -->
<div id="content" class="content-work">
  <div class="inner">

    <!-- primary -->
    <main id="primary">

      <div class="genre-nav">
        <div class="genre-nav-link"><a href="<?php echo esc_url(get_post_type_archive_link('work')); ?>">すべて</a></div>
        <?php $queried_obj = get_queried_object(); ?>
        <?php $genre_terms = get_terms('genre',array('hide_empty' => false, 'orderby' => 'term_id')); ?>
        <?php foreach($genre_terms as $genre_term): ?>
          <div class="genre-nav-link"><a href="<?php echo esc_url(get_term_link($genre_term, 'genre')); ?>" <?php class_active_genre($queried_obj->term_id, $genre_term->term_id); ?>><?php echo $genre_term->name; ?></a></div>
        <?php endforeach; ?>
      </div><!-- /genre-nav -->


      <?php get_template_part('template-parts/entries-work'); ?>


      <!-- pagination -->
      <?php get_template_part('template-parts/pagination'); ?>
    </main><!-- /primary -->

  </div><!-- /.inner -->
  </div><!-- /.content -->

<?php get_footer(); ?>