jQuery(document).ready(function($){
	$(".preventDf").live('click',function(event){
		event.preventDefault();
	});
	$('.link').hover(function(){
		$(this).addClass('hover');
	},function(){
		$(this).removeClass('hover');
	});
	$(':input[class^="required"]').blur(function(){
		var objLen = $(this).parent().find(":input[class^='required']").length;
		$(this).siblings('span.error').children('.error').remove();
		if($(this).attr('class') == 'required-thai'){
			if(!/^[ก-๙][ก-๙ 0-9\.\(\)\/\- ]*$/.test($(this).val())){
				$(this).siblings('span.error').append('<div class="error">กรุณาป้อนและควรป้อนเป็นภาษาไทยเท่านั้น</div>');
				return false;
			}/*else{
				$(this).siblings('span.error').children('.error').remove();
				return true;
			}	*/
		}else if($(this).attr('class')=='required-eng'){
			if(!/^[a-zA-Z][a-zA-Z0-9 -_\.\(\)\/ ]*$/.test($(this).val())){
				$(this).siblings('span.error').append('<div class="error">กรุณาป้อนและควรป้อนเป็นภาษาอังกฤษเท่านั้น</div>');
				return false;
			}/*else{
				$(this).siblings('span.error').children('.error').remove();
				return true;
			}*/
		}else if($(this).attr('class')=='required-float'){
			if(!/^[0-9][0-9]*.?[0-9]*$/.test(this.value)){
				$(this).siblings('span.error').append('<div class="error">กรุณาป้อนและควรป้อนเป็นตัวเลขเท่านั้น</div>');
				return false;
			}/*else{
				$(this).siblings('span.error').children('.error').remove();
				return true;
			}*/
		}else if($(this).attr('class')=='required-int'){
			if(!/^[0-9][0-9]*$/.test(this.value)){
				$(this).siblings('span.error').append('<div class="error">กรุณาป้อนและควรป้อนเป็นตัวเลขเท่านั้น</div>');
				return false;
			}/*else{
				$(this).siblings('span.error').children('.error').remove();
				return true;
			}*/
		}else if($(this).attr("class") == "required-char"){
			if(!/^[ก-๙a-zA-z][ก-๙a-zA-z ]*$/.test(this.value)){
				$(this).siblings("span.error").append('<div class="error">กรุณาป้อนและควรป้อนเฉพาะตัวอักษร</div>')
				return false;
			}/*else{
				$(this).siblings("span.error").children(".error").remove();
				return true;
			}*/
		}else if($(this).attr("class") == "required-email"){
			if(!/^[a-zA-z][a-zA-z\.-_]*@[a-z]+\.[\.a-zA-z]*[a-zA-z]$/.test(this.value)){
				$(this).siblings("span.error").append('<div class="error">กรุณาป้อนและควรป้อนเฉพาะอีเมล์</div>')
				return false;
			}/*else{
				$(this).siblings("span.error").children(".error").remove();
				return true;
			}*/
		}else{
			if(this.value == ''){
				$(this).next('span.error').append('<div class="error">กรุณาป้อนข้อมูล</div>');
				return false;				
			}/*else{
				$(this).next('span.error').children('.error').remove();
				return true;
			}*/
		}
	});
	$('table.tbOver tbody tr').hover(function(){
		$(this).addClass('trHover');
	},function(){
		$(this).removeClass('trHover');
	});
});

/*function sendPost (frmId, value, url, target) {
	var html = "";
	if(url != "")
	{
		if (jQuery("#"+frmId).length > 0) {
			jQuery("#"+frmId).attr("action",url);
		}
		else {
			jQuery("body").append("<form action=\""+url+"\" id=\""+frmId+"\" method=\"post\" ></form>");
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
}*/

