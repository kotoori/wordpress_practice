<div class="pickup-items">
  <?php 
    $pickup_id = array(20, 42, 44, 45);
    $args = array(
      'post_type' => 'post',	//投稿タイプをpostに限定
      'post__in' => $pickup_id,   //取得したい投稿IDの配列
      'posts_per_page' => 3,  //3記事
      'orderby' => 'rand',
    );
    $pickup_query = new WP_Query($args);
  ?>
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
