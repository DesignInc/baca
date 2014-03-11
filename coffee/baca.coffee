jQuery ($) ->

	MTIConfig = {};
	MTIConfig.EnableCustomFOUTHandler = true
	
	monkeyList = new List("members-list",
		valueNames: ["name"]
		page: 16
		plugins: [ListPagination({})]
		)
	

	# $("#members_business_filter").on "change", ->
	# 	businessType = $(this).val()

	# 	$.post(
	# 		/businessType_ajax.php/
	# 		businessType: businessType
	# 		(data, textStatus, jqXHR) ->
	# 			$("#list_members").html(data)
	# 	)
	
	

	if $(".ninja-forms-response-msg").hasClass("ninja-forms-error-msg")
		$(".drop-down1, .drop-down2, .drop-down3, .drop-down4").hide()
		if $("#ninja_forms_field_53_0").attr('checked')
			$(".drop-down1").show()
			$(".drop-down2").hide()
		else if $("#ninja_forms_field_53_1").attr('checked')
			$(".drop-down2").show()
			$(".drop-down1").hide()
		else if $("#ninja_forms_field_80_0").attr('checked')
			$(".drop-down3").show()
			$(".drop-down4").hide()
		else if $("#ninja_forms_field_80_1").attr('checked')
			$(".drop-down4").show()
			$(".drop-down3").hide()
	else
		$(".drop-down1, .drop-down2, .drop-down3, .drop-down4").hide()

	$('#ninja_forms_form_2').on "change", ->
	    if ($('#ninja_forms_field_53_0').attr('checked'))
	        $('.drop-down1').show()
	        $('.drop-down2').hide()
	    
	    if ($('#ninja_forms_field_53_1').attr('checked')) 
	        $('.drop-down2').show()
	        $('.drop-down1').hide()
	    
	
	$('#ninja_forms_form_3').on "change", ->
	    if ($('#ninja_forms_field_80_0').attr('checked')) 
	        $('.drop-down3').show()
	        $('.drop-down4').hide()
	    
	    if ($('#ninja_forms_field_80_1').attr('checked')) 
	        $('.drop-down4').show()
	        $('.drop-down3').hide()
	    
	$("#ninja_forms_field_64, #ninja_forms_field_131").click (e)->
		e.preventDefault()
		$("#terms_container").addClass("active")
		$("body").addClass("fixed")

		termsCopy = $('#terms_copy')
		termsCopy.scroll ->
			if (termsCopy.innerHeight() == termsCopy.prop('scrollHeight') - termsCopy.scrollTop())
		    	$("#terms_agree.button").addClass("active") 
		    return false
				
		
	$("#terms_agree.button").click (b) ->
		if $("#terms_agree.button").hasClass("active")
			$("#terms_container").removeClass("active")
			$("#ninja_forms_field_64, #ninja_forms_field_131").prop('checked', true)
			$("body").removeClass("fixed")
		else $("#terms_instruction").addClass("remind")
			
	


	

