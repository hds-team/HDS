function sendPost(frmId, value, url, opt, conf) {
	/**************************/
//		test function with : IE6,IE7,IE8,FF 3.6,FF 4.0,Chrome 11.0.696.77,Opera11.11 
	/*************************/
	if(conf.length>0){
		if(!confirm(conf))
			return false;
	}
	var html = "";
	if(url != "")
	{
		if (jQuery("#"+frmId).length > 0) {
			jQuery("#"+frmId).attr("action",url);
		}
		else {
			jQuery("body").append("<form action=\""+url+"\" id=\""+frmId+"\" method=\"post\" ></form>")
		}
	}
	if (value != "") {
		jQuery.each(value,function(index,value){
			if(jQuery("#"+frmId).find("input:hidden[name='"+index+"']").length == 0)
			{
				html += "<input type='hidden' name='"+index+"' value='"+value+"' id='"+index+"' />";
			}else{
				jQuery("input:hidden[name='"+index+"']").val(value);
			}
			temp = index;
		});
	}
	if (typeof(opt) == "object") {
		var def_attrs = {'width':800,'height':400,'resizeable':1,'scrollbars':1};
		var attrs = "";
		jQuery.each(def_attrs,function(key,val){
			var tmp_val = (opt[key])?opt[key]:val;
			attrs += key+"="+tmp_val+",";
			delete opt[key];
		});
		jQuery.each(opt,function(key,val){
			attrs +=  key+"="+val+",";
		});
		attrs = attrs.substring(0,(attrs.length -1));
		jQuery("#"+frmId).bind('submit',function(){
			window.open('', frmId+"_popup", attrs);
			this.target = frmId+"_popup";
		});
	}
	else
	{
		jQuery("#"+frmId).unbind('submit');
	}
	jQuery("#"+frmId).append(html).trigger("submit");
} 