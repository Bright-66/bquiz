// JavaScript Document
$(document).ready(function (e) {
	$(".mainmu").mouseover(
		// 當滑鼠移入
		function () {
			$(this).children(".mw").stop().show()
		}
	)
	$(".mainmu").mouseout(
		// 當滑鼠移開
		function () {
			$(this).children(".mw").hide()
			// this->mainmu , 的下一層:mw(children) 要隱藏
		}
	)
});
function lo(x) {
	location.replace(x)
}
function op(x, y, url) {
	$(x).fadeIn()
	if (y)
		$(y).fadeIn()
	if (y && url)
		$(y).load(url)
}
function cl(x) {
	$(x).fadeOut();
}