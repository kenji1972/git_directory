<?php
	//クリックジャッキング対策
	header('X-FRAME-OPTIONS: SAMEORIGIN');
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<title><?php wp_title('|', true, 'right'); ?> 鳥居Github用WordPress</title>
	<meta name="description" content="" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />

	<?php if (wp_is_phone()) : //スマートフォンは何もしない 
	?>
	<?php else : //その他は自動電話追加をとる
	?>
		<meta name="format-detection" content="telephone=no">
	<?php endif; ?>

	<?php wp_head(); ?>

	<link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Noto+Serif+JP:300,400,500,700,900&amp;subset=japanese" rel="stylesheet">

	<link href="<?php echo get_template_directory_uri(); ?>/css/query-github.css" rel="stylesheet">
	<link href="<?php echo get_template_directory_uri(); ?>/css/pc-common-github.css" rel="stylesheet" media="print">
	<link href="<?php echo get_template_directory_uri(); ?>/css/pc-each-github.css" rel="stylesheet" media="print">

    <script src='https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js?ver=2.1.1'></script>
    
	<!-- scrollhint -->
	<link rel="stylesheet" href="https://unpkg.com/scroll-hint@latest/css/scroll-hint.css">
	<script src="https://unpkg.com/scroll-hint@latest/js/scroll-hint.min.js"></script>

	<script src="<?php echo get_template_directory_uri(); ?>/js/display-github.js"></script>

	<script type="text/javascript">
		//固定ヘッダー横スクロール可
		$(window).on("scroll", function() {
			$(".header").css("left", -$(window).scrollLeft());
		});
	</script>
	<script type="text/javascript">
		$(function() {
			var hheight = 124;
			//スマホではずらしを0に
			if (window.matchMedia && window.matchMedia('(max-device-width: 640px)').matches) {
				hheight = 0;
				}

			$('a[href^="#"]').click(function(){
                //ファンシーボックスのリンクでは動かさない
                if($(this).hasClass('fancybox-inline')){
                    
                    }
                else{
                    var speed = 1000;
                    var href= $(this).attr("href");
                    var target = $(href == "#" || href == "" ? 'html' : href);
                    var position = target.offset().top - hheight;

                    $("html, body").animate({scrollTop:position}, speed, "swing");
				    return false;
                    }   
				});
					
			$(window).on('load', function() {
				var url = $(location).attr('href');
				if(url.indexOf("#") != -1){
					var anchor = url.split("#");
					var target = $('#' + anchor[anchor.length - 1]);
						if(target.length){
						var pos = Math.floor(target.offset().top) - hheight;
						$("html, body").animate({scrollTop:pos}, 500);
						}
					}
				});
			});			
		</script>
	
		

	<link rel="shortcut icon" href="/favicon.ico">

</head>

