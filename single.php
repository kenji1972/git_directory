<?php get_header('sakuragaoka'); ?>
	
	<!-- コンテンツエリア -->
	<div id="maincontents-area">
		<div class="main-areainn">
			<?php if(have_posts()): while(have_posts()): the_post();?>

				<!-- ページタイトル -->
				<div id="pagetitle-area">
					<div class="area-inn">
						<h1><?php the_title();?><span><?php echo get_the_date();?></span></h1>
					</div>
				</div>
				<!-- ページタイトル -->

				<div class="contents-area">
					<?php 
						if( post_password_required( $post->ID ) ):
							echo get_the_password_form( $post->ID );
						else:
					
							$txt = get_field('news_txt');
							$img = get_field('news_image');
							$img2 = get_field('news_image2');
							$img3 = get_field('news_image3');
						?>

							<!--テキストがあれば表示-->
							<?php if($txt):?>
								<div class="txt-area">
									<?php echo $txt;?>
								</div>
							<?php endif; ?>
							<!--テキストがあれば表示-->
												
							<!--画像があれば表示-->
							<?php if($img):?>
								<div class="img-area">
									<?php echo wp_get_attachment_image(get_post_meta($post->ID, 'news_image', true),'newsimage'); ?>
								</div>
							<?php endif; ?>
							<!--画像を表示-->
														
							<!--画像があれば表示-->
							<?php if($img2):?>
								<div class="img-area">
									<?php echo wp_get_attachment_image(get_post_meta($post->ID, 'news_image2', true),'newsimage'); ?>
								</div>
							<?php endif; ?>
							<!--画像を表示-->
													
							<!--画像があれば表示-->
							<?php if($img3):?>
								<div class="img-area">
									<?php echo wp_get_attachment_image(get_post_meta($post->ID, 'news_image3', true),'newsimage'); ?>
								</div>
							<?php endif; ?>
							<!--画像を表示-->
														
							<!--リンクファイルがあればリンクボタン-->
							<?php 
								$file = get_field('news_file');
								$btntxt = "詳しくはこちらをご覧ください";
								if(in_category('opencompe')){
									$btntxt = "結果はこちらをご覧ください";
									}
								if($file):?>					
								<p class="btn-area">
									<a href="<?php echo $file;?>" target="_blank"><span><?php echo $btntxt;?></span><span class="link-border"></span></a>
								</p>
							<?php endif; ?>
							<!--リンクファイルがあればリンクボタン-->
						<?php endif;?>
					<p class="btn-gray"><a href="javascript:history.back();">＜ 前に戻る</a></p>
				</div>
			<?php endwhile; endif; ?>
		</div>
	</div>
	<!-- コンテンツエリア -->
	
	<!--  フッタ読込 -->
	<?php get_footer('sakuragaoka'); ?>
	<!--  フッタ読込 -->

	<?php wp_footer(); ?>
</body>
</html>

