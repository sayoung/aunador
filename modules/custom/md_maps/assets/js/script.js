var $ = jQuery.noConflict();



jQuery('#Layer_1 path').on('click', function () {

  jQuery('#Layer_1 path').removeClass("cls_active");
  jQuery(this).addClass("cls_active");

  var pos = jQuery(this).index();


  jQuery(".detailCarte").fadeOut();
  jQuery(".detailCarte").eq(pos).fadeIn();


});

jQuery('path').click(function(){
   // var url = window.location.origin;
   // if (~url.indexOf("tequality")){
       // url = url ;
  //  }
  //  url = jQuery(this).data('url');
//    window.location.href = url;
});
	jQuery('path').click(function(){

            var title = jQuery(this).attr('title');
            jQuery('.spanTooltips').empty().append(title).stop().fadeIn("slow");

        }, function() {
                jQuery('.spanTooltips').stop().fadeOut("slow");

        }).mousemove(function(e) {

                var mousex = e.pageX - 600; //Get X coordinates
                var mousey = e.pageY - 150; //Get Y coordinates
                jQuery('.spanTooltips').css({ top: mousey, left: mousex, opacity: 1 })

        });