<body id="<?php
			if (is_front_page()) {
				echo 'homepage';
				}
			elseif(is_404()){
				echo  'errorpage';
				} 
			else {
				$page = get_page(get_the_ID());
				echo $page->post_name; //ページのスラッグ
			}
			?>" class="<?php
						if (is_single() || is_category()) {
							echo 'single-page';
						}
						if (is_page()) {
							$parent_id = $post->post_parent; // 親ページのIDを取得
							$parent_slug = get_post($parent_id)->post_name; // 親ページ
							echo $parent_slug;
						}
						?>">

	<!--ヘッダ-->
	<div id="header">
		<!-- ロゴなど -->
		<div class="upper-area">
			<h1 class="toppage-logo"><a href="<?php echo esc_url(home_url('/')); ?>">Githubカントリークラブ</a></h1>
			<p class="toppage-linkmem"><a href="" target="_blank">会員専用ページ</a></p>
			<div class="innerpage-logo">
				<div class="area-inn">
					<a href="<?php echo esc_url(home_url('/')); ?>">Githubカントリークラブ</a>
				</div>
			</div>
		</div>
		<!-- ロゴなど -->

		<!-- グローバル -->
		<ul id="global" class="">
			<li><a href="<?php echo esc_url(home_url('/history')); ?>">クラブの歴史<span>History</span></a></li>
			<li><a href="<?php echo esc_url(home_url('/news')); ?>">お知らせ<span>News</span></a></li>
			<li><a href="<?php echo esc_url(home_url('/course')); ?>">ゴルフコース<span>Course</span></a>
				<div>
					<ul class="submenu">
						<li><a href="<?php echo esc_url(home_url('/course/holes')); ?>">ホール詳細</a></li>
					</ul>
				</div>
			</li>
			<li><a href="<?php echo esc_url(home_url('/facility')); ?>">施設紹介<span>Facility</span></a>
				<div>
					<ul class="submenu">
						<li><a href="<?php echo esc_url(home_url('/facility/shop')); ?>">用具売店</a></li>
					</ul>
				</div>
			</li>
			<li><a href="<?php echo esc_url(home_url('/restaurant')); ?>">レストラン<span>Restaurant</span></a></li>
			<li>
				<a href="<?php echo esc_url(home_url('/guide')); ?>">ご利用案内<span>Guide</span></a>
				<!-- <div>
					<ul class="submenu">
						<li><a href="<?php echo esc_url(home_url('/guide/fee')); ?>">料金案内</a></li>
						<li><a href="<?php echo esc_url(home_url('/competition')); ?>">コンペ申込み</a></li>
					</ul>
				</div> -->
			</li>
			<li><a href="<?php echo esc_url(home_url('/dresscode')); ?>">ドレスコード<span>Dress Code</span></a></li>
			<li><a href="<?php echo esc_url(home_url('/access')); ?>">アクセス<span>Access</span></a></li>
			<li class="innerpage-linkmem"><a href="https://pp-web2.jp/clubs/sakuragaokacc/rsvns" target="_blank">会員専用</a><li>
		</ul>
		<!-- グローバル -->
		
		<!-- ハンバーガー -->
		<div id="humbergar">
				<span></span>
				<span></span>
				<span></span>
			</div>
		<!-- ハンバーガー -->
	</div>
	<!--ヘッダ-->	
	
	<!-- モーダル -->
	<div class=”fancybox-hidden” style="display:none">
		<div class="modal-area" id="dresscode-area">
			<div class="sbt-area">
				<h2>ドレスコード<span>Dress Code</span></h2>
				<div class="blue-line"></div>
			</div>
			<p>githubカントリークラブは会員制ゴルフクラブです。<br>
			ご来場の際はドレスコードをお守りくださいますよう、お願いいたします。</p>
			<div>
				<img src="<?php echo get_template_directory_uri(); ?>/images/ill-dresscode1802.jpg" alt="ドレスコード">
			</div>
		</div>
	</div>
	<!-- モーダル -->

	<!--サイドメニュー-->
	<div id="sidemenu-area">
		<!--クリックして出現するサイトマップ-->
		<div id="humbergar-global">
			<div id="close-area">
				<span></span>
				<span></span>
			</div>
			<div class="inner-area">
				<p class="humbergar-logo"><a href="<?php echo esc_url(home_url('/')); ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/logo-sakuragaoka-wh.png" alt="githubカントリークラブ"></a></p>
				<address>〒206-0021 東京都<br>
				2985 Renkoji Tama-shi Tokyo 206-0021</address>
				<p class="btn-area">
                    <a href="<?php echo esc_url(home_url('/news')); ?>"><span>お知らせ</span><span class="link-border"></span></a>
                    <a href="" target="_blank"><span>会員専用ページ</span><span class="link-border"></span></a>
                </p>
				<ul class="humbergar-link">
					<!-- 参考：https://b-risk.jp/blog/2020/06/footer/ -->
					<li class="display-pc">
						<a href="<?php echo esc_url(home_url('/')); ?>">ホーム</a>
						<ul class="nav-child">
							<li class="display-sp"><a href="<?php echo esc_url(home_url('/')); ?>"><span>ホーム</span></a></li>
							<li><a href="<?php echo esc_url(home_url('/news')); ?>"><span>お知らせ</span></a></li>
							<li><a href=""><span>キャディ募集</span></a></li>
							<li><a href="<?php echo esc_url(home_url('/rules')); ?>"><span>利用約款</span></a></li>
						</ul>
					</li>
					<li>
						<a href="<?php echo esc_url(home_url('/history')); ?>">クラブの歴史</a>
					</li>
					<li class="li-course">
						<a href="<?php echo esc_url(home_url('/course')); ?>">ゴルフコース</a>
						<ul class="nav-child">
							<li><a href="<?php echo esc_url(home_url('/course/holes')); ?>"><span>ホール詳細</span></a></li>
						</ul>
					</li>
					<li class="li-facility">
						<a href="<?php echo esc_url(home_url('/facility')); ?>">施設紹介</a>
						<ul class="nav-child">
							<li><a href="<?php echo esc_url(home_url('/facility/shop')); ?>"><span>用具売店</span></a></li>
						</ul>
					</li>
					<li>
						<a href="<?php echo esc_url(home_url('/restaurant')); ?>">レストラン</a>
					</li>
					<li>
						<a href="<?php echo esc_url(home_url('/guide')); ?>">ご利用案内</a>
						<!-- <ul class="nav-child">
							<li><a href="<?php echo esc_url(home_url('/guide/fee')); ?>"><span>料金案内</span></a></li>
							<li><a href=""><span>コンペ申込み</span></a></li>
						</ul> -->
					</li>
					<li>
						<a href="<?php echo esc_url(home_url('/dresscode')); ?>">ドレスコード</a>
					</li>
					<li>
						<a href="<?php echo esc_url(home_url('/access')); ?>">アクセス</a>
					</li>
					<li class="display-sp">
						<a href="<?php echo esc_url(home_url('/rules')); ?>">利用約款</a>
					</li>
					<li class="display-pc">
						<a href="" target="_blank">会員専用</a>
						<ul class="nav-child">
							<li class="display-sp"><a href="" target="_blank"><span>会員専用</span></a></li>
							<li><a href="" target="_blank"><span>予約状況</span></a></li>
						</ul>
					</li>

				</ul>
			</div>
		</div>
		<!--クリックして出現するサイトマップ-->
	</div>
	<!--サイドメニュー-->

	<!-- 予約状況（モーダル） -->
	<div class=”fancybox-hidden” style="display:none">
		<div class="modal-area" id="info-reservation">
			
		</div>
	</div>
	<!-- 予約状況（モーダル） -->

	<script>
        $(function() {
            /*ハンバーガークリックでスマホ版グローバルを表示 */
            $('#humbergar').click(function(){
                $('#humbergar').toggleClass('active');
                $('#humbergar-global').toggleClass('active');
				$('#close-area').toggleClass('active');
            });

			/*ハンバーガークリックでスマホ版グローバルを表示 */
            $('#close-area').click(function(){
                $('#humbergar').removeClass('active');
                $('#humbergar-global').removeClass('active');
				$('this').removeClass('active');
            });

			/*スマホ用会員ページ*/
			$('#link-sp-member').click(function(){
                $('#link-sp-member .sublist').toggleClass('active');
            });
        });		
    </script>