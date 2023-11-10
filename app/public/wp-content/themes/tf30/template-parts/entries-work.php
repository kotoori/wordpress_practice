<!-- entries -->
<div class="entries entries-work">
  <?php if(have_posts()): ?>
    <?php while(have_posts()): ?>
      <?php the_post(); ?>
      <a href="<?php the_permalink() ?>" class="entry-item entry-item-horizontal">
        <div class="entry-item-img">
          <?php my_the_post_thumbnail(); ?>
        </div>
        <div class="entry-item-body">
          <div class="entry-item-meta">
            <div class="entry-item-tag"><?php my_the_post_term('genre',false); ?></div>
          </div>
          <div class="entry-item-title"><?php the_title(); ?></div>
          <div class="entry-item-excerpt">
            <?php
              $overview = get_field('overview');
              if($overview){
                echo mb_substr($overview, 0, 40, 'UTF-8') . '...';
              }
            ?>
          </div>
        </div><!-- /entry-item-body -->
      </a><!-- /entry-item -->
    <?php endwhile; ?><!-- hove_posts() -->
  <?php endif; ?><!-- hove_posts() -->
</div><!-- /entries -->
