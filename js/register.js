// hide/show dropdowns for 'principal aviation activity' in 'Become a member' form
jQuery(document).ready(function(){
	jQuery(".drop-down1, .drop-down2, .drop-down3, .drop-down4").hide();
	jQuery('#ninja_forms_form_2').change(function() {
	    if (jQuery('#ninja_forms_field_53_0').attr('checked')) {
	        jQuery('.drop-down1').show();
	        jQuery('.drop-down2').hide();
	    } 
	    if (jQuery('#ninja_forms_field_53_1').attr('checked')) {
	        jQuery('.drop-down2').show();
	        jQuery('.drop-down1').hide();
	    }
	});
	jQuery('#ninja_forms_form_3').change(function() {
	    if (jQuery('#ninja_forms_field_80_0').attr('checked')) {
	        jQuery('.drop-down3').show();
	        jQuery('.drop-down4').hide();
	    } 
	    if (jQuery('#ninja_forms_field_80_1').attr('checked')) {
	        jQuery('.drop-down4').show();
	        jQuery('.drop-down3').hide();
	    }
	});
});
 