<div class="pickup-items">
  <?php 
  //サブクエリ発行

  $args = array(
    'post_type' => 'post',
    'tag' => 'pickup',
    'orderby' => 'modified',
    'posts_per_page' => 3,
  );

  $pickup_query = new WP_Query($args);
  ?>

  <?php //ピックアップ記事を表示 ?>
  <?php	if($pickup_query->have_posts()): ?>
    <?php while($pickup_query->have_posts()): ?>
      <?php $pickup_query->the_post();?>
      <a href="<?php the_permalink(); ?>" class="pickup-item">
        <div class="pickup-item-img">
          <?php my_the_post_thumbnail(); ?>
          <div class="pickup-item-tag"><?php my_the_post_category(false); ?></div><!-- /pickup-item-tag -->
        </div><!-- /pickup-item-img -->
        <div class="pickup-item-body">
          <h2 class="pickup-item-title"><?php the_title(); ?></h2><!-- /pickup-item-title -->
        </div><!-- /pickup-item-body -->
      </a><!-- /pickup-item -->
    <?php endwhile; ?>
  <?php endif; ?>
  <?php wp_reset_postdata(); ?>
</div><!-- /pickup-items -->
