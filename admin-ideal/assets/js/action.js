$(document).ready(function(){	
	$(function(){
		var url  = window.location.href; 
		var current = url.split("/")[url.split("/").length -1];
		if(current == ""){
			current = "/";
		}
        if(current == "paginas-editor.php"){
			current = "paginas.php";
		}
        if(current == "banners-editor.php"){
			current = "banners.php";
		}
		
		$('.navbar-nav .nav-link').each(function(){
			var $this = $(this);
			if($this.attr('href').indexOf(current) !== -1){
				$this.parent().addClass('active');
			}
		})
	});
});