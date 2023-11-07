
;(function($){
		$(window).scroll(function (){
			var windowHeight = $(window).height();
			var scroll = $(window).scrollTop();
			

			$('#homepage #header').each(function(){
			if (scroll > (windowHeight - 56)){
					$(this).addClass('headerfix');
				}
			if (scroll< (windowHeight - 56)){
					$(this).removeClass('headerfix');
				}
			});
			
			//スクロールでクラスを追加
			$('.scrollanime').each(function(){
				var elemPos = $(this).offset().top;
				if (scroll > elemPos - windowHeight){
					$(this).addClass('scrollactive');
					$(this).removeClass('scrollactivedis');
					}
				// else{
				// 	if($(this).hasClass('scrollactive')){
				// 		$(this).addClass('scrollactivedis');
				// 		$(this).removeClass('scrollactive');
				// 	}

				// }
			});

			//トップページ用 リンク用に上げたz-indexを下げる
			$('#homepage #tournament-area .area-inn').each(function(){
				var elemPos = $(this).offset().top;
				if (scroll > elemPos - windowHeight){
					$('#homepage #topmain-btm').css('z-index',5);
					}
				else{
					$('#homepage #topmain-btm').css('z-index',9);
				}
			});	

			$('#homepage .tournament-under').each(function(){
				var elemPos = $(this).offset().top;
				if (scroll > elemPos - windowHeight){
					$('#homepage #tournament-area .area-inn').css('z-index',6);
					}
				else{
					$('#homepage #tournament-area .area-inn').css('z-index',8);
				}
			});	

		});
})(jQuery);

$(function(){			
	$('a[href^="#"]').click(function(){
	    var speed = 500;
	    var href= $(this).attr("href");
	    var target = $(href == "#" || href == "" ? 'html' : href);
	    var position = target.offset().top;
	    $("html, body").animate({scrollTop:position}, speed, "swing");
	    return false;
	});
})

$(function() {
	//link-targetのclassは別ブラリンク
  	$('tr.link-target').click(function(e) {
	//e.targetはクリックした要素自体、それがa要素以外であれば
	if(!$(e.target).is('a')){
		//その要素の先祖要素で一番近いtrの
		//data-href属性の値に書かれているURLに遷移する
		window.open( $(e.target).closest('tr').data('href'),'newwindow','');
		}
	});	
	
  	//data-hrefの属性を持つtrを選択しclassにclickableを付加
  	$('tr.notarget').click(function(e) {
	//e.targetはクリックした要素自体、それがa要素以外であれば
	if(!$(e.target).is('a')){
		//その要素の先祖要素で一番近いtrの
		//data-href属性の値に書かれているURLに遷移する
		window.location = $(e.target).closest('tr').data('href');}
		});
	
});


