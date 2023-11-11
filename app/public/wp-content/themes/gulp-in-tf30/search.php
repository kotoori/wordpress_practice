
<?php get_header(); ?>
	<!-- content -->
	<div id="content">
		<div class="inner">

			<!-- primary -->
			<main id="primary">
        <?php if(function_exists('bcn_display')): ?>
          <!-- breadcrumb -->
          <div class="breadcrumb">
            <?php bcn_display() ?>
          </div><!-- /breadcrumb -->
        <?php endif;?>

				<?php
					//GETパラメータから、値を取得
					if (isset($_GET['kibo'])){
						$kibo_val = $_GET['kibo'];
					}
					if (isset($_GET['kind']) ){
						$kind_val = $_GET['kind'];
					}
					if (isset($_GET['sales']) ){
						$sales_val = $_GET['sales'];
					}
					var_dump($kibo_val);
					var_dump($kind_val);
					var_dump($sales_val);

					//クエリ取得
					$args = array(
						'posts_per_page' => 20,
						'paged' => $paged,
						'post_type' => 'work', //カスタム投稿タイプ名
						'orderby' => 'date',
						'order' => 'DESC',
						'meta_query' => array(
							'relation' => 'AND',
							array(
								'key' => 'kibo',
								'value' => $kibo_val,
							),
							array(
								'key' => 'kind',
								'value' => $kind_val,
							),
							array(
								'key' => 'sales',
								'value' => $sales_val,
							),
						),
					);
					$sub_query = new WP_Query($args);
				?>

				<div class="archive-head m_description">
					<div class="archive-lead">SEARCH</div>
					<h1 class="archive-title m_search"><span><?php $sub_query->the_search_query(); ?></span>の検索結果：<?php echo $sub_query->found_posts ?>件</h1><!-- /archive-title -->
					<div class="archive-description">
						<p>
              <?php the_archive_description(); ?>
						</p>
					</div><!-- /archive-description -->
				</div><!-- /archive-head -->

			<?php echo "sub-entries"; ?>
      <!-- entries -->
				<div class="entries m_horizontal">
          <?php if($sub_query->have_posts()): ?>
            <?php while($sub_query->have_posts()): ?>
              <?php $sub_query->the_post(); ?>
                <!-- entry-item -->
                <a href="<?php the_permalink() ?>" class="entry-item">
                  <!-- entry-item-img -->
                  <div class="entry-item-img">
                  <?php my_the_post_thumbnail(); ?>
                  </div><!-- /entry-item-img -->

                  <!-- entry-item-body -->
                  <div class="entry-item-body">
                    <div class="entry-item-meta">
                      <div class="entry-item-tag"><?php my_the_post_category(false); ?></div><!-- /entry-item-tag -->
                      <time class="entry-item-published" datetime="<?php the_time('c') ?>"><?php the_time('Y/n/j') ?></time>
                    </div><!-- /entry-item-meta -->
                    <h2 class="entry-item-title"><?php the_title() ?></h2><!-- /entry-item-title -->
                    <div class="entry-item-excerpt">
                      <p><?php the_excerpt() ?></p>
                    </div><!-- /entry-item-excerpt -->
                  </div><!-- /entry-item-body -->
                </a><!-- /entry-item -->

            <?php endwhile; ?>
          <?php endif; ?>
				</div><!-- /entries -->


				<!-- pagination -->
        <?php get_template_part('template-parts/pagination'); ?>

				<?php wp_reset_postdata(); ?>

			</main><!-- /primary -->

			<!-- secondary -->
      <?php get_sidebar(); ?>

		</div><!-- /inner -->
	</div><!-- /content -->

  <?php get_footer(); ?>
