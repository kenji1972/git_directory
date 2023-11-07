<?php

//バージョン情報を削除
foreach ( array( 'rss2_head', 'commentsrss2_head', 'rss_head', 'rdf_header', 'atom_head', 'comments_ato m_head', 'opml_head', 'app_head' ) as $action ) {
	remove_action( $action, 'the_generator' );
	}
foreach (array('wp_generator', 'wlwmanifest_link', 'rsd_link') as $function) { 
	remove_action('wp_head', $function);
	}

//wp-block-library-css削除
add_action('wp_enqueue_scripts', 'remove_block_library_style');
function remove_block_library_style(){
     wp_dequeue_style('wp-block-library');
     wp_dequeue_style('wp-block-library-theme');
 }

//ページネーション
function adjust_category_paged( $query = []) {
  if (isset($query['name'])
   && $query['name'] === 'page'
   && isset($query['page'])
   && isset($query['category_name'])) {
    $query['paged'] = intval($query['page']); // 念のため整数化しておく
    unset($query['name']);
    unset($query['page']);
  }
  return $query;
}
add_filter('request', 'adjust_category_paged');

// 列の追加
function my_add_columns($columns)
{
    $columns['my_column_name'] = 'カテゴリ';

    // 日付を列の最後に移動
    $date = $columns['date'];
    unset($columns['date']);
    $columns['date'] = $date;

    return $columns;
}
add_filter('manage_edit-clubcompe_columns', 'my_add_columns');

// 列の内容を追加
function my_add_columns_content($column_name, $post_id)
{
    if ($column_name == 'my_column_name') {
        // タームを表示
        $my_terms = get_the_terms($post_id, 'clubcompe_cat');

        if ($my_terms && !is_wp_error($my_terms)) {
            $draught_links = array();
            foreach ($my_terms as $my_term) {
                $draught_links[] = $my_term->name;
            }
            $stitle = join(", ", $draught_links);
        }
    }

    if (isset($stitle) && $stitle) {
        echo esc_attr($stitle);
    }
}
add_action('manage_clubcompe_posts_custom_column', 'my_add_columns_content', 10, 2);


/*-----------------------------------------------------
	タクソノミー未選択時に特定のタームを選択させる
----------------------------------------------------- */
function add_defaultcategory_automatically($post_ID) {
  global $wpdb;
  //カスタムタクソノミーのタームを取得
  $curTerm = wp_get_object_terms($post_ID, 'clubcompe_cat');//★カスタムタクソノミー名
  //ターム指定数が未設定の時に特定のタームを指定
  if (0 == count($curTerm)) {
    $defaultTerm= array(3);//★選択させたいタームID
    wp_set_object_terms($post_ID, $defaultTerm, 'clubcompe_cat');//★カスタムタクソノミー名
  }
}
//カスタム投稿を作成する際に指定
add_action('publish_clubcompe', 'add_defaultcategory_automatically');//★publish_カスタム投稿タイプ名


/* パスワード保護ページの「保護中:」を消す */
add_filter('protected_title_format', 'remove_protected');
function remove_protected($title) {
       return '%s';
}


//画像トリミングサイズ
//アップロード以降にあげた画像から適用、以前は適用されないので注意
if (function_exists('add_theme_support')) {
	add_image_size('defaultsize', '', '', true); // デフォルト
	add_image_size('campaign', '300', '', true); //キャンペーン用サムネイル
	add_image_size('newsimage', '800', '', true); //お知らせ用
	add_image_size('event', '300', '300', true); //イベント用
	add_image_size('lunch', 1024, 695, true); //レストラン昼職用
	add_image_size('fair', 794, 260, true); //レストラン フェア用
}

//画像トリミング位置を上・左右中央に
function my_awesome_image_resize_dimensions( $payload, $orig_w, $orig_h, $dest_w, $dest_h, $crop ){
    if( false ) return $payload;
    if ( $crop ) {
        $aspect_ratio = $orig_w / $orig_h;
        $new_w = min($dest_w, $orig_w);
        $new_h = min($dest_h, $orig_h);
        if ( !$new_w ) $new_w = intval($new_h * $aspect_ratio);
        if ( !$new_h ) $new_h = intval($new_w / $aspect_ratio);
        $size_ratio = max($new_w / $orig_w, $new_h / $orig_h);
        $crop_w = round($new_w / $size_ratio);
        $crop_h = round($new_h / $size_ratio);
        $s_x = ($orig_w - $crop_w) / 2;
        $s_y = 0;
    } else {
        $crop_w = $orig_w;
        $crop_h = $orig_h;
        $s_x = ($orig_w - $crop_w) / 2;
        $s_y = 0;
        list( $new_w, $new_h ) = wp_constrain_dimensions( $orig_w, $orig_h, $dest_w, $dest_h );
    }
     if ( $new_w >= $orig_w && $new_h >= $orig_h ) return false;
    return array( 0, 0, (int) $s_x, (int) $s_y, (int) $new_w, (int) $new_h, (int) $crop_w, (int) $crop_h );
}
add_filter( 'image_resize_dimensions', 'my_awesome_image_resize_dimensions', 10, 6 );


/**
 * $name 新しい画像サイズの名前
 * $width 横幅
 * $height 高さ
 * $crop 切り抜くか切り抜かないか
 */


/****************************************
		 デバイスの条件分岐
*****************************************/
//スマートフォンの判別
function wp_is_phone() {
	$ua = $_SERVER['HTTP_USER_AGENT'];
	if (   strpos($ua, 'iPhone') 							// iPhone
		|| strpos($ua, 'iPod') 								// iPod touch
		||(strpos($ua, 'Android') && strpos($ua, 'Mobile'))	// Android搭載スマホ
		||(strpos($ua, 'Windows') && strpos($ua, 'Mobile')) // Windows Phone
		||(strpos($ua, 'firefox') && strpos($ua, 'Mobile')) // firefox製ブラウザ
		|| strpos($ua, 'Opera Mini')						// Androidで人気のブラウザ
		|| strpos($ua, 'Opera Mobi')						// Androidで人気のブラウザ
		|| strpos($ua, 'webmate') 							// その他の Other iPhone browser
		|| strpos($uat,'incognito') 						// その他の iPhone browser
	) {
		return true;
	} else {
		return false;
	}
}

//ショートコードを使ったphpファイルの呼び出し方法
function my_php_Include($params = array()) {
	extract(shortcode_atts(array('file' => 'default'), $params));
	ob_start();
	include(STYLESHEETPATH . "/$file.php");
	return ob_get_clean();
	}
add_shortcode('myphp', 'my_php_Include');

?>
