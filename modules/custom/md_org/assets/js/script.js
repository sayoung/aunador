var $ = jQuery.noConflict();

/*
$(document).ready(function(){
	 $('[data-toggle="popover"]').popover({
          trigger: 'focus',
		  //trigger: 'click',
          html: true,
          content: function () {
				return '<img class="img-fluid" style="height:150px;" src="'+$(this).data('img') + '" /><div class="txt_cnt">'+ $(this).data('desc') + '</div> ';
          },
          title: 'Toolbox'
    }) 
});
*/
$(document).ready(function(){
$('[data-toggle="popover"]').popover({
	 trigger: 'focus',
	 html: true,
	 title: 'Toolbox'
})
});