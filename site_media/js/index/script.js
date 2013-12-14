$(document).ready(function(){
	// var url = document.URL;
	// alert(url);
	// alert(url.substr(0,url.indexOf("?")));
	$('.flexslider').flexslider({
	    animation: "slide",
	    start: function(slider){
	      $('body').removeClass('loading');
	    }
	});
	$("#pluginFacebook iframe").each(function(){
		alert('hola');
	});
	// var x = document.getElementsByTagName("f3b3eef3c4");
	// x.style.with = '100%';
	// x.style.background = 'white';
	// alert($(x).attr("name"););
});