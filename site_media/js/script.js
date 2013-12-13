$(document).ready(function(){
	var btn_movil = $('#nav-mobile'),
	menu = $('#menu').find('ul');
	btn_movil.menuResponsive(menu);
	$("#cb_language").change(function(){
		$("#language").val($(this).val());
		$("#frmChangeLang").submit();
	});
	$("#partButtonBanner").click(function(){
		// alert("gay");
		$(".sectionLogin").fadeToggle(1000,function(){

		});
	});
});