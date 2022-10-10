// JavaScript Document
var bodyheight=$(document).height();
var ck=$(window).height();
var navheight=$("#navs-nav").height();
$(document).scroll(
	function(){
		var toppos=$(document).scrollTop();

		if(toppos>208){
				$(".rollbar").show();
				$("#navs-nav").css("position","fixed");
				$("#navs-nav").css("top","0");
				if(ck-126<navheight){
					if(toppos>bodyheight-ck-126){
							$("#navs-nav").css("position","absolute");
							$("#navs-nav").css("bottom","0");
							$("#navs-nav").css("top","auto");
						}
						}
			}else{
				$(".rollbar").hide();
				$("#navs-nav").css("position","absolute")
				}
		}
		
)
$("#navs-nav>li").click(
	function(){
		$(this).addClass("active").siblings().removeClass("active");
		}
)
$(".navto-search>img").hide().first().show();
$(".navto-search>img").eq(0).click(
	function(){
		$(this).hide().siblings().show();
		$(".site-search").addClass("active");
	}
)
$(".navto-search>img").eq(1).click(
	function(){
		$(this).hide().siblings().show();
		$(".site-search").removeClass("active");
	}
)
$(".container>h1").click(
	function(){
		window.location.href="http://hao.doghj.com/";
		}
)
$("#navs-nav a").click(
	function(){
		var num=$(this).parent().index();
		var navtop=$(".items>div").eq(num).offset();
		$("body,html").animate({scrollTop:navtop.top/*让body的scrollTop等于pos的top，就实现了滚动 */},500);  	
		}
)