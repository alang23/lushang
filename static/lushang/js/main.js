$(function(){
	
	$(".ind_nav li").click(function(){
		$(this).addClass("on").siblings().removeClass("on");
	});
	
	$("#klq").click(function(){
		$('.ind_klq').show();
		$('.ind_ylq').hide();
		$('.ind_ygq').hide();
	});
	$("#ylq").click(function(){
		$('.ind_klq').hide();
		$('.ind_ylq').show();
		$('.ind_ygq').hide();
	});
	$("#ygq").click(function(){
		$('.ind_klq').hide();
		$('.ind_ylq').hide();
		$('.ind_ygq').show();
	});
	
	$(".ind_klq a").click(function(){
		$('.tc_bg').show();
	});
	$(".tc_close").click(function(){
		$('.tc_bg').hide();
	});
});	


