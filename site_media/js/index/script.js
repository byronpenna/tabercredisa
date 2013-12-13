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
});