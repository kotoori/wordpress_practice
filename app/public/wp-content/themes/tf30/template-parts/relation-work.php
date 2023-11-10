<?php
if(has_term('','genre')):
  $current_post_id = get_the_ID();
  $terms = get_the_terms($current_post_id,'genre');
  $term_list = array();
  foreach($terms as $term){
    $term_list[] = $term->term_id;
  }
  ?>
  <?php
  $related_query = new WP_Query(
    array(
      'post_type' => 'work',
      'tax_query' => array(
                        array(
                          'taxonomy' => 'genre',
                          'field' => 'term_id',
                          'terms' => $term_list,
                          'operator' => 'IN',
                    ),),   //表示中の記事と同じterm
      'post__not_in' => [$current_post_id],   //現在の記事は除外
      'posts_per_page' => 3,  //3記事
      'orderby' => 'rand',
    )
  );
  ?>
  <?php if ( $related_query->have_posts() ) : ?>
    <div class="entry-work-related">
      <div class="entry-work-related-head">関連記事</div><!-- /.entry-work-related-head -->
      <div class="entries entries-work entry-work-related-entries">
        <?php while ( $related_query->have_posts() ) : ?>
          <?php $related_query->the_post(); ?>

          <!-- entry-item -->
          <a href="<?php the_permalink(); ?>" <?php post_class( array( 'entry-item', 'entry-item-horizontal' ) ); ?>>

            <!-- entry-item-img -->
            <div class="entry-item-img">
                <?php
                if ( has_post_thumbnail() ) {
                  the_post_thumbnail( 'my_thumbnail' );
                } else {
                  echo '<img src="' . esc_url( get_template_directory_uri() ) . '/img/noimg.png" alt="">';
                }
                ?>
            </div><!-- /entry-item-img -->

            <!-- entry-item-body -->
            <div class="entry-item-body">
              <div class="entry-item-meta">
                <div class="entry-item-tag"><?php echo esc_html( get_the_terms( get_the_ID(), 'genre' )[0]->name ); ?></div><!-- /entry-item-tag -->
              </div><!-- /entry-item-meta -->
              <h2 class="entry-item-title"><?php the_title(); ?></h2><!-- /entry-item-title -->
            </div><!-- /entry-item-body -->

          </a><!-- /entry-item -->

        <?php endwhile; ?>
      </div><!-- /.entry-work-related-entries -->
    </div><!-- /.entry-work-related -->
  <?php endif; ?>
  <?php wp_reset_postdata(); ?>
<?php endif; ?><!-- has_term() -->