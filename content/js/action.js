$(document).ready(function(){
    // Modal video
    $('.modal-video .fechar').on('click', function() {
        $('.incluir-video').css("opacity","0");
        setTimeout(function(){ $('.modal-video').css("left","105%"); }, 500);
        setTimeout(function(){ 
            $('.backdrop').css("left","-110%");
        }, 500);
        $(".incluir-video").html("");
    });
    
    // Play Video
    $('.play, .btn-play').on('click', function() {
        var videoid = $(this).attr('data-video');
        $('.backdrop').css("left","0");
        setTimeout(function(){ $('.modal-video').css("left","5%"); }, 500);
        setTimeout(function(){ 
            $('<iframe width="100%" height="100%" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>')
            .attr("src", "https://www.youtube.com/embed/" + videoid + "?autoplay=1")
            .appendTo(".incluir-video");
            setTimeout(function(){ $('.incluir-video').css("opacity","1"); }, 500);
            
        }, 2000);
        
    });

    $(function(){
        var url  = window.location.href; 
        var current = url.split("/")[url.split("/").length -1];

        if(current == ""){
             $(".link-home").addClass('active');
        }else{
            $('.navbar-nav a').each(function(){
                var $this = $(this);
                if($this.attr('href').indexOf(current) !== -1){
                    $this.addClass('active');
                }
            })
        }
    });

});