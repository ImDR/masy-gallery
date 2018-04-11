(function($){
	$('#masygal_images').sortable();
	
	$('#masygal_add_images').on('click', function(event) {
		event.preventDefault();
		var name = $(this).attr('data-meta-key');
		var frame = wp.media({
			title: 'Select multiple images with the CTRL key',
			button: {
				text: 'Upload'
			},
			multiple: true,
			library: { 
				type: 'image'
			}
		});

		frame.on( 'select', function() {
			var attachment = frame.state().get('selection').toJSON();
			for(var i=0; i< attachment.length; i++){
				$('#masygal_images').append("<div class='item'><img src='"+attachment[i].url+"'/><input type='hidden' name='"+name+"[]' value='"+attachment[i].id+"'/><span class='remove'>&times;</span></div>");
				//console.log(attachment[i].id);
			}
		});

		frame.open();
	});
	
	$('#masygal_images').on('click', '.item span.remove', function(event) {
		event.preventDefault();
		$(this).parent('.item').remove();
	});
})(jQuery);