function sendPost(frmId, value, url, opt) {
	/**************************/
//		test function with : IE6,IE7,IE8,FF 3.6,FF 4.0,Chrome 11.0.696.77,Opera11.11 
	/*************************/
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

function setChk(target, flag) {
	jQuery("."+target).attr("checked",flag);
}

function chkboxRequire(chkbox, msg) {
	var num = jQuery(":checked[class='"+chkbox+"']").length;

	if (typeof(msg) == 'undefined') {
		var msg = "กรุณาเลือกอย่างน้อยหนึ่งรายการ";
	}

	if (num < 1) {
		alert(msg);
		return false;
	} else {
		return true;
	}
}

// this version is not complete.
/*function sendPost (frmId, value, url, target) {
	var html = "";
	if(url != "")
	{
		if (jQuery("#"+frmId).length > 0) {
			jQuery("#"+frmId).attr("action",url);
		}
		else {
			jQuery("body").append("<form action=\""+url+"\" id=\""+frmId+"\" method=\"post\" ></form>");
		}
	}
	if (typeof(target) != "undefined") {
//		jQuery("#"+frmId).attr("target","_blank");
//		กรณีต้องการ submit แล้วเปิดหน้าต่างใหม่ ว่าง url ไว้ กำหนด target = url วิธีการนี้ไม่ทำงานใน ie แต่ทำงานใน ff,ch
//		jQuery("#"+frmId).attr("target",url);
//		window.open(,url, 'width=450,height=300,status=yes,resizable=yes,scrollbars=yes');
// this function is not complete.it can't send value to new window
		newWindow = window.open(url,'_blank', 'width=450,height=300,status=yes,resizable=yes,scrollbars=yes');

		jQuery(newWindow.document).load(function(){
			if (typeof(value) != "undefined") {
				jQuery.each(value,function(index,value){
					if(jQuery("form:eq(0)",newWindow.document).find("input:hidden[name='"+index+"']").length == 0)
					{
						html += "<input type='hidden' name='"+index+"' value='"+value+"' id='"+index+"' />";
					}
					else
					{
						jQuery("input:hidden[name='"+index+"']",newWindow.document).val(value);
					}
				});
			}
			jQuery("form:eq(0)",newWindow.document).append(html);
		});
	}
	else
	{
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
}
*/
/*function confirmDel(id,frm,action,fnc){
	if(confirm("คุณต้องการลบใช่หรือไม่") == true)
		if(fnc == "")
			preSubmitAdv(id,frm,action);
		else 
			fnc(id,frm,action);
}*/
function confirmDel(id,frm,action){
	if(confirm("คุณต้องการลบใช่หรือไม่") == true)
			preSubmitAdv(id,frm,action);
}
function confirmDel2(value,frm,action,msg){
	if(msg != "" && msg != undefined){
		if(confirm(msg) == true)
		sendPost(frm,value,action);
	}else{
		if(confirm("คุณต้องการลบใช่หรือไม่") == true)
		sendPost(frm,value,action);
	}
	
}
function confirmDel3(value,frm,url){
	if(confirm("คุณต้องการลบใช่หรือไม่") == true)
		sendPost(frm, value, url)
}
function preSubmitAdv(id,frm,action){
	var $s_id = jQuery('#s_id');
	$s_id.attr('value',id);
	jQuery(frm).children().find(':text').attr('value','').end().find('select').children().removeAttr('selected').end().attr('value','');
//	jQuery('#btnClear').parents('form').find(':text').attr('value','').end().find('select').children().removeAttr('selected').end().attr('value','');
	jQuery(frm).unbind();
	if(action == "" )
		jQuery(frm).trigger("submit");
	else
		jQuery(frm).attr('action',action).trigger('submit');
}

function clearFrm(frm,txtexcept,opt){
	var frmId = "#"+frm;
//	alert('in function');
	jQuery(frmId+" :input").each(function(index){
		if(txtexcept.indexOf(jQuery(this).attr("id")) < 0){
			switch(this.type){
				case "password":
				case "text":
				case "select-one":
				case "textarea":
				case "hidden":
					jQuery(this).val("");
					break;
				case "checkbox":
				case "radio":
					this.checked = false;
			}
		}
	});
	if(opt != ""){
		jQuery.each(opt,function(id,tag){
			jQuery(tag+".#"+id).empty();
		});
	}
}

function newXmlHttp(){
        var HttPRequest = false;
        if (window.XMLHttpRequest) { // Mozilla, Safari,...
         HttPRequest = new XMLHttpRequest();
         if (HttPRequest.overrideMimeType) {
            HttPRequest.overrideMimeType('text/html');
         }
        } else if (window.ActiveXObject) { // IE
         try {
            HttPRequest = new ActiveXObject("Msxml2.XMLHTTP");
         } catch (e) {
            try {
               HttPRequest = new ActiveXObject("Microsoft.XMLHTTP");
            } catch (e) {}
         }
        }
       
      if (!HttPRequest) {
         alert('Cannot create XMLHTTP instance');
         return false;
      }
      return HttPRequest;
}