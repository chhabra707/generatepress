
	//map filter
	$('.category').multipleSelect({
		placeholder: "Catégories",
		minimumCountSelected:1,
		countSelected:'# of % selected',
		hideOptgroupCheckboxes:true	
	});
	$('.name').multipleSelect({
		placeholder: "Nom des participants",
		minimumCountSelected:1,
		countSelected:'# of % selected',
		hideOptgroupCheckboxes:true	
	});
	$('.city').multipleSelect({
		placeholder: "Municipalités",
		minimumCountSelected:1,
		countSelected:'# of % selected',
		hideOptgroupCheckboxes:true	
	});
/*	
    $(".filters-submit").click(function(){
        var categoriesArr = [];
		var categories = '';
        $.each($(".category option:selected"), function(){            
            categoriesArr.push($(this).val());
        });
		categories = categoriesArr.join(",");
		
		var participantsArr = [];
		var participants = '';
        $.each($(".name option:selected"), function(){            
            participantsArr.push($(this).val());
        });
		participants = participantsArr.join(",");
		
		var citiesArr = [];
		var cities = '';
        $.each($(".city option:selected"), function(){            
            citiesArr.push($(this).val());
        });
		cities = citiesArr.join(",");
		
        //alert("Categories - " + categories +" participants - " + participantsArr +" cities - " + citiesArr); 
		//ajax call 
		$.ajax({
			type: "post",
			//dataType: "json",
			url: do_filter.ajax_url,
			data: {
                action: 'map_filter',
                participants: participants,
                categories: categories,
                cities: cities
            },
			success: function(msg){
				console.log(msg);
				//alert(msg);
			}
		});
		return false;
	});*/
