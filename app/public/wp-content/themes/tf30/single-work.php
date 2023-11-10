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

  <!-- entry -->
  <article class="entry entry-work">
    <?php if(have_posts()): ?>
      <?php while(have_posts()): ?>
        <?php the_post(); ?>

        <!-- entry-header -->
        <div class="entry-header">
          <div class="entry-label"><?php my_the_post_term('genre',true) ?></div>
          <h1 class="entry-title"><?php the_title(); ?></h1>

          <div class="entry-img">
            <?php my_the_post_thumbnail(); ?>
          </div>
        </div><!-- /entry-header -->

        <div class="entry-work-body">
          <div class="entry-work-content">
            <?php echo nl2br(esc_html(get_field('overview'))); ?>
          </div>
          <div class="entry-work-table">
            <table>
              <?php get_field('company'); ?>
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
            </table>
          </div><!-- /entry-work-table -->
        </div><!-- /entry-work-body" -->

        <div class="entry-work-btn">
          <a class="btn" href="<?php echo get_post_type_archive_link('work'); ?>">一覧に戻る</a>
        </div><!-- /entry-work-btn -->
      <?php endwhile; ?>
    <?php endif; ?>
    <?php get_template_part('template-parts/relation-work'); ?>
  </article><!-- /entry -->

  </main><!-- /primary -->

  </div><!-- /inner -->
  </div><!-- /content -->


<?php get_footer(); ?>