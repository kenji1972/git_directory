	<!--クラブ署名-->
	<div id="signature-area">
		<div class="area-inn">
			<div class="clubinfo">
				<div>
					<p class="sbt-signature">Githubカントリークラブ<span>Github Country Club</span></p>
				</div>
				<p class="btn-caddie"><a href="" target="_blank">キャディ募集</a></p>
			</div>
			<address>
				<div>
	
				</div>
			</address>
				
			<p class="btn-area">
				<a href="https://pp-web2.jp/clubs/sakuragaokacc/rsvns" target="_blank"><span>会員専用</span><span class="link-border"></span></a>
				<a href="https://pp-web2.jp/calendars/sakuragaoka/calendar" target="_blank"><span>予約状況</span><span class="link-border"></span></a>
				<a href="<?php echo esc_url(home_url('/dresscode')); ?>"><span>ドレスコード</span><span class="link-border"></span></a>
			</p>
		</div>
	</div>
	<!--クラブ署名-->
	
	<!--フッタ-->
	<div id="footer">
		<div class="area-inn">
				<ul class="footer-link">
					<!-- 参考：https://b-risk.jp/blog/2020/06/footer/ -->
					<li>
						<a href="<?php echo esc_url(home_url('/')); ?>" class="display-pc">ホーム</a>
						<a class="js-aco display-sp">ホーム<span class="ico-open"></span></a>
						<ul class="nav-child">
							<li class="display-sp"><a href="<?php echo esc_url(home_url('/')); ?>"><span>ホーム</span></a></li>
							<li><a href="<?php echo esc_url(home_url('/news')); ?>"><span>お知らせ</span></a></li>
							<li><a href="https://www.keio-rec.co.jp/recruit/caddy/" target="_blank"><span>キャディ募集</span></a></li>
							<li><a href="<?php echo esc_url(home_url('/rules'));?>"><span>利用約款</span></a></li>
						</ul>
					</li>
					<section>
						<li>
							<a href="<?php echo esc_url(home_url('/history')); ?>">クラブの歴史</a>
						</li>
						<li>
							<a href="<?php echo esc_url(home_url('/course')); ?>" class="display-pc">ゴルフコース</a>
							<a class="js-aco display-sp">ゴルフコース<span class="ico-open"></span></a>
							<ul class="nav-child">
								<li class="display-sp"><a href="<?php echo esc_url(home_url('/course')); ?>"><span>ゴルフコース</span></a></li>
								<li><a href="<?php echo esc_url(home_url('/course/holes')); ?>"><span>ホール詳細</span></a></li>
							</ul>
						</li>
						<li>
							<a href="<?php echo esc_url(home_url('/facility')); ?>" class="display-pc">施設紹介</a>
							<a class="js-aco display-sp">施設紹介<span class="ico-open"></span></a>
							<ul class="nav-child">
								<li class="display-sp"><a href="<?php echo esc_url(home_url('/facility')); ?>"><span>施設紹介</span></a></li>
								<li><a href="<?php echo esc_url(home_url('/facility/shop')); ?>"><span>用具売店</span></a></li>
							</ul>
						</li>
						<li>
							<a href="<?php echo esc_url(home_url('/restaurant')); ?>">レストラン</a>
						</li>
					</section>
					<section>
						<li>
							<a href="<?php echo esc_url(home_url('/guide')); ?>">ご利用案内</a>
							<!-- <a href="<?php echo esc_url(home_url('/guide')); ?>" class="display-pc">ご利用案内</a>
							<a class="js-aco display-sp">ご利用案内<span class="ico-open"></span></a>
							<ul class="nav-child">
								<li class="display-sp"><a href="<?php echo esc_url(home_url('/guide')); ?>"><span>ご利用案内</span></a></li>
								<li><a href="<?php echo esc_url(home_url('/guide/fee')); ?>"><span>コンペ申込み</span></a></li>
							</ul> -->
						</li>
						<li>
							<a href="<?php echo esc_url(home_url('/dresscode')); ?>">ドレスコード</a>
						</li>
						<li>
							<a href="<?php echo esc_url(home_url('/access')); ?>">アクセス</a>
						</li>
					</section>
					<section>
						<li>
							<a href="s" target="_blank" class="display-pc">会員専用</a>
							<a class="js-aco display-sp">会員専用<span class="ico-open"></span></a>
							<ul class="nav-child">
								<li class="display-sp"><a href="" target="_blank"><span>会員専用</span></a></li>
								<li><a href="" target="_blank"><span>予約状況</span></a></li>
							</ul>
						</li>
					</section>
				</ul>
				<script>
					$('.footer-link .js-aco').click(function () {
						$(this).next().stop().slideToggle();
						$(this).toggleClass('is-active');
					});
				</script>
				
				<div class="copy-area">
					<p>Copyright &copy2022<br class="br-sp"> Github Country Club. All Rights Reserved.</p>
				</div>

		</div>
	</div>
	<!--フッタ-->