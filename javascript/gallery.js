//jQuery.noConflict();
//(function($) {
	$(document).ready(function() {
		var thumbs = [];
		var anchor = $('#featuredImageAnchor');
		$('body').append('<div id="modal-holder"><div id="modal"></div></div>');
		$('#thumbs li a').each(function(){
			thumbs.push(this);
			$(this).click(function(e){
				e.preventDefault();
				var src = $(this).attr('href');
				var srcFull = $(this).attr('data-rel');
				var featured = $('#featuredImage');
				var image = $('#featuredImage img');
				featured.addClass('loading');
				featured.css('width',featured.width());
				featured.css('height',featured.height());
				image.fadeOut('fast', function () {
					image.attr('src', src);
					image.fadeIn('fast', function(){
						featured.removeAttr('style');
						featured.removeClass('loading');
						anchor.attr('href',srcFull);
					});
				});
				$('#thumbs li a').removeClass('current');
				$(this).addClass('current');
			});
		});
		anchor.click(function(e){
			e.preventDefault();
			$('#modal-holder').addClass('loading');
			$('#modal').html('<img src="'+$(this).attr('href')+'" />');
		});
		$('#modal-holder').click(function(){
			$('#modal-holder').removeClass('loading').removeClass('show');
		});
		$('#prev').click(function(e){
			e.preventDefault();
			//find position in thumbs array and go to previous
			for(i=0;i<thumbs.length;i++){
				if($(thumbs[i]).hasClass('current')){
					if(i){
						i--;
					} else {
						i=thumbs.length-1;
					}
					$(thumbs[i]).click();
					break;
				}
			}
		});
		$('#next').click(function(e){
			e.preventDefault();
			//find position in thumbs array and go to previous
			for(i=0;i<thumbs.length;i++){
				if($(thumbs[i]).hasClass('current')){
					if((i+1) == thumbs.length){
						i=0;
					} else {
						i++;
					}
					$(thumbs[i]).click();
					break;
				}
			}
		});
	});
//}(jQuery));
