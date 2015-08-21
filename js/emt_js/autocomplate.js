var globaldata = "";
var numrow;
var obj;
var get;
var sub_contract = "";
var currentStep = 0;
var edit;
$(document).ready(function(){
	// Autocomplete
	$(".autocomplete").live("keydown",function(event) { //onkeydown
		//alert(event.keyCode);
		switch(event.keyCode) {
			case 38: 			// up
				moveactive(-1);
				break;
			case 40: 			// down
				moveactive(1);
				break;
			case 9:  			// tab
				$(document).find(".autocomplete-block").each(function(index) {
					acLink(currentStep);				//go to function acLink
				});
				break;
			case 13:			// return
				event.cancelBubble = false;		//stop event 
				event.returnValue = false;		//
				$(document).find(".autocomplete-block").each(function(index) {
					acLink(currentStep);				//go to function acLink
				});
				return false;
				break;
		}
		 $(this).attr("autocomplete","off");	//set attribute autocomplete=off
	}).live("keyup",function(event) { //onkeyup
		switch(event.keyCode) {
			case 38: 			// up
			case 40: 			// down
			case 9:  			// tab
			case 13:			// return
			return;
		}
		
		obj = $(this);
		get = obj.attr("get"); 	//set get ,for append url
		key = obj.val();		//set key ,for search
		acStart($(this));
		// All key
		/*if($("input[name=edit]").val()=="edit"){
			url = "../";
		} else {
			url = "";
		}
		*/
		url = ajax_url+get;		// get append url
		$.post(url, { q: key},
			function(data) {
				/*
				globaldata = data;
				//alert(data);
				rows = data.split("[;]");
				numrow = rows.length;
				li = "";
				for(i=0;i<numrow-1;i++){
					cols = rows[i].split("[|]");
					li += "<li class=\"autocomplete-item\" onclick=\"acLink("+i
					+")\"><a href=\"javascript:void(0);\">"+cols[1]+"</a></li>";		// add to list autocomplete
				}
				$(".autocomplete-block").remove();	//delete block list autocomplete
				if(li == ""){		//if li not value -> stop
					return;
				}
				obj.before("<div class=\"autocomplete-block\"><ul class=\"autocomplete-list\">"
				+li+"</ul></div>"); 	//add list autocomplete to block 
				$("li.autocomplete-item").first().addClass("active");	//li active at first row  
				currentStep = 0;		//first row -> currentStep = 0
				*/
				
				if(data != null){
					globaldata = data;
					li = "";
					$.each(data, function(i,item){
						li += "<li class=\"autocomplete-item\" onclick=\"acLink("+i
						+")\"><a href=\"javascript:void(0);\">"+item.name+"</a></li>";		// add to list autocomplete
					});
					$(".autocomplete-block").remove();	//delete block list autocomplete
					if(li == ""){		//if li not value -> stop
						return;
					}
					obj.before("<div class=\"autocomplete-block\"><ul class=\"autocomplete-list\">"
					+li+"</ul></div>"); 	//add list autocomplete to block 
					$("li.autocomplete-item").first().addClass("active");	//li active at first row  
					currentStep = 0;		//first row -> currentStep = 0
				}else {
					$(".autocomplete-block").remove();	//delete block list autocomplete
				}
			}
		,"json");
	});
});


function moveactive(step){
	if(step == -1 && currentStep == 0){ 
		return false;
	}
	if(step == 1 && currentStep == numrow-2){
		return false;
	}
	currentStep = currentStep + step;
	$("li.autocomplete-item").removeClass("active");
	$("li.autocomplete-item:eq("+currentStep+")").addClass("active");
}



