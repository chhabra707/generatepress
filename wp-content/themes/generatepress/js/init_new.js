/*********************************************************************************************************************/
/*********************************************************************************************************************/
/*********************************************************************************************************************/
/*Custom Coding started*/

//map functions
var $ = jQuery.noConflict();
$(function(){
    if($('#interactive_map').length){		
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
        map_init({
            'element':'interactive_map_map',
            'lat':default_lat/default_lat_lng_count,
            'lng':default_lng/default_lat_lng_count,
           
            'marker':true,
            'markers_arr':default_markers
        });
/*         $('#interactive_map_back').click(function(){
			$('#interactive_map_map').css('width','');
            map_init({
                'element':'interactive_map_map',
                'lat':default_lat/default_lat_lng_count,
                'lng':default_lng/default_lat_lng_count,
               
                'marker':true,
                'markers_arr':default_markers
            });
            // $('#interactive_map_result').fadeOut(); 
            $('#interactive_map_search').removeClass('open collective sponsor');
            setTimeout(function(){
                $('#interactive_map_before_search').fadeIn();
            },500);
            setTimeout(function(){
                jQuery('.intractive-map-main-info').toggleClass('hide');
            },1000);
        }); */

/* 		$(document).on('click','#searched_filter ul li',function(){
			$(this).siblings().removeClass('active');
			if($(this).hasClass('active')){
				$(this).removeClass('active');
				$('#interactive_map_searched_arts > li').show();
			}
			else{
				$(this).addClass('active');
				$('#interactive_map_searched_arts > li').show();
				$('#interactive_map_searched_arts > li:not([data-map_town="'+$(this).html().slice(0,$(this).html().indexOf('<span')).trim()+'"])').hide();
			}
		}); */
/*         $('#interactive_map_cat .select_items .select_items_title').click(function(){
            $(this).next('ul').stop().slideToggle();
        });
 */     /*    $('#interactive_map_cat .select_items > ul > li > div').click(function(){
			$('#interactive_map_cat .select_items > .only_select_items_title').removeClass('selected');
			$('#interactive_map_cat .select_items > .only_select_items_title').next('ul').removeClass('selected');
            $(this).parent().toggleClass('selected');
            if($(this).parent().find('li:not(.selected)').length){
                $(this).parent().find('li').addClass('selected');
            }
            else{
                $(this).parent().find('li').removeClass('selected');
            }
        }); */
/*         $('#interactive_map_cat .select_items > ul > li > ul > li > div').click(function(){
			$('#interactive_map_cat .select_items > .only_select_items_title').removeClass('selected');
			$('#interactive_map_cat .select_items > .only_select_items_title').next('ul').removeClass('selected');
            $(this).parent().toggleClass('selected');
			if(!$(this).parent().siblings().addBack().not('.selected').length){
				$(this).parent().parent().parent().addClass('selected');
			}
			if(!$(this).parent().hasClass('selected')){
				$(this).parent().parent().parent().removeClass('selected');
			}
        }); */
/* 		$('#interactive_map_cat .select_items > .only_select_items_title').click(function(){
			if($(this).hasClass('selected')){
				$(this).removeClass('selected');
				$(this).next('ul').removeClass('selected');
			}
			else{
				$('#interactive_map_cat .select_items .selected').removeClass('selected');
				$(this).addClass('selected');
				$(this).next('ul').addClass('selected');
			}
		}); */
    }
    if($('#footer_subscribes .es_button input').length){
        $('#footer_subscribes .es_button input').val('M\'inscrire');
    }
    $('#category_research .form_block.technic select').multipleSelect({
        'selectAll':false,
        'placeholder':$('#category_research .form_block.technic select').attr('data-placeholder'),
        'allSelected':$('#category_research .form_block.technic select').attr('data-allSelected')
    });
    $('#homepage_bigimage ul').owlCarousel({
        'autoplay':true,
        'loop':true,
        'items':1,
        'dots':false,
        'nav':false
    });
    $('#arts_participant_gallery ul').owlCarousel({
        'loop':true,
        'items':5,
        'autoWidth':true,
        'dots':false,
        'nav':true,
        'navText':false,
        'margin':3,
        'responsive':{
            240:{
                'items':1,
                'nav':false
            },
            450:{
                'items':2,
                'nav':false
            },
            769:{
                'items':3,
                'nav':false
            }
        }
    });
    $('#arts_participant_gallery ul').on('click','li',function(){
        if($('#gallery_slide').length){
            return false;
        }
        var $this = $(this);
        $('#page_wrapper').append('<div id="gallery_slide"><div class="wrapper"><ul class="owl-carousel"></ul></div><span class="close"></span><></div>');
        $this.parent().siblings().addBack().filter(':not(.cloned)').children('li').clone().appendTo('#gallery_slide ul');
        $('#gallery_slide ul').owlCarousel({
            'loop':true,
            'items':1,
            'dots':false,
            'nav':true,
            'navText':false
        }).trigger('to.owl.carousel',[$('#gallery_slide ul').find('li[data-id="'+$this.attr('data-id')+'"]').first().parent().index(),1]);
        $('#gallery_slide ul').css('visibility','hidden');
        $('#gallery_slide').fadeIn();
        setTimeout(function(){
            $('#gallery_slide ul').css('visibility','visible');
        },500);
        function gallery_fadeout(){
            $('#gallery_slide').fadeOut();
            setTimeout(function(){
                $('#gallery_slide').remove();
            },400);
        }
        $('#gallery_slide .close').click(function(){
            gallery_fadeout();
        });
        $(document).keyup(function(e) {
            if (e.keyCode == 27) {
                gallery_fadeout();
            }
        });
        $(document).keyup(function(e) {
            if(e.keyCode == 37) {
                $('#gallery_slide ul').trigger('prev.owl.carousel');
            }
            else if(e.keyCode == 39) {
                $('#gallery_slide ul').trigger('next.owl.carousel');
            }
        });
    });
    $('#homepage_decouvrez ul li img,#homepage_nouvelles_images .homepage_nouvelles_image img,#homepage_bigimage ul li img').imageCrop();
    $('#category_list').paging(8);
    $('#arts_participant_share_right').click(function(event){
        if($(event.target).is(this)){
            $(this).children('ul').stop().slideToggle();
        }
    });
    $('#menu_search').click(function(){
        $('#menu_search_body').addClass('open');
    });
    $('#menu_search_body .close').click(function(){
        $(this).parent().removeClass('open');
    });
    if(navigator.platform == 'MacIntel'){
        $('body').addClass('mac');
    }
    $(window).resize(function(){
        $('#gallery_slide ul,#arts_participant_gallery ul,#homepage_bigimage ul').trigger('refresh.owl.carousel');
        $('#homepage_decouvrez ul li img,#homepage_nouvelles_images .homepage_nouvelles_image img,#category_list .item_image img,#homepage_bigimage ul li img').imageCrop();
    });
    $('#es_txt_email_pg').attr("placeholder", "Abonnez-vous à notre infolettre");

});
$(window).on('load',function(){

});
jQuery.fn.imageCrop = function(){
    this.removeClass('by_width by_height');
    this.each(function(){
        if(this.complete) {
            if(jQuery(this).width() / jQuery(this).height() >= jQuery(this).parent().width() / jQuery(this).parent().height()){
                jQuery(this).addClass('by_height');
            }
            else{
                jQuery(this).addClass('by_width');
            }
        }
        else{
            jQuery(this).on('load',function(){
                if(jQuery(this).width() / jQuery(this).height() >= jQuery(this).parent().width() / jQuery(this).parent().height()){
                    jQuery(this).addClass('by_height');
                }
                else{
                    jQuery(this).addClass('by_width');
                }
            });
        }
    });
};
jQuery.fn.paging = function(items){
    var $this = this;
    $('#paging_count .all').text($this.children('.items').length);
    var paging_count = 1;
    var cat_items = '<div class="paging_items active clear_both">';
    $this.children('.items').each(function(index){
        if((index)%items == 0 && index != 0){
            cat_items += '</div><div class="paging_items clear_both">';
            paging_count++;
        }
        cat_items += $('<div>').append($(this).clone()).html();
    });
    cat_items += '</div>';
    var paging = '<ul class="clear_both"><li class="prev active"></li>';
    for(var i = 1;i <= paging_count;i++){
        if(i == 1){
            paging += '<li class="active">' + i + '</li>';
        }
        else{
            paging += '<li>' + i + '</li>';
        }
    }
    paging += '<li class="next '+ (paging_count == 1 ? 'active' : '') +'"></li></ul>';
    $this.html(cat_items);
    $this.siblings('#paging').append(paging);
    $this.children('.paging_items').first().addClass('active').fadeIn();
    $('#paging_count .first').text(1);
    $('#paging_count .second').text($this.find('.paging_items.active .items').length);
    $('#category_list .item_image img').imageCrop();
    $('#paging ul li').click(function(){
        if($(this).hasClass('active')){
            return false;
        }
        $this1 = $(this);
        $this.children('.paging_items.active').fadeOut(400);
        setTimeout(function(){
            if($this1.hasClass('prev')){
                var prev_item = $this.children('.paging_items.active').prev();
                $this.children('.paging_items.active').removeClass('active');
                $this1.siblings(':not(.next).active').removeClass('active').prev().addClass('active');
                prev_item.addClass('active').fadeIn(400);
                $this1.siblings('.next').removeClass('active');
                if(prev_item.is(':first-of-type')){
                    $this1.addClass('active');
                }
            }
            else if($this1.hasClass('next')){
                var prev_item = $this.children('.paging_items.active').next();
                $this.children('.paging_items.active').removeClass('active');
                $this1.siblings(':not(.prev).active').removeClass('active').next().addClass('active');
                prev_item.addClass('active').fadeIn(400);
                $this1.siblings('.prev').removeClass('active');
                if(prev_item.is(':last-of-type')){
                    $this1.addClass('active');
                }
            }
            else{
                var prev_item = $this.children('.paging_items:nth-of-type('+($this1.index())+')');
                $this.children('.paging_items.active').removeClass('active');
                prev_item.addClass('active').fadeIn(400);
                $this1.addClass('active');
                $this1.siblings(':not(.next):not(.prev)').removeClass('active');
                if(!prev_item.is(':last-of-type')){
                    $this1.siblings('.next').removeClass('active');
                }
                else if(prev_item.is(':last-of-type')){
                    $this1.siblings('.next').addClass('active');
                }
                if(!prev_item.is(':first-of-type')){
                    $this1.siblings('.prev').removeClass('active');
                }
                else if(prev_item.is(':first-of-type')){
                    $this1.siblings('.prev').addClass('active');
                }
            }
            $('#paging_count .first').text($this.children('.paging_items.active').index() * items + 1);
            $('#paging_count .second').text($('#paging_count .first').text()*1 + $this.find('.paging_items.active .items').length-1);
            $('#category_list .item_image img').imageCrop();
        },500);
    });
}
function map_init(obj){
    var map = new google.maps.Map(document.getElementById(obj['element']), {
        zoom: obj['zoom'],
        center: {lat: obj['lat']*1, lng: obj['lng']*1},//45.5637123, lng: -72.9880842
        disableDefaultUI: true
    });
	 map.setOptions({
      zoomControl: true,
      zoomControlOptions: {position: google.maps.ControlPosition.LEFT_TOP}
    });
    var styles = [
        {
            'featureType': 'water',
            'elementType': 'geometry',
            'stylers': [
                {
                    'color': '#e9e9e9'
                },
                {
                    'lightness': 17
                }
            ]
        },
        {
            'featureType': 'landscape',
            'elementType': 'geometry',
            'stylers': [
                {
                    'color': '#f5f5f5'
                },
                {
                    'lightness': 20
                }
            ]
        },
        {
            'featureType': 'road.highway',
            'elementType': 'geometry.fill',
            'stylers': [
                {
                    'color': '#ffffff'
                },
                {
                    'lightness': 17
                }
            ]
        },
        {
            'featureType': 'road.highway',
            'elementType': 'geometry.stroke',
            'stylers': [
                {
                    'color': '#ffffff'
                },
                {
                    'lightness': 29
                },
                {
                    'weight': 0.8
                }
            ]
        },
        {
            'featureType': 'road.arterial',
            'elementType': 'geometry',
            'stylers': [
                {
                    'color': '#ffffff'
                },
                {
                    'lightness': 18
                }
            ]
        },
        {
            'featureType': 'road.local',
            'elementType': 'geometry',
            'stylers': [
                {
                    'color': '#ffffff'
                },
                {
                    'lightness': 16
                }
            ]
        },
        {
            'featureType': 'poi',
            'elementType': 'geometry',
            'stylers': [
                {
                    'color': '#f5f5f5'
                },
                {
                    'lightness': 21
                }
            ]
        },
        {
            'featureType': 'poi.park',
            'elementType': 'geometry',
            'stylers': [
                {
                    'color': '#dedede'
                },
                {
                    'lightness': 21
                }
            ]
        },
        {
            'elementType': 'labels.text.stroke',
            'stylers': [
                {
                    'visibility': 'on'
                },
                {
                    'color': '#ffffff'
                },
                {
                    'lightness': 16
                }
            ]
        },
        {
            'elementType': 'labels.text.fill',
            'stylers': [
                {
                    'saturation': 36
                },
                {
                    'color': '#333333'
                },
                {
                    'lightness': 40
                }
            ]
        },
        {
            'elementType': 'labels.icon',
            'stylers': [
                {
                    'visibility': 'off'
                }
            ]
        },
        {
            'featureType': 'transit',
            'elementType': 'geometry',
            'stylers': [
                {
                    'color': '#f2f2f2'
                },
                {
                    'lightness': 19
                }
            ]
        },
        {
            'featureType': 'administrative',
            'elementType': 'geometry.fill',
            'stylers': [
                {
                    'color': '#fefefe'
                },
                {
                    'lightness': 20
                }
            ]
        },
        {
            'featureType': 'administrative',
            'elementType': 'geometry.stroke',
            'stylers': [
                {
                    'color': '#fefefe'
                },
                {
                    'lightness': 17
                },
                {
                    'weight': 1.2
                }
            ]
        }
    ];

    var mapType = new google.maps.StyledMapType(styles, { name:"Grayscale" });
    map.mapTypes.set('tehgrayz', mapType);
    map.setMapTypeId('tehgrayz');

    if(obj['marker'] === true){
        setMarkers(map);		        
    }
	
	function multiDimensionalUnique(arr) {
		var uniques = [];
		var itemsFound = {};
		for(var i = 0, l = arr.length; i < l; i++) {
			var stringified = JSON.stringify(arr[i]);
			if(itemsFound[stringified]) { continue; }
			uniques.push(arr[i]);
			itemsFound[stringified] = true;
		}
		return uniques;
	}	
		
    function setMarkers(map){
        var markers = multiDimensionalUnique(obj['markers_arr']);
		//console.log("markers");
		//console.log(markers);
		var mcOptions = {gridSize: 48, maxZoom: 17,cssClass:'custom-pin', styles: [{	height: 60,textSize:14,	url: "http://www.routeartssaveursrichelieu.com/wp-content/themes/generatepress/pin/m1.png", width: 60		},		{		height: 60,textSize:14,	url: "http://www.routeartssaveursrichelieu.com/wp-content/themes/generatepress/pin/m2.png", width: 60		},		{		height: 60,textSize:14,	url: "http://www.routeartssaveursrichelieu.com/wp-content/themes/generatepress/pin/m3.png", width: 60		},		{		height: 60,textSize:14,	url: "http://www.routeartssaveursrichelieu.com/wp-content/themes/generatepress/pin/m4.png", width: 60		},		{		height: 60,textSize:14,	url: "http://www.routeartssaveursrichelieu.com/wp-content/themes/generatepress/pin/m5.png", width: 60		}]};				
		var markerarray = [];
        var marker = [];
        var infowindow = [];
		//console.log(markers);
        for (var i = 0; i < markers.length; i++){
            var mark = markers[i];
            var marker_img = 'http://www.routeartssaveursrichelieu.com/wp-content/themes/generatepress/images/marker.png';
            if('marker' in mark){
				if(mark['marker'] != '' && (typeof mark['marker'] != 'undefined') && mark['marker'] != 'undefined'){
					marker_img = mark['marker'];
				}
            }
			//console.log(mark);
            marker[i] = new google.maps.Marker({
                position: {lat: mark['lat']*1, lng: mark['lng']*1},
                map: map,
                clickable: true,
				optimized: false,
                icon: {
                    url: marker_img,
                    size: new google.maps.Size(34, 46),
                    origin: new google.maps.Point(0, 0),
                    anchor: new google.maps.Point(34, 46)
                },
                title: mark['title'],
                i:i,
                zIndex: 9999999,
            });	
		    if(mark['title'] != ""){
				markerarray.push(marker[i]);
			}
			
			
			
            var content = mark['content'];
            infowindow[i] = new google.maps.InfoWindow({
                content: content,
				/* boxStyle:{opacity:0.9,background-color:transparent !important} */
            });
        }


		
		//console.log(markerarray);
		var markerCluster = new MarkerClusterer(map, markerarray, mcOptions);			
		/* 
		console.log(markers);			
		var markerCluster = new MarkerClusterer(map, markers, {imagePath:'https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/m'}); 
		*/
		var bounds = new google.maps.LatLngBounds();
		
		for(var i=0;i<marker.length;i++){
			marker[i].addListener('click', function() {
				for(var j=0;j<infowindow.length;j++){
					infowindow[j].close();
				}
                infowindow[this['i']].open(map,marker[this['i']]);
				$('.map_selected_item_image img').removeClass('by_height by_width').imageCrop();
            });
			bounds.extend(marker[i].getPosition());
		}
		map.fitBounds(bounds);
		map.addListener('click',function(){
			for(var j=0;j<infowindow.length;j++){
				infowindow[j].close();
			}
		})
    }
}
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
Array.prototype.unique_count = function(){
	var n = {}; 
	for(var i = 0; i < this.length; i++){
		if(!(this[i] in n)){
			n[this[i]] = 1;
		}
		else{
			n[this[i]]++;
		}
	}
	return n;
}

$(document).ready(function (){
	
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

})