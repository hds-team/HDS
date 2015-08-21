$(document).ready(function(){  
	//validate
	$("form").submit(validate);
	$(".validate").live("keyup",clearValidate);
	
	function validate(e){
		var flag = 0;
		var count = 0;
		$(this).find(".validate").each(function(index) {
			title = $(this).attr("title");
			
			if($(this).val()==""){
				// Focus frist
				if(count == 0){
					$(this).focus();
					count = count + 1;
				}
				if($("body").find("span.validate_error#validate_"+title).html()==null){
					this_offset = $(this).offset();
					this_width = $(this).width();
					span_left = this_offset.left+this_width+16;
					span_top = this_offset.top-10;
					msgError = "กรุณากรอก "+title;
					$("body").append("<span class=\"validate_error\" id=\"validate_"+title+"\" style=\"left:"+span_left+"px;top:"+span_top+"px;\">"+msgError+"</span>");
					
					$(".validate_error").fadeIn("slow");
					//alert(msgError);
				}
				flag = 1;
				
			} else {
				$("body").find("span.validate_error#validate_"+title).fadeOut("slow",function(){$(this).remove()});
			}
		});
		
		if(flag==1){
			setTimeout(function(){
				$("body").find("span.validate_error").fadeOut("slow",function(){$(this).remove()});
			},2000);
			return false;
		}
	}
	
	function clearValidate(){
		if($(this).val() != ""){
			title = $(this).attr("title");
			$("body").find("span.validate_error#validate_"+title).fadeOut("slow",function(){$(this).remove()});
		}
	}
});