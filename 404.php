<?php get_header('github'); ?>

	<!-- ページタイトル -->
	<div id="pagetitle-area">
		<div class="area-inn">
			<h1>ページが見つかりません。<span>404 ERROR</span></h1>
		</div>
	</div>
	<!-- ページタイトル -->
	
	<!-- コンテンツエリア -->
	<div id="maincontents-area">
		<div class="area-inn">	
			<?php 
				$http = is_ssl() ? 'https' : 'http' . '://';
				$url = esc_html($http . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"]);
			?>
			<p>入力されたURL：<span> <?php echo $url; ?> </span></p>

			<p>指定されたページまたはファイルは、一時的にアクセス出来ない状態か、<br>
			削除または別の場所に移動した可能性があります。</p>
			<p>ブックマークを登録されている場合は、お手数ですが設定の変更をお願いいたします。</p>
				
			<p class="btn-area"><a href="<?php echo esc_url(home_url()); ?>">githubカントリークラブ TOPページ</a><p>
		</div>
	</div>
	<!-- コンテンツエリア -->

	<!--  フッタ読込 -->
	<?php get_footer('github'); ?>
	<!--  フッタ読込 -->

	<?php wp_footer(); ?>
</body>
</html>