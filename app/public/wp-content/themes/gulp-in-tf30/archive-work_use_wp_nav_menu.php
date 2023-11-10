<?php get_header(); ?>
<!-- main-visual -->
<div class="mainvisual">
  <div class="inner">
    <div class="mainvisual-content">
      <div class="mainvisual-title">制作実績</div>
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

        <?php wp_nav_menu(
          array(
            'depth' => 1,
            'theme_location' => 'work',
            'container' => '',
            'menu_class' => 'genre-nav',
            'before' => '<div class="genre-nav-link">',
            'after' => '</div>',
          )
        ); ?>

      <?php get_template_part('template-parts/entries-work'); ?>


      <!-- pagination -->
      <?php get_template_part('template-parts/pagination'); ?>
    </main><!-- /primary -->

  </div><!-- /.inner -->
  </div><!-- /.content -->

<?php get_footer(); ?>