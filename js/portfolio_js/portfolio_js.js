jQuery(document).ready(function($) {
	// Event
});

function sendPost (frmId, value, url, target, conf) {
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
	if (target != "") {
		jQuery("#"+frmId).attr("target",target);
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
	jQuery("#"+frmId).append(html).trigger("submit");
}

function newXmlHttp () {
    var xmlhttp = false;
    try {
        xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
    } catch (e) {
        try {
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        } catch (e) {
            xmlhttp = false;
        }
    }
    if (!xmlhttp && document.createElement) {
        xmlhttp = new XMLHttpRequest();
    }
    return xmlhttp;
}

/* GET AJAX TO INPUT FORM */
function get_ajax (url, id) {
	xmlhttp = newXmlHttp();
	xmlhttp.open("GET", url, false);
	xmlhttp.send(null);
	document.getElementById(id).value = xmlhttp.responseText;
}

/* GET AJAX TO OBJECT FORM */
function get_ajax2 (url, id) {
	xmlhttp = newXmlHttp();
	xmlhttp.open("GET", url, false);
	xmlhttp.send(null);
	document.getElementById(id).innerHTML = xmlhttp.responseText;
}