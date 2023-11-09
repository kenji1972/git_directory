<?php
/*
Template Name: トップページ
*/
?>

<!--  header -->
<?php get_header('github'); ?>
<!--  header -->

	<!--topメイン============================================================================-->
	<div id="top-main">


		<!-- ファーストビュー固定ニュース -->		
		<div class="news-firstview">
			<?php
			$args = array(
				'category_name'   => 'firstview',
				'posts_per_page'   => 1,
			);
			$my_posts = get_posts($args);
			if ($my_posts) : // 該当する投稿があったら
				foreach ($my_posts as $post) : ?>
				<p><?php 
					$news_file = get_field('news_file');
					if(get_field('link_url')): //URL入力がある場合 ?>
						<a href="<?php echo get_field('link_url'); ?>" target="_blank"><span class="link-border"></span><?php the_title(); ?></a>
						<?php elseif( $news_file && !get_field('direct_link') )://ファイルがあり「ファイルへ直接リンク」しない場合 ?>
							<a href="<?php echo $news_file;?>" target="_blank"><span class="link-border"></span><?php the_title(); ?></a>
						<?php else: ?>
							<a href="<?php the_permalink(); ?>"><span class="link-border"></span><?php the_title(); ?></a>
						<?php endif; ?>
					<?php if(get_field('new_on')):?><span class="icn-new">NEW</span><?php endif;?>
			<?php endforeach;
			endif; ?></p>
		</div>
		<!-- ファーストビュー固定ニュース -->

		<!--fadein ニュース-->
		<script>
			$(function(){
				$(window).load(function(){
					var $setElm = $('.fadeinnews');
					var effectSpeed = 1000;
					var switchDelay = 6000;
					var easing = 'swing';
							
					$setElm.each(function(){
						var effectFilter = $(this).attr('rel'); // 'fade' or 'roll' or 'slide'
				
						var $targetObj = $(this);
						var $targetUl = $targetObj.children('ul');
						var $targetLi = $targetObj.find('li');
						var $setList = $targetObj.find('li:first');
					
						var ulWidth = $targetUl.width();
						var listHeight = $targetLi.height();
						$targetObj.css({height:(listHeight)});
						$targetLi.css({top:'0',left:'0',position:'absolute'});
							
						var liCont = $targetLi.length;
						
						if(effectFilter == 'fade') {
							$setList.css({display:'block',opacity:'0',zIndex:'9'}).stop().animate({opacity:'1'},effectSpeed,easing).addClass('showlist');
							if(liCont > 1) {
								setInterval(function(){
									var $activeShow = $targetObj.find('.showlist');
									$activeShow.animate({opacity:'0'},effectSpeed,easing,function(){
										$(this).next().css({display:'block',opacity:'0',zIndex:'10'}).animate({opacity:'1'},effectSpeed,easing).addClass('showlist').end().appendTo($targetUl).css({display:'none',zIndex:'9'}).removeClass('showlist');
									});
								},switchDelay);
						}
						} else if(effectFilter == 'roll') {
							$setList.css({top:'3em',display:'block',opacity:'0',zIndex:'98'}).stop().animate({top:'0',opacity:'1'},effectSpeed,easing).addClass('showlist');
							if(liCont > 1) {
								setInterval(function(){
									var $activeShow = $targetObj.find('.showlist');
									$activeShow.animate({top:'-3em',opacity:'0'},effectSpeed,easing).next().css({top:'3em',display:'block',opacity:'0',zIndex:'10'}).animate({top:'0',opacity:'1'},effectSpeed,easing).addClass('showlist').end().appendTo($targetUl).css({zIndex:'9'}).removeClass('showlist');
								},switchDelay);
							}
						} else if(effectFilter == 'slide') {
						$setList.css({left:(ulWidth),display:'block',opacity:'0',zIndex:'9'}).stop().animate({left:'0',opacity:'1'},effectSpeed,easing).addClass('showlist');
							if(liCont > 1) {
								setInterval(function(){
								var $activeShow = $targetObj.find('.showlist');
								$activeShow.animate({left:(-(ulWidth)),opacity:'0'},effectSpeed,easing).next().css({left:(ulWidth),display:'block',opacity:'0',zIndex:'10'}).animate({left:'0',opacity:'1'},effectSpeed,easing).addClass('showlist').end().appendTo($targetUl).css({zIndex:'9'}).removeClass('showlist');
							},switchDelay);
						}
					}
				});
			});
		});
		</script>
		<script>
			//スマホはフェードインエフェクトをとる
			$(function(){
				if (navigator.userAgent.match(/iPhone|Android.+Mobile/)) {
					$("#topnews-area").removeClass("fadeinnews");
					}
			});
		</script>
		<div id="topnews-area" class="fadeinnews" rel="fade">
			<ul>
			<?php
				$args = array(
					'category_name'   => 'news',
					'posts_per_page'   => 5,
				);
				$my_posts = get_posts($args);
				if ($my_posts) : // 該当する投稿があったら
					foreach ($my_posts as $post) : ?>
					<li>
						<span><?php echo get_the_date('Y.m.d'); ?></span>
						<span><?php 
								$news_file = get_field('news_file');
								if(get_field('link_url')): //URL入力がある場合 ?>
									<a href="<?php echo get_field('link_url'); ?>" target="_blank"><?php the_title(); ?></a>
								<?php elseif( $news_file && !get_field('direct_link') )://ファイルがあり「ファイルへ直接リンク」しない場合 ?>
									<a href="<?php echo $news_file;?>" target="_blank"><?php the_title(); ?></a>
								<?php else: ?>
									<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
								<?php endif; ?>
							<?php if(get_field('new_on')):?><span class="icn-new">NEW</span><?php endif;?>
						</span>
					</li>
				<?php endforeach;
				endif; ?>
			</ul>
			<p class="btn-area display-sp">
				<a href="<?php echo esc_url(home_url('/news'));?>"><span>お知らせ一覧</span><span class="link-border"></span></a>
			</p>	
		</div>
		<!-- ニュース -->
		
	</div>
	<!--topメイン画像============================================================================-->
	
	<!-- キャッチ -->
	<div id="catch-area">
		<div class="left-area"><img src="<?php echo get_template_directory_uri(); ?>/images/img-topcatch.jpg" alt=""></div>
		<div class="right-area">
			<h2>ようこそ、Githubカントリークラブへ<span>オリジナル修正</span><span>ローカル修正</span></h2>

			<!-- <p class="btn-area">
				<a href="<?php echo esc_url(home_url('/history')); ?>"><span>クラブの歴史</span><span class="link-border"></span></a>
			</p> -->
		</div>
	</div>
	<!-- キャッチ -->

	<!-- リンクボタン -->
	<ul id="toplink">
		<li class="li-course">
			<a href="<?php echo esc_url(home_url('/course')); ?>">
				<div>
					<p>Course<span>ゴルフコース</span></p>
				</div>
			</a>
		</li>
		<li class="li-facility">
			<a href="<?php echo esc_url(home_url('/facility')); ?>">
				<div>
					<p>Facility<span>施設紹介</span></p>
				</div>
			</a>
		</li>
		<li class="li-restaurant">
			<a href="<?php echo esc_url(home_url('/restaurant')); ?>">
				<div>
					<p>Restaurant<span>レストラン</span></p>
				</div>
			</a>
		</li>
		<li class="li-guide">
			<a href="<?php echo esc_url(home_url('/guide')); ?>">
				<div>
					<p>Guide<span>ご利用案内</span></p>
				</div>
			</a>
		</li>
		<li class="li-dresscode">
			<a href="<?php echo esc_url(home_url('/dresscode')); ?>">
				<div>
					<p>Dress Code<span>ドレスコード</span></p>
				</div>
			</a>
		</li>
		<li class="li-reservation">
			<a href="https://pp-web2.jp/calendars/sakuragaoka/calendar" target="_blank">
				<div>
					<p>Reservation<span>予約状況</span></p>
				</div>
			</a>
		</li>
	</ul>
	<!-- リンクボタン -->
	
	<!--  フッタ読込 -->
	<?php get_footer('github'); ?>
	<!--  フッタ読込 -->

	<?php wp_footer(); ?>
</body>
</html>
