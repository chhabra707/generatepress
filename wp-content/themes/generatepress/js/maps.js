var $ = jQuery.noConflict();
//$(function(){
    //if($('#interactive_map').length){		
		window.default_lat = 0;
        window.default_lng = 0;
        window.default_lat_lng_count = 0;
        window.default_item_content;
        window.default_markers = [];
        interactive_map_init(artists,'artists',false);
		if(sponsors.length !== 0){
			interactive_map_init(sponsors,'sponsors','sponsors');
		}
		if(collectives.length !== 0){
			interactive_map_init(collectives,'collectives','collectives');
		}
		var markersList = default_markers;
/*         map_init({
            'element':'interactive_map_map',
            'lat':default_lat/default_lat_lng_count,
            'lng':default_lng/default_lat_lng_count,
           
            'marker':true,
            'markers_arr':default_markers
        }); */
function interactive_map_init(arr,div,type){
	console.log(arr);
	if(type === false){
			for(i in arr){		
				//if(i != "unique_count"){
					//console.log(arr);
					//console.log(i);
					$('#interactive_map_cat .select_items.'+div+' > ul > li:last-of-type > ul > li:last-of-type > ul').append(
						'<li>'
						+'<div data-url="'+arr[i]['url']+'" data-map_town="'+arr[i]['map_town']+'" data-number="'+arr[i]['number']+'" data-town="'+arr[i]['town']+'" data-phone_second="'+arr[i]['phone_second']+'" data-email_second="'+arr[i]['email_second']+'" data-url="'+arr[i]['page']+'" data-marker="'+arr[i]['mapPin']+'" data-email="'+arr[i]['email']+'" data-address="'+arr[i]['address']+'" data-phone="'+arr[i]['phone']+'" data-image="'+arr[i]['featuredImage']+'" data-lng="'+arr[i]['lng']+'" data-lat="'+arr[i]['lat']+'">'+arr[i]['name']+'</div>'
						+'</li>'
					);
					default_lat += arr[i]['lat']*1;
					default_lng += arr[i]['lng']*1;
					default_lat_lng_count++;
					default_item_content = '<div class="map_selected_item clear_both">';
					default_item_content += '<div class="map_selected_item_image">';
					default_item_content += '<a target="_blank" href="'+arr[i]['page']+'"><img src="'+arr[i]['featuredImage']+'"></a>';
					default_item_content += '</div>';
					default_item_content += '<div class="map_selected_item_text">';
					default_item_content += '<div class="map_selected_item_number">/'+arr[i]['number']+'</div>';
					default_item_content += '<h3 class="map_selected_item_title"><a target="_blank" href="'+arr[i]['page']+'">'+arr[i]['name']+'</a></h3>';
					default_item_content += '<ul>';
					if('address' in arr[i]){
						var town = '';
						if(arr[i]['town'] != ''){
							town = ', '+arr[i]['town'];
						}
						default_item_content += '<li>'+arr[i]['address']+town+'</li>';
					}
					if('phone' in arr[i]){
						var phone2 = '';
						if(arr[i]['phone_second'] != ''){
							phone2 = '<br>'+arr[i]['phone_second'];
						}
						default_item_content += '<li>'+arr[i]['phone']+phone2+'</li>';
					}
					if('email' in arr[i]){
						var email2 = '';
						if(arr[i]['email_second'	] != ''){
							email2 = '<br><a href="mailto:'+arr[i]['email_second']+'">'+arr[i]['email_second']+'</a>';
						}
						default_item_content += '<li><a href="mailto:'+arr[i]['email']+'">'+arr[i]['email']+'</a>'+email2+'</li>';
					}
					default_item_content += '</ul>';
					default_item_content += '</div>';
					default_item_content += '<div class="map_selected_item_plus"><a target="_blank"  href="'+arr[i]['page']+'"></a></div>';
					default_item_content += '</div>';
					default_markers.push({
						'lat':arr[i]['lat']*1,
						'lng':arr[i]['lng']*1,
						'content':default_item_content,
						'title':arr[i]['name'],
						'marker':arr[i]['mapPin']
					});
				//}
				}
				//$('#interactive_map_cat .select_items.'+div+' > ul > li:last-of-type > ul > li:last-of-type').append('</ul>');
			//}
			//$('#interactive_map_cat .select_items.'+div+' > ul > li:last-of-type > div').append('<span>('+subcat_post_count+')</span>');
			//$('#interactive_map_cat .select_items.'+div+' > ul > li:last-of-type').append('</ul>');
		//}
		//$('#interactive_map_cat .select_items.'+div+' > div').append(' <span class="dvo">('+post_count+')</span>');  //David code removed count
	    //$('#interactive_map_cat .select_items.'+div+' > div').append('<div class="cart-search-down-arrow"> </div>');  //David code added arrow down
	}else{
		var post_count = 0;
		for(i in arr){
			$('#interactive_map_cat .select_items.'+div+' > ul').append('<li><div data-plus="'+arr[i]['col_external_link']+'" data-phone2="'+arr[i]['second_phone']+'" data-address2="'+arr[i]['second_address']+'" data-direction="'+arr[i]['direction']+'" data-place="'+arr[i]['place']+'" data-dates="'+arr[i]['dates']+'" data-dayhours="'+arr[i]['dayhours']+'" data-website="'+arr[i]['website']+'" data-marker="'+arr[i]['pin']+'" data-email="'+arr[i]['email']+'" data-address="'+arr[i]['address']+'" data-phone="'+arr[i]['phone']+'" data-image="'+arr[i]['logo']+'" data-lng="'+arr[i]['lng']+'" data-lat="'+arr[i]['lat']+'">'+arr[i]['name']+'</div></li>');
			default_lat += arr[i]['lat']*1;
			default_lng += arr[i]['lng']*1;
			default_lat_lng_count++;
			if(type === 'sponsors'){
				default_item_content = '<div class="map_selected_item sponsors clear_both">';
				default_item_content += '<div class="map_selected_item_text">';
				default_item_content += '<div class="map_selected_main">COMMANDITAIRE</div>';
				default_item_content += '<h3 class="map_selected_item_title">'+arr[i]['name']+'</h3>';
				default_item_content += '<ul>';
				//console.log(arr[i]);
				//if(arr[i]['second_address']){
				var address2 = '';
				if(arr[i]['second_address'] != ''){
						address2 = '<br>'+arr[i]['second_address'];
				}
				default_item_content += '<li>'+arr[i]['address']+address2+'</li>';
				//}
				if(arr[i]['second_phone']){
					var phone2 = '';
					if(arr[i]['second_phone'] != ''){
						phone2 = '<br>'+arr[i]['second_phone'];
					}
					default_item_content += '<li>'+arr[i]['phone']+phone2+'</li>';
				}
				if(arr[i]['website']){
					default_item_content += '<li><a target="_blank" href="'+arr[i]['website']+'">'+arr[i]['website']+'</a></li>';
				}
				if(arr[i]['direction']){
					default_item_content += '<li><a target="_blank" href="'+arr[i]['direction']+'">Voir l’itinéraire</a></li>';
				}
				default_item_content += '</ul>';
				default_item_content += '</div>';
				default_item_content += '</div>';
				default_markers.push({
					'lat':arr[i]['lat']*1,
					'lng':arr[i]['lng']*1,
					'content':default_item_content,
					'title':arr[i]['name'],
					'marker':arr[i]['pin']
				});
			}
			else if(type === 'collectives'){
				default_item_content = '<div class="map_selected_item collectives clear_both">';
				default_item_content += '<div class="map_selected_item_text">';
				default_item_content += '<div class="map_selected_main">EXPOSITION COLLECTIVE</div>';
				//default_item_content += '<h3 class="map_selected_item_title">'+arr[i]['name']+'</h3>';
				default_item_content += '<ul>';
				if(arr[i]['place']){
					default_item_content += '<li class="place">'+arr[i]['place']+'</li>';
				}
				if(arr[i]['address']){
					default_item_content += '<li>'+arr[i]['address']+'</li>';
				}
				if(arr[i]['dates'] != undefined){
					default_item_content += '<li class="dates">'+arr[i]['dates']+'</li>';
				}
				if(arr[i]['dayhours']!= undefined){
					default_item_content += '<li>'+arr[i]['dayhours']+'</li>';
				}
				if(arr[i]['direction']!= undefined){
					default_item_content += '<li><a target="_blank" href="'+arr[i]['direction']+'">Voir l’itinéraire</a></li>';
				}
				default_item_content += '</ul>';
				if(arr[i]['col_external_link'] != ''){
					default_item_content += '<div class="map_selected_item_plus"><a target="_blank" href="'+arr[i]['col_external_link']+'"></div>';
				}
				default_item_content += '</div>';
				default_item_content += '</div>';
				default_markers.push({
					'lat':arr[i]['lat']*1,
					'lng':arr[i]['lng']*1,
					'content':default_item_content,
					'title':arr[i]['name'],
					'marker':arr[i]['pin']
				});
				
			}
			post_count++;
		}
// 		$('#interactive_map_cat .select_items.'+div+' > div').append(' <span class="ddvo">('+post_count+')</span>'); // remove count on collectives and second
	}
}