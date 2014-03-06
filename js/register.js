
jQuery(".drop-down1, .drop-down2").hide(); 

jQuery(".principle-aviation").change(function() {
	if(jQuery('.principle-aviation').val() === 'Full member'){
		jQuery(".drop-down1").fadeIn(1000);
		jQuery(".drop-down2").fadeOut();
	} else if(jQuery('.principle-aviation').val() === 'Associated member'){
		jQuery(".drop-down2").fadeIn(1000);
		jQuery(".drop-down1").fadeOut();
	}
});