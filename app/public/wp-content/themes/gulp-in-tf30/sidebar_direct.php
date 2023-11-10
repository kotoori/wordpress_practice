			<!-- secondary -->
			<aside id="secondary">

				<!-- widget -->
				<div class="widget widget_text widget_custom_html">
					<div class="widget-title">プロフィール</div>

					<div class="wprofile">
						<div class="wprofile-img">
							<?php my_get_avatar(453) ?>
						<div class="wprofile-content">
							<p>
								<?php the_author_meta('description'); ?>
							</p>
						</div>
						<!-- /wprofile-content -->
						<nav class="wprofile-sns">
							<div class="wprofile-sns-item m_twitter"><a href="" rel="noopener noreferrer" target="_blank"><i
										class="fab fa-twitter"></i></a></div>
							<div class="wprofile-sns-item m_facebook"><a href="" rel="noopener noreferrer" target="_blank"><i
										class="fab fa-facebook-f"></i></a></div>
							<div class="wprofile-sns-item m_instagram"><a href="" rel="noopener noreferrer" target="_blank"><i
										class="fab fa-instagram"></i></a></div>
						</nav>
					</div><!-- /wprofile -->
				</div><!-- /widget -->


				<!-- widget -->
				<div class="widget widget_search">
					<div class="widget-title">検索</div>
					<?php get_search_form(); ?>
				</div><!-- /widget -->


				<!-- widget -->
				<div class="widget widget_popular">
					<div class="widget-title">人気記事</div>

					<?php
						if ( function_exists('wpp_get_mostpopular') ) {
								wpp_get_mostpopular(
									array(
										'limit' => 5,
										'post_type' => 'post',
										'range' => 'last24hours',
										'thumbnail_width' => 680,
										'thumbnail_height' => 400,
										'stats_views' => 0,
										'wpp_start' => '<div class="wpost-items m_ranking">',
										'wpp_end' => '</div>',
										'post_html' => '<div class="wpost-item">
																		<div class="wpost-item-img">{thumb}</div>
																		<div class="wpost-item-body"><div class="wpost-item-title">{title}</div></div>
																		</div>'
									)
								);
						}
					?>
				</div><!-- /widget -->



				<!-- widget -->
				<div class="widget widget_recent">
					<div class="widget-title">新着記事</div>
					<?php
						$args = array(
							'post_type' => 'post',  //投稿タイプをpostに限定
							'posts_per_page' => 5,  //8記事
							'orderby' => 'date',  //日付順
							'order' => 'DESC',  //降順
						);
						$recent_query = new WP_Query($args);	// サブクエリ発行
					?>
					<div class="wpost-items">
						<?php if($recent_query->have_posts()): ?>
							<?php while($recent_query->have_posts()): ?>
								<?php $recent_query->the_post(); ?>
								<!-- wpost-item -->
								<a class="wpost-item" href="<?php the_permalink(); ?>">
									<div class="wpost-item-img">
										<?php my_the_post_thumbnail('medium') ?>
									</div>
									<div class="wpost-item-body">
										<div class="wpost-item-title"><?php the_title(); ?></div>
									</div><!-- /wpost-item-body -->
								</a><!-- /wpost-item -->
							<?php endwhile; ?>
						<?php endif; ?>
					</div><!-- /wpost-items -->
				</div><!-- /widget -->

				<div class="widget widget_archive">
					<div class="widget-title">アーカイブ</div>
					<ul>
						<?php wp_get_archives(); ?>
					</ul>
				</div><!-- /widget -->

			</aside><!-- secondary -->
