jQuery ($) ->

	MTIConfig = {};
	MTIConfig.EnableCustomFOUTHandler = true
	
	monkeyList = new List("members-list",
		valueNames: ["name"]
		page: 16
		plugins: [ListPagination({})]
		)
	return

	# $("#members_business_filter").on "change", ->
	# 	businessType = $(this).val()

	# 	$.post(
	# 		/businessType_ajax.php/
	# 		businessType: businessType
	# 		(data, textStatus, jqXHR) ->
	# 			$("#list_members").html(data)
	# 	)

	

