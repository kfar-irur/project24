<script>
function load_map(){
	jQuery.ajax({
		type: "POST",
		dataType: "html",
		url: "<?php echo $ajax_url;?>",
		data: {action: "p24_loadMap_ajax"},
		success: function(output){
			jQuery('.entry-content').html(output);
			window.scrollTo(0, document.getElementById('page_top').offsetTop);
		}
	});
}

function load_area(area_id, is_back){
if(!is_back) {history.pushState({area_id:area_id}, "אזור:"+ area_id, "?aid="+area_id);} 
	jQuery.ajax({
		type: "POST",
		dataType: "html",
		url: "<?php echo $ajax_url;?>",
		data: {action: "p24_loadArea_ajax", area_id:area_id},
		success: function(output){
			jQuery('.entry-content').html(output);
			window.onpopstate = function(event) {
      			load_map();
    		}
			window.scrollTo(0, document.getElementById('page_top').offsetTop);
		}
	});
}

function load_beach(beach_id, area_id, is_back){
//console.log("get_beach- beach_id: "+beach_id);
if(!is_back) {history.pushState({beach_id:beach_id}, "אזור:"+ beach_id, "?bid="+beach_id);}
	jQuery.ajax({
		type: "POST",
		dataType: "html",
		url: "<?php echo $ajax_url;?>",
		data: {action: "p24_loadBeach_ajax", beach_id:beach_id},
		success: function(output){
			jQuery('.entry-content').html(output);
			window.onpopstate = function(event) {
     			load_area(area_id, 1);
    		}
			window.scrollTo(0, document.getElementById('page_top').offsetTop);
		}
	});
}

</script>