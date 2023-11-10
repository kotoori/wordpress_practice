<?php
if(has_category()):
  $category = get_the_category();
  $arrayCatId = array();
  foreach($category as $categoryItem){
    $arrayCatId[] = $categoryItem->term_id;
  }
  $current_post_id = get_the_ID();

  $conditions = array(
    'category__in' => $arrayCatId,   //表示中の記事と同じカテゴリー
    'post__not_in' => [$current_post_id],   //現在の記事は除外
    'posts_per_page' => 8,  //8記事
    'orderby' => 'rand',
  );
  $my_query = new WP_Query( $conditions );  //サブクエリ発行
?>

  <?php if($my_query->have_posts()): ?>
    <div class="entry-related">
      <div class="related-title">関連記事</div>
      <div class="related-items">
        <?php while($my_query->have_posts()):?>
          <?php $my_query->the_post(); ?>
          <a class="related-item" href="<?php the_permalink(); ?>">
            <?php my_the_post_thumbnail('medium'); ?>
            <div class="related-item-title"><?php the_title(); ?></div><!-- /related-item-title -->
          </a><!-- /related-item -->
        <?php endwhile;?>
      </div><!-- /related-items -->
    </div><!-- /entry-related -->
  <?php endif; ?> <!-- hove_posts() -->
  <?php wp_reset_postdata(); ?>
<?php endif; ?> <!-- has_category() -->
